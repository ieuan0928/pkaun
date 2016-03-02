(function($) {
	$.fn.EZAsyncLink = function(options) {
		var settings = $.extend({
			PageViewerId: ''
			, Parameter: ''
			, ParamValue: ''
			
		}, options);
		
		var targetObject = $("#" + settings.PageViewerId);
		return this.each(function() {
			$(this).click(function(e) {
				targetObject.stop().animate({opacity: .0, height: "50%" }, function() {;
				$.ajax({
					"method": "POST"
					, "data" : { Parameter : settings.Parameter, ParamValue : settings.ParamValue }
					, "success": function(data) {
						$("#" + settings.PageViewerId).html(data);
						targetObject.stop().animate({opacity: 1.0, height: "100%" });
					}
				});
				});
				window.history.pushState('', '', $(this).attr("href"));

				return false; 
			});
		});
	}
})(jQuery);




