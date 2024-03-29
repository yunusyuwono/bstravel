<?php 
include "fx.admin.php";
?>
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css">
<table class="table table-striped table-hover table-bordered table-condensed table-sm" style="width:100%">
  <thead>
   <th>No.</th>
   <th>Aksi</th>
   <th>Nama</th>
   <th>Paket</th>
   <th>Kamar</th>
   <th>Tgl. Daftar</th>
   <th>Total Dibayar</th>
   <th>Total Biaya</th>
   <th>Sisa Pembayaran</th>
   <th>Pembayaran Terkirim</th>
   <th>Pembayaran Divalidasi</th>
   <th>Status</th>
   
  </thead>
  <tbody>
  <?php 
  $no=1;
  $jmp=mysqli_query($kon,"SELECT * from jampaket order by tgldaftar desc");
  while($m=mysqli_fetch_array($jmp))
  {
   $j=mysqli_fetch_array(mysqli_query($kon,"SELECT * from jamaah where hp='$m[idjamaah]'"));
   $p=mysqli_fetch_array(mysqli_query($kon,"SELECT * from paket where idpaket='$m[idpaket]'"));
   $b=mysqli_fetch_array(mysqli_query($kon,"SELECT *,sum(nominal) as ttlbayar from bayar where idjampaket='$m[idjampaket]' and status='valid'"));
   $bt=mysqli_num_rows(mysqli_query($kon,"SELECT * from bayar where idjampaket='$m[idjampaket]' and status='terkirim'"));
   $bv=mysqli_num_rows(mysqli_query($kon,"SELECT * from bayar where idjampaket='$m[idjampaket]' and status='valid'"));
   ?>
      <tr>
         <td align="center"><?=$no;?></td>
         <td>
            <div class="btn-group">
               <a href="bayar.paket?idpaket=<?=$m['idpaket'];?>&idjamaah=<?=$m['idjamaah'];?>" class="btn btn-primary" title="Tambah Pembayaran" ><i class="fas fa-plus"></i></a>

               <a onclick="grbdata('<?=$m['idjampaket'];?>','<?=$m['idjamaah'];?>')" class="btn btn-info" title="Rincian Pembayaran" data-bs-toggle="modal" data-bs-target="#modrb"><i class="fas fa-list"></i></a>

            </div>
         </td>
         <td><?=$j['nama'];?><br><small><?=$j['ktpsim'];?></small></td>
         <td><?=$p['nama'];?></td>
         <td><?=$m['kamar'];?><br><pre><?=number_format($m['hrg_kamar'],0,',','.');?></pre></td>
         <td align="center"><?=$m['tgldaftar'];?></td>
         <td align="right"><?=number_format($b['ttlbayar'],0,',','.');?></td>
         <td align="right"><?=number_format($p['biaya']+$m['hrg_kamar'],0,',','.');?></td>
         <td align="right"><?=number_format(($p['biaya']+$m['hrg_kamar']-$b['ttlbayar']),0,',','.');?></td>
         <td align="center"><?=$bt;?></td>
         <td align="center"><?=$bv;?></td>
         <?php 
         $sel=$p['biaya']-$b['ttlbayar'];
         if($sel==0)
         {
            $stb='Lunas';
         }
         ?>
         <td align="center"><?=isset($stb)?$stb:'Belum Lunas';?></td>
         
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