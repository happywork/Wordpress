<?php 
	global $redux_demo;

//	$classieraPriceRange = $redux_demo['classiera_pricerange_on_off'];
//	$classieraPriceRangeStyle = $redux_demo['classiera_pricerange_style'];
//	$postCurrency = $redux_demo['classierapostcurrency'];
//	$classieraMultiCurrency = $redux_demo['classiera_multi_currency'];
//	$classieraTagDefault = $redux_demo['classiera_multi_currency_default'];
//	$classieraMaxPrice = $redux_demo['classiera_max_price_input'];
//	$classieraLocationSearch = $redux_demo['classiera_search_location_on_off'];
//	$classieraItemCondation = $redux_demo['adpost-condition'];
//	$locationsStateOn = $redux_demo['location_states_on'];
//	$classiera_ads_type = $redux_demo['classiera_ads_type'];
//	$locationsCityOn= $redux_demo['location_city_on'];
//	if($classieraMultiCurrency == 'multi'){
//		$classieraPriceTagForSearch = classiera_Display_currency_sign($classieraTagDefault);
//	}elseif(!empty($postCurrency) && $classieraMultiCurrency == 'single'){
//		$classieraPriceTagForSearch = $postCurrency;
//	}

?>



<!--SearchForm-->
<form method="post">
	<div class="search-form">
	    
        <h4 class="filter-header"> Filter &amp Refine</h4>
        
        <!--search-height-heading-->
        <div class="search-form-main-heading">
			<a href="#height" role="button" data-toggle="collapse" aria-expanded="true" aria-controls="innerSearch">
				<i class="fa fa-chevron-up"></i>
				<?php esc_html_e( 'Mature Height', 'classiera' ); ?>
			</a>
		</div><!-- endo-of-search-height-heading-->
      
       <!--search-height-body-->
        <div id="height" class="collapse in classiera__inner">
            <div class="filter-result">
                <span class="result-content"></span>
                <i class="fa fa-times"></i>
            </div>
            <div id="height_interval" class="row maxmin">	
                <div class="col-sm-6">
                    <input type="number" class="commanumber" name="min_height" min="6" step="0.1" placeholder="Min" value="<?php echo $_POST['min_height'];?>" onkeydown="javascript: return event.keyCode == 69 ? false : true" >
                </div>
                <div class="col-sm-6">
                    <input type="number" class="commanumber" name="max_height" min="6" step="0.1" placeholder="Max" value="<?php echo $_POST['max_height'];?>" onkeydown="javascript: return event.keyCode == 69 ? false : true" >
                </div>
            </div>
        </div><!-- endo-of-search-height-body-->
        
        <!--search-age-heading-->
        <div class="search-form-main-heading">
			<a href="#age" role="button" data-toggle="collapse" aria-expanded="true" aria-controls="innerSearch">
				<i class="fa fa-chevron-up"></i>
				<?php esc_html_e( 'Age', 'classiera' ); ?>
			</a>
		</div><!-- endo-of-search-height-heading-->
      
       <!--search-age-body-->
        <div id="age" class="collapse in classiera__inner">
            <div class="filter-result">
                <span class="result-content"></span>
                <i class="fa fa-times"></i>
            </div>
            <div id="age_interval" class="row maxmin">	
                <div class="col-sm-6">
                    <input type="number" class="commanumber" name="min_age" min="1" step="1" placeholder="Min" value="<?php echo $_POST['min_age'];?>" onkeydown="javascript: return event.keyCode == 69 ? false : true" >
                </div>
                <div class="col-sm-6">
                    <input type="number" class="commanumber" name="max_age" min="1" step="1" placeholder="Max" value="<?php echo $_POST['max_age'];?>" onkeydown="javascript: return event.keyCode == 69 ? false : true" >
                </div>
            </div>
        </div><!-- endo-of-search-age-body-->
        
        <!--search-price-heading-->
        <div class="search-form-main-heading">
			<a href="#price" role="button" data-toggle="collapse" aria-expanded="true" aria-controls="innerSearch">
				<i class="fa fa-chevron-up"></i>
				<?php esc_html_e( 'Price', 'classiera' ); ?>
			</a>
		</div><!-- endo-of-search-price-heading-->
      
       <!--search-price-body-->
        <div id="price" class="collapse in classiera__inner">
            <div class="filter-result">
                <span class="result-content"></span>
                <i class="fa fa-times"></i>
            </div>
            <div id="price_interval" class="row maxmin">	
                <div class="col-sm-6">
                    <input type="number" class="commanumber" name="min_price" min="0" step="1" placeholder="Min" value="<?php echo $_POST['min_price'];?>" onkeydown="javascript: return event.keyCode == 69 ? false : true" >
                </div>
                <div class="col-sm-6">
                    <input type="number" class="commanumber" name="max_price" min="1" step="1" placeholder="Max" value="<?php echo $_POST['max_price'];?>" onkeydown="javascript: return event.keyCode == 69 ? false : true" >
                </div>
            </div>
        </div><!-- endo-of-search-price-body-->
        
        <!--search-discipline-heading-->
        <div class="search-form-main-heading">
			<a href="#discipline" role="button" data-toggle="collapse" aria-expanded="true" aria-controls="innerSearch">
				<i class="fa fa-chevron-up"></i>
				<?php esc_html_e( 'discipline', 'classiera' ); ?>
			</a>
		</div><!-- endo-of-search-discipline-heading-->
      
       <!--search-discipline-body-->
        <div id="discipline" class="collapse in classiera__inner">
            <?php 
                $myArray = array();
            
                $args = array (
                    'post_type' => 'post', // your post type
                    'posts_per_page' => -1,
                    'meta_key' => 'discipline1', 
                    'meta_key' => 'discipline2', 
                    'meta_key' => 'disciplines3', 
                    'meta_compare' => 'EXISTS' 
                );
                
                $query = new WP_Query($args);

                while ($query->have_posts()): $query->the_post();
                    // because the image value is saved as attachment_id

                foreach( $query as $post ) {

                    $myArray[] = get_field('discipline1');
                    $myArray[] = get_field('discipline2');
                    $myArray[] = get_field('disciplines3');
       
                 }

                endwhile; ?>
                <select class="listform" name="disciplines[]" value multiple>
                
                <?php 
                    
                  sort($myArray);
                    $list = array_filter(array_unique($myArray));
                    $d = $_POST["disciplines"];
                   foreach ($list as $item) {
                        if (in_array($item, $d)){
                            echo "<option value='$item' selected='selected'>" . $item ."</option>";
                        }else{
                            echo "<option value='$item'>" . $item ."</option>";
                        }
                        
                    }
                wp_reset_query();
            ?>
            </select>
        </div><!-- endo-of-search-discipline-body-->
        
        <!--search-breed-heading-->
        <div class="search-form-main-heading">
			<a href="#breed" role="button" data-toggle="collapse" aria-expanded="true" aria-controls="innerSearch">
				<i class="fa fa-chevron-up"></i>
				<?php esc_html_e( 'breed', 'classiera' ); ?>
			</a>
		</div><!-- endo-of-search-sex-heading-->
      
       <!--search-breed-body-->
        <div id="breed" class="collapse in classiera__inner">
    
              <?php 
                $args = array (
                    'post_type' => 'post', // your post type
                    'posts_per_page' => -1, // grab all the posts
                    'meta_key' => 'breed', 
                    'meta_compare' => 'EXISTS' // make sure the post have this acf value
                );
                $myArray = array();

                $query = new WP_Query($args);

                while ($query->have_posts()): $query->the_post();
                    // because the image value is saved as attachment_id

                foreach( $query as $post ) {
                   
                    $myArray[] = get_field('breed');
                 }

                endwhile; ?>
                 <select class="listform" name="breed[]"  multiple>
                
                <?php 
                    sort($myArray);
                    $list = array_filter(array_unique($myArray));
                    $b = $_POST['breed'];
                    
                    foreach ($list as $item) {
                        if (in_array($item, $b)){
                            echo "<option value='$item' selected='selected'>" . $item ."</option>";
                        }else{
                            echo "<option value='$item'>" . $item ."</option>";
                        }
                        
                    }
                    wp_reset_query();
                ?>
            </select>
        </div><!-- endo-of-search-breed-body-->
        
        
        <!--search-sex-heading-->
        <div class="search-form-main-heading">
			<a href="#gender" role="button" data-toggle="collapse" aria-expanded="true" aria-controls="innerSearch">
				<i class="fa fa-chevron-up"></i>
				<?php esc_html_e( 'Gender', 'classiera' ); ?>
			</a>
		</div><!-- endo-of-search-sex-heading-->
      
       <!--search-sex-body-->
        <div id="gender" class="collapse in classiera__inner">
            <?php 
                $args = array (
                    'post_type' => 'post', // your post type
                    'posts_per_page' => -1, // grab all the posts
                    'meta_key' => 'gender', 
                    'meta_compare' => 'EXISTS' // make sure the post have this acf value
                );
                $myArray = array();
                $query = new WP_Query($args);

                while ($query->have_posts()): $query->the_post();
                    // because the image value is saved as attachment_id

                foreach( $query as $post ) {
                    $myArray[] = get_field('gender');
                 }

                endwhile; ?>
                <select class="listform" name="gender[]"  multiple>
                
                <?php 
                    sort($myArray);
                    $list = array_filter(array_unique($myArray));
                    $g = $_POST['gender'];
                    
                    foreach ($list as $item) {
                        if (in_array($item, $g)){
                            echo "<option value='$item' selected='selected'>" . $item ."</option>";
                        }else{
                            echo "<option value='$item'>" . $item ."</option>";
                        }
                        
                    }
                wp_reset_query();
            ?>
            </select>
        </div><!-- endo-of-search-sex-body-->
        
        
        <!--search-state-heading-->
        <div class="search-form-main-heading">
			<a href="#horse_town" role="button" data-toggle="collapse" aria-expanded="true" aria-controls="innerSearch">
				<i class="fa fa-chevron-up"></i>
				<?php esc_html_e( 'Horse Town', 'classiera' ); ?>
			</a>
		</div><!-- endo-of-search-sex-heading-->
      
       <!--search-sex-body-->
        <div id="horse_town" class="collapse in classiera__inner">
            <?php 
                $args = array (
                    'post_type' => 'post', // your post type
                    'posts_per_page' => -1, // grab all the posts
                    'meta_key' => 'horse_town', 
                    'meta_compare' => 'EXISTS' // make sure the post have this acf value
                );
                $myArray = array();
                $query = new WP_Query($args);

                while ($query->have_posts()): $query->the_post();
                    // because the image value is saved as attachment_id

                foreach( $query as $post ) {
                    $myArray[] = get_field('horse_town');
                 }

                endwhile; ?>
                <select class="listform" name="horse_town[]"  multiple>
                
                <?php 
                    sort($myArray);
                    $list = array_filter(array_unique($myArray));
                    $h = $_POST['horse_town'];
                    
                    foreach ($list as $item) {
                        if (in_array($item, $h)){
                            echo "<option value='$item' selected='selected'>" . $item ."</option>";
                        }else{
                            echo "<option value='$item'>" . $item ."</option>";
                        }
                        
                    }
                wp_reset_query();
            ?>
            </select>
        </div><!-- endo-of-search-state-body-->
        <div class="search-submit">
              <button type="submit" name="search" class="btn btn-primary sharp btn-sm btn-style-one btn-block" value="Search"><?php esc_html_e( 'Search', 'classiera') ?></button>
        </div>
      
    
	</div><!--search-form-->
