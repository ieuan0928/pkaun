$(document).ready(function(){
	
	$(".header_tab_click").click(function()
	{	
		var getid = "";
		var get_count = 0; 		
		var get_count_current = 0;	
			
		getid = $(this).parent().parent().attr("id");	
		get_count = $("#" + getid + " .body_tab_content").length;
			
		if($(this).parent().children().next().hasClass("tab_active"))
		{
			$(this).parent().children().next().removeClass("tab_active");
			$(this).parent().children().next().addClass("tab_inactive");
			
			get_count_current = $("#" + getid + " .tab_inactive").length;

			if(get_count_current == get_count)
			{
				$(this).parent().children().next().removeClass("tab_inactive");
				$(this).parent().children().next().addClass("tab_active");
			}
		}
		else
		{
			$("#" + getid + " .body_tab_content").each(function(){
				$(this).removeClass("tab_active");
				$(this).addClass("tab_inactive");
			});	
			
			$(this).parent().children().next().removeClass("tab_inactive");
			$(this).parent().children().next().addClass("tab_active");		
			
			// get_count_current = $("#" + getid + " .tab_inactive").length;
// 				
			// if(get_count_current == get_count)
			// {
				// $(this).parent().children().next().removeClass("tab_inactive");
				// $(this).parent().children().next().addClass("tab_active");
			// }	
		}
	});
	
});
