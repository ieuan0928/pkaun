(function($) {
	$.fn.EZAsyncLink = function(options) {
		var settings = $.extend({
			PageViewerId: ''
			, Parameter: ''
			, ParamValue: ''
			
		}, options);
		
		return this.each(function() {
			$(this).click(function(e) {
				$.ajax({
					"method": "POST"
					, "data" : { Parameter : settings.Parameter, ParamValue : settings.ParamValue }
					, "success": function(data) {
						$("#" + settings.PageViewerId).html(data);
					}
				});
				window.history.pushState('', '', $(this).attr("href"));

				return false; 
			});
		});
	}
})(jQuery);




