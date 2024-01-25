<?php
include "nav.php";
?>
<div class="row">
  <div class="col-12">
    <div class="card my-4">
      <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
        <div class="bg-gradient-info shadow-primary border-radius-lg pt-3 pb-2">
          <div class="row">
            <div class="col-12">
              <h6 class="text-white text-capitalize ps-3">Paket Perjalanan</h6>
            </div>
            
          </div>
        </div>
      </div>
      <div class="card-body px-3 pb-2" >
        Paket Perjalanan yang telah dipilih
        <div class="row">
        <?php
          $csql=mysqli_query($kon,"SELECT * from paket where idpaket in (SELECT idpaket from jampaket where idjamaah='$_SESSION[us]')");
          while($j=mysqli_fetch_array($csql))
          {
            ?>
            <div class="col-lg-4 col-md-4 col-sm-12">
              <div class="card my-4 shadow-lg p-1">
                <div class="card-header p-0 position-relative mt-n mx-1 z-index-2">
                  <div class="bg-gradient-danger shadow-primary border-radius-lg pt-2 pb-1 p-2">
                    <div class="d-flex">
                      <!-- <div class="dropdown">
                        <a class="btn p-1 text-white font-weight-bold m-1 dropdown-toggle" role="button" id="dropmenu" data-bs-toggle="dropdown" aria-expanded="false"></a>
                        <ul class="dropdown-menu" aria-labelledby="dropmenu">
                          <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#jpkt<?=$j['idjamaah'];?>"><i class="fas fa-users"></i> <span class="text-right">Peserta</span> </a></li>
                          
                        </ul>
                      </div> -->
                      <div class="flex-grow-1">
                        <b class="text-white text-capitalize p-1"><?=$j['nama'];?></b> 
                        <br>
                        <a onclick="window.location.href='bayar.paket?idpaket=<?=$j['idpaket'];?>'" class="btn btn-light btn-sm">Bayar</a>
                        <a onclick="window.location.href='batal?idpaket=<?=$j['idpaket'];?>'" class="btn btn-outline-light btn-sm">Pembatalan</a>
                      </div>
                    </div>
                    
                  </div>
                </div>
                <div class="card-body p-1 mt-2" style="height:260px;overflow:auto">
                      <small>Program<br>
                      <b class=""><?=$j['program'];?> Hari</b> </small><br>
                      <small>Keberangkatan<br>
                      <b class=""><?=date('M Y',strtotime($j['brgkt']));?></b></small><br>
                      <small>Biaya<br>
                      <b class=""><?=number_format($j['biaya'],0,',','.');?></b> </small><br>
                      <small>Lama Perjalanan<br>
                      <b class=""><?=$j['hari'];?> Hari</b> </small><br>
                      <small>Deskripsi<br>
                      <b class=""><?=$j['desk'];?></b></small><br>
                </div>
              </div>
            </div>
            

            <?php
          }
          ?>
          </div>
      </div>
    </div>
    <div class="card card-body mt-2">
        <div class="input-group">
            <div class="input-group input-group-outline my-3">
               <label class="form-label">Cari Nama Paket</label>
               <input type="search" id="cari" name="cari" oninput="caripaket('nama')" class="form-control">
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
<div class="modal fade" id="mftpkt">
  <div class="modal-dialog modal-md modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header bg-gradient-info text-white font-weight-bold p-1">
        <div class="col-11">Tambah Paket</div>
        <div class="col-1" align="right">
          <a data-bs-dismiss="modal" class="btn btn-dark btn-sm p-2 m-1"><i class="fas fa-times"></i></a>
        </div>
      </div>
      <div class="modal-body p-1">

        <form id="fep">
          <div class="input-group input-group-outline my-3">
            <label class="form-label">Nama Paket Perjalanan</label>
            <input type="text" style="text-align:right" id="nama" name="nama" class="form-control" >
          </div>
          <div class="input-group input-group-outline my-3">
            <label>Program</label>
            <select name="program" id="program" class="form-control w-100">
              <option value="Umroh" > Umroh</option>
              <option value="Haji Khusus" > Haji Khusus</option>
              <option value="Halal Tour" > Halal Tour</option>  
            </select>
          </div>
          <div class="input-group input-group-outline my-3">
            <label>Keberangkatan</label>
            <input type="month" style="text-align:right" id="brgkt" name="brgkt" class="form-control w-100">
          </div>
          <div class="input-group input-group-outline my-3">
            <label class="form-label">Hari Perjalanan</label>
            <input type="number" style="text-align:right" id="hari" name="hari" class="form-control w-100" >
          </div>
          <div class="input-group input-group-outline my-3">
            <label class="form-label">Biaya (Rp.)</label>
            <input type="number" style="text-align:right" id="biaya" name="biaya" class="form-control w-100" >
          </div>
          <div class="input-group input-group-outline my-3">
            <label class="form-label">Deskripsi</label>
            <input type="text" style="text-align:right" id="desk" name="desk" class="form-control w-100" >
          </div>
          <div class="form-group mt-2">
            <a id="updp" onclick="pkt_simpan()" class="btn btn-sm p-2 btn-info w-100"><i class="fas fa-paper-plane"></i> Simpan</a>
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
function caripaket(urut){
  var scr=$('#scr');
  var ktc=$('#ktc');
  var cari=$('#cari').val();
  console.log(cari);
  ktc.html('<i class="fas fa-spinner fa-spin text-danger m-1"></i>')
  $.ajax({
    url   : 'paket.data.php',
    method: 'POST',
    data  : {cari:cari,urut:urut},
    success : function(data){
      scr.html(data);
      ktc.html('<i class="fas fa-search text-danger m-1"></i>')
    }
  })
}

$(document).ready(function() {
   caripaket('nama');
})

function pilihpaket(idpaket){
  $.ajax({
    url : 'fx.jamaah.php?pilihpaket',
    method : 'POST',
    data : {idpaket : idpaket},
    success : function(data){
      if(data==1){
        alert('Paket perjalanan berhasil dipilih');
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