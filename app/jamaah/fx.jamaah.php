<?php 
session_start();
require_once "../../config/conn.php";
if(isset($_GET['profile_update']))
{
	$p=array();
	$k=array_keys($_POST);
	for($a=0;$a<count($k);$a++)
	{
		$ask=addslashes($_POST[$k[$a]]);
		$p[$k[$a]]=$ask;
	}

	$cmd=mysqli_query($kon,"UPDATE jamaah set nama='$p[nama]',jk='$p[jk]',tmplahir='$p[tmplahir]',tgllahir='$p[tgllahir]',ktpsim='$p[ktpsim]',pekerjaan='$p[pekerjaan]',alamat='$p[alamat]',kabkota='$p[kabkota]',pos='$p[pos]',hp='$p[hp]',email='$p[email]',ahliwaris='$p[ahliwaris]',hubwaris='$p[hubwaris]',perlengkapan='$p[perlengkapan]' where hp='$_SESSION[us]'");
	if($cmd)
	{
		echo '1';
	}
	else
	{
		echo '0 '.mysqli_error($kon);
	}
	
}