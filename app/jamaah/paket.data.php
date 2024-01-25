<?php 
session_start();
require_once "fx.php";

$cari=isset($_POST['cari'])?addslashes($_POST['cari']):'';
$urut=$_POST['urut'];

$jc=mysqli_num_rows(mysqli_query($kon, "SELECT * from paket where nama like '%$cari%' or desk like '%$cari%' order by $urut asc"));
?>
<div class="row">
<div class="alert alert-success text-light font-weight-bold p-2 mx-2 w-75">
  Ditemukan <?=$jc;?>
</div>
<?php
$csql=mysqli_query($kon,"SELECT * from paket where nama like '%$cari%' or desk like '%$cari%' order by $urut asc");
while($j=mysqli_fetch_array($csql))
{

   $cj=mysqli_fetch_array(mysqli_query($kon,"SELECT * from jampaket where idjamaah='$_SESSION[us]' and idpaket='$j[idpaket]'"));
   if(isset($cj['idjampaket']))
   {
      $bg='bg-gradient-danger';
      $note='<span class="badge bg-danger text-white p-2">Terpilih</span><br>';
   }
   else
   {
      $bg='bg-gradient-info';
      $note='';
   }
  ?>
  <div class="col-lg-4 col-md-4 col-sm-12">
    <div class="card my-4 shadow-lg p-1">
      <div class="card-header p-0 position-relative mt-n mx-1 z-index-2">
        <div class="<?=$bg;?> shadow-primary border-radius-lg pt-2 pb-1">
          <div class="d-flex">
            <div class="dropdown">
              <a class="btn p-1 text-white font-weight-bold m-1 dropdown-toggle" role="button" id="dropmenu" data-bs-toggle="dropdown" aria-expanded="false"></a>
              <ul class="dropdown-menu" aria-labelledby="dropmenu">
                <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#jpkt<?=$j['idjamaah'];?>"><i class="fas fa-users"></i> <span class="text-right">Peserta</span> </a></li>
                
              </ul>
            </div>
            <div class="flex-grow-1">
              <b class="text-white text-capitalize p-1"><?=$j['nama'];?></b> 
            </div>
          </div>
           
        </div>
      </div>
      <div class="card-body p-1 mt-2" style="height:260px;overflow:auto">
      <?=$note;?>
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
      <?php 
      if(isset($cj['idjampaket']))
      {
         ?>

         <?php
      }
      else
      {
         ?>
         <div class="card-footer p-1">
            <a class="btn btn-sm btn-info w-100" onclick="pilihpaket('<?=$j['idpaket'];?>')">Pilih Paket</a>
         </div>
         <?php
      }
      ?>
      
    </div>
  </div>

  

  <?php
}
?>
</div>
