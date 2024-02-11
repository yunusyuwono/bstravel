<?php 
require_once "../../config/conn.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!--====== Required meta tags ======-->
  <meta charset="utf-8" />
  <meta http-equiv="x-ua-compatible" content="ie=edge" />
  <meta name="description" content="" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

  <!--====== Title ======-->
  <title>Bahana Sukses Sejahtera Travel</title>

  <!--====== Favicon Icon ======-->
  
  <!--====== Bootstrap css ======-->
  <link rel="stylesheet" href="../../assets/css/bootstrap.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body style="background-image:url(https://static.vecteezy.com/system/resources/thumbnails/006/262/477/small/white-abstract-background-backdrop-for-presentation-design-for-website-free-photo.jpg);background-repeat:repeat-y; background-size:cover;">

  <!--====== NAVBAR NINE PART START ======-->

  <section class="navbar-area navbar-nine">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <nav class="navbar navbar-expand-lg">
            <a class="navbar-brand" href="index.html">
              <img src="https://bs-travel.id/wp-content/uploads/2023/12/Logo-BST-Final.png" height="70">
            </a>
            
            </div>
          </nav>
        </div>
      </div>
      <!-- row -->
    </div>
    <!-- container -->
  </section>
  <div class="row justify-content-center">
  <div class="col-lg-6">
    <div class="card my-4">
      <div class="card-header">
        <h6 class="text-dark text-capitalize ps-3">Login Admin</h6>
      </div>
      <div class="card-body px-3 pb-2">
        <form id="fma">
            <div class="form-group mt-2">
                <label>Username</label>
                <input type="text" required name="username" class="form-control" id="username">
            </div>
            <div class="form-group mt-2">
                <label>Kata sandi</label>
                <input type="password" required name="password" class="form-control" id="password">
            </div>
            <div class="form-group mt-4 pb-4" align="center">
                <a id="btnmasuk" onclick="masuk()" class="btn btn-sm btn-primary"><i class="fas fa-sign-in-alt"></i> Masuk</a><br>
            </div>
        </form>
      </div>
    </div>	
  </div>
</div>
<?php
include "foot.php";
?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="../../assets/js/toastr_config.js"></script>
<script type="text/javascript">
function masuk(){
  fm=$('#fma').serialize();
  $('#btnotp').html('<i class="fas fa-spinner fa-spin"></i>');
  $.ajax({
      url   : 'fx.admin.php?login',
      method: 'POST',
      data  : fm,
      success : function(data){
        m=JSON.parse(data);
        //console.log(data);
        if(m.kode==1)
        {
          toastr.success(m.konten);
          window.location.href='./';
        }
        else
        {
          toastr.error(m.konten);
        }
        $('#btnotp').html('<i class="fas fa-sign-in-alt"></i> Masuk');
      } 
    })
}
</script>