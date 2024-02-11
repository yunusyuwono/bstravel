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
              <h6 class="text-white text-capitalize ps-3">Mitra</h6>
            </div>
            <div class="col-8" align="right">
               <a class="btn btn-light p-1 m-2" data-bs-toggle="modal" data-bs-target="#mftmitra"><i class="fas fa-plus-circle"></i> Tambah Mitra</a> 
            </div>
          </div>
        </div>
      </div>
      <div class="card-body px-3 pb-2" style="height:80vh;overflow: auto;">
      	<div id="mitra">

        </div>
      </div>
    </div>	
  </div>
</div>

<div class="modal fade" id="mftmitra">
  <div class="modal-dialog modal-md modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header bg-gradient-info text-white font-weight-bold p-1">
        <div class="col-11">Tambah Mitra</div>
        <div class="col-1" align="right">
          <a data-bs-dismiss="modal" class="btn btn-dark btn-sm p-2 m-1"><i class="fas fa-times"></i></a>
        </div>
      </div>
      <div class="modal-body p-1">

        <form id="fmitra">
          <div class="input-group input-group-outline my-3">
            <label class="form-label">Nama Lengkap</label>
            <input type="text" style="text-align:right" id="nama" name="nama" class="form-control" >
          </div>
          <div class="input-group input-group-outline my-3">
            <label class="form-label">No.HP (08xxxxxxxxx)</label>
            <input type="text" style="text-align:right" id="hp" name="hp" class="form-control" >
          </div>
          <div class="input-group input-group-outline my-3">
            <label>Status</label>
            <select name="status" id="status" class="form-control w-100">
              <option value="aktif" > Aktif</option>
              <option value="nonaktif" > Nonaktif</option>  
            </select>
          </div>
          <div class="form-group mt-2">
            <a id="updp" onclick="mitra_simpan()" class="btn btn-sm p-2 btn-info w-100"><i class="fas fa-paper-plane"></i> Simpan</a>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="mtrlist">
  <div class="modal-dialog modal-md modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header bg-gradient-info text-white font-weight-bold p-1">
        <div class="col-11">List Referal</div>
        <div class="col-1" align="right">
          <a data-bs-dismiss="modal" class="btn btn-dark btn-sm p-2 m-1"><i class="fas fa-times"></i></a>
        </div>
      </div>
      <div class="modal-body p-1" id="plglist">

      </div>
    </div>
  </div>
</div>
<?php
include "foot.php";
?>
<script>
function mitradata(){
  $.ajax({
    url   : 'mitra.data.php',
    success : function(data){
      $('#mitra').html(data);
    }
  })
}

$(document).ready(function() {
   mitradata();
})

function plg_mitra(aff){
    $.ajax({
        url : 'mitra.plg.php',
        method : 'post',
        data : {aff : aff},
        success : function(data){
            $('#plglist').html(data);
        }    
    })
}

function mitra_simpan(){
  var fmitra=$('#fmitra').serialize();
  $.ajax({
    url   : 'fx.admin.php?tambahmitra',
    method : 'POST',
    data : fmitra,
    success : function(data){
      if(data==1)
      {
        alert('Mitra berhasil ditambahkan');
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