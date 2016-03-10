$(document).ready(function(){
	
	$(".header_tab_click").tabControl();
	
});

(function($) {
	$.fn.tabControl = function(){
		
		this.click(function(){		
		getid = $(this).parent().parent().parent().attr("id");	
		getid_header_tab = $(this).attr("id").toLowerCase();
		
		$("#" + getid + " .header_tab_click").each(function(){
			$(this).removeClass("tab_header_active");
			$(this).removeClass("tab_header_inactive");
			$(this).addClass("tab_header_inactive");
		});
		
		$("#" + getid + " .body_tab_content").each(function(){
			$(this).removeClass("tab_content_active");
			$(this).removeClass("tab_content_inactive");
			$(this).addClass("tab_content_inactive");
		});
		
		$(this).removeClass("tab_header_inactive");
		$(this).addClass("tab_header_active");
		$("#" + getid + " ." + getid_header_tab).removeClass("tab_content_inactive");
		$("#" + getid + " ." + getid_header_tab).addClass("tab_content_active");
	});
	}
}(jQuery));
