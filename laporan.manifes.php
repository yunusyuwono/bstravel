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
            <div class="input-group">
            <select name="idpaket" id="idpaket" class="form-control form-control-sm">
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
                <div class="input-group-append">
                    <a onclick="manifes()" class="btn btn-success" id="kirim"><i class="fas fa-paper-plane"></i></a>
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
        }
    })
}
</script>