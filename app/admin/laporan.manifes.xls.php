<?php 
include "fx.admin.php";
$pkt=mysqli_fetch_array(mysqli_query($kon,"SELECT * from paket where idpaket='$_GET[idpaket]'"));
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Laporan Manifes ".$pkt['brgkt'].'-'.$pkt['nama'].".xls");

?>
<table border="0">
<tr>
        <td colspan="5"><?=$pkt['nama'];?></td>
    </tr>
    <tr>
        <td colspan="5">Keberangkatan : <?=$pkt['brgkt'];?></td>
    </tr>
</table>
<table class="table" border="1" style="width:100%">
  <thead>
    
    <tr>
        <th style="background-color: #ddd;" rowspan="2">No.</th>
        <th style="background-color: #ddd;" rowspan="2">Name</th>
        <th style="background-color: #ddd;" rowspan="2">Rekanan</th>
        <th style="background-color: #ddd;" rowspan="2">Gen</th>
        <th style="background-color: #ddd;" colspan="3">Detail of Birth</th>
        <th style="background-color: #ddd;" colspan="4">Detail of Passport</th>
        <th style="background-color: #ddd;" rowspan="2">NIK</th>
        <th style="background-color: #ddd;" rowspan="2">Relation</th>
    </tr>
    <tr>
        <th  style="background-color: #ddd;">AGE</th>
        <th  style="background-color: #ddd;">Place of Birth</th>
        <th  style="background-color: #ddd;">Date of Birth</th>
        <th  style="background-color: #ddd;">Issuing Office</th>
        <th  style="background-color: #ddd;">No. Passport</th>
        <th  style="background-color: #ddd;">Date of Issue</th>
        <th  style="background-color: #ddd;">Date of Expiry</th>
    </tr>
  </thead>
  <tbody>
  <?php 
  $no=1;
  $jmp=mysqli_query($kon,"SELECT * from jampaket where idpaket='$_GET[idpaket]'");
  while($m=mysqli_fetch_array($jmp))
  {
    $fj=mysqli_fetch_array(mysqli_query($kon,"SELECT * from jamaah where hp='$m[idjamaah]'"));
    $nama=$fj['nama'];
    $ortu=$fj['ortu'];
    $namax=explode(" ",$nama);
    if(count($namax)==3 || count($namax)==4){
      $nmpaspor=$nama;
    }
    elseif(count($namax)<=2){
      $ortux=explode("/",$ortu);
      $ayah=$ortux[0];
      $ibu=$ortux[1];

      if(count($namax)==2)
      {
          $nmpaspor=$nama.' '.$ayah;
      }
      elseif(count($namax)==1)
      {
          $nmpaspor=$nama.' '.$ayah.' '.$ibu;
      }
    }
   ?>
    <td align="center" style="text-transform:uppercase"><?=$no;?></td>
    <td align="center" style="text-transform:uppercase"><?=$nmpaspor;?></td>
    <td align="center" style="text-transform:uppercase">CAB BENGKULU</td>
    <td align="center" style="text-transform:uppercase"><?php 
    if($fj['jk']=='Laki-laki')
    {
      $gen='MR';
    }
    elseif($fj['jk']=='Perempuan')
    {
      $gen='MRS'; 
    }
    echo $gen;
    ?></td>
    <td align="center" style="text-transform:uppercase">
    <?php 
    $tglhr=$fj['tgllahir'];
    $tglhrx=explode("-",$tglhr);
    //get age from date or birthdate
    $age = (date("md", date("U", mktime(0, 0, 0, $tglhrx[2], $tglhrx[1], $tglhrx[0]))) > date("md")
      ? ((date("Y") - $tglhrx[0]) - 1)
      : (date("Y") - $tglhrx[0]));
      echo $age;
    ?>
    </td>
    <td align="center" style="text-transform:uppercase">
      <?=$fj['tmplahir'];?>
    </td>
    <td align="center" style="text-transform:uppercase">
      <?php 
      $y=$tglhrx[0];
      $m=$tglhrx[1];
      $d=$tglhrx[2];
      switch($m){
        case 1:
          $mb='Januari';
          break;
        case 2:
          $mb='Februari';
          break;
        case 3:
          $mb='Maret';
          break;
        case 4:
          $mb='April';
          break;
        case 5:
          $mb='Mei';
          break;
        case 6:
          $mb='Juni';
          break;
        case 7:
          $mb='Juli';
          break;
        case 8:
          $mb='Agustus';
          break;
        case 9:
          $mb='September';
          break;
        case 10:
          $mb='Oktober';
          break;
        case 11:
          $mb='November';
          break;
        case 12:
          $mb='Desember';
          break;
      }

      $dmy=$d.' '.$mb.' '.$y;
      echo $dmy;
      ?>
    </td>
    
    
    <td align="center" style="text-transform:uppercase">BENGKULU</td>
    <td align="center" style="text-transform:uppercase"><?=$fj['nopaspor'];?></td>
    <td align="center" style="text-transform:uppercase"><?=$fj['doi'];?></td>
    <td align="center" style="text-transform:uppercase"><?=$fj['doe'];?></td>
    <td align="center" style="text-transform:uppercase"><?=$fj['ktpsim'];?></td>
    <td align="center" style="text-transform:uppercase"><?=$fj['relasi'];?></td>
    </tr>
   <?php
   $no++;
  }
  ?>
    
  </tbody>
</table>