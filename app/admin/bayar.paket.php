<?php
include "nav.php";
$idpaket=$_GET['idpaket'];
$idjamaah=$_GET['idjamaah'];
$p=mysqli_fetch_array(mysqli_query($kon,"SELECT *,paket.idpaket as idpaket from paket join jampaket on paket.idpaket=jampaket.idpaket where paket.idpaket='$idpaket' and idjamaah='$idjamaah'"));
$jam=mysqli_fetch_array(mysqli_query($kon,"SELECT * FROM jamaah where hp='$idjamaah'"));
$b=mysqli_fetch_array(mysqli_query($kon,"SELECT sum(nominal) as jumnom FROM bayar where idjampaket='$p[idjampaket]' and status='valid'"));
$c=mysqli_num_rows(mysqli_query($kon,"SELECT * FROM bayar where idjampaket='$p[idjampaket]' and status='valid'"));
?>
<div class="row">
  <div class="col-12">
    <div class="card my-4">
      <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
        <div class="bg-gradient-info shadow-primary border-radius-lg pt-3 pb-2">
            <div class="row">
                <div class="col-lg-8">
                    <h6 class="text-white text-capitalize ps-3">Pembayaran Paket <?=$p['nama'];?><br>
                Pelanggan : <?=$jam['nama'];?></h6>
                </div>
                <div class="col-lg-4" align="right">
                    <a class="btn btn-light p-1 m-2" href="bayar"><i class="fas fa-caret-left"></i> Kembali</a> 
                </div>    
            </div>
        </div>
      </div>
      <div class="card-body px-3 pb-2" style="height:80vh;overflow: auto;">
      	<div class="row">
            <div class="col-lg-6">
                <form action="fx.admin.php?uplbukti" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-6">
                            Total Biaya
                        </div>
                        <div class="col-6" align="right" style="border-bottom:1px solid ">
                            <b>Rp. <?=number_format($p['biaya'],0,',','.');?></b>
                        </div>
                        <div class="col-6">
                            Total Terbayarkan (Valid)
                        </div>
                        <div class="col-6" align="right" style="border-bottom:1px solid ">
                            <b>Rp. <?=number_format($b['jumnom'],0,',','.');?></b>
                        </div>
                        <div class="col-6">
                            Sisa Pembayaran
                        </div>
                        <div class="col-6" align="right" style="border-bottom:1px solid ">
                            <b>Rp. <?=number_format(($p['biaya']-$b['jumnom']),0,',','.');?></b>
                        </div>
                        <br>
                        <div class="col-lg-12">
                            <b>Pembayaran ke <?=$c+1;?></b>
                            <form action="fx.jamaah.php?bayar">
                                    <input type="hidden" name="idjamaah" value="<?=$idjamaah;?>">
                                    <input type="hidden" name="idpaket" value="<?=$idpaket;?>">
                                    <input type="hidden" name="idjampaket" value="<?=$p['idjampaket']?>">
                                    <input type="hidden" name="bayarke" value="<?=$c+1;?>">
                                    <input type="hidden" name="idpaket" value="<?=$p['idpaket']?>">
                                <div class="input-group input-group-outline my-3">
                                    <label class="form-label">Nominal Pembayaran <small>(Hanya angka)</small></label>
                                    <input type="number" style="text-align: right;" name="nominal" id="nominal" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label>Bukti Pembayaran</label>
                                    <input type="file" name="bukti" id="bukti" accept="image/*" class="form-control" placeholder="Bukti Pembayaran" required style="border:1px solid gray">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Rekening Tujuan</label>
                                    <select class="form-control" style="border:1px solid gray" name="rektu" required id="rektu">
                                        <option value="Tunai">Tunai</option>    
                                        <option value="11212">Mandiri 11212 YY</option>
                                    </select>
                                </div>
                                <div class="form-group mt-2">
                                    <button name="kirim" class="btn btn-info btn-sm w-100">Kirim</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    
                </form>
            </div>
            <div class="col-lg-6">
                <div class="card card-body shadow-sm p-1">
                    <b>Riwayat Pembayaran</b>
                    <div class="list-group">
                        <?php 
                        $bay=mysqli_query($kon,"SELECT * from bayar where idjampaket='$p[idjampaket]' order by idbayar desc");
                        while($a=mysqli_fetch_array($bay))
                        {
                            ?>
                            <div class="list-group-item">
                                <div class="row">
                                    <div class="col-8">
                                        Pembayaran ke-<?=$a['bayarke'].' .'.number_format($a['nominal']);?><br>
                                        <small><?=$a['entri'];?> | Status : <?=$a['status'];?></small>
                                    </div>
                                    <div class="col-4">
                                        <a class="btn btn-sm btn-success w-100" href="../../assets/jamaah/bb/<?=$a['bukti'];?>" target="_blank">Bukti</a>
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
  </div>
</div>
<?php
include "foot.php";
?>