'use strict';

const Tabs = {
  init() {
    let promise = jQuery.Deferred();
    this.$tabs = jQuery('ul.nav-tabs');
    this.checkHash();
    this.bindEvents();
    this.onLoad();
    return promise;
  },

  checkHash() {
    if (window.location.hash) {
      this.toggleTab(window.location.hash);
    }
  },

  toggleTab(tab) {
    // targets
    var $paneToHide = jQuery(tab).closest('.container').find('div.content-pane').filter('.is-active'),
      $paneToShow = jQuery(tab),
      $tab = this.$tabs.find('a[href="' + tab + '"]');

    // toggle active tab
    $tab.closest('li').addClass('active').siblings('li').removeClass('active');

    // toggle active tab content
    $paneToHide.removeClass('is-active').addClass('is-animating is-exiting');
    $paneToShow.addClass('is-animating is-active');
  },

  showContent(tab) {

  },

  animationEnd(e) {
    jQuery(e.target).removeClass('is-animating is-exiting');
  },

  tabClicked(e) {
    e.preventDefault();
    this.toggleTab(e.target.hash);
  },

  bindEvents() {
    // show/hide the tab content when clicking the tab button
    this.$tabs.on('click', 'a', this.tabClicked.bind(this));

    // handle animation end
    jQuery('div.content-pane').on('transitionend webkitTransitionEnd', this.animationEnd.bind(this));
  },
  
  onLoad() {
    jQuery(window).load(function() {
      jQuery('div.content-pane').removeClass('is-animating is-exiting');
    });
  }
}

Tabs.init();

jQuery(document).ready(function(){
    
    jQuery(".cf-upload , .cf-uploadlogo").change(function (){
        
        if(jQuery(this).val()!=""){
             jQuery(this).addClass("hasfile");
        
        }else{
             jQuery(this).removeClass("hasfile");
        }
	  
    });
		  //jQuery('[data-toggle="tooltip"]').tooltip();
		  //jQuery('#element').tooltip('show');	
		
	jQuery('.lookbooks-slider').slick({
		dots: false,
		infinite: false,
		autoplay:false,
		slidesToShow: 4,
		slidesToScroll: 1,
		responsive: [
		  {
			breakpoint: 1440,
			settings: {
			  slidesToShow: 4,
			  slidesToScroll: 1,
			}
		  },
		  {
			breakpoint: 940,
			settings: {
			  slidesToShow: 2,
			  slidesToScroll: 2
			}
		  },
		  {
			breakpoint: 767,
			settings: {
			  slidesToShow: 2,
			  slidesToScroll: 2
			}
		  },
		  {
			breakpoint: 481,
			settings: {
			  slidesToShow: 1,
			  slidesToScroll: 1
			}
		  }
		]
	});			
			// tabs slider1
	jQuery('.fh_slider').slick({
		rows: 2,
		arrows: true,
		infinite: false,
		speed: 300,
		slidesToShow: 3,
		slidesToScroll: 3,
		responsive: [
			{
				breakpoint: 768,
				settings: {
					rows: 2,
					slidesToScroll: 2,
					slidesToShow: 2
				}
			},
			{
				breakpoint: 480,
				settings: {
					rows: 1,
					slidesPerRow: 1,
					slidesToScroll: 1,
					slidesToShow: 1
				}
			}
		]
	});
			
			// tabs slider2
			
	jQuery('.nl_slider').slick({
		rows: 2,
		arrows: true,
		infinite: false,
		speed: 300,
		slidesToShow: 3,
		slidesToScroll: 3,
		responsive: [
			{
				breakpoint: 768,
				settings: {
					rows: 2,
					slidesToScroll: 2,
					slidesToShow: 2
				}
			},
			{
				breakpoint: 480,
				settings: {
					rows: 1,
					slidesPerRow: 1,
					slidesToScroll: 1,
					slidesToShow: 1
				}
			}
		]
	});
			
			// tabs slider3
			jQuery('.rv_slider').slick({
				rows: 2,
				arrows: true,
				infinite: false,
				speed: 300,
				slidesToShow: 3,
				slidesToScroll: 3,
				responsive: [
					{
						breakpoint: 768,
						settings: {
							rows: 1,
							slidesToScroll: 2,
							slidesToShow: 2
						}
					},
					{
						breakpoint: 480,
						settings: {
							rows: 1,
							slidesPerRow: 1,
							slidesToScroll: 1,
							slidesToShow: 1
						}
					}
				]
			});
	
		  jQuery('.user-dropdown').hover(function(){ 
			//jQuery('.dropdown-toggle', this).trigger('click'); 
			//jQuery('.dropdown-toggle', this).addClass('open'); 
		  });
		  
		  //select dropdown  
		  jQuery('#cava-search-form select#location').selectlist({
			  zIndex: 10			  
		  });
		  jQuery('#cava-search-form select#category_name').selectlist({
			  zIndex: 10			  
		  });
		  
//about slider 
	jQuery('.tabs_slider').slick({
		customPaging : function(slider, i) {
        var thumb = jQuery(slider.$slides[i]).data('title');
        return '<a>'+thumb+'</a>';
    },
	  dots: true,
	  infinite: true,
	  speed: 500,
	  autoplay: false,
	  arrows: false,
	  adaptiveHeight: true,
	  pauseOnHover:false
	});	
});
