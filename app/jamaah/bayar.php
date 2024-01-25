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
      <div class="card-body px-3 pb-2" style="height:80vh;overflow: auto;">
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
    </div>	
  </div>
</div>
<?php
include "foot.php";
?>