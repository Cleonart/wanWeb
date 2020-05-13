<?php
	
	$product_id = $_GET['product_id'];
	$user_id    = $_SESSION['user_id'];
	$curl = curl_init();
	curl_setopt($curl, CURLOPT_URL, "http://carexports.uk/wan_api/v1/serviceMainMenu/getSpecificProduct.php?product_id=".$product_id."&id_user=".$user_id);
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
	$product_data = json_decode(curl_exec($curl));
	curl_close($curl);

	$product_name =  $product_data -> product_name;
	$product_qty =  $product_data -> product_qty;
	$product_price =  $product_data -> product_price;
	$product_name =  $product_data -> product_name;
?>

<div style="display:flex">
	<div style="height:250px;width:250px;background-color:gray;border-radius:5px;margin-right:13px;"></div>
	<div style="margin-left:30px;">
		<form>
			<p style="font-size:23px;font-family:'product-bold';margin-top:5px;margin-bottom:4px"><?php echo $product_name ?></p>
			<p style="font-size:15px;font-family:'product-regular';margin-top:5px;margin-bottom:4px"><?php echo $product_data -> product_desc ?></p>
			<input type="number" value="<?php echo $product_qty ?>" required />
			<input type="date" required />
			<br/>
			<div style="margin-top:20px;">
				<button style="font-family: 'product-bold';border: none;background: #2ecc71;cursor: pointer;border-radius: 5px;padding-left: 15px;padding-right: 15px;padding-top:13px;padding-bottom:13px;">Pilih Lokasi</button>
				<button style="font-family: 'product-bold';border: none;background: #2ecc71;cursor: pointer;border-radius: 5px;padding-left: 15px;padding-right: 15px;padding-top:13px;padding-bottom:13px;">Tambahkan Item</button>
			</div>
		</form>
	</div>
</div>