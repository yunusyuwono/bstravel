<?php 
session_start();
require_once "../../config/conn.php";
if(isset($_GET['tambahplg']))
{
	$p=array();
	$k=array_keys($_POST);
	for($a=0;$a<count($k);$a++)
	{
		$ask=addslashes($_POST[$k[$a]]);
		$p[$k[$a]]=$ask;
	}

	$cekcred=mysqli_num_rows(mysqli_query($kon,"SELECT * from jamaah where hp='$p[hp]' or email='$p[email]' or ktpsim='$p[ktpsim]'"));
	if($cekcred==0)
	{
		$cmd=mysqli_query($kon,"INSERT into jamaah (nama,jk,tmplahir,tgllahir,ktpsim,pekerjaan,alamat,kabkota,pos,hp,email,ahliwaris,hubwaris,perlengkapan) values ('$p[nama]','$p[jk]','$p[tmplahir]','$p[tgllahir]','$p[ktpsim]','$p[pekerjaan]','$p[alamat]','$p[kabkota]','$p[pos]','$p[hp]','$p[email]','$p[ahliwaris]','$p[hubwaris]','$p[perlengkapan]')");
		//$cmd=mysqli_query($kon,"UPDATE jamaah set nama='$p[nama]',jk='$p[jk]',tmplahir='$p[tmplahir]',tgllahir='$p[tgllahir]',ktpsim='$p[ktpsim]',pekerjaan='$p[pekerjaan]',alamat='$p[alamat]',kabkota='$p[kabkota]',pos='$p[pos]',hp='$p[hp]',email='$p[email]',ahliwaris='$p[ahliwaris]',hubwaris='$p[hubwaris]',perlengkapan='$p[perlengkapan]' where hp='$_SESSION[us]'");
		if($cmd)
		{
			echo '1';
		}
		else
		{
			echo '0 '.mysqli_error($kon);
		}
	}
	else
	{
		echo "No. HP atau Email atau No. KTP/SIM sudah pernah terdaftar sebelumnya";
	}
	
}
elseif(isset($_GET['change_photo']))
{
	$f=$_FILES['foto'];
	$arjs=array('jpg','jpeg','png');
	$exnm=explode('.', $f['name']);
	$jf=end($exnm);
	if(in_array($jf,$arjs))
	{
		$upfolder="../../assets/jamaah/foto/";
		if(move_uploaded_file($f['tmp_name'],$upfolder.$f['name']))
		{
			$cmd=mysqli_query($kon,"UPDATE jamaah set foto='$f[name]' where hp='$_SESSION[us]'");

			if($cmd)
			{
				header("location:profil");
			}
			else
			{
				echo '0 '.mysqli_error($kon);
			}
		}
		else
		{
			?>
			<script>alert("Gagal upload foto");window.history.back();</script>
			<?php
		}
	}
	else
	{
		?>
		<script>alert("Format file salah. Harus berformat jpg, jpeg, atau png");window.history.back();</script>
		<?php
	}
}