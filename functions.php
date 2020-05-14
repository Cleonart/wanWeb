<?php
		
	if(isset($_GET['action'])){

		$action = $_GET['action'];

		if($action == "TOPUP"){
			$curl = curl_init();
			if($_GET['nominal'] >= 10000){
				curl_setopt($curl, CURLOPT_URL, "http://carexports.uk/wan_api/v1/webHandler/generateTopUp.php?user_id=".$_GET['user_id']."&nominal=".$_GET['nominal']);
				curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
				curl_exec($curl);
				curl_close($curl);
				echo("<script>alert('Permintaan top up berhasil dilakukan, silahkan melakukan transfer ke nomor rekening XXX.XXX.XXX dengan menyertakan nomor telepon anda pada nomor referensi')</script>");
				times($INDEX_BASE_URL);
			}
			else{
				echo("<script>alert('Nilai minimum top up harus Rp.10.000')</script>");
				times($INDEX_BASE_URL);
			}
		}
	}

	function times($host){
		echo("<script>var index = '".$host."';</script>");
		?>
			<script>
				setTimeout(function(){
					window.location.replace(index);
				},200);
			</script>
		<?php
	}

	
?>