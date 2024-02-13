<?php
include "nav.php";
?>
<div class="row">
  <div class="col-12">
    <div class="card my-4">
      <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
        <div class="bg-gradient-info shadow-primary border-radius-lg pt-3 pb-2">
          <h6 class="text-white text-capitalize ps-3">Laporan Manifes</h6>
        </div>
      </div>
      <div class="card-body px-3 pb-2" style="height:80vh;overflow: auto;">
      	<form action="" id="pickpaket">
            <label>Pilih Paket Perjalanan</label>
            <div class="row">
              <div class="col-lg-9">
                <select name="idpaket" id="idpaket" class="form-control">
                    <?php 
                    $paket=mysqli_query($kon,"SELECT * from paket order by brgkt desc");
                    while($p=mysqli_fetch_array($paket))
                    {
                        $jpes=mysqli_num_rows(mysqli_query($kon,"SELECT * from jampaket where idpaket='$p[idpaket]'"));
                        ?>
                        <option value="<?=$p['idpaket'];?>"><?=date('d-m-Y',strtotime($p['brgkt'])).' | '.$p['nama'].' ( '.$jpes.' )';?> </option>
                        <?php
                    }
                    ?>
                </select>
              </div>
              <div class="col-lg-1">
                <a onclick="manifes()" class="btn btn-info w-100" id="kirim"><i class="fas fa-paper-plane"></i></a>
              </div>
              <div class="col-lg-1">
                <a onclick="cetak_manifes()" style="display: none;" class="btn btn-warning w-100" id="cetak"><i class="fas fa-print"></i></a>
              </div>
              <div class="col-lg-1">
                <a onclick="xls_manifes()" style="display: none;" class="btn btn-success w-100" id="xls"><i class="fas fa-file-excel"></i></a>
              </div>
            </div>
        </form>

        <div id="listmanifes" class="table-responsive"></div>
      </div>
    </div>	
  </div>
</div>
<?php
include "foot.php";
?>
<script>
function manifes(){
    idpaket=$('#idpaket').val();
    $.ajax({
        url : 'laporan.manifes.data.php',
        method : 'post',
        data : {idpaket:idpaket},
        success:function(data){
            $('#listmanifes').html(data);
            $('#cetak').show();
            $('#xls').show();
        }
    })
}

function cetak_manifes(){
    idpaket=$('#idpaket').val();
    window.open('laporan.manifes.cetak?idpaket='+idpaket,'_blank');
}

function xls_manifes(){
    idpaket=$('#idpaket').val();
    window.open('laporan.manifes.xls?idpaket='+idpaket,'_blank');
}

</script>