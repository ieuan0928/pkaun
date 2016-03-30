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
					
					$('link[rel="stylesheet"]').each(function() {
						if($(this).parents("#test1").length == 0) {
							availableStyles.push($(this).attr("href"));
						}
					});
					
					$.ajax({
						"method": "POST"
						, "data" : { 
							Parameter : settings.Parameter
							, ParamValue : settings.ParamValue
							, AvailableScripts : availableScripts
							, AvailableStyles : availableStyles
						}
						, "success": function(data) {
							var obj = $.parseJSON(data);
							
							for (var index in obj.styles) {
								$("head").append(obj.styles[index]);
							}
								
							$("#" + settings.PageViewerId).html(obj.content);
							
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




