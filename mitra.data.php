<?php 
include "fx.admin.php";
?>
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css">
<table class="table table-striped table-hover table-bordered table-condensed table-sm" style="width:100%">
  <thead>
   <th>No.</th>
   <th>Aksi</th>
   <th>Nama</th>
   <th>No. HP</th>
   <th>Kode Referal</th>
   <th>Jml Afiliasi</th>
   <th>Status Akun</th>
   <th>Terdaftar</th>
  </thead>
  <tbody>
  <?php 
  $no=1;
  $jmp=mysqli_query($kon,"SELECT * from admuser where lvl='mitra' order by nama asc");
  while($m=mysqli_fetch_array($jmp))
  {
   $jaf=mysqli_num_rows(mysqli_query($kon,"SELECT * from jamaah where kodeaff='$m[aff]'"));
   ?>
      <tr>
         <td align="center"><?=$no;?></td>
         <td>
            <div class="btn-group">
               <a onclick="edit_mitra('<?=$m['idadmus'];?>')" class="btn btn-primary" title="Edit Mitra" data-bs-toggle="modal" data-bs-target="#modtb"><i class="fas fa-edit"></i></a>
               <a onclick="hapus_mitra('<?=$m['idadmus'];?>')" class="btn btn-danger" title="Hapus Mitra"><i class="fas fa-trash"></i></a>
            </div>
         </td>
         <td><?=$m['nama'];?></td>
         <td align="center"><?=$m['hp'];?></td>
         <td align="center"><?=$m['aff'];?></td>
         <td align="center">
            <?php 
            if($jaf==0)
            {
                echo $jaf;
            }
            else
            {
                ?>
                <a onclick="plg_mitra('<?=$m['aff'];?>')" class="btn btn-link" data-bs-toggle="modal" data-bs-target="#mtrlist"><?=$jaf;?></a>
                <?php
            }
            ?>
         </td>
         <td align="center"><?=$m['status'];?></td>
         <td align="center"><?=$m['entri'];?></td>
         
      </tr>
   <?php
   $no++;
  }
  ?>
    
  </tbody>
</table>
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>

  <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>
  <script>
    // var win = navigator.platform.indexOf('Win') > -1;
    // if (win && document.querySelector('#sidenav-scrollbar')) {
    //   var options = {
    //     damping: '0.5'
    //   }
    //   Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    // }
    new DataTable('.table');
  </script>