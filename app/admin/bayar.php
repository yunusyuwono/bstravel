<?php
include "nav.php";
?>
<div class="row">
  <div class="col-12">
    <div class="card my-4">
      <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
        <div class="bg-gradient-info shadow-primary border-radius-lg pt-3 pb-2">
          <h6 class="text-white text-capitalize ps-3">Pembayaran</h6>
        </div>
      </div>
      <div class="card-body px-1 pb-2" style="height:80vh;overflow: auto;">
      	<div class="table-responsive" id="bayardata">
          
        </div>
      </div>
    </div>	
  </div>
</div>

<div class="modal fade" id="modrb">
   <div class="modal-dialog modal-lg">
      <div class="modal-content">
         <div class="modal-header bg-gradient-info text-white font-weight-bold p-2">
          <div class="col-11">
            Rincian Pembayaran
          </div>
          <div class="col-1" align="right">
            <a class="btn btn-dark btn-sm p-2 m-1" data-bs-dismiss="modal" onclick="byrdata();"><i class="fas fa-2x  fa-times"></i></a>
          </div>
        </div>
         <div class="modal-body p-3" id="grb">
            
         </div>
         <div class="modal-footer"></div>
      </div>
   </div>
</div>
<?php
include "foot.php";
?>
<script>
function byrdata(){
  $.ajax({
    url   : 'bayar.data.php',
    success : function(data){
      $('#bayardata').html(data);
    }
  })
}

$(document).ready(function() {
   byrdata();
})

function grbdata(idjampaket){
   //console.log(idjampaket+' '+idjamaah);
   $.ajax({
    url   : 'bayar.data.rincian.php',
    method: 'post',
    data  : {idjampaket:idjampaket},
    success : function(data){
      $('#grb').html(data);
    }
  })  
}

function valnow(idbayar,idjampaket){
   $.ajax({
      url   : 'bayar.valid.php',
      method : 'post',
      data  : {idbayar:idbayar},
      success : function(data){
         alert('Pembayaran berhasil divalidasi');
         grbdata(idbayar,idjampaket);
      }
   })
}
</script>