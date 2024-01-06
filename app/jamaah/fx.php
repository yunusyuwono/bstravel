<?php 
require_once "../../config/conn.php";

if(isset($_GET['daftar']))
{
	$a=$_POST;
	

	$msg=array(
		'kode'=>0,
		'konten'=>$a,
		);
	echo json_encode($msg);
}
?>