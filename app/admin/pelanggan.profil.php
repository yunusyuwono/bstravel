<?php
include "nav.php";
$idj=$_GET['idj'];
$fj=mysqli_fetch_array(mysqli_query($kon,"SELECT * from jamaah where idjamaah='$idj'"));
?>
<div class="row">
  <div class="col-12">
    <div class="card my-4">
      <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
        <div class="bg-gradient-info shadow-primary border-radius-lg pt-3 pb-2">
          <div class="row">
            <div class="col-4">
              <h6 class="text-white text-capitalize ps-3">Profil</h6>
            </div>
            <div class="col-8" align="right">
               <div class="btn-group mx-2 p-2">
               <a class="btn btn-light" data-bs-toggle="modal" data-bs-target="#mfeprofil" title="Edit Profil"><i class="fas fa-edit"></i> </a> 
               <a class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#mfefoto"  title="Pas Foto"><i class="fas fa-camera "></i> </a>
               <a class="btn btn-success" data-bs-toggle="modal" data-bs-target="#mfesyarat"  title="Berkas Persyaratan"><i class="fa fa-id-card" aria-hidden="true"></i> </a>
               <a class="btn btn-info" data-bs-toggle="modal" data-bs-target="#mfepassport"  title="Paspor"><i class="fa fa-passport" aria-hidden="true"></i> </a>  
               <a class="btn btn-dark" href="pelanggan"  title="Kembali"><i class="fa fa-caret-left" aria-hidden="true"></i></a>  
               </div>
            </div>
          </div>
        </div>
      </div>
      <div class="card-body px-3 pb-2" style="height:80vh;overflow: auto;">
      	<div class="row justify-content-between">
            <div class="col-lg-3 col-md-3">
               <?php
               if($fj['foto']!='')
               {
                  ?>
                  <img src="../../assets/jamaah/foto/<?=$fj['foto'];?>" class="img-thumbnail shadow-lg" >
                  <?php
               }
               else
               {
                  ?>
                  <img src="https://img.freepik.com/premium-vector/user-profile-icon-flat-style-member-avatar-vector-illustration-isolated-background-human-permission-sign-business-concept_157943-15752.jpg?size=338&ext=jpg&ga=GA1.1.1826414947.1705190400&semt=ais" class="img-thumbnail shadow-lg" >
                  <?php
               }
               ?>
            </div>
            <div class="col-lg-9 col-md-9">
                <h3 class="mt-2 py-2">Profil Saya</h3>
               <div class="row justify-content-between">
                  <div class="col-lg-3 col-md-4 col-11">
                     Nama Lengkap
                  </div> 
                  <div class="col-lg-1 col-md-1 col-1" align="right">
                     :
                  </div>
                  <div class="col-lg-8 col-md-7 col-sm-12" align="left" style="border-bottom:1px dashed #33f;padding-bottom:2px;">
                     <b><?=$fj['nama'];?></b>
                  </div> 
                  <div class="col-lg-3 col-md-4 col-11">
                     Nama Passpor
                  </div> 
                  <div class="col-lg-1 col-md-1 col-1" align="right">
                     :
                  </div>
                  <div class="col-lg-8 col-md-7 col-sm-12" align="left" style="border-bottom:1px dashed #33f;padding-bottom:2px;">
                     <?php 
                     $nama=$fj['nama'];
                     $ortu=$fj['ortu'];
                     $namax=explode(" ",$nama);
                     if(count($namax)==3 || count($namax)==4){
                        $nmpaspor=$nama;
                     }
                     elseif(count($namax)<=2){
                        $ortux=explode("/",$ortu);
                        $ayah=$ortux[0];
                        $ibu=$ortux[1];

                        if(count($namax)==2)
                        {
                           $nmpaspor=$nama.' '.$ayah;
                        }
                        elseif(count($namax)==1)
                        {
                           $nmpaspor=$nama.' '.$ayah.' '.$ibu;
                        }
                     }

                     echo "<b>$nmpaspor</b>";
                     ?>
                  </div> 

                  <div class="col-lg-3 col-md-4 col-11">
                     Jenis Kelamin
                  </div> 
                  <div class="col-lg-1 col-md-1 col-1" align="right">
                     :
                  </div>
                  <div class="col-lg-8 col-md-7 col-sm-11" align="left" style="border-bottom:1px dashed #33f;padding-bottom:2px;">
                     <b><?=$fj['jk'];?></b>
                  </div> 

                  <div class="col-lg-3 col-md-4 col-11">
                     Tempat Lahir
                  </div> 
                  <div class="col-lg-1 col-md-1 col-1" align="right">
                     :
                  </div>
                  <div class="col-lg-8 col-md-7 col-sm-11" align="left" style="border-bottom:1px dashed #33f;padding-bottom:2px;">
                     <b><?=$fj['tmplahir'];?></b>
                  </div> 

                  <div class="col-lg-3 col-md-4 col-11">
                     Tanggal Lahir
                  </div> 
                  <div class="col-lg-1 col-md-1 col-1" align="right">
                     :
                  </div>
                  <div class="col-lg-8 col-md-7 col-sm-11" align="left" style="border-bottom:1px dashed #33f;padding-bottom:2px;">
                     <b><?=$fj['tgllahir'];?></b>
                  </div> 

                  <div class="col-lg-3 col-md-4 col-11">
                     No. KTP/SIM
                  </div> 
                  <div class="col-lg-1 col-md-1 col-1" align="right">
                     :
                  </div>
                  <div class="col-lg-8 col-md-7 col-sm-11" align="left" style="border-bottom:1px dashed #33f;padding-bottom:2px;">
                     <b><?=$fj['ktpsim'];?></b>
                  </div> 

                  <div class="col-lg-3 col-md-4 col-11">
                     Pekerjaan
                  </div> 
                  <div class="col-lg-1 col-md-1 col-1" align="right">
                     :
                  </div>
                  <div class="col-lg-8 col-md-7 col-sm-11" align="left" style="border-bottom:1px dashed #33f;padding-bottom:2px;">
                     <b><?=$fj['pekerjaan'];?></b>
                  </div> 

                  <div class="col-lg-3 col-md-4 col-11">
                     Alamat
                  </div> 
                  <div class="col-lg-1 col-md-1 col-1" align="right">
                     :
                  </div>
                  <div class="col-lg-8 col-md-7 col-sm-11" align="left" style="border-bottom:1px dashed #33f;padding-bottom:2px;">
                     <b><?=$fj['alamat'];?></b>
                  </div> 

                  <div class="col-lg-3 col-md-4 col-11">
                     Kabupaten/Kota
                  </div> 
                  <div class="col-lg-1 col-md-1 col-1" align="right">
                     :
                  </div>
                  <div class="col-lg-8 col-md-7 col-sm-11" align="left" style="border-bottom:1px dashed #33f;padding-bottom:2px;">
                     <b><?=$fj['kabkota'];?></b>
                  </div> 

                  <div class="col-lg-3 col-md-4 col-11">
                     Kode Pos
                  </div> 
                  <div class="col-lg-1 col-md-1 col-1" align="right">
                     :
                  </div>
                  <div class="col-lg-8 col-md-7 col-sm-11" align="left" style="border-bottom:1px dashed #33f;padding-bottom:2px;">
                     <b><?=$fj['pos'];?></b>
                  </div> 

                  <div class="col-lg-3 col-md-4 col-11">
                     No. HP
                  </div> 
                  <div class="col-lg-1 col-md-1 col-1" align="right">
                     :
                  </div>
                  <div class="col-lg-8 col-md-7 col-sm-11" align="left" style="border-bottom:1px dashed #33f;padding-bottom:2px;">
                     <b><?=$fj['hp'];?></b>
                  </div> 

                  <div class="col-lg-3 col-md-4 col-11">
                     Email
                  </div> 
                  <div class="col-lg-1 col-md-1 col-1" align="right">
                     :
                  </div>
                  <div class="col-lg-8 col-md-7 col-sm-11" align="left" style="border-bottom:1px dashed #33f;padding-bottom:2px;">
                     <b><?=$fj['email'];?></b>
                  </div> 

                  <div class="col-lg-3 col-md-4 col-11">
                     Ahli Waris
                  </div> 
                  <div class="col-lg-1 col-md-1 col-1" align="right">
                     :
                  </div>
                  <div class="col-lg-8 col-md-7 col-sm-11" align="left" style="border-bottom:1px dashed #33f;padding-bottom:2px;">
                     <b><?=$fj['ahliwaris'];?> | <?=$fj['hubwaris'];?></b>
                  </div> 

                  <div class="col-lg-3 col-md-4 col-11">
                     Perlengkapan
                  </div> 
                  <div class="col-lg-1 col-md-1 col-1" align="right">
                     :
                  </div>
                  <div class="col-lg-8 col-md-7 col-sm-11" align="left" style="border-bottom:1px dashed #33f;padding-bottom:2px;">
                     <b><?=$fj['perlengkapan'];?></b>
                  </div> 

                  <div class="col-lg-3 col-md-4 col-11">
                     Nama Orang Tua (Ayah/Ibu)
                  </div> 
                  <div class="col-lg-1 col-md-1 col-1" align="right">
                     :
                  </div>
                  <div class="col-lg-8 col-md-7 col-sm-11" align="left" style="border-bottom:1px dashed #33f;padding-bottom:2px;">
                     <b><?=$fj['ortu'];?></b>
                  </div>
                  
                  <div class="col-lg-3 col-md-4 col-11">
                     Mitra
                  </div> 
                  <div class="col-lg-1 col-md-1 col-1" align="right">
                     :
                  </div>
                  <div class="col-lg-8 col-md-7 col-sm-11" align="left" style="border-bottom:1px dashed #33f;padding-bottom:2px;">
                     <?php 
                     $mtj=mysqli_fetch_array(mysqli_query($kon,"SELECT * FROM admuser where aff='$fj[kodeaff]'"));
                     ?>
                     <b><?=$fj['kodeaff']=='-'?'Tanpa Mitra/Kantor':$mtj['nama'];?></b>
                  </div>
               </div>
            </div>
        </div>
      </div>
    </div>	
  </div>
