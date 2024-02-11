<div class="row">
<?php 
require_once "fx.php";

$cari=isset($_POST['cari'])?addslashes($_POST['cari']):'';
$urut=$_POST['urut'];

$jc=mysqli_num_rows(mysqli_query($kon, "SELECT * from jamaah where nama like '%$cari%' or hp like '%$cari%' or ktpsim like '%$cari%' order by $urut asc"));
?>
<div class="alert alert-success text-light font-weight-bold p-2 mx-2 w-75">
  Ditemukan <?=$jc;?>
</div>
<?php
$csql=mysqli_query($kon,"SELECT * from jamaah where nama like '%$cari%' or hp like '%$cari%' or ktpsim like '%$cari%' order by $urut asc");
while($j=mysqli_fetch_array($csql))
{
  ?>
  <div class="col-lg-4 col-md-4 col-sm-12">
    <div class="card my-4 shadow-sm p-1">
      <div class="card-header p-0 position-relative mt-n mx-1 z-index-2">
        <div class="bg-gradient-info shadow-primary border-radius-lg pt-2 pb-1">
          <div class="d-flex">
            <div class="dropdown">
              <a class="btn p-1 text-white font-weight-bold m-1 dropdown-toggle" role="button" id="dropmenu" data-bs-toggle="dropdown" aria-expanded="false"></a>
              <ul class="dropdown-menu" aria-labelledby="dropmenu">
                <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#jpro<?=$j['idjamaah'];?>"><i class="fas fa-user"></i> <span class="text-right">Profil</span></a></li>
                <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#jpkt<?=$j['idjamaah'];?>"><i class="fas fa-plane"></i> <span class="text-right">Paket dipilih</span> </a></li>
                <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#jep<?=$j['idjamaah'];?>"><i class="fas fa-user-cog"></i> <span class="text-right">Edit Profil</span> </a></li>
                <li><a class="dropdown-item text-danger" href="fx.admin?hapusplg&idplg=<?=$j['idjamaah']?>"><i class="fas fa-trash"></i> <span class="text-right">Hapus</span>
                </a></li>
              </ul>
            </div>
            <div class="flex-grow-1">
              <b class="text-white text-capitalize p-1"><?=$j['nama'];?></b> 
            </div>
          </div>
           
        </div>
      </div>
      <div class="card-body p-1 mt-2">
        <div class="row">
          <div class="col-lg-4 col-md-4 col-sm-4 col-4">
            <?php 
            if($j['foto']!='')
             {
                ?>
                <img src="../../assets/jamaah/foto/<?=$j['foto'];?>" class="img-thumbnail shadow-lg"  style="width:100%;height: 100px;">
                <?php
             }
             else
             {
                ?>
                <img src="https://img.freepik.com/premium-vector/user-customer-avatar-vector-illustration_276184-160.jpg" class="img-thumbnail shadow-lg"  style="width:100%;height: 100px;">
                <?php
             }
            ?>
          </div>
          <div class="col-lg-8 col-md-8 col-sm-8 col-8" align="right">
            <small>No. KTP/SIM<br>
            <b class=""><?=$j['ktpsim'];?></b></small><br>
            <small>No. HP<br>
            <b class=""><?=$j['hp'];?></b> </small>
            
          </div>  
        </div>
        
      </div>
    </div>
  </div>

  <div class="modal fade" id="jpkt<?=$j['idjamaah'];?>">
    <div class="modal-dialog modal-lg modal-scrollable">
      <div class="modal-content">
        <div class="modal-header bg-gradient-info text-white font-weight-bold p-2">
          <div class="col-11">
            Paket dipilih oleh <?=$j['nama'];?>
          </div>
          <div class="col-1" align="right">
            <a class="btn btn-dark btn-sm p-2 m-1" data-bs-dismiss="modal"><i class="fas fa-2x  fa-times"></i></a>
          </div>
        </div>
        <div class="modal-body p-3">

        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="jpro<?=$j['idjamaah'];?>">
    <div class="modal-dialog modal-lg modal-scrollable">
      <div class="modal-content">
        <div class="modal-header bg-gradient-info text-white font-weight-bold p-2">
          <div class="col-9">
            Profil <?=$j['nama'];?>
          </div>
          <div class="col-3" align="right">
          <a class="btn btn-light btn-sm p-2 m-1" href="pelanggan.profil?idj=<?=$j['idjamaah'];?>">Detail Profil</a>  
          <a class="btn btn-dark btn-sm p-2 m-1" data-bs-dismiss="modal"><i class="fas fa-2x  fa-times"></i></a>
          </div>
        </div>
        <div class="modal-body p-3">
          <div class="row justify-content-between">
            <div class="col-lg-3 col-md-3">
               <?php
               if($j['foto']!='')
               {
                  ?>
                  <img src="../../assets/jamaah/foto/<?=$j['foto'];?>" class="img-thumbnail shadow-lg" style="height:200px">
                  <?php
               }
               else
               {
                  ?>
                  <img src="https://img.freepik.com/premium-vector/user-profile-icon-flat-style-member-avatar-vector-illustration-isolated-background-human-permission-sign-business-concept_157943-15752.jpg?size=338&ext=jpg&ga=GA1.1.1826414947.1705190400&semt=ais" class="img-thumbnail shadow-lg" style="height:100px">
                  <?php
               }
               ?>
            </div>
            <div class="col-lg-9 col-md-9">
              <div class="row justify-content-between">
                <div class="col-lg-3 col-md-4 col-11">
                   Nama Lengkap
                </div> 
                <div class="col-lg-1 col-md-1 col-1" align="right">
                   :
                </div>
                <div class="col-lg-8 col-md-7 col-sm-12" align="left" style="border-bottom:1px dashed #33f;padding-bottom:2px;">
                   <b><?=$j['nama'];?></b>
                </div> 

                <div class="col-lg-3 col-md-4 col-11">
                   Jenis Kelamin
                </div> 
                <div class="col-lg-1 col-md-1 col-1" align="right">
                   :
                </div>
                <div class="col-lg-8 col-md-7 col-sm-11" align="left" style="border-bottom:1px dashed #33f;padding-bottom:2px;">
                   <b><?=$j['jk'];?></b>
                </div> 

                <div class="col-lg-3 col-md-4 col-11">
                   Tempat Lahir
                </div> 
                <div class="col-lg-1 col-md-1 col-1" align="right">
                   :
                </div>
                <div class="col-lg-8 col-md-7 col-sm-11" align="left" style="border-bottom:1px dashed #33f;padding-bottom:2px;">
                   <b><?=$j['tmplahir'];?></b>
                </div> 

                <div class="col-lg-3 col-md-4 col-11">
                   Tanggal Lahir
                </div> 
                <div class="col-lg-1 col-md-1 col-1" align="right">
                   :
                </div>
                <div class="col-lg-8 col-md-7 col-sm-11" align="left" style="border-bottom:1px dashed #33f;padding-bottom:2px;">
                   <b><?=$j['tgllahir'];?></b>
                </div> 

                <div class="col-lg-3 col-md-4 col-11">
                   No. KTP/SIM
                </div> 
                <div class="col-lg-1 col-md-1 col-1" align="right">
                   :
                </div>
                <div class="col-lg-8 col-md-7 col-sm-11" align="left" style="border-bottom:1px dashed #33f;padding-bottom:2px;">
                   <b><?=$j['ktpsim'];?></b>
                </div> 

                <div class="col-lg-3 col-md-4 col-11">
                   Pekerjaan
                </div> 
                <div class="col-lg-1 col-md-1 col-1" align="right">
                   :
                </div>
                <div class="col-lg-8 col-md-7 col-sm-11" align="left" style="border-bottom:1px dashed #33f;padding-bottom:2px;">
                   <b><?=$j['pekerjaan'];?></b>
                </div> 

                <div class="col-lg-3 col-md-4 col-11">
                   Alamat
                </div> 
                <div class="col-lg-1 col-md-1 col-1" align="right">
                   :
                </div>
                <div class="col-lg-8 col-md-7 col-sm-11" align="left" style="border-bottom:1px dashed #33f;padding-bottom:2px;">
                   <b><?=$j['alamat'];?></b>
                </div> 

                <div class="col-lg-3 col-md-4 col-11">
                   Kabupaten/Kota
                </div> 
                <div class="col-lg-1 col-md-1 col-1" align="right">
                   :
                </div>
                <div class="col-lg-8 col-md-7 col-sm-11" align="left" style="border-bottom:1px dashed #33f;padding-bottom:2px;">
                   <b><?=$j['kabkota'];?></b>
                </div> 

                <div class="col-lg-3 col-md-4 col-11">
                   Kode Pos
                </div> 
                <div class="col-lg-1 col-md-1 col-1" align="right">
                   :
                </div>
                <div class="col-lg-8 col-md-7 col-sm-11" align="left" style="border-bottom:1px dashed #33f;padding-bottom:2px;">
                   <b><?=$j['pos'];?></b>
                </div> 

                <div class="col-lg-3 col-md-4 col-11">
                   No. HP
                </div> 
                <div class="col-lg-1 col-md-1 col-1" align="right">
                   :
                </div>
                <div class="col-lg-8 col-md-7 col-sm-11" align="left" style="border-bottom:1px dashed #33f;padding-bottom:2px;">
                   <b><?=$j['hp'];?></b>
                </div> 

                <div class="col-lg-3 col-md-4 col-11">
                   Email
                </div> 
                <div class="col-lg-1 col-md-1 col-1" align="right">
                   :
                </div>
                <div class="col-lg-8 col-md-7 col-sm-11" align="left" style="border-bottom:1px dashed #33f;padding-bottom:2px;">
                   <b><?=$j['email'];?></b>
                </div> 

                <div class="col-lg-3 col-md-4 col-11">
                   Ahli Waris
                </div> 
                <div class="col-lg-1 col-md-1 col-1" align="right">
                   :
                </div>
                <div class="col-lg-8 col-md-7 col-sm-11" align="left" style="border-bottom:1px dashed #33f;padding-bottom:2px;">
                   <b><?=$j['ahliwaris'];?> | <?=$j['hubwaris'];?></b>
                </div> 

                <div class="col-lg-3 col-md-4 col-11">
                   Perlengkapan
                </div> 
                <div class="col-lg-1 col-md-1 col-1" align="right">
                   :
                </div>
                <div class="col-lg-8 col-md-7 col-sm-11" align="left" style="border-bottom:1px dashed #33f;padding-bottom:2px;">
                   <b><?=$j['perlengkapan'];?></b>
                </div> 
              </div>  
            </div>
            
         </div>
        </div>
      </div>
    </div>
  </div>
  <?php
}
?>
</div>
