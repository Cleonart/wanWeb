<?php
	
	$service = [];
	if(isset($_GET['service_code'])){
		$curl   = curl_init();
		curl_setopt($curl, CURLOPT_URL, "http://carexports.uk/wan_api/v1/serviceMainMenu/getDetailOnlineVendor.php?user_vendor_type=".$_GET['service_code']);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
		$service = json_decode(curl_exec($curl));
		curl_close($curl);
	}

	$vendor = $service -> vendors;
	$service_detail = $service -> service_detail;	
?>

<div class="row">

	<div class="main_dashboard_content col-lg-8" style="height:185px; background-position: center;position:relative;background-size:cover">
		<div class="backdrop"></div>
		<p class="display-1 mb-1 mt-2 layer-1">Halo, Mau ngapain hari ini?</p>
		<p class="sub-display-1 mt-1 mb-2 layer-1" style="color:#fff">Jalan-jalan? perawatan? haus? semua ada disini</p>
		<p class="sub-display-1 mt-1 mb-2 layer-1" style="color:#fff">Powered by </p>
	</div>

	<div class="col-lg-4">
		<div>
			<div class="service-card" style="width:100%;margin:0 0 25px 0; height:185px;border: 1px solid <?php echo $service_detail[0] -> service_color;?> !important;">
				<div style="padding: 20px 20px 20px 22px;">
					<i style="font-size:20px;color:<?php echo $service_detail[0] -> service_color; ?>" class="<?php echo $service_detail[0] -> service_img; ?> mb-2 mt-3"></i>
					<p class="service-card-title" style="color:<?php echo $service_detail[0] -> service_color; ?>"><?php echo $service_detail[0] -> service_title; ?></p>
					<p style="color:<?php echo $service_detail[0] -> service_color; ?>" class="service-card-subtitle"><?php echo $service_detail[0] -> service_subtitle ?></p>
				</div>
			</div>
		</div>
	</div>
</div>

<p class="display-1" style="font-size:20px;margin-top:5px;">Vendor-vendor kami</p>
<p style="font-size:14px;font-family:'product-regular';margin-top:5px;">Vendor yang sedang online</p>
<div class="row mt-4">
	
	<?php 

		for($i = 0; $i < sizeof($vendor); $i++){
			?>
			<a class="col-lg-3" href="<?php echo $INDEX_BASE_URL."?page=vendor_item&vendor_id=".$vendor[$i] -> user_id ?>">
				<div>
					<div class="service-card" style="width:100%;margin:0 0 25px 0; height:110px;border: 1px solid <?php echo $service_detail[0] -> service_color;?> !important;">
						<div style="padding: 20px 20px 20px 22px;">
							<p class="service-card-title" style="color:<?php echo $service_detail[0] -> service_color; ?>"><?php echo $vendor[$i] -> user_name?></p>
							<p style="color:<?php echo $service_detail[0] -> service_color ?>" class="service-card-subtitle"><?php echo $vendor[$i] -> phone_num_user ?></p>
						</div>
					</div>
				</div>
			</a>
			<?php
		}

		if(sizeof($vendor) == 0){
			?>
			<p style="font-family:'product-regular';opacity:0.35;padding-top:25px;margin-bottom:20px; width:100%;font-size:13px;font-size:20px;text-align:center"><i class="fa fa-exclamation" style="margin-right:10px;"></i>Oops, Nampaknya tidak ada vendor yang ditemukan untuk layanan ini</p>
			<?php
		}
	?>
</div>