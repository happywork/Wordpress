<?php
/**
 * CSV and JSON Conversion functions
 * Auxiliary library
 * Author: Ederico Rocha <ederico.rocha@rwinteractive.com>
 */

/**
 * Converts an array into a csv string
 *
 * @param array $array
 * @return null|string
 */
function array2csv(array &$array, $showcolumn = true)
{
    if (count($array) == 0) return null;
    ob_start();
    $df = fopen("php://output", 'w');
    if ($showcolumn) fputcsv($df, array_keys(reset($array)),';');
    foreach ($array as $row) {
        fputcsv($df, $row, ';');
    }
    fclose($df);
    return ob_get_clean();
}

function text2csv($text, $separator = PHP_EOL){
    if (strlen($text)==0) return null;
    $rows = explode($separator, $text);
    $arr = [];
    foreach($rows as $key=>$values) {
        if (!empty($values)) $arr[] = explode(';',$values);
    }
    return array2csv($arr, false);
}

/**
 * Retrieves the json content of a json file
 * @param $filepath
 * @return mixed|null|string
 */
function parseJsonFile($filepath) {
    $data = null;
    if (file_exists($filepath)) {
        $data = file_get_contents($filepath);
        if (strlen($data)>0) {
            $data = json_decode($data);
        } else {
            $data = json_decode([]);
        }
    }
    return $data;
}


/**
 * Retrieves the content of a csv file and places into an array
 * @param $filepath
 * @return mixed|null|string
 */
//function csvToArray($filepath) {
//    $data = null;
//
//    if (file_exists($filepath)) {
//        $row = 1;
//        if (($handle = fopen($filepath, "r")) !== FALSE) {
//            while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
//                $num = count($data);
//                echo "<p> $num fields in line $row: <br /></p>\n";
//                $row++;
//                for ($c=0; $c < $num; $c++) {
//                    echo $data[$c] . "<br />\n";
//                }
//            }
//            fclose($handle);
//        }
//
//        $data = file_get_contents($filepath);
//        if (strlen($data)>0) {
//            $data = json_decode($data);
//        } else {
//            $data = json_decode([]);
//        }
//    }
//    return $data;
//}

function csvToArray($filepath) {
    global $wpdb;
    $data = null;
    // msqli connection to the db
    //$con = mysqli_connect("localhost","root","rain4038","bitnami_wordpress");
    
    //counters
    $success = 0;
    $failure = 0;
    $deleted = 0;
    
    if (file_exists($filepath)) {
      
        $row = 1;
        if (($handle = fopen($filepath, "r")) !== FALSE) {
            while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                $num = count($data);
                
                //skip first as in this case they were headers
                //if($row == 1){ $row++; continue; }
                $row++;
                
                // cicle to iterate the lines
                foreach($data as $i => $v){
                    
                    
                    //take action using the first element ot the array
                    if ($i == 0) {
                        
                        //scape stings as the file had special characteres
                        $user_login = $data[0];
                        $user_nicename = addslashes($data[2]);
                        $business_name = addslashes($data[3]);

                        //wp_usermeta fields
                        
                        $firstname = addslashes($data[5]);
                        $lastname = addslashes($data[6]);
                        $address = addslashes($data[7]);
                        $city = addslashes($data[8]);
                        $postcode = addslashes($data[9]);
                        $state = addslashes($data[10]);
                        $phone = addslashes($data[11]);
                        $mobile = addslashes($data[12]);
                        $capabilities = addslashes($data[18]);
                        $level = addslashes($data[19]);
                    
                        //selecting a user witht he given login
                        $query = "SELECT * from wp_users WHERE user_login='$user_login'"; 
                        
                        $wpdb->get_results($query);
                               
                        if($wpdb->num_rows == 0){
                            
                        //Getting the rest of the array and escaping special characters
                        //wp_users fields
                        $user_pass = addslashes($data[1]);
                        
                        $user_email = addslashes( $data[4]);
                        $user_url = addslashes($data[13]);
                        $user_registered = addslashes($data[14]);
                        $user_activation_key = addslashes($data[15]);
                        $user_status = addslashes($data[16]);
                        $display_name = addslashes($data[17]);
                            
                            $wpdb->insert("wp_users", array(
                               "user_login" => $user_login,
                               "user_pass" => $user_pass,
                               "user_nicename" => $user_nicename,
                               "user_email" => $user_email,
                               "user_url" => $user_url,
                               "user_registered" => $user_registered,
                               "user_activation_key" => $user_activation_key,
                               "user_status" => $user_status,
                               "display_name" => $display_name,
                            ));
                            
                            if($wpdb->last_error == 0){
                                
                                
                                $last_id = $wpdb->insert_id;
                                                      
                                $metas = array( 
                                    'nickname'          => $user_nicename,
                                    'first_name'        => $firstname, 
                                    'last_name'         => $lastname ,
                                    'city'              => $city ,
                                    'address'           => $address,
                                    'state'             => $state,
                                    'postcode'          => $postcode,
                                    'phone'             => $phone,
                                    'mobile'            => $mobile,
                                    'business_name'     => $business_name,
                                    'wp_capabilities'   => $capabilities,
                                    'wp_user_level'     => $level
                                );

                                foreach($metas as $key => $value) {
                                    update_user_meta( $last_id, $key, $value );
                                }
                                
                                $u = new WP_User( $last_id  );
                                
                                if($level == "0"){
                                    $u->set_role( 'subscriber' );
                            
                                }else if($level == "10"){
                                     $u->set_role( 'administrator' );
                                }
                                
                                $success++;
                                
                            }else{
                                
                                  //incrementing the failure counter
                                   $failure++;
                            } 
                        
                        
                        }else{
                            
                            $result = $wpdb->get_results ("SELECT ID from wp_users WHERE user_login='$user_login'");
                    
                            foreach ( $result as $user ){
                               $id = $user->ID;
                            }
                            
                            $metas = array( 
                                'nickname'          => $user_nicename,
                                'first_name'        => $firstname, 
                                'last_name'         => $lastname ,
                                'city'              => $city ,
                                'address'           => $address,
                                'state'             => $state,
                                'postcode'          => $postcode,
                                'phone'             => $phone,
                                'mobile'            => $mobile,
                                'business_name'     => $business_name,
                                'wp_capabilities'   => $capabilities,
                                'wp_user_level'     => $level
                            );

                            foreach($metas as $key => $value) {
                                update_user_meta( $id, $key, $value );
                            }
                            
                            $u = new WP_User( $id  );

                            // Add role
                            
                            if($level == "0"){
                                $u->set_role( 'subscriber' );
                            
                            }else if($level == "10"){
                                 $u->set_role( 'administrator' );
                            }
        
                            $success++;
                        }
                    
                    }
                }
                
            }
            echo "Successfull inserts: " .  $success . "<br/> Failed inserts: " .  $failure . "<br/>";
            
            fclose($handle);
        }
 
        $data = file_get_contents($filepath);
        if (strlen($data)>0) {
            $data = json_decode($data);
        } else {
            $data = json_decode([]);
        }
    }
   
    return $data;
}

/**
 * Saves the json content to a json file
 * @param $filepath
 * @return mixed|null|string
 */
function saveJsonFile($filepath, $data) {
    return file_put_contents($filepath, json_encode($data));
}