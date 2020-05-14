<?php
	// get data cart from mysql
	$user_id = $_SESSION['user_id'];

	// api
	$curl = curl_init();
	curl_setopt($curl, CURLOPT_URL, "http://carexports.uk/wan_api/v1/shoppingCart/getAllShoppingCart.php?id_user=".$user_id);
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
	$output = json_decode(curl_exec($curl));
	curl_close($curl);	
?>

<div style="display:flex;position:relative">
	<i class="fa fa-shopping-cart" style="font-size:20px;margin-right:20px;margin-top:12px;"></i>
	<div>
		<p class="display-1" style="margin-bottom:-2px;">Shopping Cart</p>
		<p style="margin-bottom:10px;font-family:'product-regular';font-size:14px;margin-bottom:15px;">Item yang kamu pesan masuk disini</p>
	</div>
</div>

<div class="row">
	<div class="col-lg-8">
		<?php
			for($i = 0; $i < sizeof($output); $i++){
				?>
				<div style="padding:20px 20px 20px 35px;margin-top:10px;box-shadow: rgba(0, 0, 0, 0.2) 0px 0px 6px -1px;">
					<a href="<?php echo $INDEX_BASE_URL . '?page=vendor_item&vendor_id='.$output[$i] -> vendor_id ?>">
						<p style="font-family:'product-bold';font-size:18px;margin-top:5px;margin-bottom:0px;"><?php echo $output[$i] -> vendor_name ?></p>
						<p style="font-family:'product-regular';font-size:13px;margin-top:5px;margin-bottom:15px;"><?php echo $output[$i] -> vendor_id ?></p>
					</a>
					<?php
						$product_data = $output[$i] -> vendor_products;
						for($j = 0; $j < sizeof($product_data);$j++){
						?>
							<a href="<?php echo $INDEX_BASE_URL . '?page=product_detail&product_id='.$product_data[$j] -> product_id ?>">
								<div style="display:flex;margin-top:10px;">
									<div style="height:50px;width:50px;background-color:gray;border-radius:5px;margin-right:13px;"></div>
									<div>
										<p style="font-size:14px;font-family:'product-bold';margin-top:5px;margin-bottom:4px"><?php echo $product_data[$j] -> product_name ?></p>
										<p style="margin-top:0px;font-size:14px;font-family:'product-regular';"><?php echo $product_data[$j] -> product_qty . ' item@ Rp.' .$product_data[$j] -> product_price; ?> </p>
									</div>
								</div>
							</a>
						<?php
						}
					?>
				</div>
				<?php
			}

			if(sizeof($output) == 0){
				?>
				<p style="font-family:'product-regular';font-size:22px;opacity:0.5;">Tidak ada item di shopping cart kamu</p>
				<?php
			}
		?>
	</div>
</div>