</div>

<!--Modal-->
<div class="modal fade" id="mfeprofil">
  <div class="modal-dialog modal-md modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header bg-gradient-info text-white font-weight-bold p-1">
        <div class="col-11">Edit Profil</div>
        <div class="col-1" align="right">
          <a data-bs-dismiss="modal" class="btn btn-dark btn-sm p-2 m-1"><i class="fas fa-times"></i></a>
        </div>
      </div>
      <div class="modal-body p-1">

        <form id="fep">
        <input type="hidden" name="idj" id="idj" value="<?=$idj;?>">
          <div class="input-group input-group-outline my-3">
            <label class="form-label">Nama Lengkap</label>
            <input type="text" style="text-align:right" id="nama" name="nama" class="form-control" value="<?=$fj['nama'];?>">
          </div>
          <div class="input-group input-group-outline my-3">
            <label>Jenis Kelamin</label>
            <select name="jk" id="jk" class="form-control w-100">
              <option value="Laki-laki" <?=$fj['jk']=='Laki-laki'?'selected':'';?> > Laki-laki</option>
              <option value="Perempuan" <?=$fj['jk']=='Perempuan'?'selected':'';?> > Perempuan</option>  
            </select>
            
          </div>
          <div class="input-group input-group-outline my-3">
            <label class="form-label">Tempat Lahir</label>
            <input type="text" style="text-align:right" id="tmplahir" name="tmplahir" class="form-control" value="<?=$fj['tmplahir'];?>">
          </div>
          <div class="input-group input-group-outline my-3">
            <label>Tanggal lahir</label>
            <input type="date" style="text-align:right" id="tgllahir" name="tgllahir" class="form-control w-100"  value="<?=$fj['tgllahir'];?>">
          </div>
          <div class="input-group input-group-outline my-3">
            <label class="form-label">No. KTP/SIM</label>
            <input type="text" style="text-align:right" id="ktpsim" name="ktpsim" class="form-control" value="<?=$fj['ktpsim'];?>">
          </div>
          <div class="input-group input-group-outline my-3">
            <label class="form-label">Pekerjaan</label>
            <input type="text" style="text-align:right" id="pekerjaan" name="pekerjaan" class="form-control"  value="<?=$fj['pekerjaan'];?>">
          </div>
          <div class="input-group input-group-outline my-3">
            <label class="form-label">Alamat</label>
            <input type="text" style="text-align:right" id="alamat" name="alamat" class="form-control"  value="<?=$fj['alamat'];?>">
          </div>
          <div class="input-group input-group-outline my-3">
            <label class="form-label">Kabupaten/Kota</label>
            <input type="text" style="text-align:right" id="kabkota" name="kabkota" class="form-control" value="<?=$fj['kabkota'];?>">
          </div>
          <div class="input-group input-group-outline my-3">
            <label class="form-label">Kode POS</label>
            <input type="number" style="text-align:right" id="pos" name="pos" class="form-control" value="<?=$fj['pos'];?>">
          </div>
          <div class="input-group input-group-outline my-3">
            <label class="form-label">No. HP</label>
            <input type="text" style="text-align:right" id="hp" name="hp" readonly class="form-control"  value="<?=$fj['hp'];?>">
          </div>
          <div class="input-group input-group-outline my-3">
            <label class="form-label">Email</label>
            <input type="email" style="text-align:right" id="email" name="email" class="form-control" readonly  value="<?=$fj['email'];?>">
          </div>
          <div class="input-group input-group-outline my-3">
            <label class="form-label">Ahli Waris</label>
            <input type="text" style="text-align:right" id="ahliwaris" name="ahliwaris" class="form-control"  value="<?=$fj['ahliwaris'];?>">
          </div>
          <div class="input-group input-group-outline my-3">
            <label class="form-label">Hubungan Ahli Waris</label>
            <input type="text" style="text-align:right" id="hubwaris" name="hubwaris" class="form-control"  value="<?=$fj['hubwaris'];?>">
          </div>
          <div class="input-group input-group-outline my-3">
            <label>Perlengkapan</label>
            <select name="perlengkapan" id="perlengkapan" class="form-control w-100">
              <option value="Laki-laki" <?=$fj['perlengkapan']=='Laki-laki'?'selected':'';?> > Laki-laki</option>
              <option value="Perempuan" <?=$fj['perlengkapan']=='Perempuan'?'selected':'';?> > Perempuan</option>  
            </select>
          </div>
          <div class="input-group input-group-outline my-3">
            <label class="form-label">Nama Orang Tua * <small>Format : Nama Ayah / Nama Ibu</small></label>
            <input type="text" style="text-align:right" id="ortu" name="ortu" class="form-control" value="<?=$fj['ortu'];?>">
          </div>
          <div class="input-group input-group-outline my-3">
            <label>Mitra</label>
            <select name="kodeaff" id="kodeaff" class="form-control w-100">
              <option value="-"> Tanpa Mitra</option>
              <?php 
              $mt=mysqli_query($kon,"SELECT * from admuser where lvl='mitra' and status='aktif'");
              while($m=mysqli_fetch_array($mt))
              {
                ?>
                <option value="<?=$m['aff'];?>" <?=$m['aff']==$fj['kodeaff']?'selected':'';?> ><?=$m['nama'];?> | <?=$m['aff'];?></option>
                <?php
              }
              ?>
            </select>
          </div>
          <div class="form-group mt-2">
            <a id="updp" onclick="profile_update()" class="btn btn-sm p-2 btn-info w-100"><i class="fas fa-paper-plane"></i> Simpan</a>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="mfepassport">
  <div class="modal-dialog modal-md modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header bg-gradient-info text-white font-weight-bold p-1">
        <div class="col-11">Passport</div>
        <div class="col-1" align="right">
          <a data-bs-dismiss="modal" class="btn btn-dark btn-sm p-2 m-1"><i class="fas fa-times"></i></a>
        </div>
      </div>
      <div class="modal-body p-1">

        <form id="fepaspor">
         <input type="hidden" name="idj" id="idj" value="<?=$idj;?>">
            <div class="input-group input-group-outline my-3">
               <label class="form-label">Issuing Office</label>
               <input type="text" style="text-align:right" id="isof" name="isof" class="form-control" value="<?=$fj['isof'];?>">
            </div> 
          <div class="input-group input-group-outline my-3">
            <label class="form-label">No. Passport</label>
            <input type="text" style="text-align:right" id="nopaspor" name="nopaspor" class="form-control" value="<?=$fj['nopaspor'];?>">
          </div>
          <div class="input-group input-group-outline my-3">
            <label>Date of Issue</label>
            <input type="date" style="text-align:right" id="doi" name="doi" class="form-control w-100"  value="<?=$fj['doi'];?>" onchange="add10years()">
          </div>
          <div class="input-group input-group-outline my-3">
            <label>Date of Expiry</label>
            <input type="date" style="text-align:right" id="doe" name="doe" class="form-control w-100"  value="<?=$fj['doe'];?>">
          </div>
          <div class="form-group mt-2">
            <a id="updpas" onclick="paspor_update()" class="btn btn-sm p-2 btn-info w-100"><i class="fas fa-paper-plane"></i> Simpan</a>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="mfefoto">
  <div class="modal-dialog modal-md modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header bg-gradient-info text-white font-weight-bold p-1">
        <div class="col-11">Pas Foto</div>
        <div class="col-1" align="right">
          <a data-bs-dismiss="modal" class="btn btn-dark btn-sm p-2 m-1"><i class="fas fa-times"></i></a>
        </div>
      </div>
      <div class="modal-body p-1">
         <form action="fx.admin.php?change_photo" method="post" enctype="multipart/form-data">
         	<div class="input-group input-group-outline my-3">
	            <label>Pas Foto</label>
               <input type="hidden" name="idj" id="idj" value="<?=$idj;?>">
	            <input type="file" style="text-align:right" id="foto" name="foto" class="form-control w-100">
	          </div>
	          <div class="form-group mt-2">
	            <button id="upfoto" name="upfoto" class="btn btn-sm p-2 btn-info w-100"><i class="fas fa-paper-plane"></i> Simpan</a>
	          </div>
         </form>
      </div>
      </div>
   </div>
