<?php

function generate_string($strength) {
	$input = '0123456789abcd3efg4hijk6lmn8opq9rs0tuv3wxy6zA7BCD9EFG5HIJ4KLM3N2OPQR9STU8VW1XYZ';
    $random_string = '';
    for($i = 0; $i < $strength; $i++) {
        $random_character = $input[mt_rand(0, 78)];
        $random_string .= $random_character;
    }
    return $random_string;
}

if(isset($_POST["submit"])){
	if(empty($_POST["input"])){
		echo "<script>$('#short_url').html(\"<p class='new_url'>Please enter your URL</p>\");</script>";
	}else{
		$servername = "localhost";
		$username = "root";
		$password = "qadbpwd";
		$dbname = "url";
		$conn = new mysqli($servername, $username, $password, $dbname);
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		}

		$input = $_POST["input"];
		$code = generate_string(6);
		mkdir($code);
		$newfile = fopen("$code/index.php", "w");
		$content = "<?php header('Location: $input'); ?>";
		fwrite($newfile, $content);
		$new_link = "http://localhost/url_shortener/$code";
		echo "<script>$('#short_url').html(\"<p class='new_url'>your new url is <a id='new_url' href='$new_link' target='_blank'>$new_link</a></p><button id='copy' onclick='copyToClipboard()' >copy</button><span id='copied_msg'>Link copied<span>\");</script>";
		fclose($newfile);

	}
	
	// $sql = "insert into urls (original_link, code) values('$input','$code');";
	// $result = $conn->query($sql);
	// if($result === true){
	// 	$new_link = "http://localhost/url_shortner/$code";
	// 	echo "<script>$('#short_url').html(\"<p class='new_url'>your new url is $new_link</p><button id='copy'>copy</button>\");</script>";
	// }else{
	// 	echo "failed";
	// }
	
}

?>