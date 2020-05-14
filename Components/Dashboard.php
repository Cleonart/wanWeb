<div class="flex">

	<div class="main_dashboard_content" style="background-position: center;position:relative;">
		<div class="backdrop"></div>
		<p class="display-1 mb-1 mt-2 layer-1">Halo, Mau ngapain hari ini?</p>
		<p class="sub-display-1 mt-1 layer-1" style="color:#fff">Jalan-jalan? perawatan? haus? semua ada disini</p>
		<div class="flex layer-1 mt-4">
			<img class="image-logo mr-2" src="./Assets/logo/wafil.png">	
		</div>
	</div>

	<div style="width:40%">
		<div style="margin-left:15px; border: 1px solid rgb(224, 224, 224);border-radius:5px;">
			<div class="tab">
				<p class="bordered-active"><i class="fa fa-wallet" style="margin-right:5px;"></i> Top up saldo</p>
				<p><i class="fa fa-plane" style="margin-right:5px;"></i> Travel</p>
			</div>
			<div class="input-text" style="margin-left:15px;margin-bottom:20px;">
				<form action="" method="GET">
					<p class="title">Top up saldo</p>
					<p class="sub">Jumlah nominal top up Rp.10.000</p>
					<div class="flex">
						<div class="input"><input  required name="nominal" type="number" placeholder="10000"></div>
						<input  class="btn bg-success"  style="margin-left:-10px" type="submit" value="Tambah">
						<input type="hidden" name="action" value="TOPUP" />
						<input type="hidden" name="user_id" value="<?php echo $_SESSION['user_id'] ?>" />
					</div>
				</form>
			</div>
		</div>
	</div>

</div>

<?php
	$service_detail = [];
	$curl = curl_init();
	curl_setopt($curl, CURLOPT_URL, "http://carexports.uk/wan_api/v1/webHandler/getProviders.php");
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
	$service_detail = json_decode(curl_exec($curl));
	curl_close($curl);
?>

<?php
	include './Elements/ServiceCard.php';
?>

<p class="display-1 mt-4" style="font-size:19px;margin-bottom:9px;">Layanan kami</p>
<p class="sub-display-1" style="font-size:14px;">Jelajahi layanan</p>

<div class="row mt-4">
	<?php 
		for($i = 0; $i < sizeof($service_detail); $i++){
			?>
			<a class="col-lg-3" href="<?php echo $INDEX_BASE_URL.'?page=vendor_online&service_code='.$service_detail[$i] -> service_code ?>">
				<div>
					<div class="service-card" style="width:100%;margin:0 0 25px 0; height:210px;border: 1px solid <?php echo $service_detail[$i] -> service_color;?> !important;">
						<div style="padding: 20px 20px 20px 22px;">
							<i style="font-size:20px;color:<?php echo $service_detail[$i] -> service_color; ?>" class="<?php echo $service_detail[$i] -> service_img; ?> mb-2 mt-3"></i>
							<p class="service-card-title" style="color:<?php echo $service_detail[$i] -> service_color; ?>"><?php echo $service_detail[$i] -> service_title; ?></p>
							<p style="color:<?php echo $service_detail[$i] -> service_color; ?>" class="service-card-subtitle"><?php echo $service_detail[$i] -> service_subtitle ?></p>
						</div>
					</div>
				</div>
			</a>
			<?php
		}
	?>
</div>