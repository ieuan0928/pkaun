// JavaScript Document

(function($) {
	
	$.fn.AlertTest = function(options) {
		return this.each(function() {
			$(this).click(function() {
				alert("test");
			});
		});
	}
	
	
})(jQuery);