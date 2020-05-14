<?php
	
	$product_id = $_GET['product_id'];
	$user_id    = $_SESSION['user_id'];
	$curl = curl_init();
	curl_setopt($curl, CURLOPT_URL, "http://carexports.uk/wan_api/v1/serviceMainMenu/getSpecificProduct.php?product_id=".$product_id."&id_user=".$user_id);
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
	$product_data = json_decode(curl_exec($curl));
	curl_close($curl);

	$product_name             =  $product_data -> product_name;
	$product_qty     		  =  $product_data -> product_qty;
	$product_price   		  =  $product_data -> product_price;
	$product_desc    		  =  $product_data -> product_desc;
	$deliver_to_lat           =  $product_data -> deliver_to_lat;
	$deliver_to_string_place  =  $product_data -> deliver_to_string_place;
	$deliver_to_long          =  $product_data -> deliver_to_long;
	$deliver_to_date          =  $product_data -> deliver_to_date;
?>

<div style="display:flex">
	<div style="height:250px;width:250px;background-color:gray;border-radius:5px;margin-right:13px;"></div>
	<div style="margin-left:30px;">
		<form action="./Function/addNewCart.php" method="POST">	

			<input type  = "hidden"
				   name  = "action_update"
				   value = "action_update">

			<input type  = "hidden" 
				   name  = "id_user" 
				   value = "<?php echo $_SESSION['user_id'] ?>">

			<input type  = "hidden" 
			       name  = "id_service_product" 
			       value = "<?php echo $product_data -> product_id ?>">

			<input type  = "hidden" 
			       name  = "shopcart_price" 
			       value = "<?php echo $product_data -> product_price ?>">

			<p style="font-size:23px;
					  font-family:'product-bold';
					  margin-top:5px;
					  margin-bottom:4px"><?php echo $product_name ?></p>

			<p style="font-size:15px;
					  font-family:'product-regular';
					  margin-top:5px;
					  margin-bottom:4px"><?php echo $product_desc ?></p>

			<p style="font-size:20px;
					  font-family:'product-BOLD';
					  margin-top:12px;
					  margin-bottom:4px">Rp.<?php echo $product_price ?></p>

			<div style="margin-top:20px;">
				<p style="font-family:'product-bold';font-size:11px">JUMLAH ITEM</p>
				<input name  = "shopcart_qty"
				       class = "form-input" 
				       type  = "number" 
				       value = "<?php echo $product_qty ?>" 
				       required />
			</div>

			<div style="margin-top:20px;">
				<p style="font-family:'product-bold';font-size:11px">CATATAN BAGI VENDOR</p>
				<input name  = "shopcart_note"
				       class = "form-input" 
				       type  = "text" 
				       placeholder = "Tinggalkan catatan bagi vendor"
				       value = "<?php echo $product_data -> product_note ?>" 
				       required />
			</div>

			<div style="margin-top:20px;">
				<p style="font-family:'product-bold';font-size:11px">TANGGAL BOOKING</p>
				<input name  = "deliver_to_date" 
					   class = "form-input" 
					   type  = "date" 
					   value = "<?php echo($deliver_to_date)?>" 
					   required />
			</div>
			
			<!-- MAP PE TAMPA -->
			<p style="margin-top:20px;font-family:'product-bold';font-size:11px">LOKASI BOOKING</p>
			<div id="map" style="height:400px;width:500px"></div>

			<input type="hidden" id="location_lat" name="deliver_to_lat">
			<input type="hidden" id="location_long" name="deliver_to_long">
			<input type="hidden" id="location_long" name="deliver_to_string_place" value="">

			<script>

				function initMap() {
					
					var myLatlng;

					<?php 
					if($deliver_to_lat == ""){
						?>
						myLatlng = {lat: 1.459083040906804, lng: 124.83474349250059};
						<?php
					}
					else{
						?>
						myLatlng = {lat: <?php echo $deliver_to_lat ?>, lng: <?php echo $deliver_to_long ?>};
						<?php
					}
					?>
			        

			        var map = new google.maps.Map(
				    document.getElementById('map'), {zoom: 15, center: myLatlng});

				        // Create the initial InfoWindow.
				    var infoWindow = new google.maps.InfoWindow({
				    	position: myLatlng
				    });

				    var marker = new google.maps.Marker({
					    position: myLatlng,
					});

					// To add the marker to the map, call setMap();
					marker.setMap(map);

				    // Configure the click listener.
				   	map.addListener('click', function(mapsMouseEvent) {

				    	// Close the current InfoWindow.
				    	infoWindow.close();
				    	marker.setMap(null);

				    	marker = new google.maps.Marker({
						    position: mapsMouseEvent.latLng,
						    title: mapsMouseEvent.latLng.toString()
						});
						var split_1 = mapsMouseEvent.latLng.toString().split("(");
						var split_2 = split_1[1].toString().split(")");
						var split_3 = split_2[0].split(",");
						console.log(split_3[0]);
				    	marker.setMap(map);
				        document.getElementById("location_lat").value = split_3[0];
				        document.getElementById("location_long").value = split_3[1];
				        
				     });
				}

			    </script>
		
				<!-- DEPE KEY -->
				<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD5Zc6ETWp0CLoBcUQM86qpnayC-gQDHCU&callback=initMap"
			    async defer></script>


			<div style="margin-top:20px;">
				<button style="font-family: 'product-bold';border: none;background: #2ecc71;cursor: pointer;border-radius: 5px;padding-left: 15px;padding-right: 15px;padding-top:13px;padding-bottom:13px;">Tambahkan Item</button>
			</div>
		</form>
	</div>
</div>