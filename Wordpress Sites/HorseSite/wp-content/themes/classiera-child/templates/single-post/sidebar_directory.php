<?php

    the_post(); 

    
    $postID = $_SESSION['myid'];
  
    $modified = get_the_modified_date( 'jS F, Y', $postID );
    $post_date = get_the_date( 'jS F, Y' ,  $postID);
    $postDate = get_the_date($dateFormat, $postID);

    $UserRegistered = get_the_author_meta( 'user_registered', $user_ID );
    $dateFormat = get_option( 'date_format' );

    $UserRegistered =  date_create($UserRegistered);
    $UserRegistered =  date_format($UserRegistered,'jS F, Y');

    $authorName = get_the_author_meta('display_name', $user_ID );
    if(empty($authorName)){
        $authorName = get_the_author_meta('user_nicename', $user_ID );
    }
    if(empty($authorName)){
        $authorName = get_the_author_meta('user_login', $user_ID );
    }

    $profileLink = get_the_author_meta( 'user_url', $user_ID );
    $contact_email = get_the_author_meta('user_email');

    $business_name = get_field( 'business_name', $postID );
    $business_address = get_field( 'business_address', $postID );
    $region = get_field( 'region', $postID );
    $business_phone =  get_field( 'business_phone', $postID );
    $website =  get_field( 'website', $postID );

    if(substr($website,5) =="https"){
        
        $web = substr($website,8);
    }else if (substr($website,3) =="www"){
         $web = $website;
    }else{
          $web = substr($website,7);
    }

?>
    <div class="status-list">
        <ul>
            <li>
                <div>Business Name:</div>
                <div><strong><?php echo $business_name;?></strong></div>
            </li>
            <li>
                <div>Business Address:</div>
                <div><strong><?php echo $business_address; ?></strong></div>
            </li>
            <li>
                <div>Region:</div>
                <div><strong><?php echo $region;?></strong></div>
            </li>
            <li>
                <div>Business Phone:</div>
                <div><strong><?php echo $business_phone; ?></strong></div>
            </li>
            <li>
                <div>Website:</div>
                <div><strong><?php echo $web; ?></strong></div>
            </li>
            <li>
                <div>Last Updated:</div>
                <div><strong><?php echo $modified;?></strong></div>
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
            <p class="tel"><a href="tel:<?php echo $business_phone;?>"><strong><?php echo $business_phone;?></strong></a></p>
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