<?php

$http_response_code = http_response_code();
if (!empty($_SERVER['HTTPS']) && ('on' == $_SERVER['HTTPS'])) {
    $uri = 'https://';
} else {
    $uri = 'http://';
}
$uri .= $_SERVER['HTTP_HOST'];

$error_code = '';
$error_title = '';
$error_message = '';
$error_submessage = '';
$primary_color = '';
$secondary_color = '';

switch ($http_response_code) {
    case 400:
        $error_code = '400';
        $error_title = 'Bad Request';
        $error_message = "Oh No!, it looks you've requested a bad request!";
        $error_submessage = "Don't worry we can fix it for you!";
        $primary_color = 'yellow';
        break;
    case 401:
        $error_title = 'Unauthorized';
        $error_code = '401';
        $error_message = "Hey! You're not supposed to be here!";
        $error_submessage = "Get back home and i'll make you easy.";
        $primary_color = 'lightred';
        break;
    case 403:
        $error_title = 'Forbidden';
        $error_code = '403';
        $error_message = "🤨, What are you doing here bud?";
        $error_submessage = "...";
        $primary_color = 'red';
        break;
    case 404:
        $error_title = 'Not Found';
        $error_code = '404';
        $error_message = "Oh No!, it looks like you have been lost!";
        $error_submessage = "Don't worry we can take you back home!";
        $primary_color = 'lightblue';
        break;
    case 500:
        $error_title = 'Internal Server Error';
        $error_code = '500';
        $error_message = "The request cannot be fulfilled due to internal server error.";
        $primary_color = 'orange';
        break;
    default:
        $error_title = 'Unexpected Error';
        $error_code = '>_<';
        $error_message = "An unexpected error occured.";
        $primary_color = 'lightgreen';
        break;
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $error_title?></title>
	<link rel="shortcut icon" type="image/x-icon" href="/favicon.ico">
	<style>
		@font-face{
		margin: auto;
		font-family: "Poppins";
		src: url('/assets/fonts/Poppins-Regular.ttf');
	}
	*{
		font-family: "Poppins", sans-serif;
		user-select: none;
	}
	body{
		background-color: #333333;
		display: flex;
		justify-content:center;
		align-content: center;
		text-align: center;
		min-height: 100vh;
		overflow-x: hidden;
		overflow-y: hidden;
	}
	.content{
		/*background-color: grey;*/
		align-self: center;
		color: white;
	}
	.text .text-404{
		font-size: 120px;
		position: relative;
	}
	
	.err{
		position: absolute;
		bottom: 15px;
		font-size: 10px;
		opacity: 50%;
	}
	a{
		color: green;
	}
	.header{
		position: fixed;
		left: 0px;
		margin-left: 10px;
		color: white;
		align-content: flex-start;
	}
	</style>
</head>
<body>
	<div class="header">
		<span class="header-text">Rockstone AIO</span>
	</div>
	<div class="content">
		<span class="text">
		<div class="text-404"><span class="t1"><?php echo substr($error_code, 0, 1)?></span><span class="t2" style='color : <?php echo $primary_color?>;'><?php echo substr($error_code, 1, 1)?></span><span class="t3"><?php echo substr($error_code, 2, 1)?></span><span class="err"><?php echo $error_title?></span></div>
		<br>
		<?php echo $error_message?>
		<br>
		<?php echo $error_submessage?> <a href="/">Click here!</a>
		</span>
	</div>
</body>
</html>