<?php
	session_start();
	$_SESSION["user_id"] = "200510002";
	$INDEX_BASE_URL = "http://127.0.0.1/wan_web/index.php";
	
	include 'functions.php';
	include 'routing.php';
?>

<html>
	<head>
		<title>Lasalle</title>
		<link href="Css/bootstrap-grid.css" type="text/css" rel="stylesheet">
		<link href="Css/global.css" type="text/css" rel="stylesheet">
		<link href="Assets/fonts/fontawesome/css/all.min.css" rel="stylesheet">
		<link href="Css/fonts.css" type="text/css" rel="stylesheet">
		<link href="Css/dashboard.css" type="text/css" rel="stylesheet">
		<link href="Css/header.css" type="text/css" rel="stylesheet">
		<style>
			body{
				overflow-x:hidden;
				overflow-y:scroll;
			}
		</style>
	</head>
	
	<body>

		<!-- header -->
		<?php include './Components/Header.php' ?>

		<!-- body -->
		<div style="margin-top:40px;" class="main_dashboard">
			<?php
				
				// dashboard
				if($pageNow == ""){
					include './Components/Dashboard.php';
				}

				else if($pageNow == "cart"){
					include './Components/ShoppingCart.php';
				}

				else if($pageNow == "product_detail"){
					include './Components/ProductDetail.php';
				}

			?>
		</div>

		<!-- footer 
		<footer style="background-color:#34495e;margin-bottom:0px;">
			<p style="margin:0;">Tes</p>			
		</footer>-->

	</body>

</html>