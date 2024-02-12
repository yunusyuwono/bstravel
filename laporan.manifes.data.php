<?php 
include "fx.admin.php";
echo $_POST['idpaket'];
?>
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css">
<table class="table table-striped table-hover table-bordered table-condensed table-sm" style="width:100%">
  <thead>
    <tr>
        <th rowspan="2">No.</th>
        <th rowspan="2">Name</th>
        <th rowspan="2">Rekanan</th>
        <th rowspan="2">Gen</th>
        <th colspan="3">Detail of Birth</th>
        <th colspan="4">Detail of Passport</th>
        <th rowspan="2">NIK</th>
        <th rowspan="2">Relation</th>
    </tr>
    <tr>
        <th>AGE</th>
        <th>Place of Birth</th>
        <th>Date of Birth</th>
        <th>Issuing Office</th>
        <th>No. Passport</th>
        <th>Date of Issue</th>
        <th>Date of Expiry</th>
    </tr>
  </thead>
  <tbody>
  <?php 
  $no=1;
  $jmp=mysqli_query($kon,"SELECT * from jampaket where idpaket='$_POST[idpaket]'");
  while($m=mysqli_fetch_array($jmp))
  {
   
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