</div>

<div class="modal fade" id="mfesyarat">
  <div class="modal-dialog modal-md modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header bg-gradient-info text-white font-weight-bold p-1">
        <div class="col-11">Persyaratan</div>
        <div class="col-1" align="right">
          <a data-bs-dismiss="modal" class="btn btn-dark btn-sm p-2 m-1"><i class="fas fa-times"></i></a>
        </div>
      </div>
      <div class="modal-body p-1">
         <form action="fx.admin.php?syarat" method="post" enctype="multipart/form-data">
         <input type="hidden" name="idj" id="idj" value="<?=$idj;?>">
         	<?php 
            $isyarat=array(
               array('label'=>'Buku Nikah','nmid'=>'bukunikah'),
               array('label'=>'KTP','nmid'=>'ktp'),
               array('label'=>'Kartu Keluarga','nmid'=>'kk'),
               array('label'=>'Akta/Ijazah','nmid'=>'aktaijazah'),
               array('label'=>'BPJS','nmid'=>'bpjs'),
               array('label'=>'Vaksin 1','nmid'=>'vaksin1'),
               array('label'=>'Vaksin 2','nmid'=>'vaksin2'),
               array('label'=>'Vaksin 3','nmid'=>'vaksin3'),
               array('label'=>'Paspor','nmid'=>'paspor')
            );
            
            for($i=0;$i<count($isyarat);$i++){
               ?>
               <div class="input-group input-group-outline my-3">
                  <label><?=$isyarat[$i]['label'];?></label>
                  <input type="file" style="text-align:right" id="<?=$isyarat[$i]['nmid'];?>" name="<?=$isyarat[$i]['nmid'];?>" class="form-control w-100">
               </div>
               <?php
            }
            ?>
            
	          <div class="form-group mt-2">
	            <button id="upsyarat" name="upsyarat" class="btn btn-sm p-2 btn-info w-100"><i class="fas fa-paper-plane"></i> Simpan</a>
	          </div>
         </form>
      </div>
      </div>
   </div>
</div>

<?php
include "foot.php";?>
<script>
function profile_update(){
  var fep=$('#fep').serialize();
  $.ajax({
    url   : 'fx.admin.php?profile_update',
    method : 'POST',
    data : fep,
    success : function(data){
      if(data==1)
      {
        window.location.reload();
      }
      else
      {
        alert(data);
      }
    }
  })
}

function paspor_update(){
  var fepaspor=$('#fepaspor').serialize();
  $.ajax({
    url   : 'fx.admin.php?paspor_update',
    method : 'POST',
    data : fepaspor,
    success : function(data){
      if(data==1)
      {
        window.location.reload();
      }
      else
      {
        alert(data);
      }
    }
  })
}

function add10years(){
   doi=$('#doi').val();
   $.ajax({
    url   : 'fx.admin.php?add10years',
    method : 'POST',
    data : {doi:doi},
    success : function(data){
      // console.log(data);
      $('#doe').val(data);
    }
  })
}
</script>