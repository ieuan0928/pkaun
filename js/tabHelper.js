$(document).ready(function(){
	
	$(".header_tab_click").tabControl();
	
});

(function($) {
	$.fn.tabControl = function(){	
		return $(this).each(function() {
			this.click(function(){		
				getid = $(this).parent().parent().attr("id");	
			
				if($(this).parent().children().next().hasClass("tab_active"))
				{
			
				}
				else
				{
					$("#" + getid + " .body_tab_content").each(function(){
						$(this).removeClass("tab_active");
						$(this).addClass("tab_inactive");
					});	
			
					$(this).parent().children().next().removeClass("tab_inactive");
					$(this).parent().children().next().addClass("tab_active");		
				}
			});
		});
	}
}(jQuery));
