<?php
	
	echo("Berhasil");
	$data = array(
		"id_user" 			 	  => $_POST['id_user'],
		"id_service_product" 	  => $_POST['id_service_product'], 
		"shopcart_qty" 		 	  => $_POST['shopcart_qty'],
		"shopcart_price"     	  => $_POST['shopcart_price'],
		"shopcart_note"   	 	  => $_POST['shopcart_note'],	
		"deliver_to_lat"  	 	  => $_POST['deliver_to_lat'],
	    "deliver_to_long" 		  => $_POST['deliver_to_long'],
	    "deliver_to_string_place" => $_POST['deliver_to_string_place'],
	    "deliver_to_date"         => $_POST['deliver_to_date']
	);

	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL,"http://carexports.uk/wan_api/v1/shoppingCart/addNewShoppingCart.php");
	curl_setopt($ch, CURLOPT_POST, 1);
	curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_TIMEOUT,30);
	curl_setopt($ch, CURLOPT_POST, 1);
	$server_output = curl_exec($ch);
	print_r($server_output);
	curl_close ($ch);
	times();

	function times(){
		
		?>
			<script>
				alert("Berhasil ditambahkan ke shopping cart");
				setTimeout(function(){
					window.history.back();
				},200);
			</script>
		<?php
	}

?>