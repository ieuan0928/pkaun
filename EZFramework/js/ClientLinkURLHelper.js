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
				
				targetObject.stop().animate({opacity: .0, height: "50%" }, function() {
					var availableScripts = new Array();
					var availableStyles = new Array();
					
					$("script[src]").each(function() {
						if ($(this).parents("#test1").length == 0) {
							availableScripts.push($(this).attr("src"));
						}
					});
					$.ajax({
						"method": "POST"
						, "data" : { 
							Parameter : settings.Parameter
							, ParamValue : settings.ParamValue
							, AvailableScripts: availableScripts
						}
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




