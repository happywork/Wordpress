$(document).ready(function(){
		  $('[data-toggle="tooltip"]').tooltip();
		  $('#element').tooltip('show');
		  
		  $('.lookbooks-slider').slick({
				dots: false,
				infinite: false,
				autoplay:false,
				slidesToShow: 4,
				slidesToScroll: 1,
				responsive: [
				  {
					breakpoint: 1440,
					settings: {
					  slidesToShow: 3,
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
			
			
			var $status = $('.pagingInfo');
			var $slickElement = $('.horse_slider');
		
			$slickElement.on('init reInit afterChange', function (event, slick, currentSlide, nextSlide) {
				//currentSlide is undefined on init -- set it to 0 in this case (currentSlide is 0 based)
				var i = (currentSlide ? currentSlide : 0) + 1;
				$status.text(i + ' of ' + slick.slideCount);
			});
		
			$slickElement.slick({
				autoplay: true,
				dots: false,
				infinite: false
			});
			
			
			// tabs slider1
			$('.fh_slider').slick({
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
			
			$('.nl_slider').slick({
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
			$('.rv_slider').slick({
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
	
		  $('.dropdown').hover(function(){ 
			$('.dropdown-toggle', this).trigger('click'); 
		  });
		  
		  //select dropdown  
		  $('select').selectlist({
			  zIndex: 10
			  
		  });
		  
		  
		  
		  
		  
//about slider 
	$('.tabs_slider').slick({
		customPaging : function(slider, i) {
        var thumb = $(slider.$slides[i]).data('title');
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

$(".snd-ph a").click(function(){
	$(".snd-ph-input").show();
	$(".snd-ph").hide();
});

// fancybox
$(".fancybox").fancybox({
         
	loop:false,

	beforeShow : function() {
		this.title =  (this.index + 1) + ' of ' + this.group.length;		

		 if(this.index == 0) {
		   $(this.tpl.prev).appendTo($.fancybox.outer).addClass('prev_disabled');
		 } else 
		
		 if( this.index < this.group.length){
		   $(this.tpl.next).appendTo($.fancybox.outer).addClass('next_disabled');
		 }
	} // beforeShow

});



