(function($) {
	$.fn.EZAsyncLink = function(options) {
		var settings = $.extend({
			PageViewerId: ''
		}, options);
		alert(settings.PageViewerId + " igit sa nywa.");
		return this.each(function() {
			$(this).click(function(e) {
				alert(settings.PageViewerId);
				$("#" + settings.PageViewerId).html("test igit..");
				window.history.pushState('', '', $(this).attr("href"));
				
				
				return false; 
			});
		});
	}
})(jQuery);




