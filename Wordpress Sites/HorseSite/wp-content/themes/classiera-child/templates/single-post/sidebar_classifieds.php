<?php

    the_post(); 

    
    $postID = $_SESSION['myid'];
  
    $modified = get_the_modified_date( 'jS F, Y', $postID );
    $post_date = get_the_date( 'jS F, Y' ,  $postID);
    $sire =  get_field( 'sire', $postID );
    $dam =  get_field( 'dam', $postID );
    $stable_name =  get_field( 'stable_name', $postID );
    $gender =  get_field( 'gender', $postID );
    $breed =  get_field( 'breed', $postID );
    $colour =  get_field( 'colour', $postID );
    $mature_height =  get_field( 'mature_height', $postID );
    $age =  get_field( 'age', $postID );
    $phone_number =  get_field( 'phone_number', $postID );
    $birthdate =  get_field( 'birthdate', $postID );
    $birthdate =  date_create($birthdate);
    $birthdate =  date_format($birthdate,'jS F, Y');
    $horse_town =  get_field( 'horse_town', $postID );
  
    $street_address =  get_field( 'street_address', $postID );
    $suburb =  get_field( 'suburb', $postID );
    $postDate = get_the_date($dateFormat, $postID);

    $UserRegistered = get_the_author_meta( 'user_registered', $user_ID );
    $dateFormat = get_option( 'date_format' );

    $UserRegistered =  date_create($UserRegistered);
    $UserRegistered =  date_format($UserRegistered,'jS F, Y');


    $phone_number =  get_field( 'phone_number', $post->ID );

    $authorName = get_the_author_meta('display_name', $user_ID );
    if(empty($authorName)){
        $authorName = get_the_author_meta('user_nicename', $user_ID );
    }
    if(empty($authorName)){
        $authorName = get_the_author_meta('user_login', $user_ID );
    }

    $profileLink = get_the_author_meta( 'user_url', $user_ID );
    $contact_email = get_the_author_meta('user_email');


?>
    <div class="status-list">
        <ul>
            <li>
                <div>Status:</div>
                <div><strong>
                            <?php
                                $field_key = "field_5b01c73a7b5e4";
                                $field = get_field_object($field_key , $postID);
                                echo $field['value'] ;   
                                
                            ?>
                            </strong></div>
            </li>
            <li>
                <div>Ad Date:</div>
                <div><strong><?php echo $post_date; ?></strong></div>
            </li>
            <li>
                <div>Last Updated:</div>
                <div><strong><?php echo $modified;?></strong></div>
            </li>
            <li>
                <div>Sire:</div>
                <div><strong><?php echo $sire; ?></strong></div>
            </li>
            <li>
                <div>Dam:</div>
                <div><strong><?php echo $dam; ?></strong></div>
            </li>
            <li>
                <div>Stable Name:</div>
                <div><strong><?php echo $stable_name;  ?></strong></div>
            </li>
            <li>
                <div>Gender:</div>
                <div><strong><?php echo $gender; ?></strong></div>
            </li>
            <li>
                <div>Breed:</div>
                <div><strong><?php echo $breed; ?></strong></div>
            </li>
            <li>
                <div>Colour:</div>
                <div><strong><?php echo $colour; ?></strong></div>
            </li>
            <li>
                <div>Height:</div>
                <div><strong><?php echo $mature_height . " hh";?></strong></div>
            </li>
            <li>
                <div>Age:</div>
                <div><strong><?php echo $age . " yrs"; ?></strong></div>
            </li>
            <li>
                <div>DOB:</div>
                <div><strong><?php echo $birthdate ?></strong></div>
            </li>
            <li>
                <div>Horse Town / Suburb :
                </div>
                <div><strong><?php echo $horse_town ?></strong></div>
            </li>
            <li>
                <div>Street Address :
                </div>
                <div><strong><?php echo $street_address;?></strong></div>
            </li>
            <li>
                <div>Suburb, State &amp Country :
                </div>
                <div><strong><?php echo $suburb	 ?></strong></div>
            </li>
            <li>
                <div>Discipline:</div>
                <div>
                    <strong>
                            <?php 
                                $field_key1 = "field_5af9fb532c63f";
                                $field_key2 = "field_5b169045f432b";
                                $field_key3 = "field_5b169044f432a";
                                $field1 = get_field_object($field_key1, $postID);
                                $field2 = get_field_object($field_key2 , $postID);
                                $field3 = get_field_object($field_key3 , $postID);
                                echo $field1['value'].', ' . $field2['value'].', ' . $field3['value'] ; 
                              ?>
                            </strong>
                </div>
            </li>
        </ul>

    </div>

    <div class="widget-content widget-content-post">

        <div class="contact-seller">
            <h2>CONTACT SELLER</h2>
            <ul>
                <li>
                    <div>LISTED BY:</div>
                    <div>
                        <strong> <?php echo $authorName; ?></strong>
                    </div>
                </li>
                <li>
                    <div>Member Since:</div>
                    <div>
                        <strong><?php echo $UserRegistered;?></strong>
                    </div>
                </li>
            </ul>
            <p><a href="#">Seel All Ads</a></p>
        </div>
        <!--author-info-->

        <div class="contact-details">
            <h2>CONTACT DETAILS:</h2>
            <p>
                <a class="mail" href="mailto:<?php echo $contact_email;?>">
                    <?php echo $contact_email;?>
                </a>
            </p>
            <p class="tel"><a href="tel:<?php echo $phone_number;?>"><strong><?php echo $phone_number;?></strong></a></p>
            <div class="cd-btns">
                <div class="msg_btn">
                    <a href="#" class="hoverable"><span class="h_effect"></span>MESSAGE SELLER</a>
                </div>
                <div class="fav_btn">
                    <a href="#" class="hoverable"><span class="h_effect"></span><img src="<?php echo get_stylesheet_directory_uri();?>/images/heart-icon2.jpg" alt="image"> Add to Favourites</a>
                </div>
            </div>
        </div>

    </div>