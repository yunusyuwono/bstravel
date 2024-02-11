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
		$cmd=mysqli_query($kon,"INSERT into jamaah (nama,jk,tmplahir,tgllahir,ktpsim,pekerjaan,alamat,kabkota,pos,hp,email,ahliwaris,hubwaris,perlengkapan,ortu,kodeaff) values ('$p[nama]','$p[jk]','$p[tmplahir]','$p[tgllahir]','$p[ktpsim]','$p[pekerjaan]','$p[alamat]','$p[kabkota]','$p[pos]','$p[hp]','$p[email]','$p[ahliwaris]','$p[hubwaris]','$p[perlengkapan]','$p[ortu]','$p[kodeaff]')");
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
elseif(isset($_GET['profile_update']))
{
	$p=array();
	$k=array_keys($_POST);
	for($a=0;$a<count($k);$a++)
	{
		$ask=addslashes($_POST[$k[$a]]);
		$p[$k[$a]]=$ask;
	}

	$cmd=mysqli_query($kon,"UPDATE jamaah set nama='$p[nama]',jk='$p[jk]',tmplahir='$p[tmplahir]',tgllahir='$p[tgllahir]',ktpsim='$p[ktpsim]',pekerjaan='$p[pekerjaan]',alamat='$p[alamat]',kabkota='$p[kabkota]',pos='$p[pos]',hp='$p[hp]',email='$p[email]',ahliwaris='$p[ahliwaris]',hubwaris='$p[hubwaris]',perlengkapan='$p[perlengkapan]', ortu='$p[ortu]', kodeaff='$p[kodeaff]' where idjamaah='$p[idj]'");
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
	$idj=$_POST['idj'];
	$f=$_FILES['foto'];
	$arjs=array('jpg','jpeg','png');
	$exnm=explode('.', $f['name']);
	$jf=end($exnm);
	if(in_array($jf,$arjs))
	{
		$upfolder="../../assets/jamaah/foto/";
		if(move_uploaded_file($f['tmp_name'],$upfolder.$f['name']))
		{
			$cmd=mysqli_query($kon,"UPDATE jamaah set foto='$f[name]' where idjamaah='$idj'");

			if($cmd)
			{
				header("location:pelanggan.profil?idj=".$idj);
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
elseif(isset($_GET['tambahpaket']))
{
	$p=array();
	$k=array_keys($_POST);
	for($a=0;$a<count($k);$a++)
	{
		$ask=addslashes($_POST[$k[$a]]);
		$p[$k[$a]]=$ask;
	}
	
	$cmd=mysqli_query($kon,"INSERT into paket (nama,program,brgkt,hari,biaya,desk,kuota) values ('$p[nama]','$p[program]','$p[brgkt]','$p[hari]','$p[biaya]','$p[desk]','$p[kuota]')");
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
elseif (isset($_GET['login'])) {
	$us=addslashes($_POST['username']);
	$pw=md5(addslashes($_POST['password']));
	$cek=mysqli_num_rows(mysqli_query($kon,"SELECT * from admuser where us='$us' and pw='$pw'"));
	if($cek!=0)
	{
		$_SESSION['adm']=$us;
		$kode=1;
		$psn="Login berhasil.";
	}
	else
	{
		$kode=0;
		$psn="Login gagal. ";
	}

	$msg=array(
		'kode'=>$kode,
		'konten'=>$psn.' '.mysqli_error($kon),
		);
	echo json_encode($msg);
}
elseif(isset($_GET['tambahmitra']))
{
	$p=array();
	$k=array_keys($_POST);
	for($a=0;$a<count($k);$a++)
	{
		$ask=addslashes($_POST[$k[$a]]);
		$p[$k[$a]]=$ask;
	}

	$cekcred=mysqli_num_rows(mysqli_query($kon,"SELECT * from admuser where hp='$p[hp]' or us='$p[hp]'"));
	if($cekcred==0)
	{
		$pw=md5($p['hp']);
		$aff=sprintf('%05s',rand(0,99999));
		$cmd=mysqli_query($kon,"INSERT into admuser (nama,us,pw,lvl,aff,hp,status) values ('$p[nama]','$p[hp]','$pw','mitra','$aff','$p[hp]','$p[status]')");
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
		echo "Mitra dengan nomor HP yang sama sudah pernah terdaftar";
	}	
}
elseif(isset($_GET['uplbukti']))
{
	$idjampaket=$_POST['idjampaket'];
	$idjamaah=$_POST['idjamaah'];
	$idpaket=$_POST['idpaket'];
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
			<script>alert("Bukti pembayaran berhasil dikirimkan");window.location.href='bayar.paket?idpaket=<?=$idpaket;?>&idjamaah=<?=$idjamaah;?>';</script>
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
elseif(isset($_GET['paspor_update']))
{
	$p=array();
	$k=array_keys($_POST);
	for($a=0;$a<count($k);$a++)
	{
		$ask=addslashes($_POST[$k[$a]]);
		$p[$k[$a]]=$ask;
	}

	$cmd=mysqli_query($kon,"UPDATE jamaah set nopaspor='$p[nopaspor]',isof='$p[isof]',doi='$p[doi]',doe='$p[doe]' where idjamaah='$p[idj]'");
	if($cmd)
	{
		echo '1';
	}
	else
	{
		echo '0 '.mysqli_error($kon);
	}
	
}
elseif(isset($_GET['add10years']))
{
	$doi=$_POST['doi'];
	$doix=explode('-',$doi);
	$doiy=$doix[0];
	$add10y=$doiy+10;
	$doe=$add10y.'-'.$doix[1].'-'.$doix[2];
	echo $doe;
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
elseif(isset($_GET['syarat']))
{
	$pj=mysqli_fetch_array(mysqli_query($kon,"SELECT * from jamaah where idjamaah='$_POST[idj]'"));
	$idj=$pj['hp'];
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
				$cekberkas=mysqli_num_rows(mysqli_query($kon,"SELECT * from syarat where idjamaah='$idj' and jenis='$isyarat[$i]'"));
				if($cekberkas==0)
				{
					$cmd=mysqli_query($kon,"INSERT INTO syarat (idjamaah,jenis,gambar) values ('$idj','$isyarat[$i]','$f[$i]')");
				}
				else
				{
					$cmd=mysqli_query($kon,"UPDATE syarat set gambar='$f[$i]' where idjamaah='$idj' and jenis='$isyarat[$i]'");
				}
				
				if($cmd)
				{
					header("location: pelanggan.profil?idj=".$_POST['idj']);
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