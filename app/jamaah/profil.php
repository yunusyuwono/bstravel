<?php
include "nav.php";
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
               <a class="btn btn-light p-1" data-bs-toggle="modal" data-bs-target="#mfeprofil"><i class="fas fa-edit"></i> Edit Profil</a> 
               <a class="btn btn-light p-1 mx-1" data-bs-toggle="modal" data-bs-target="#mfefoto"><i class="fas fa-camera "></i> Pas Foto</a> 
            </div>
          </div>
        </div>
      </div>
      <div class="card-body px-3 pb-2" style="height:80vh;overflow: auto;">
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

        </div>
      </div>
    </div>	
  </div>
</div>

<!--Modal-->
<div class="modal fade" id="mfeprofil">
  <div class="modal-dialog modal-md modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header p-1">
        <div class="col-11">Edit Profil</div>
        <div class="col-1" align="right">
          <a data-bs-dismiss="modal" class="btn btn-dark btn-sm p-2 m-1"><i class="fas fa-times"></i></a>
        </div>
      </div>
      <div class="modal-body p-1">
        <form id="fep">
          <div class="input-group input-group-outline my-3">
            <label class="form-label">Nama Lengkap</label>
            <input type="text" id="nama" name="nama" class="form-control" value="<?=$fj['nama'];?>">
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
            <input type="text" id="tmplahir" name="tmplahir" class="form-control" value="<?=$fj['tmplahir'];?>">
          </div>
          <div class="input-group input-group-outline my-3">
            <label>Tanggal lahir</label>
            <input type="date" id="tgllahir" name="tgllahir" class="form-control w-100"  value="<?=$fj['tgllahir'];?>">
          </div>
          <div class="input-group input-group-outline my-3">
            <label class="form-label">No. KTP/SIM</label>
            <input type="text" id="ktpsim" name="ktpsim" class="form-control" value="<?=$fj['ktpsim'];?>">
          </div>
          <div class="input-group input-group-outline my-3">
            <label class="form-label">Pekerjaan</label>
            <input type="text" id="pekerjaan" name="pekerjaan" class="form-control"  value="<?=$fj['pekerjaan'];?>">
          </div>
          <div class="input-group input-group-outline my-3">
            <label class="form-label">Alamat</label>
            <input type="text" id="alamat" name="alamat" class="form-control"  value="<?=$fj['alamat'];?>">
          </div>
          <div class="input-group input-group-outline my-3">
            <label class="form-label">Kabupaten/Kota</label>
            <input type="text" id="kabkota" name="kabkota" class="form-control" value="<?=$fj['kabkota'];?>">
          </div>
          <div class="input-group input-group-outline my-3">
            <label class="form-label">Kode POS</label>
            <input type="number" id="pos" name="pos" class="form-control" value="<?=$fj['pos'];?>">
          </div>
          <div class="input-group input-group-outline my-3">
            <label class="form-label">No. HP</label>
            <input type="text" id="hp" name="hp" readonly class="form-control"  value="<?=$fj['hp'];?>">
          </div>
          <div class="input-group input-group-outline my-3">
            <label class="form-label">Email</label>
            <input type="email" id="email" name="email" class="form-control" readonly  value="<?=$fj['email'];?>">
          </div>
          <div class="input-group input-group-outline my-3">
            <label class="form-label">Ahli Waris</label>
            <input type="text" id="ahliwaris" name="ahliwaris" class="form-control"  value="<?=$fj['ahliwaris'];?>">
          </div>
          <div class="input-group input-group-outline my-3">
            <label class="form-label">Hubungan Ahli Waris</label>
            <input type="text" id="hubwaris" name="hubwaris" class="form-control"  value="<?=$fj['hubwaris'];?>">
          </div>
          <div class="input-group input-group-outline my-3">
            <label>Perlengkapan</label>
            <select name="perlengkapan" id="perlengkapan" class="form-control w-100">
              <option value="Laki-laki" <?=$fj['perlengkapan']=='Laki-laki'?'selected':'';?> > Laki-laki</option>
              <option value="Perempuan" <?=$fj['perlengkapan']=='Perempuan'?'selected':'';?> > Perempuan</option>  
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

<?php
include "foot.php";?>
<script>
function profile_update(){
  var fep=$('#fep').serialize();
  $.ajax({
    url   : 'fx.jamaah.php?profile_update',
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
</script>