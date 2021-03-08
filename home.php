s<!DOCTYPE html>
<html>
<head>
	<title>URL Shortner</title>
	<link rel="stylesheet" type="text/css" href="styles.css">
	<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
</head>
<body>
	<div class="main">
		<div>
			<h1>
				Shorten your links here	
			</h1>
		</div>
		<div class="form">
			<input type="text" id="url" placeholder="Please enter URL to shorten...">
			<button id="submit">SUBMIT</button>
		</div>
		<div id="short_url">
			
		</div>

	</div>
	<script>
		$(document).ready(function(){
			$("#submit").click(function(){
				var input = $("#url").val();
				var submit = $("#submit").val();
				$("#short_url").load("process.php",{
					input: input,
					submit: submit
				});
			});
		});
		function copyToClipboard() {
			var $temp = $("<input>");
			$("body").append($temp);
			$temp.val($("#new_url").text()).select();
			document.execCommand("copy");
			$temp.remove();
			$("#copied_msg").css("display","inline");
			setTimeout(function(){ $("#copied_msg").css("display","none"); }, 500);
		}
	</script>
</body>
</html>