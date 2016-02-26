(function($) {
	$.fn.EZAsyncLink = function(options) {
		var settings = $.extend({
			PageViewerId: ''
		}, options);
		
		return this.each(function() {
			$(this).click(function(e) {
				window.history.pushState('', '', $(this).attr("href"));

											
							
				$("#" + settings.PageViewerId).html("test igit..");
				return false; 
			});
		});
	}
})(jQuery);




