<?php
 	$INDEX_BASE_URL = "http://127.0.0.1/wan_web/index.php";
	include 'routing.php';
?>

<html>
	<head>
		<title>Lasalle</title>
		<link href="Css/global.css" type="text/css" rel="stylesheet">
		<link href="Assets/fonts/fontawesome/css/all.min.css" rel="stylesheet">
		<link href="Css/fonts.css" type="text/css" rel="stylesheet">
		<link href="Css/dashboard.css" type="text/css" rel="stylesheet">
		<link href="Css/header.css" type="text/css" rel="stylesheet">
	</head>
	
	<body>

		<!-- header -->
		<?php include './Components/Header.php' ?>

		<!-- body -->
		<div style="margin-top:40px">
			<?php
				
				// dashboard
				if($pageNow == ""){
					include './Components/Dashboard.php';
				}

				else if($pageNow == "cart"){
					include './Components/ShoppingCart.php';
				}

			?>
		</div>

		<!-- footer -->

	</body>

</html>