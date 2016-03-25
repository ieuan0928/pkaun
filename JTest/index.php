<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>	
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta name="viewport" content="initial-scale =1.0,maximum-scale = 1.0">
    <script src="../js/1.12.0-jquery.min.js" type="text/javascript"> </script>
	<title>Title</title>
</head>

<body id="gago">
	
    <div id="test_click">
    	<script type="text/javascript" src="test.js"></script>
        <link rel="stylesheet" type="text/css" href="test.css" />
    	<a href="#" id="test_a">test click</a>
        
	</div>
    
    <div>
    	<a href="#" id="test_a1">test another</a>
        <a href="#" id="rs">remove script</a>
    </div>

    
    <script>
		$(document).ready(function() {
			$("#test_a").AlertTest();
			$("#test_a1").AlertTest();
			
			$("#rs").click(function() {
				$("#test_click").html("");
			});
		});
	</script>
</body>

</html>
