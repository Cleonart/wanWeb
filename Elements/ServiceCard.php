<?php
	function generateServiceCard($data){
		?>
		<div style="padding: 20px 20px 20px 22px;">
			<i style="font-size:20px;color:<?php echo $data['service_color']; ?>" class="<?php echo $data['service_img']; ?> mb-4 mt-5"></i>
			<p class="service-card-title" style="color:<?php echo $data['service_color']; ?>"><?php echo $data['service_title'] ?></p>
			<p style="color:<?php echo $data['service_color']; ?>" class="service-card-subtitle"><?php echo $data['service_subtitle'] ?></p>
		</div>
		<?php
	}

?>