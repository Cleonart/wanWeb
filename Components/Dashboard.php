<div class="flex">

	<div class="main_dashboard_content" style="background-position: center;position:relative;">
		<div class="backdrop"></div>
		<p class="display-1 mb-1 mt-4 layer-1">Halo, Mau ngapain hari ini?</p>
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
				<p class="title">Top up saldo</p>
				<p class="sub">Jumlah nominal top up Rp.10.000</p>
				<div class="flex">
					<div class="input"><input type="number" placeholder="10000"></div>
					<input class="btn bg-success" style="margin-left:-10px" type="submit" value="Tambah">
				</div>
			</div>
		</div>
	</div>

</div>

<?php
	$service_detail = [];
	$service_detail[0] = array(
		'service_name' => "Wafil",
		'service_title' => "Air Isi Ulang",
		'service_subtitle' => "Layanan isi ulang air secara cepat tanpa repot",
		'service_code' => '220',
		'service_img' => 'fa fa-hand-holding-water',
		'service_color' => '#3498db'
	);
	
	$service_detail[1] = array(
		'service_name' => "Wafil",
		'service_title' => "Perawatan",
		'service_subtitle' => "Santai di rumah kayak di pantai dengan perawatan terbaik",
		'service_code' => '220',
		'service_img' => 'fa fa-umbrella-beach',
		'service_color' => '#16a085'
	);
	
	$service_detail[2] = array(
		'service_name' => "Wafil",
		'service_title' => "Atorjo",
		'service_subtitle' => "Kelola rumah anda dengan sekali klik dari aplikasi",
		'service_code' => '220',
		'service_img' => 'fa fa-home',
		'service_color' => '#2c3e50'
	);

	$service_detail[3] = array(
		'service_name' => "Wafil",
		'service_title' => "Cari Tukang?",
		'service_subtitle' => "Santai di rumah kayak di pantai dengan perawatan terbaik",
		'service_code' => '220',
		'service_img' => 'fa fa-hammer',
		'service_color' => '#f39c12'
	);

	$service_detail[4] = array(
		'service_name' => "Wafil",
		'service_title' => "Print",
		'service_subtitle' => "Santai di rumah kayak di pantai dengan perawatan terbaik",
		'service_code' => '220',
		'service_img' => 'fa fa-hammer',
		'service_color' => '#f39c12'
	);

	$service_detail[5] = array(
		'service_name' => "Wafil",
		'service_title' => "Print",
		'service_subtitle' => "Santai di rumah kayak di pantai dengan perawatan terbaik",
		'service_code' => '220',
		'service_img' => 'fa fa-hammer',
		'service_color' => '#f39c12'
	);


?>
<?php
	include './Elements/ServiceCard.php';


?>
<p class="display-1 mt-3" style="font-size:19px;margin-bottom:9px;">Layanan kami</p>
<p class="sub-display-1" style="font-size:14px;">Jelajahi layanan</p>
<div class="flex mt-4" style="flex-wrap: wrap;">
	<?php 
		for($i = 0; $i < sizeof($service_detail); $i++){
			?>
			<div class="service-card" style="border: 1px solid <?php echo $service_detail[$i]['service_color'];?> !important;">
				<div style="padding: 20px 20px 20px 22px;">
					<i style="font-size:20px;color:<?php echo $service_detail[$i]['service_color']; ?>" class="<?php echo $service_detail[$i]['service_img']; ?> mb-4 mt-5"></i>
					<p class="service-card-title" style="color:<?php echo $service_detail[$i]['service_color']; ?>"><?php echo $service_detail[$i]['service_title'] ?></p>
					<p style="color:<?php echo $service_detail[$i]['service_color']; ?>" class="service-card-subtitle"><?php echo $service_detail[$i]['service_subtitle'] ?></p>
				</div>
			</div>
			<?php
		}
	?>
	
</div>