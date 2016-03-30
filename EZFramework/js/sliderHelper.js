(function($) {
	$.fn.sliderControl = function(options) {
		var settings = $.extend({
			slideDuration: '',
			effects: '',
			effectRandom: '',
			pauseOnHover: '',
			displayNavigation: '',
			displayNavigationBottom: ''
			
		}, options);
		
		return this.each(function() {
			//alert(settings.slideDuration);
			var slider_id = $(this).attr("id");
			var slidecount = 0;
			var firstLoad = true;
			var slideInterval;
			var slideLength = $("#" + slider_id + " ul li").length;
			alert(slideLength);
			
			slidethis();
			playSlide();
			
			function playSlide()
			{
				slideInterval = setInterval(function()
				{ 
					slidethis();
				}, settings.slideDuration);
			}
			
			function slidethis()
			{
				$("#" + slider_id + " ul li:eq(" + slidecount + ")").fadeInEffect();
				slidecount++;	
			}
			
		});
	}
	
	///////////////////////////effects////////////////////////////
	
	$.fn.slideDownEffect = function(options)  {
		var variables = $.extend({
		}, options);
		
		return this.each(function() {
			$(this).slideDown("slow");
		});
	}
	
	$.fn.fadeInEffect = function(options)  {
		var variables = $.extend({
		}, options);
		
		return this.each(function() {
			$(this).fadeIn("slow");
		});
	}
	
	$.fn.fadeOutEffect = function(options)  {
		var variables = $.extend({
		}, options);
		
		return this.each(function() {
			$(this).fadeOut("slow");
		});
	}
}(jQuery));