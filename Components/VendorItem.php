<?php

	$vendor;
	if(isset($_GET['vendor_id'])){
		$curl   = curl_init();
		curl_setopt($curl, CURLOPT_URL, "http://carexports.uk/wan_api/v1/serviceMainMenu/getVendorServices.php?vendor_id=".$_GET['vendor_id']);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
		$vendor = json_decode(curl_exec($curl));
		curl_close($curl);
	}
?>

<div class="row">
	<div class="main_dashboard_content col-lg-12" style="background:url('<?php echo($vendor -> vendor_img) ?>');height:185px; background-position: center;position:relative;background-size:cover">
		<div class="backdrop"></div>
		<p class="display-1 mb-1 mt-2 layer-1"><?php echo($vendor -> vendor_name) ?></p>
		<p class="sub-display-1 mt-1 mb-2 layer-1" style="color:#fff"><?php echo($vendor -> vendor_desc) ?></p>
	</div>
</div>

<div style="padding-top:15px;padding-bottom:12px;">
	<p style="font-family:'product-bold';font-size:18px;margin-bottom:-5px;">Produk dan Layanan kami</p>
	<p style="font-family:'product-regular';font-size:14px;">Silahkan pilih salah satu untuk melanjutkan</p>
</div>

<?php
	$vendor_products = $vendor->vendor_product;
?>

<div class="row">
	<?php
	for($i = 0; $i < sizeof($vendor_products); $i++){
		?>
		<a class="col-lg-3" href="<?php echo $INDEX_BASE_URL."?page=product_detail&product_id=".$vendor_products[$i]->product_id ?>" style="height:auto">
			<div style="border:1px solid #c7c7c7; height:100%;padding:10px 10px 10px 18px;border-radius:5px;">
				<p style="font-family:'product-bold';font-size:18px;margin-bottom:-5px;"><?php echo $vendor_products[$i]->product_name ?></p>
				<p style="font-family:'product-regular';">Rp. <?php echo $vendor_products[$i]->product_price ?></p>
				<p style="font-family:'product-regular';line-height:25px;font-size:14px;"><?php echo $vendor_products[$i]->product_desc	?></p>
				
			</div>
		</a>
		<?php
	}
	if(sizeof($vendor_products) == 0){
		?>
		<p style="font-family:'product-regular';opacity:0.35;padding-top:25px;margin-bottom:20px; width:100%;font-size:13px;font-size:20px;text-align:center"><i class="fa fa-exclamation" style="margin-right:10px;"></i>Oops, Nampaknya vendor masih belum mempunyai produk atau layanan</p>
		<?php
	}
	?>
</div>