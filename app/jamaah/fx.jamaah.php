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
elseif(isset($_GET['pilihpaket']))
{
	$idpaket=$_POST['idpaket'];
	$status='Terdaftar';
	$tgl=date('Y-m-d');
	$cmd=mysqli_query($kon,"INSERT into jampaket (idjamaah,idpaket,tgldaftar,status) values ('$_SESSION[us]','$idpaket','$tgl','$status')");
	if($cmd)
	{
		echo '1';
	}
	else
	{
		echo '0 '.mysqli_error($kon);
	}	
}
elseif(isset($_GET['uplbukti']))
{
	$idjampaket=$_POST['idjampaket'];
	$nominal =addslashes($_POST['nominal']);
	$rektu 	=addslashes($_POST['rektu']);
	$bukti =$_FILES['bukti'];
	$bayarke=$_POST['bayarke'];
	$status = 'Terkirim';
	$idpaket=$_POST['idpaket'];
	if(move_uploaded_file($bukti['tmp_name'],'../../assets/jamaah/bb/'.$bukti['name']))
	{
		$cmd=mysqli_query($kon,"INSERT into bayar (idjampaket,bayarke,nominal,bukti,rektu,status) values ('$idjampaket','$bayarke','$nominal','$bukti[name]','$rektu','$status')");

		if($cmd)
		{
			?>
			<script>alert("Bukti pembayaran berhasil dikirimkan");window.location.href='bayar.paket?idpaket=<?=$idpaket;?>';</script>
			<?php
		}
		else
		{
			?>
			<script>alert("<?=mysqli_error($kon);?>");window.history.back();</script>
			<?php
		}
	}
	else
	{
		?>
		<script>alert("Gagal upload foto");window.history.back();</script>
		<?php
	}
}
elseif(isset($_GET['syarat']))
{
	$isyarat=array('bukunikah','ktp','kk','aktaijazah','bpjs','vaksin1','vaksin2','vaksin3','paspor');	
	$f=array();
	$t=array();
	for($i=0;$i<count($isyarat);$i++){
		$f[]=$_FILES[$isyarat[$i]]['name'];
		$t[]=$_FILES[$isyarat[$i]]['tmp_name'];
	}
	
	$arjs=array('jpg','jpeg','png');

	for($i=0;$i<count($f);$i++){
	
		// if(in_array($jf,$arjs))
		// {
			$upfolder="../../assets/jamaah/syarat/";
			if(move_uploaded_file($t[$i],$upfolder.$f[$i]))
			{
				$cmd=mysqli_query($kon,"INSERT INTO syarat (idjamaah,jenis,gambar) values ('$_SESSION[us]','$isyarat[$i]','$f[$i]')");
				if($cmd)
				{
					echo $isyarat[$i].' '.$f[$i].' Tersimpan <br> ';
				}
				else
				{
					echo mysqli_error($kon);
				}
			}
			else
			{
				echo $isyarat[$i].' '.$f[$i].' gagal <br> ';
			}
		// }
	}
}