<?php 
include "fx.admin.php";
if(isset($_GET['idbayar']))
{
	$idbayar = $_GET['idbayar'];
    $idjampaket=$_GET['idjampaket'];
	$cek=mysqli_fetch_array(mysqli_query($kon,"SELECT * from bayar where idbayar='$idbayar' and idjampaket='$idjampaket'"));
    if(isset($cek))
    {
        ?>
        <table style="width: 100%;">
            <tr>
                <td align="left">
                    <b>PT. BAHANA SUKSES SEJAHTERA</b><br>
                    Jl. Merapi No. 75, Panorama, Singaran Pati, Kota Bengkulu Kode Pos 38221
                </td>
            </tr>
            <tr>
                <td align="center">
                    <h3>INVOICE</h3>
                </td>
            </tr>
        </table>

        <?php
        $jp=mysqli_fetch_array(mysqli_query($kon,"SELECT * from jampaket where idjampaket='$cek[idjampaket]'"));
        $p=mysqli_fetch_array(mysqli_query($kon,"SELECT * from paket where idpaket='$jp[idpaket]'"));
        $j=mysqli_fetch_array(mysqli_query($kon,"SELECT * from jamaah where hp='$jp[idjamaah]'"));

        ?>
    <body onload="window.print();">
        <table style="width:100%">
            <tr>
                <td width="200">Paket yang diambil </td>
                <td>:</td>
                <td align="right" width="200"><?=$p['nama'];?></td>
                <td width="50"></td>
                <td>Nama</td>
                <td>:</td>
                <td><?=$j['nama'];?></td>
            </tr>
            <tr>
                <td width="200">Room </td>
                <td>:</td>
                <td align="right" width="200"><?=$jp['kamar'];?></td>
            </tr>
            <tr>
                <td width="200">Harga Paket </td>
                <td>:</td>
                <td align="right" width="200"><?=number_format($jp['hrg_kamar']+$p['biaya'],0,',','.');?></td>
            </tr>
            <tr>
                <td width="200">Tgl. Keberangkatan </td>
                <td>:</td>
                <td align="right" width="200"><?=date('d M Y',strtotime($p['brgkt']));?></td>
            </tr>
        </table>
        <i>Telah terima pembayaran dengan rincian sebagai berikut :</i>
        <table border="1" style="width: 100%;">
        <thead>
            <tr>
                <td rowspan="2">No.</td>
                <td rowspan="2">Tanggal</td>
                <td rowspan="2">Keterangan</td>
                <td colspan="2">Pembayaran</td>
            </tr>
            <tr>
                <td align="center">Transfer/Cash</td>
                <td align="center">IDR</td>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1.</td>
                <td><?=$cek['entri'];?></td>
                <td>Pembayaran Ke-<?=$cek['bayarke'];?> Paket <?=$p['nama'];?></td>
                <td align="center"><?=$cek['rektu']=='Tunai'?'Tunai':'Transfer';?></td>
                <td  align="right"><?=number_format($cek['nominal'],0,',','.');?></td>
            </tr>
        </tbody>

        </table>
    </body>
        <?php
    }
}
?>