</form>
<!--SearchForm-->

<?php get_template_part( 'templates/ad-templates/search_ad' );?>
<script>
    
jQuery(document).ready(function() {
    
    //alert("classiera-adv-search");
    
    jQuery(".search-form-main-heading a").on("click", function(){
        
            if(jQuery(this).find("i").hasClass("fa fa-chevron-up")){
                jQuery(this).find("i").removeClass().addClass("fa fa-chevron-down");
            }else{
                jQuery(this).find("i").removeClass().addClass("fa fa-chevron-up");
            }
        
    });
    
    jQuery(".filter-result i").on("click", function(){
        
        jQuery(this).parent().hide();
        
        jQuery(this).parent().parent().find("input").val("");
        
    });
    

    jQuery("input[type='number']").bind('keyup mouseup', function () {
        
        var grandParent = jQuery(this).parent().parent().parent().attr("id"),
        parent = jQuery(this).parent().parent().attr("id"),
        mdd,
            
        name = jQuery(this).attr("name"),
        prefix = name.substring(0,4),
        suffix = name.substring(4,);
        
        if(prefix =="min_"){
           var min = jQuery("#" + parent).find(jQuery("input[type='number'][name="+name+"]")).val(),
            
           other = "max_" + suffix,
               
           max = jQuery("#" + parent).find (jQuery("input[type='number'][name="+other+"]")).val();    
        
        }else{
            
            var max = jQuery("#" + parent).find (jQuery("input[type='number'][name="+name+"]")).val();
            
            other = "min_" + suffix,
               
            min = jQuery("#" + parent).find (jQuery("input[type='number'][name="+other+"]")).val(); 
            
        }    
        
        if (grandParent =="height"){
            mdd = " hh";
        }else if(grandParent =="age"){
            mdd = " yrs";
        }else if(grandParent =="price"){
            mdd = " aud";
        }
        
        if(min == "" || max == ""){
            jQuery("#" + grandParent).find(".result-content").parent().hide();
       
        }else{
            jQuery("#" + grandParent).find(".result-content").
            html(min+" to "+max+mdd).show();
        
            jQuery("#" + grandParent).find(".result-content").parent().show();
        }
        
    });
    
    jQuery(".listform").each(function(){
        
        if(jQuery(this).find("option").size() < 10){
            jQuery(this).attr("size", jQuery(this).find("option").size()).css("overflow","hiden");
        
        }else{
            jQuery(this).attr("size", "10").css("overflow","auto");
        }
       
        
    });
    
    
    var heightmax = jQuery("input[type='number'][name='max_height']").val();
    var heightmin = jQuery("input[type='number'][name='min_height']").val();
    var agemax = jQuery("input[type='number'][name='max_age']").val();
    var agemin = jQuery("input[type='number'][name='min_age']").val();
    var pricemax = jQuery("input[type='number'][name='max_price']").val();
    var pricemin = jQuery("input[type='number'][name='min_price']").val();
    
    if(heightmax!="" && heightmin!=""){
        jQuery("#height").find(".result-content").html(heightmin+" to "+heightmax+" hh").show();
        jQuery("#height").find(".result-content").parent().show();
    }
    
    if(agemax!="" && agemin!=""){
        jQuery("#age").find(".result-content").html(agemin+" to "+agemax+" yrs").show();
        jQuery("#age").find(".result-content").parent().show();
    }
    
    if(pricemax!="" && pricemin!=""){
        jQuery("#price").find(".result-content").html(pricemin+" to "+pricemax+" aud").show();
        jQuery("#price").find(".result-content").parent().show();
    }
    
    
});  
    
</script>