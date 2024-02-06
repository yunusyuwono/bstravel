<?php 
include "fx.admin.php";
if(isset($_POST['idbayar']))
{
	$idbayar = $_POST['idbayar'];
	mysqli_query($kon,"UPDATE bayar set status='Valid' where idbayar='$idbayar'");
}
?>