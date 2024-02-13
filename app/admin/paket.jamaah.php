<?php
include "nav.php";
$pkt=$_GET['idpaket'];
$p=mysqli_fetch_array(mysqli_query($kon,"SELECT * from paket where idpaket='$pkt'"));
?>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

<div class="row">
  <div class="col-12">
    <div class="card my-4">
      <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
        <div class="bg-gradient-info shadow-primary border-radius-lg pt-3 pb-2">
        <div class="row">
            <div class="col-8">
            <h6 class="text-white text-capitalize ps-3">Rombongan Peserta <?=$p['nama'];?><br>
          Keberangkatan : <?=date('d M Y',strtotime($p['brgkt']));?>
        </h6>
            </div>
            <div class="col-4" align="right">
               <a class="btn btn-light p-1 m-2" data-bs-toggle="modal" data-bs-target="#mftpeserta"><i class="fas fa-plus-circle"></i> Tambah Peserta</a> 
            </div>
          </div>
        </div>
      </div>
      <div class="card-body px-3 pb-2" style="height:80vh;overflow: auto;">
      	<div id="pktjam" class="table-responsive"></div>
      </div>
    </div>	
  </div>
</div>

<div class="modal fade" id="mftpeserta">
  <div class="modal-dialog modal-md modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header bg-gradient-info text-white font-weight-bold p-1">
        <div class="col-11">Tambah Peserta</div>
        <div class="col-1" align="right">
          <a data-bs-dismiss="modal" class="btn btn-dark btn-sm p-2 m-1"><i class="fas fa-times"></i></a>
        </div>
      </div>
      <div class="modal-body p-1">

        <form id="fmitra">
          <div class="input-group input-group-outline my-3">
            <label>Pilih Pelanggan</label><br>
            <select name="idjamaah[]" id="idjamaah" multiple="multiple" class="js-example-basic-multiple form-control" style="width: 100%;">
              <?php 
              $jam=mysqli_query($kon,"SELECT * from jamaah order by nama asc");
              while($j=mysqli_fetch_array($jam))
              {
                ?>
                <option value="<?=$j['hp'];?>"><?=$j['nama'].' ('.$j['ktpsim'].')';?></option>
                <?php
              }
              ?>
            </select>
          </div>
          <div class="form-group mt-2">
            <a id="updp" onclick="tambah_peserta()" class="btn btn-sm p-2 btn-info w-100"><i class="fas fa-paper-plane"></i> Simpan</a>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<?php
include "foot.php";
?>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
function pktjamdata(){
 
  $.ajax({
    url   : 'paket.jamaah.data.php',
    method: 'POST',
    data  : {idpaket:<?=$pkt;?>},
    success : function(data){
      $('#pktjam').html(data);
    }
  })
}

function tambah_peserta(){
idjamaah=$('#idjamaah').val(); 
 $.ajax({
   url   : 'fx.admin.php?tambah_peserta',
   method: 'POST',
   data  : {idpaket:<?=$pkt;?>,idjamaah:idjamaah},
   success : function(data){
    alert(data);
    pktjamdata();
    $('#mftpeserta').modal('hide');
    
   }
 })
}

function hapuspeserta(idjampaket,idjamaah){
  $.ajax({
   url   : 'fx.admin.php?hapus_peserta',
   method: 'POST',
   data  : {idjampaket:idjampaket,idjamaah:idjamaah},
   success : function(data){
    alert(data);
    pktjamdata();    
   }
 })
}
$(document).ready(function() {
   pktjamdata();
})

$(document).ready(function() {
    $('.js-example-basic-multiple').select2({
      dropdownParent: $("#mftpeserta")
    });
 
});
</script>