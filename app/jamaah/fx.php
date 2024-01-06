<?php 
require_once "../../config/conn.php";

if(isset($_GET['daftar']))
{
	$nama 	=addslashes($_POST['nama']);
	$hp 	=addslashes($_POST['hp']);
	$email 	=addslashes($_POST['email']);
	$pw 	=md5(addslashes($_POST['pw']));
	$otp 	=sprintf('%05s',rand(0,99999));
	$token 	=md5($hp);
	
	$cek=mysqli_num_rows(mysqli_query($kon,"SELECT * from jamaah where hp='$hp' or email='$email'"));
	if($cek!=0)
	{
		$kode=2;
		$psn="No. HP atau E-mail sudah pernah terdaftar sebelumnya. Silahkan langsung login";
	}
	else
	{
		$cmd=mysqli_query($kon,"INSERT into jamaah (nama,hp,email,password,token,otp) values ('$nama','$hp','$email','$pw','$token','$otp')");
		if($cmd)
		{
			$api_key   = '0fb8f836f005121959193916162c2db1b89f7732'; // API KEY Anda
		    $sender    = '6282183925322'; // No HP pengirim nnti diganti
		    $number     = $hp; //pengguna
		    $message    = 'Kode OTP anda adalah : '.$otp.' . Jangan berikan kepada orang lain.
		    -- BST';
		        $postData = array(
		            'api_key' => $api_key,
		            'sender' => $sender,
		            'number' => $number,
		            'message' => $message,
		        );

		        // Setup cURL
		        $ch = curl_init('https://wa.srv7.wapanels.com/send-message');
		        curl_setopt_array($ch, array(
		            CURLOPT_POST => TRUE,
		            CURLOPT_RETURNTRANSFER => TRUE,
		            CURLOPT_HTTPHEADER => array(
		                'Authorization: '.$api_key,
		                'Content-Type: application/json'
		            ),
		            CURLOPT_POSTFIELDS => json_encode($postData)
		        ));

		        // Send the request
		        $response = curl_exec($ch);

		        // Check for errors
		        if($response === FALSE){
		            die(curl_error($ch));
		        }

		        // Decode the response
		        $responseData = json_decode($response, TRUE);

		        // Close the cURL handler
		        curl_close($ch);
		    $psn="";
		    $kode=1;
		}
		else
		{
			$kode=0;
			$psn="Pendaftaran gagal. Mohon cek kembali. ".mysqli_error($kon);
		}
	}


	$msg=array(
		'kode'=>$kode,
		'konten'=>$psn,
		);
	echo json_encode($msg);
}
?>