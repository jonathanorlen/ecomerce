<?php 
session_start();

include_once("function/connection.php");
include_once("function/helper.php");

$user_id = isset($_SESSION['user_id'])? $_SESSION['user_id'] : false;
$nama = isset($_SESSION['nama'])? $_SESSION['nama'] : false;
$level = isset($_SESSION['level'])? $_SESSION['level'] : false;
$page = isset($_GET['page'])? $_GET['page'] : false;
$kategori_id = isset($_GET['kategori_id'])? $_GET['kategori_id'] : false;

$keranjang = isset($_SESSION['keranjang'])? $_SESSION['keranjang'] : false;
$totalBarang = count($keranjang)

?>

<!DOCTYPE html>
<html>
<head>
	<title>Marketplace</title>
	<link rel="stylesheet" type="text/css" href="<?php echo BASE_URL.'css/style.css'?>">
	<link rel="stylesheet" type="text/css" href="<?php echo BASE_URL.'css/bootstrap.min.css'?>">
	<link rel="stylesheet" type="text/css" href="<?php echo BASE_URL.'css/froala/froala_editor.css'?>">
	<link rel="stylesheet" type="text/css" href="<?php echo BASE_URL.'css/froala/froala_style.css'?>">
	<script language="javascript" src="<?php echo BASE_URL?>js/jquery-3.4.1.min.js" type="text/javascript"></script><!-- 
	<script type="text/javascript" src="<?php echo BASE_URL.'js/bootstrap.min.js'?>"></script>	 -->
	<link rel="stylesheet" type="text/css" href="<?php echo BASE_URL?>css/slick.css">
	<link rel="stylesheet" type="text/css" href="<?php echo BASE_URL?>css/slick-theme.css">
</head>
<body>
	<nav class="navbar navbar-expand-sm bg-dark navbar-dark fixed-top">
		<a class="navbar-brand" href="<?php echo BASE_URL."index.php"?>">Logo</a>
		<ul class="navbar-nav">
			<?php 
			if(!$user_id){
				echo '
				<li class="nav-item">
				<a class="nav-link" href="'.BASE_URL.'index.php?page=login">Login</a>
				</li>
				<li class="nav-item">
				<a class="nav-link" href="'.BASE_URL.'index.php?page=register">Register</a>
				</li>';}
				else{
					echo 'Hi
					<li class="nav-item"> 
					<a class="nav-link" href="'.BASE_URL.'index.php?page=my_profile&module=pesanan&action=list">My Profile</a>
					</li>
					<li class="nav-item>
					<a href="'.BASE_URL.'function/logout.php">Logout</a>
					</li>';
				}
				?>
				<span class="badge badge-light"><?php echo $totalBarang?></span>
			</ul>
		</nav>
		<div class="container">
			<div id="header">
				<a href="<?php echo BASE_URL."index.php"?>">
					<img src="<?php echo BASE_URL."image/yourlogo.png"?>" style="max-width:300px">
				</a>
			</div>
			<div id="content">
				<?php
				$filename = "$page.php";
				if(file_exists($filename)){
					include_once($filename);
				}else{
					include_once("main.php");
				}
				?>
			</div>
		</div>
		<script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
		<script type="text/javascript" src="<?php echo BASE_URL?>js/slick.min.js"></script>
		<script type="text/javascript">
			$('.your-class').slick({
				rtl: true
			});
		</script>
	</body>
	</html>