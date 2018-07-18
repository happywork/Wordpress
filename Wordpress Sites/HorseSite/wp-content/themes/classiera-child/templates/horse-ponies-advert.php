<?php
/**
 * Template name: Horse & Ponies Advert
 *
 * This is the most generic template file in a WordPress theme and one of the
 * two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * For example, it puts together the home page when no home.php file exists.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage classiera
 * @since classiera 1.0
 */


function mypage_head() {
    $extra = get_stylesheet_directory_uri() . "/css/cavaextra.css";
    $steps = get_stylesheet_directory_uri() . "/css/step-form-wizard-all.css";
    $richtext = get_stylesheet_directory_uri() . "/css/richtext.min.css";
    $cs = get_stylesheet_directory_uri() . "/css/jquery.mCustomScrollbar.min.css";
    
    echo '
    <link rel="stylesheet" type="text/css" href='.$extra.' >';
    
    echo '
    <link rel="stylesheet" type="text/css" href='.$richtext.' >';
    
    echo '
    <link rel="stylesheet" type="text/css" href='.$steps.' >';
    
    echo '
    <link rel="stylesheet" type="text/css" href='.$cs.' >';
}
add_action('wp_head', 'mypage_head');
?>
    <?php get_header(); ?>

    <?php
if ($_SERVER["REQUEST_METHOD"] == "POST"){
    
    $status =  $_POST['draftflag']; 
    
    $horse_name = $_POST['horse_name']; 
    $advert_status = $_POST['advert_status']; 
    $title = $_POST['title']; 
    $stable_name = $_POST['stable_name']; 
    $stud_name = $_POST['stud_name']; 
    $price = $_POST['price']; 
    $optionsRadios = $_POST['optionsRadios']; 
    $description = $_POST['description']; 
    $gender = $_POST['gender']; 
    $mature_height = $_POST['mature_height']; 
    $age = $_POST['age']; 
    $bday = $_POST['bday']; 
    $colour = $_POST['colour']; 
    $breed = $_POST['breed']; 
    $crossbreed = $_POST['crossbreed']; 
    $discipline1 = $_POST['discipline1']; 
    $discipline2 = $_POST['discipline2']; 
    $discipline3 = $_POST['discipline3']; 
    $sire = $_POST['sire']; 
    $dam = $_POST['dam'];
    $youtube1 = $_POST['youtube1'];
    $youtube2 = $_POST['youtube2'];
    $contact_name = $_POST['contact_name'];
    $mobile_number = $_POST['mobile_number'];
    $second_phone = $_POST['second_phone'];
    $horse_town = $_POST['horse_town'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $phone_number = $_POST['phone_number'];
    $street_address = $_POST['street_address'];
    $suburb = $_POST['suburb'];
    echo $urls = $_POST['myurls'];
    
    $post_categories = array(99);
    
    if($crossbreed == "false"){
        
        $crossbreed == "No";
    }else{
         $crossbreed == "Yes";
    }
    
    if( null == get_page_by_title( $title ) ) {
    
        // Setup the author and slug for the post
        $user = wp_get_current_user();
        $author_id = $user->ID;
        $slug = 'horse-poney-advert';
        $post_id = -1;
        
        if(empty($status)){
            $status = "pending";
        }

        $post_id = wp_insert_post(
		
            array(
                'comment_status'	=>	'closed',
                'ping_status'		=>	'closed',
                'post_author'		=>	$author_id,
                'post_name'		    =>	$slug,
                'post_title'		=>	$title,
                'post_content'      =>  $description,
                'post_status'		=>	$status,
                'post_type'		    =>	'post'
            )
	   );
        
        if ($post_id) {
            // insert post meta
            add_post_meta($post_id, 'price', $price);
            update_field('field_5b0c5b1752db5', $horse_name, $post_id);
            update_field('field_5b01c73a7b5e4', $advert_status, $post_id);
            update_field('field_5b0c5b6d52db6', $stable_name, $post_id);
            update_field('field_5b0c5bb352db7', $stud_name, $post_id);
            update_field('field_5b0c5c47243e1', $optionsRadios, $post_id);
            
            add_post_meta($post_id, 'horse_name', $horse_name);
            add_post_meta($post_id, 'advert_status', $advert_status);
            add_post_meta($post_id, 'stable_name', $stable_name);
            add_post_meta($post_id, 'stud_name', $stud_name);
            
            add_post_meta($post_id, 'optionsRadios', $optionsRadios);
            add_post_meta($post_id, 'gender', $gender);
            add_post_meta($post_id, 'mature_height', $mature_height);
            add_post_meta($post_id, 'age', $age);
            add_post_meta($post_id, 'birthdate', $bday);
            add_post_meta($post_id, 'colour', $colour);
            add_post_meta($post_id, 'breed', $breed);
            add_post_meta($post_id, 'crossbreed', $crossbreed);
            add_post_meta($post_id, 'discipline1', $discipline1);
            add_post_meta($post_id, 'discipline2', $discipline2);
            add_post_meta($post_id, 'disciplines3', $discipline3);
            add_post_meta($post_id, 'sire', $sire);
            add_post_meta($post_id, 'dam', $dam);
            add_post_meta($post_id, 'youtube1', $youtube1);
            add_post_meta($post_id, 'youtube2', $youtube2);
            add_post_meta($post_id, 'contact_name', $contact_name);
            add_post_meta($post_id, 'mobile_phone_number', $mobile_number);
            add_post_meta($post_id, 'second_phone', $second_phone);
            add_post_meta($post_id, 'horse_town', $horse_town);
            add_post_meta($post_id, 'first_name', $first_name);
            add_post_meta($post_id, 'last_name', $last_name);
            add_post_meta($post_id, 'phone_number', $phone_number);
            add_post_meta($post_id, 'street_address', $street_address);
            add_post_meta($post_id, 'suburb', $suburb);
            
            wp_set_post_categories( $post_id, $post_categories, $append );
            
            wp_redirect(home_url());
        }
    
        
        
        
        
    } else {
        
        $post_id = -2;
        echo "<span class=errormsg>The post title already exists</span>";
    } 
    
}
?>


        <div id="wrapper">
            <!-- wrapper -->
            <section class="advert-creation">
                <div class="container">
                    <h2 class="page-title">PLACE AN ADVERT</h2>

                    <form id="advert-form" method="post">
                        <fieldset class="step1">
                            <legend>Advert Details</legend>
                            <div class="sec-heading">
                                <h2>Advert details</h2>
                            </div>
                            <div class="row">

                                <div class="col-md-6">
                                    <label>Horse Name<span>*</span></label>
                                    <p class="form-field">
                                        <input type="text" name="horse_name" class="form-input important" placeholder="Enter horse name ...">
                                    </p>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Advert Status<span>*</span></label>
                                    <p class="form-field">
                                        <select name="advert_status" class="form-select">
                                    <option value="">Please pick status</option>
                                    <option value="For Sale">For Sale</option>
                                    <option value="For Rent">For Rent</option>
                                    <option value="Wanted">Wanted</option>
                                </select>
                                    </p>
                                </div>
                            </div>

                            <div class="row">

                                <div class="col-md-6">
                                    <label>Title (max 30 characters)<span>*</span></label>
                                    <p class="form-field">
                                        <input type="text" name="title" maxlength="30" class="form-input important" placeholder="Enter ad title ...">
                                    </p>
                                </div>

                                <div class="col-md-3 col-md-offset-3">
                                    <div class="hint-block">
                                        <div class="hint">
                                            <p><strong>HINT</strong></p>
                                            <p>Add a descriptive title here to attract the right buyer for your horse.</p>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="row">

                                <div class="col-md-6">
                                    <label>Stable Name</label>
                                    <p class="form-field">
                                        <input type="text" name="stable_name" class="form-input" placeholder="Enter stable name ...">
                                    </p>

                                </div>

                            </div>



                            <div class="row">

                                <div class="col-md-6">
                                    <label>Stud Name</label>
                                    <p class="form-field">
                                        <input type="text" name="stud_name" class="form-input" placeholder="Enter stud name ...">
                                    </p>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <label>Price (AUD including GST)<span>*</span></label>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <p class="form-field">
                                                <input type="number" name="price" min="0" step="10" class="form-input important" placeholder="Enter price ...">
                                            </p>
                                        </div>
                                        <div class="col-md-6 radio-sec">
                                            <div class="radio">
                                                <label>
                                        <input type="radio" name="optionsRadios" id="optionsRadios1" value="ONO" checked>
                                        <span>ONO</span>
                                      </label>
                                            </div>
                                            <div class="radio">
                                                <label>
                                        <input type="radio" name="optionsRadios" id="optionsRadios2" value="POA">
                                        <span>POA</span>
                                      </label>
                                            </div>
                                            <div class="radio">
                                                <label>
                                        <input type="radio" name="optionsRadios" id="optionsRadios3" value="FIRM">
                                        <span>FIRM</span>
                                      </label>
                                            </div>
                                            <div class="radio">
                                                <label>
                                        <input type="radio" name="optionsRadios" id="optionsRadios4" value="NEG">
                                        <span>NEG</span>
                                      </label>
                                            </div>
                                            <div class="radio">
                                                <label>
                                        <input type="radio" name="optionsRadios" id="optionsRadios5" value="Per Week">
                                        <span>Per Week</span>
                                      </label>
                                            </div>
                                            <div class="radio">
                                                <label>
                                        <input type="radio" name="optionsRadios" id="optionsRadios6" value="With Gear">
                                        <span>With Gear</span>
                                      </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--
                        <div class="col-md-3 col-md-offset-3">
                        </div>
-->
                            </div>



                            <div class="row">
                                <div class="col-md-6">
                                    <label>Description (max 250 words)<span>*</span></label>
                                    <div class="desc">
                                        <textarea name="description" class="conarea important"></textarea>
                                    </div>
                                </div>

                                <div class="col-md-3 col-md-offset-3">
                                    <div class="hint-block">
                                        <div class="hint">
                                            <p><strong>HINT</strong></p>
                                            <p>Describe your horse’s best features and abilities. Event placings should be added here.</p>
                                        </div>
                                    </div>
                                </div>

                            </div>


                            <div class="row">
                                <div class="col-md-6">
                                    <label>Gender<span>*</span></label>
                                    <p class="form-field">
                                        <select name="gender" class="form-select important">
                                    <option>Select your horse's gender ...</option>
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                </select>
                                    </p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Mature Height<span>*</span></label>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <p class="form-field">
                                                <input name="mature_height" class="form-input important" type="number" step="0.1" min="6.0" max="20.5" placeholder="Insert height ..." />
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <label>Age<span>*</span></label>
                                    <p class="form-field">
                                        <input name="age" class="form-input important" type="number" step="0.1" min="0" placeholder="Insert your horse's age ..." />
                                    </p>
                                </div>
                                <div class="col-md-3">
                                    <label>Birthdate</label>
                                    <p class="form-field">
                                        <input type="date" class="form-input" name="bday">
                                    </p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Colour</label>
                                    <p class="form-field">
                                        <input name="colour" type="text" class="form-input" placeholder="Enter horse's colour ...">
                                    </p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Horse’s primary breed<span>*</span></label>
                                    <div class="form-field breed-sel">
                                        <p>
                                            <select class="form-select important" name="breed">
                                        <option value="">Select your horse’s primary breed ...</option>
                                        
                                        <?php
                                   
                                            $field_key = "field_5af9face2c63d";
                                            $field = get_field_object($field_key);

                                            if( $field ){
                                                foreach( $field['choices'] as $k => $v ){
                                                    echo '<option value="' . $k . '">' . $v . '</option>';
                                                }
                                            }
                                        ?> 
                                    
                                </select>



                                        </p>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <label>Cross breed?</label>

                                    <div class="checkboxFive">

                                        <input id="crossbreed" name="crossbreed" value="1" class="styledcheck" type="checkbox">
                                        <label for="crossbreed"></label>


                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <label>Disciplines (select up to 3)<span>*</span></label>
                                    <p class="form-field">
                                        <select class="form-select important" name="discipline1">
                                    <option value="">Select first discipline ...</option>
                                    <?php
                                   
                                        $field_key = "field_5af9fb532c63f";
                                        $field = get_field_object($field_key);

                                        if( $field ){
                                            foreach( $field['choices'] as $k => $v ){
                                                echo '<option value="' . $k . '">' . $v . '</option>';
                                            }
                                        }
                                    ?> 
                                </select>
                                    </p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <p class="form-field">
                                        <select class="form-select" name="discipline2">
                                    <option value="">Select second discipline ...</option>
                                    <?php
                                   
                                        $field_key = "field_5af9fb532c63f";
                                        $field = get_field_object($field_key);

                                        if( $field ){
                                            foreach( $field['choices'] as $k => $v ){
                                                echo '<option value="' . $k . '">' . $v . '</option>';
                                            }
                                        }
                                    ?> 
                                </select>
                                    </p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <p class="form-field">
                                        <select class="form-select" name="discipline3">
                                    <option value="">Select third discipline ...</option>
                                    <?php
                                   
                                        $field_key = "field_5af9fb532c63f";
                                        $field = get_field_object($field_key);

                                        if( $field ){
                                            foreach( $field['choices'] as $k => $v ){
                                                echo '<option value="' . $k . '">' . $v . '</option>';
                                            }
                                        }
                                    ?> 
                                </select>
                                    </p>
                                </div>
                                <!--
                            <div class="col-md-3 col-md-offset-3">
                            </div>
-->
                            </div>
                            <div class="row">
                                <div class="sec-heading">
                                    <h2 style="margin-left: 18px;">Pedigree</h2>
                                </div>

                                <div class="col-md-6">
                                    <label>Sire</label>
                                    <p class="form-field">
                                        <input type="text" name="sire" class="form-input" placeholder="Enter sire ...">
                                    </p>
                                </div>
                                <div class="col-md-6">
                                    <label>Dam</label>
                                    <p class="form-field">
                                        <input type="text" name="dam" class="form-input" placeholder="Enter dam ...">
                                    </p>
                                </div>
                                <!--
                            <div class="col-md-3 col-md-offset-3">
                                <div class="hint">
                                    <p><strong>HINT</strong></p>
                                    <p>If your horse's pedigree is entered, they will appear in searches related to their bloodline. If the pedigree is unknown just leave blank.</p>
                                </div>
                            </div>
-->
                            </div>
                        </fieldset>
                        <fieldset>
                            <legend>Photos and Videos</legend>
                            <div class="sec-heading">
                                <h2>Photos and Videos</h2>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="photo-sec">
                                        <p><img src="<?php echo get_stylesheet_directory_uri();?>/images/photo-icon.png" alt="image"></p>
                                        <p>Suggestion: Landscape (horizontal) photos work best. Make sure you include one that showcases your horse’s movement.</p>
                                    </div>

                                    <div class="photo-box">
                                        <h2>Photos (0/10)</h2>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <label class="file-upload">
                                      <span><img src="<?php echo get_stylesheet_directory_uri();?>/images/upload-img.jpg" height="114" width="140" alt="image"></span>
                                      <input  style="left: -800px;" name="uploadfile" type="file"  accept="image/jpeg, image/png" multiple>
                                          </label>
                                            </div>
                                            <div class="col-md-9">
                                                <div id="imgPreview"></div>
                                            </div>
                                        </div>
                                    </div>

                                    <!--<div class="photo-sec">
                               <p><img src="images/video-icon.png" alt="image"></p>
                               <p>Adverts with a video stand out more.</p>
                             </div>
                             
                             <div class="photo-box video-box">
                                 <h2>Videos (0/4)</h2>
                                 <div>
                                  <label class="file-upload">
                                      <span><img src="images/upload-img.jpg" height="114" width="140" alt="image"></span>
                                      <input  style="left: -800px;" name="uploadfile" type="file" multiple>
                                  </label>
                                 </div>
                             </div>-->

                                </div>
                                <div class="col-md-3 col-md-offset-3">
                                    <div class="hint">
                                        <p><strong>HINT</strong></p>
                                        <p>Add clean and high quality photos and videos to attract more buyers.</p>
                                        <p>Photos should be png or jpeg, not larger than 1MB each or they will be discarded</p>
                                        <p>Drag and drop photos and videos to change order. The photo on position 1 will be the thumbnail on your horse advert.</p>
                                        <p>If you have any trouble uploading photos please email them to info@cavalleti.com.au</p>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Youtube video url 1</label>
                                    <p class="form-field">
                                        <input type="url" name="youtube1" class="form-input" placeholder="Youtube Video-URL 1 ...">
                                    </p>

                                    <label>Youtube video url 2</label>
                                    <p class="form-field">
                                        <input type="url" name="youtube2" class="form-input" placeholder="Youtube Video-URL 2 ...">
                                    </p>
                                    <input type="hidden" name="myurls" />
                                </div>
                            </div>
                        </fieldset>
                        <fieldset class="step3">
                            <legend>Contact Details</legend>
                            <div class="sec-heading">
                                <h2>Contact details</h2>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <h4>Advert Contact Details</h4>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div>
                                        <label>Contact Name<span>*</span></label>
                                        <p class="form-field"><input type="text" name="contact_name" class="form-input important" placeholder="Enter contact name ..." required></p>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div>
                                        <label>Horse Town/ Suburb<span>*</span></label>
                                        <p class="form-field"><input type="text" name="horse_town" class="form-input important" placeholder="Enter horse town/ suburb ..."></p>
                                    </div>
                                </div>

                                <div class="col-md-3 col-md-offset-3">
                                    <div class="hint">
                                        <p><strong>HINT</strong></p>
                                        <p>Add your details so buyers can get in touch with you.</p>
                                    </div>
                                    <div class="hint hint1">
                                        <p><strong>HINT</strong></p>
                                        <p>Add the horse or pony's suburb or town, so buyers can see where the horse is located.</p>
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div>
                                        <label>Mobile Phone Number (optional)</label>
                                        <p class="form-field"><input type="tel" class="form-input" name="mobile_number" placeholder="Enter mobile number ..."></p>
                                    </div>

                                    <div class="snd-ph">
                                        <a href="javascript:void(0);"> Click to add a second phone number</a>
                                    </div>

                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="snd-ph-input">
                                        <label>Secong Phone Number (optional)</label>
                                        <p class="form-field"><input type="tel" name="second_phone" class="form-input" placeholder="Enter second phone number ..."></p>
                                    </div>
                                </div>
                            </div>

                            <hr>
                            <div class="row">
                                <div class="col-md-6">
                                    <h4>Your Details (not advertised)</h4>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div>
                                        <label>First Name<span>*</span></label>
                                        <p class="form-field"><input type="text" name="first_name" class="form-input important" placeholder="Enter first name ..." required></p>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div>
                                        <label>Last Name<span>*</span></label>
                                        <p class="form-field"><input type="text" name="last_name" class="form-input important" placeholder="Enter last name ..."></p>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div>
                                        <label>Phone Number<span>*</span></label>
                                        <p class="form-field"><input type="text" name="phone_number" class="form-input important" placeholder="Enter your phone number ..."></p>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div>
                                        <label>Street Address<span>*</span></label>
                                        <p class="form-field"><input type="text" name="street_address" class="form-input important" placeholder="Just enter your house number and street ..."></p>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div>
                                        <label>Suburb, State &amp Country<span>*</span></label>
                                        <p class="form-field"><input type="text" name="suburb" class="form-input important" placeholder="Start typing suburb or postcode ..."></p>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-3 col-md-offset-3">
                                <div class="hint">
                                    <p><strong>HINT</strong></p>
                                    <p>The details in this section are not advertised publicly. This information is kept private and might only used by Cavalletti in case we need to reach you.</p>
                                </div>
                            </div>


                        </fieldset>
                        <fieldset>
                            <legend>Preview Advert</legend>
                            <div class="sec-heading">
                                <h2>Preview Advert</h2>
                                <div class="preview-add row">
                                    <div id="prevText" class="col-md-6">

                                    </div>
                                    <div id="previmage" class="col-md-6">

                                    </div>

                                </div>
                            </div>
                        </fieldset>
                        <fieldset>
                            <legend>Place Advert</legend>
                            <div class="sec-heading">
                                <h2>Place advert</h2>
                            </div>
                            <div class="sec-heading">
                                <h2> Choose and Advert Type</h2>
                            </div>
                            <div id="advertype" class="row">
                                <div class="col-md-9">

                                    <div class="chk-box-sec clearfix">
                                        <div class="chk-top">
                                            <div class="radio radio-sec">
                                                <label>
                                        <input type="radio" name="radios" id="radios1" value="Standard" checked>
                                        <span class="mxspan">Standard Advert</span>
                                      </label>
                                            </div>
                                            <div>
                                                $25
                                            </div>
                                        </div>
                                        <div class="chk-btm">
                                            <p>Your advert will be seen in thousands of searches until sold (if updated every 3 months).</p>
                                        </div>
                                    </div>

                                    <div class="or-txt">
                                        OR
                                    </div>

                                    <div class="chk-box-sec clearfix">
                                        <div class="chk-top">
                                            <div class="radio radio-sec">
                                                <label>
                                        <input type="radio" name="radios" id="radios2" value="Unlimited">
                                        <span class="mxspan">Unlimited Advertising Package</span>
                                      </label>
                                            </div>
                                            <div>
                                                $120
                                            </div>
                                        </div>
                                        <div class="chk-btm">
                                            <p>Lots of adverts to place? <br> Then an advertising Package might suit you better. Valid for 6 months from purchase date.</p>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-md-3">
                                    <div class="hint">
                                        <p><strong>HINT</strong></p>
                                        <p>Choose an Advert or an Advertising Package.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="sec-heading">
                                <h2>Boost your Advert (optional)</h2>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="photo-sec">
                                        <p><img src="<?php echo get_stylesheet_directory_uri();?>/images/boost-icon.png" alt="image"></p>
                                        <p>Want to give your advert a boost?  <br> Then choose one of the following promotional features (optional) </p>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-9">

                                    <div class="chk-box-sec mrg_btm20 clearfix">
                                        <div class="chk-top">
                                            <div class="checkbox">
                                                <label>
                                       <div class="checkboxFive">

                                    <input id="featured30days" value="1" class="styledcheck" type="checkbox">
                                    <label for="featured30days"></label>


                                            </div>
                                            <span>Featured Advert 30 Days</span>
                                            </label>

                                            <a href="javascript:void(0);" data-toggle="popover" class="pop-link" data-container="body" data-placement="right" type="button" data-html="true" id="pop3">
                                      <img src="<?php echo get_stylesheet_directory_uri();?>/images/view_icon.png" alt="image"></a>
                                            <!-- popup content -->
                                            <div id="popover-content-pop3" class="hide pop-cont">

                                                <div class="pop-inner">
                                                    <div class="pop-img">
                                                        <img src="<?php echo get_stylesheet_directory_uri();?>/images/horse-thumb1.jpg" alt="image">
                                                    </div>
                                                    <div class="pop-rht-cont">
                                                        <div class="pop-top">
                                                            <h2>Rose</h2>
                                                            <p><strong>$4,500</strong></p>
                                                            <p class="ribbon"><img src="<?php echo get_stylesheet_directory_uri();?>/images/ribbon-icon.jpg" alt="image"></p>

                                                        </div>
                                                        <p>Lorem Ipsum is simply dummy text</p>
                                                        <p>Lorem Ipsum is simply dummy text of the printing</p>
                                                        <p>Lorem Ipsum is simply dummy text of the printing</p>
                                                        <p>Date:28/11/2017</p>
                                                        <div class="pop-btm">
                                                            <div>
                                                                <a href="#"><img src="<?php echo get_stylesheet_directory_uri();?>/images/camera-icon.jpg" alt="image"></a>
                                                                <a href="#"><img src="<?php echo get_stylesheet_directory_uri();?>/images/youtube-icon.jpg" alt="image"></a>
                                                            </div>
                                                            <div>
                                                                <a href="#"><img src="<?php echo get_stylesheet_directory_uri();?>/images/heart-icon.jpg" alt="image"></a>
                                                                <a href="#" class="view_btn">View</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="pop-inner">
                                                    <div class="pop-img">
                                                        <img src="<?php echo get_stylesheet_directory_uri();?>/images/horse-thumb2.jpg" alt="image">
                                                    </div>
                                                    <div class="pop-rht-cont">
                                                        <div class="pop-top">
                                                            <h2>Knight Rider</h2>
                                                            <p><strong>$7,500</strong></p>
                                                        </div>
                                                        <p>Lorem Ipsum is simply dummy text</p>
                                                        <p>Lorem Ipsum is simply dummy text of the printing</p>
                                                        <p>Lorem Ipsum is simply dummy text of the printing</p>
                                                        <p>Date:28/11/2017</p>
                                                        <div class="pop-btm">
                                                            <div>
                                                                <a href="#"><img src="<?php echo get_stylesheet_directory_uri();?>/images/camera-icon1.jpg" alt="image"></a>
                                                                <a href="#"><img src="<?php echo get_stylesheet_directory_uri();?>/images/youtube-icon1.jpg" alt="image"></a>
                                                            </div>
                                                            <div>
                                                                <a href="#"><img src="<?php echo get_stylesheet_directory_uri();?>/images/heart-icon1.jpg" alt="image"></a>
                                                                <a href="#" class="view_btn">View</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                            <!-- popup content -->

                                        </div>
                                        <div>
                                            $50
                                        </div>
                                    </div>
                                    <div class="chk-btm">
                                        <p>Keep your advert above the main search results for 30 days. Your advert will have a bookmark displayed on it and will also be rotated through the "Featured Adverts" section on our home page. This option is only available to adverts with photos. (formerly called Premium)</p>
                                    </div>
                                </div>

                                <div class="chk-box-sec mrg_btm20 clearfix">
                                    <div class="chk-top">
                                        <div class="checkbox">
                                            <label>
                                           <div class="checkboxFive">

                                    <input id="featuredboost" value="1" class="styledcheck" type="checkbox">
                                    <label for="featuredboost"></label>


                                        </div>
                                        <span>Featured Boost 14 Days</span>
                                        </label>

                                        <a href="javascript:void(0);" data-toggle="popover" class="pop-link" data-container="body" data-placement="right" type="button" data-html="true" id="pop2">
                                      <img src="<?php echo get_stylesheet_directory_uri();?>/images/view_icon1.png" alt="image"></a>
                                        <!-- popup content -->
                                        <div id="popover-content-pop2" class="hide pop-cont">

                                            <div class="pop-inner">
                                                <div class="pop-img">
                                                    <img src="<?php echo get_stylesheet_directory_uri();?>/images/horse-thumb1.jpg" alt="image">
                                                </div>
                                                <div class="pop-rht-cont">
                                                    <div class="pop-top">
                                                        <h2>Rose</h2>
                                                        <p><strong>$4,500</strong></p>
                                                        <p class="ribbon"><img src="<?php echo get_stylesheet_directory_uri();?>/images/ribbon-icon.jpg" alt="image"></p>
                                                    </div>
                                                    <p>Lorem Ipsum is simply dummy text</p>
                                                    <p>Lorem Ipsum is simply dummy text of the printing</p>
                                                    <p>Lorem Ipsum is simply dummy text of the printing</p>
                                                    <p>Date:28/11/2017</p>
                                                    <div class="pop-btm">
                                                        <div>
                                                            <a href="#"><img src="<?php echo get_stylesheet_directory_uri();?>/images/camera-icon.jpg" alt="image"></a>
                                                            <a href="#"><img src="<?php echo get_stylesheet_directory_uri();?>/images/youtube-icon.jpg" alt="image"></a>
                                                        </div>
                                                        <div>
                                                            <a href="#"><img src="<?php echo get_stylesheet_directory_uri();?>/images/heart-icon.jpg" alt="image"></a>
                                                            <a href="#" class="view_btn">View</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="pop-inner">
                                                <div class="pop-img">
                                                    <img src="<?php echo get_stylesheet_directory_uri();?>/images/horse-thumb2.jpg" alt="image">
                                                </div>
                                                <div class="pop-rht-cont">
                                                    <div class="pop-top">
                                                        <h2>Knight Rider</h2>
                                                        <p><strong>$7,500</strong></p>
                                                    </div>
                                                    <p>Lorem Ipsum is simply dummy text</p>
                                                    <p>Lorem Ipsum is simply dummy text of the printing</p>
                                                    <p>Lorem Ipsum is simply dummy text of the printing</p>
                                                    <p>Date:28/11/2017</p>
                                                    <div class="pop-btm">
                                                        <div>
                                                            <a href="#"><img src="<?php echo get_stylesheet_directory_uri();?>/images/camera-icon1.jpg" alt="image"></a>
                                                            <a href="#"><img src="<?php echo get_stylesheet_directory_uri();?>/images/youtube-icon1.jpg" alt="image"></a>
                                                        </div>
                                                        <div>
                                                            <a href="#"><img src="<?php echo get_stylesheet_directory_uri();?>/images/heart-icon1.jpg" alt="image"></a>
                                                            <a href="#" class="view_btn">View</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <!-- popup content -->

                                    </div>
                                    <div>
                                        $30
                                    </div>
                                </div>
                                <div class="chk-btm">
                                    <p>This has the same benefits as the Featured Advert above, although this boost will only last for 14 days. This option is only available to adverts with photos.</p>
                                </div>
                            </div>

                            <div class="chk-box-sec mrg_btm20 clearfix">
                                <div class="chk-top">
                                    <div class="checkbox">
                                        <label>
                                        <div class="checkboxFive">

                                    <input id="highlight" value="1" class="styledcheck" type="checkbox">
                                    <label for="highlight"></label>


                                    </div>
                                    <span>Highlight 14 Days</span>
                                    </label>

                                    <a href="javascript:void(0);" data-toggle="popover" class="pop-link" data-container="body" data-placement="right" type="button" data-html="true" id="pop1">
                                      <img src="<?php echo get_stylesheet_directory_uri();?>/images/view_icon.png" alt="image"></a>
                                    <!-- popup content -->
                                    <div id="popover-content-pop1" class="hide pop-cont">

                                        <div class="pop-inner pop-bg">
                                            <div class="pop-img">
                                                <img src="<?php echo get_stylesheet_directory_uri();?>/images/horse-thumb1.jpg" alt="image">
                                            </div>
                                            <div class="pop-rht-cont">
                                                <div class="pop-top">
                                                    <h2>Rose</h2>
                                                    <p><strong>$4,500</strong></p>
                                                </div>
                                                <p>Lorem Ipsum is simply dummy text</p>
                                                <p>Lorem Ipsum is simply dummy text of the printing</p>
                                                <p>Lorem Ipsum is simply dummy text of the printing</p>
                                                <p>Date:28/11/2017</p>
                                                <div class="pop-btm">
                                                    <div>
                                                        <a href="#"><img src="<?php echo get_stylesheet_directory_uri();?>/images/camera-icon.jpg" alt="image"></a>
                                                        <a href="#"><img src="<?php echo get_stylesheet_directory_uri();?>/images/youtube-icon.jpg" alt="image"></a>
                                                    </div>
                                                    <div>
                                                        <a href="#"><img src="<?php echo get_stylesheet_directory_uri();?>/images/heart-icon1.jpg" alt="image"></a>
                                                        <a href="#" class="view_btn">View</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="pop-inner">
                                            <div class="pop-img">
                                                <img src="<?php echo get_stylesheet_directory_uri();?>/images/horse-thumb2.jpg" alt="image">
                                            </div>
                                            <div class="pop-rht-cont">
                                                <div class="pop-top">
                                                    <h2>Knight Rider</h2>
                                                    <p><strong>$7,500</strong></p>
                                                </div>
                                                <p>Lorem Ipsum is simply dummy text</p>
                                                <p>Lorem Ipsum is simply dummy text of the printing</p>
                                                <p>Lorem Ipsum is simply dummy text of the printing</p>
                                                <p>Date:28/11/2017</p>
                                                <div class="pop-btm">
                                                    <div>
                                                        <a href="#"><img src="<?php echo get_stylesheet_directory_uri();?>/images/camera-icon1.jpg" alt="image"></a>
                                                        <a href="#"><img src="<?php echo get_stylesheet_directory_uri();?>/images/youtube-icon1.jpg" alt="image"></a>
                                                    </div>
                                                    <div>
                                                        <a href="#"><img src="<?php echo get_stylesheet_directory_uri();?>/images/heart-icon1.jpg" alt="image"></a>
                                                        <a href="#" class="view_btn">View</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <!-- popup content -->

                                </div>
                                <div>
                                    $10
                                </div>
                            </div>
                            <div class="chk-btm">
                                <p>Attract more visits by adding some background colour. This highlight feature will make your advert stand out from the rest.</p>
                            </div>
                </div>

        </div>
        <div class="col-md-3">
            <div class="hint">
                <p><strong>HINT</strong></p>
                <p>Boost your ad to stand out from the crowd.</p>
            </div>
        </div>
        </div>
        <div class="row">
            <div class="col-md-9">
                <div class="adv_btns">
                    <!--
                                    <div class="draft_btn">
                                        <a href="#" class="hoverable"><span class="h_effect"></span>SAVE DRAFT</a>
                                    </div>
-->
                    <div class="prev_adv_btn">
                        <a href="#" class="hoverable"><span class="h_effect"></span>SAVE DRAFT</a>
                        <input type="hidden" name="draftflag" id="draftflag">
                    </div>
                </div>
            </div>
            <div class="col-md-3">
            </div>
        </div>
        </fieldset>
        </form>
        </div>
        </section>

        <?php get_footer(); ?>


        <script src="<?php echo get_stylesheet_directory_uri();?>/js/popover.js"></script>

        <script src="<?php echo get_stylesheet_directory_uri();?>/js/jquery.richtext.js"></script>

        <script src="https://use.fontawesome.com/21ac4d87fe.js"></script>

        <script src="<?php echo get_stylesheet_directory_uri();?>/js/step-form-wizard.min.js">
        </script>

        <script src="<?php echo get_stylesheet_directory_uri();?>/js/jquery.mCustomScrollbar.concat.min.js"></script>

        <script>
            jQuery(window).resize(function() {
                if (jQuery(window).width() < 768) {
                    jQuery("[data-toggle=popover]").each(function(i, obj) {

                        jQuery(this).popover({
                            html: true,
                            placement: 'top',
                            content: function() {
                                var id = jQuery(this).attr('id')
                                return jQuery('#popover-content-' + id).html();
                            }
                        });

                    });
                } else {
                    jQuery("[data-toggle=popover]").each(function(i, obj) {

                        jQuery(this).popover({
                            html: true,
                            content: function() {
                                var id = jQuery(this).attr('id')
                                return jQuery('#popover-content-' + id).html();
                            }
                        });

                    });
                }

            });

            jQuery(document).ready(function() {
                var flag = false;


                jQuery("#advert-form").stepFormWizard({
                    height: 'auto',
                    onNext: function(from, e) {

                        if (from == "0") {


                            if (jQuery(".step1 textarea").val() == "") {

                                jQuery(".richText").addClass("error");
                                jQuery(this).addClass("error");

                            } else {
                                jQuery(this).removeClass("error");
                            }

                            jQuery(".step1 .important").each(function() {

                                if (jQuery(this).val() == "" || jQuery("option:selected", this).attr('value') == "") {

                                    jQuery(this).addClass("error");

                                } else {

                                    jQuery(this).removeClass("error");
                                }

                            });

                        } else if (from == "1") {

                            if (jQuery('input[name=uploadfile]').get(0).files.length == 0) {
                                jQuery('input[name=uploadfile]').addClass("important error");
                                jQuery('.file-upload').addClass("error");
                            }

                            var url1 = jQuery("input[name=youtube1]").val();
                            var url2 = jQuery("input[name=youtube2]").val();

                            if (url1 != "" && url1.indexOf("youtube") == -1) {

                                jQuery("input[name=youtube1]").addClass("error");
                            } else {
                                jQuery("input[name=youtube1]").removeClass("error");

                            }

                            if (url2 != "" && url2.indexOf("youtube") == -1) {

                                jQuery("input[name=youtube2]").addClass("error");
                            } else {
                                jQuery("input[name=youtube2]").removeClass("error");

                            }



                        } else if (from == "2") {

                            jQuery(".step3 .important").each(function() {

                                if (jQuery(this).val() == "") {

                                    jQuery(this).addClass("error");

                                } else {

                                    jQuery(this).removeClass("error");
                                }

                            });

                            jQuery("#previmage , #previmage").empty();

                            jQuery(".sf-step , .sf-viewport").css("height", jQuery(".preview-add").css("height"));

                            var bday = jQuery("input[name=bday]").val(),
                                bday = bday.split("-").reverse().join("-"),

                                img = jQuery('input[name=uploadfile]').get(0).files[0],
                                img = URL.createObjectURL(img);

                            jQuery("#previmage")
                                .append("<p><img class=mainimg src=" + img + "></p>");

                            var yt1 = jQuery("input[name=youtube1]").val();
                            var yt2 = jQuery("input[name=youtube2]").val();


                            if (yt1 != "") {

                                jQuery("#previmage").append("<p>youtube1:" + yt1 + "</p>");
                            }

                            if (yt2 != "") {

                                jQuery("#previmage").append("<p>youtube2:" + yt2 + "</p>");
                            }



                            jQuery("#prevText").empty();

                            var name = jQuery("input[name=horse_name]").val(),
                                advert_status = jQuery("input[name=horse_name]").val(),
                                title = jQuery("input[name=title]").val(),

                                price = jQuery("input[name=price]").val(),
                                price_option = jQuery('input[name=optionsRadios]:checked').val(),
                                description = jQuery(".conarea ").val(),
                                gender = jQuery("select[name='gender'] option:selected").val(),
                                mature_height = jQuery("input[name=mature_height]").val(),
                                age = jQuery("input[name=age]").val(),

                                breed = jQuery("select[name='breed'] option:selected").val(),
                                crossbreed = jQuery('#crossbreed').prop("checked"),
                                discipline1 = jQuery("select[name='discipline1'] option:selected").val(),
                                discipline2 = jQuery("select[name='discipline2'] option:selected").val(),
                                discipline3 = jQuery("select[name='discipline3'] option:selected").val(),

                                contact_name = jQuery("input[name=contact_name]").val(),

                                horse_town = jQuery("input[name=horse_town]").val(),
                                first_name = jQuery("input[name=first_name]").val(),
                                last_name = jQuery("input[name=last_name]").val(),
                                phone_number = jQuery("input[name=phone_number]").val(),
                                street_address = jQuery("input[name=street_address]").val(),
                                suburb = jQuery("input[name=suburb]").val();

                            if (jQuery("input[name=stable_name]").val() == "") {
                                var stable_name = "-";
                            } else {
                                var stable_name = jQuery("input[name=stable_name]").val();
                            }

                            if (jQuery("input[name=stud_name]").val() == "") {
                                var stud_name = "-";
                            } else {
                                var stud_name = jQuery("input[name=stud_name]").val();
                            }

                            if (jQuery("input[name=colour]").val() == "") {
                                var colour = "-";
                            } else {
                                var colour = jQuery("input[name=colour]").val();
                            }

                            if (jQuery("input[name=sire]").val() == "") {
                                var sire = "-";
                            } else {
                                var sire = jQuery("input[name=sire]").val();
                            }

                            if (jQuery("input[name=dam]").val() == "") {
                                var dam = "-";
                            } else {
                                var dam = jQuery("input[name=dam]").val();
                            }

                            if (jQuery("input[name=mobile_number]").val() == "") {
                                var mobile_number = "-";
                            } else {
                                var mobile_number = jQuery("input[name=mobile_number]").val();
                            }

                            if (jQuery("input[name=second_phone]").val() == "") {
                                var second_phone = "-";
                            } else {
                                var second_phone = jQuery("input[name=second_phone]").val();
                            }

                            jQuery("#prevText")
                                .append("<p>Horse Name: <span>" + name + "</span></p>")
                                .append("<p>Advert Status: <span>" + advert_status + "</span></p>")
                                .append("<p>Title: <span>" + title + "</span></p>")
                                .append("<p>Stable Name: <span>" + stable_name + "</span></p>")
                                .append("<p>Stud Name: <span>" + stud_name + "</span></p>")
                                .append("<p>Price: <span>" + price + " AUD</span></p>")
                                .append("<p>Price Option: <span>" + price_option + "</span></p>")
                                .append("<p>Description: <span>" + description + "</span></p>")
                                .append("<p>Gender: <span>" + gender + "</span></p>")
                                .append("<p>Mature Height: <span>" + mature_height + "</span></p>")
                                .append("<p>Age: <span>" + age + "</span></p>")
                                .append("<p>Birth date: <span>" + bday + "</span></p>")
                                .append("<p>Colour: <span>" + colour + "</span></p>")
                                .append("<p>Primary Breed: <span>" + breed + "</span></p>")
                                .append("<p>Crossbreed Breed: <span>" + crossbreed + "</span></p>")
                                .append("<p>Discipline 1: <span>" + discipline1 + "</span></p>")
                                .append("<p>Discipline 2: <span>" + discipline2 + "</span></p>")
                                .append("<p>Discipline 3: <span>" + discipline3 + "</span></p>")
                                .append("<p>Sire: <span>" + sire + "</span></p>")
                                .append("<p>Dam: <span>" + dam + "</span></p>")
                                .append("<p>Contact Name: <span>" + contact_name + "</span></p>")
                                .append("<p>Mobile Number: <span>" + mobile_number + "</span></p>")
                                .append("<p>Second Phone Number: <span>" + second_phone + "</span></p>")
                                .append("<p>Horse Town: <span>" + horse_town + "</span></p>")
                                .append("<p>First Name: <span>" + first_name + "</span></p>")
                                .append("<p>Last Name: <span>" + last_name + "</span></p>")
                                .append("<p>Phone Number: <span>" + phone_number + "</span></p>")
                                .append("<p>Street Address: <span>" + street_address + "</span></p>")
                                .append("<p>Suburb, State & Country: <span>" + suburb + "</span></p>");

                        }

                        jQuery(".form-input").each(function() {

                            if (jQuery(this).hasClass("error")) {
                                e.preventDefault();
                            }
                        });

                    },
                });

                if (jQuery(window).width() < 768) {
                    jQuery("[data-toggle=popover]").each(function(i, obj) {

                        jQuery(this).popover({
                            html: true,
                            placement: 'top',
                            content: function() {
                                var id = jQuery(this).attr('id')
                                return jQuery('#popover-content-' + id).html();
                            }
                        });

                    });
                } else {
                    jQuery("[data-toggle=popover]").each(function(i, obj) {

                        jQuery(this).popover({
                            html: true,
                            content: function() {
                                var id = jQuery(this).attr('id')
                                return jQuery('#popover-content-' + id).html();
                            }
                        });

                    });
                }


                jQuery("input.important").keyup(function() {

                    if (jQuery(this).val() != "") {
                        jQuery(this).removeClass("error");
                    }

                });

                jQuery("input.important").change(function() {

                    if (jQuery(this).val() != "") {
                        jQuery(this).removeClass("error");
                    }

                });

                jQuery('select.important').change(function() {

                    if (jQuery("option:selected", this).attr('value') != "") {
                        jQuery(this).removeClass("error");
                    }

                });



                jQuery('input[name=uploadfile]').change(function() {
                    window.form = [];
                    window.urls = [];
                    jQuery("#imgPreview").empty();

                    var numfiles = jQuery('input[name=uploadfile]')[0].files.length;

                    for (var i = 0; i < numfiles; ++i) {

                        var fich = jQuery('input[name=uploadfile]').get(0).files[i];


                        if (fich.size <= 1000000 || fich.fileSize <= 1000000) {

                            form.push(fich);

                            var tmppath = URL.createObjectURL(event.target.files[i]);

                            urls.push(tmppath);

                        }

                        //jQuery("#imgPreview").append('<div class="col"><img src='+tmppath+' class="previewImage"></div> ');
                    }

                    if (jQuery('input[name=uploadfile]').get(0).files.length >= 0) {
                        jQuery('input[name=uploadfile]').removeClass("important error");
                        jQuery('.file-upload').removeClass("error");


                        var arraySize = form.length;
                        jQuery(".photo-box h2").html('Photos (' + arraySize + '/10)');


                        var numrows = 3;


                        for (var x = 0; x <= numrows; x++) {

                            jQuery("#imgPreview").append('<div id=p' + x + ' class="row">');

                            var r = x * 3;

                            for (var f = r; f < r + 3; f++) {

                                jQuery(".row[id=p" + x + "]").append('<div class="col-md-4"><img class="prev" src="' + URL.createObjectURL(form[f]) + '"></div>');
                            }

                            jQuery(".prev").each(function() {

                                if (jQuery(this).attr("src") == "undefined") {
                                    jQuery(this).remove();
                                }
                            });

                            jQuery("#imgPreview").append('</div><br/>');
                        }

                        jQuery("input[name=myurls]").val(urls);
                    }

                });


                jQuery(".prev_adv_btn a").on("click", function() {

                    jQuery("#draftflag").val("draft");
                    jQuery("#advert-form").submit()

                });

            });
            jQuery(window).load(function() {
                /* only if you want use mcustom scrollbar */
                jQuery(".sf-step").mCustomScrollbar({
                    theme: "dark-3",
                    scrollButtons: {
                        enable: true
                    }
                });

                jQuery(".richText-editor").keyup(function() {

                    if (jQuery(this).html() != "") {
                        jQuery(".richText , textarea").removeClass("error");
                    }
                });

                jQuery(".sf-btn-finish").val("Place Advert").attr("name", "place");

                if (jQuery(window).width() > 1024) {

                    jQuery(".sf-viewport").css("height", "1800px");

                }

            });
        </script>
        <script>
            jQuery(document).ready(function() {
                jQuery('.conarea').richText();
            });
        </script>
        <script src="<?php echo get_stylesheet_directory_uri();?>/js/custom.js"></script>