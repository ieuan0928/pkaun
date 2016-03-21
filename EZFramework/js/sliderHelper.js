(function($) {
	$.fn.sliderControl = function(options) {
		var settings = $.extend({
			effects: '',
			effectRandom: '',
			pauseOnHover: '',
			displayNavigation: '',
			displayNavigationBottom: ''
			
		}, options);
		
		return this.each(function() {
			alert(settings.effect);
		});
	}
}(jQuery));