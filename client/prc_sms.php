<?php
try{



	$message = isset($_GET['message']) ? $_GET['message'] : null;
	$phoneNumber = isset($_GET['phone']) ? $_GET['phone'] : null;

	if($message !=null && $phoneNumber !=null){
		$url = "http://192.168.50.64:8090/SendSMS?username=Sadiq&password=1234&phone=".$phoneNumber."&message=".urlencode($message);
		$curl = curl_init($url);
		curl_setopt($curl,CURLOPT_RETURNTRANSFER, true);
		$curl_response = curl_exec($curl);

		if($curl_response === false){
			$info = curl_getinfo($curl);
			curl_close($curl);
			die('Error occurred'.var_export($info));
		}

		curl_close($curl);

		$response  = json_decode($curl_response);
		if($response->status == 200){
			echo 'Message has been sent';
			header("Location: userprofile_forgot_enteremail.php");
		}else{
			echo 'Technical Problem';
		}

	}
}catch(Exception $ex){
	echo "Exception: ".$ex;
}



?>



