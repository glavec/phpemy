<?php
$config = new \Config\Config();
$config = $config ->getConfig();
?>

<nav class="navbar navbar-expand-sm bg-light">
	<ul class="navbar-nav">
		<li class="nav-item">
			<a class="nav-link" href="<?php echo '/'.$config['serverPath'].'/'?>">HOME</a>
		</li>
		<li class="nav-item">
			<a class="nav-link" href="<?php echo '/'.$config['serverPath'].'/main'?>">MAIN</a>
		</li>
	</ul>
</nav>