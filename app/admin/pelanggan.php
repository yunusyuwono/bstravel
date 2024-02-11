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
              <h6 class="text-white text-capitalize ps-3">Pelanggan</h6>
            </div>
            <div class="col-8" align="right">
               <a class="btn btn-light p-1 m-2" data-bs-toggle="modal" data-bs-target="#mftplg"><i class="fas fa-plus-circle"></i> Tambah Pelanggan</a> 
            </div>
          </div>
        </div>
      </div>
      <div class="card-body px-3 pb-2" style="height:80vh;overflow: auto;">
      	<div class="input-group">
            <div class="input-group input-group-outline my-3">
               <label class="form-label">Cari Nama / No. HP / No.KTP/SIM</label>
               <input type="search" id="cari" name="cari" oninput="cariplg('nama')" class="form-control">
               <span class="input-group-text px-1" id="ktc"><i class="fas fa-search text-danger m-1"></i></span>
             </div>
         </div>

         <div class="mt-2" id="scr">
            
         </div>

      </div>
    </div>	
  </div>
</div>

<!--Modal-->
<div class="modal fade" id="mftplg">
  <div class="modal-dialog modal-md modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header bg-gradient-info text-white font-weight-bold p-1">
        <div class="col-11">Tambah Pelanggan</div>
        <div class="col-1" align="right">
          <a data-bs-dismiss="modal" class="btn btn-dark btn-sm p-2 m-1"><i class="fas fa-times"></i></a>
        </div>
      </div>
      <div class="modal-body p-1">

        <form id="fep">
          <div class="input-group input-group-outline my-3">
            <label class="form-label">Nama Lengkap</label>
            <input type="text" style="text-align:right" id="nama" name="nama" class="form-control" >
          </div>
          <div class="input-group input-group-outline my-3">
            <label>Jenis Kelamin</label>
            <select name="jk" id="jk" class="form-control w-100">
              <option value="Laki-laki" > Laki-laki</option>
              <option value="Perempuan" > Perempuan</option>  
            </select>
            
          </div>
          <div class="input-group input-group-outline my-3">
            <label class="form-label">Tempat Lahir</label>
            <input type="text" style="text-align:right" id="tmplahir" name="tmplahir" class="form-control">
          </div>
          <div class="input-group input-group-outline my-3">
            <label>Tanggal lahir</label>
            <input type="date" style="text-align:right" id="tgllahir" name="tgllahir" class="form-control w-100" >
          </div>
          <div class="input-group input-group-outline my-3">
            <label class="form-label">No. KTP/SIM</label>
            <input type="text" style="text-align:right" id="ktpsim" name="ktpsim" class="form-control">
          </div>
          <div class="input-group input-group-outline my-3">
            <label class="form-label">Pekerjaan</label>
            <input type="text" style="text-align:right" id="pekerjaan" name="pekerjaan" class="form-control" >
          </div>
          <div class="input-group input-group-outline my-3">
            <label class="form-label">Alamat</label>
            <input type="text" style="text-align:right" id="alamat" name="alamat" class="form-control"  >
          </div>
          <div class="input-group input-group-outline my-3">
            <label class="form-label">Kabupaten/Kota</label>
            <input type="text" style="text-align:right" id="kabkota" name="kabkota" class="form-control" >
          </div>
          <div class="input-group input-group-outline my-3">
            <label class="form-label">Kode POS</label>
            <input type="number" style="text-align:right" id="pos" name="pos" class="form-control" >
          </div>
          <div class="input-group input-group-outline my-3">
            <label class="form-label">No. HP</label>
            <input type="text" style="text-align:right" id="hp" name="hp" class="form-control"  >
          </div>
          <div class="input-group input-group-outline my-3">
            <label class="form-label">Email</label>
            <input type="email" style="text-align:right" id="email" name="email" class="form-control"  >
          </div>
          <div class="input-group input-group-outline my-3">
            <label class="form-label">Ahli Waris</label>
            <input type="text" style="text-align:right" id="ahliwaris" name="ahliwaris" class="form-control"  >
          </div>
          <div class="input-group input-group-outline my-3">
            <label class="form-label">Hubungan Ahli Waris</label>
            <input type="text" style="text-align:right" id="hubwaris" name="hubwaris" class="form-control" >
          </div>
          <div class="input-group input-group-outline my-3">
            <label>Perlengkapan</label>
            <select name="perlengkapan" id="perlengkapan" class="form-control w-100">
              <option value="Laki-laki" > Laki-laki</option>
              <option value="Perempuan" > Perempuan</option>  
            </select>
          </div>
          <div class="input-group input-group-outline my-3">
            <label class="form-label">Nama Orang Tua * <small>Format : Nama Ayah / Nama Ibu</small></label>
            <input type="text" style="text-align:right" id="ortu" name="ortu" class="form-control" >
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
                <option value="<?=$m['aff'];?>"><?=$m['nama'];?> | <?=$m['aff'];?></option>
                <?php
              }
              ?>
            </select>
          </div>
          <div class="form-group mt-2">
            <a id="updp" onclick="plg_simpan()" class="btn btn-sm p-2 btn-info w-100"><i class="fas fa-paper-plane"></i> Simpan</a>
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
         <form action="fx.jamaah.php?change_photo" method="post" enctype="multipart/form-data">
         	<div class="input-group input-group-outline my-3">
	            <label>Pas Foto</label>
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

<?php
include "foot.php";?>
<script>
function cariplg(urut){
  var scr=$('#scr');
  var ktc=$('#ktc');
  var cari=$('#cari').val();
  console.log(cari);
  ktc.html('<i class="fas fa-spinner fa-spin text-danger m-1"></i>')
  $.ajax({
    url   : 'pelanggan.data.php',
    method: 'POST',
    data  : {cari:cari,urut:urut},
    success : function(data){
      scr.html(data);
      ktc.html('<i class="fas fa-search text-danger m-1"></i>')
    }
  })
}

$(document).ready(function() {
   cariplg('nama');
})

function plg_simpan(){
  var fep=$('#fep').serialize();
  $.ajax({
    url   : 'fx.admin.php?tambahplg',
    method : 'POST',
    data : fep,
    success : function(data){
      if(data==1)
      {
        alert('Pelanggan berhasil ditambahkan');
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