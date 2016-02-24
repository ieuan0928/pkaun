(function($) {
	$.fn.EZAsyncLink = function(options) {
		var settings = $.extend({
			PageViewerId: ''
		}, options);
		
		return this.each(function() {
			$(this).click(function(e) {
				
				$("#" + settings.PageViewerId).html("test igit..");
				window.history.pushState('', '', $(this).attr("href"));
				
				
				return false; 
			});
		});
	}
})(jQuery);




