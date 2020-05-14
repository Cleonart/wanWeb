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
		<meta name="viewport" content="initial-scale=1,maximum-scale=1,user-scalable=no" />
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

			.form-input{
				font-family:'product-regular';
				display: block;
			    width: 100%;
			    height: calc(1.5em + .75rem + 2px);
			    padding: .375rem .75rem;
			    font-size: 1rem;
			    font-weight: 400;
			    line-height: 1.5;
			    color: #495057;
			    background-color: #fff;
			    background-clip: padding-box;
			    border: 1px solid #ced4da;
			    border-radius: .25rem;
			    transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;
			}
		</style>
	</head>
	
	<body style="position:relative">

		<!-- header -->
		<?php include './Components/Header.php' ?>

		<!-- body -->
		<div style="margin-top:40px;padding-bottom:150px;" class="main_dashboard">
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

				else if($pageNow == "vendor_online"){
					include './Components/VendorOnline.php';
				}

				else if($pageNow == "vendor_item"){
					include './Components/VendorItem.php';
				}

			?>
			
		</div>

		<footer style="background-color:#34495e;margin-bottom:0px;position:absolute;bottom:0vh;width:100%">
			<p style="margin:0;font-family:'product-bold';color:#fff;font-size:12px;text-align:center;margin-top:15px;margin-bottom:15px;">&copy;Copyright @2020; made with <i class="fa fa-heart" style="margin-left:2px;margin-right:2px;"></i> by ppl b</p>			
		</footer>
	</body>

</html>