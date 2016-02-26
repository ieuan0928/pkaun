(function($) {
	$.fn.EZAsyncLink = function(options) {
		var settings = $.extend({
			PageViewerId: ''
		}, options);
		
		return this.each(function() {
			$(this).click(function(e) {
				window.history.pushState('', '', $(this).attr("href"));
				// to do ajax
				$("#" + settings.PageViewerId).html("test igit..");
				return false; 
			});
		});
	}
})(jQuery);




