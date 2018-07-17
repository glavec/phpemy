<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
	<title>Title</title>
</head>
<body>
<div class="container">
<?php include  realpath(__DIR__ . DIRECTORY_SEPARATOR ).'/header/header.php';?>
	<div class="py-main">
		<?php echo $body; ?>
	</div>
<?php include  realpath(__DIR__ . DIRECTORY_SEPARATOR ).'/footer/footer.php';?>
</div>








<?php
$config = new Config\Config();
$config = $config->getConfig();
$inc = get_required_files();
$cssToLoad = array();
$url = "http://" . $_SERVER['SERVER_NAME'] .'/'. $config['serverPath'].'/';
foreach ($inc as $file ){
	if (strpos($file, $config['viewPath']) !== false) {
		$name = get_string_between($file, $config['viewPath'], ".php");
		$cssFile = $url.$config['assetsPath'].'css/'. $name. '.css';
		$jsFile = $url.$config['assetsPath'].'js/'. $name. '.js';
		$localFileCSS = $config['appPath'].$config['assetsPath'].'css/'. $name. '.css';
		$localFileJS = $config['appPath'].$config['assetsPath'].'js/'. $name. '.js';
		
		if (file_exists($localFileCSS)) {
			echo '<link href="'.$cssFile.'" rel="stylesheet" type="text/css" />';
		}
		
		if (file_exists($localFileJS)) {
			echo '<script src="'.$jsFile.'"></script>';
		}
		
	}
};

function get_string_between($string, $start, $end){
	$string = ' ' . $string;
	$ini = strpos($string, $start);
	if ($ini == 0) return '';
	$ini += strlen($start);
	$len = strpos($string, $end, $ini) - $ini;
	return substr($string, $ini, $len);
}

?>
</body>
</html>