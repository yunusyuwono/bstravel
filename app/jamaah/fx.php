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
		$token="";
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
		    $psn="Pendaftaran berhasil. Kami telah mengirimkan kode OTP di Whatsapp anda. Gunakan kode tersebut untuk verifikasi pendaftaran.";
		    $kode=1;

		}
		else
		{
			$kode=0;
			$psn="Pendaftaran gagal. Mohon cek kembali. ".mysqli_error($kon);
			$token="";
		}
	}


	$msg=array(
		'kode'=>$kode,
		'konten'=>$psn,
		'token'=>$token,
		);
	echo json_encode($msg);
}
elseif(isset($_GET['otp']))
{
	$otp 	=addslashes($_POST['otp']);
	$token 	=addslashes($_POST['token']);
	$cek=mysqli_num_rows(mysqli_query($kon,"SELECT * from jamaah where token='$token' and otp='$otp'"));
	if($cek==1)
	{
		$kode=1;
		$psn="Verifikasi berhasil";
	}		
	else
	{
		$kode=0;
		$psn="OTP tidak sesuai";
	}

	$msg=array(
		'kode'=>$kode,
		'konten'=>$psn,
		);
	echo json_encode($msg);
}
elseif (isset($_GET['masuk'])) {
	$us=addslashes($_POST['username']);
	$pw=md5(addslashes($_POST['password']));
	$cek=mysqli_num_rows(mysqli_query($kon,"SELECT * from jamaah where hp='$us' and password='$pw'"));
	if($cek!=0)
	{
		session_start();
		$_SESSION['us']=$us;
		$kode=1;
		$psn="Login berhasil.";
	}
	else
	{
		$kode=0;
		$psn="Login gagal. ".$us.' '.$pw;
	}

	$msg=array(
		'kode'=>$kode,
		'konten'=>$psn.' '.mysqli_error($kon),
		);
	echo json_encode($msg);
}
?>