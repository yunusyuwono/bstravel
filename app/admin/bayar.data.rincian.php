<?php 
include "fx.admin.php";
?>
<div class="row">
	<?php
	$idjampaket=$_POST['idjampaket'];
	
	$sb=mysqli_query($kon,"SELECT * from bayar where idjampaket='$idjampaket' order by bayarke desc");
	while($s=mysqli_fetch_array($sb))
	{
		?>
		<div class="col-lg-6 col-md-6">
			<div class="card card-body p-1">
				<b>Bayar ke-<?=$s['bayarke'];?></b>
				<small><?=$s['entri'];?></small> 
				<h3>Rp. <?=number_format($s['nominal'],0,',','.');?>
				<hr>
				<div class="row p-1">
					<div class="col-lg-12">
						<?php 
						if($s['status']=='Terkirim')
						{
							$cls='btn btn-primary btn-sm p-1';
						}
						elseif($s['status']=='Valid')
						{
							$cls='btn btn-success btn-sm p-1';
						}
						?>
						<div class="btn-group w-100">
						<a class="<?=$cls;?>"><?=$s['status'];?></a>
						<a class="btn btn-sm btn-info" target="_blank" href="../../assets/jamaah/bb/<?=$s['bukti'];?>">Bukti</a>
						<?php 
						if($s['status']=='Terkirim')
						{
							?>
							<a class="btn btn-sm btn-success" onclick="valnow('<?=$s['idbayar'];?>','$idjampaket')">Validasi</a></div>
							<?php
						}
						elseif($s['status']=='Valid')
						{
							?>
							<a class="btn btn-sm btn-outline-success" >Tervalidasi</a></div>
							<?php
						}
						?>
						
					</div>	
				</div>
			</div>
		</div>
		<?php
	}
	?>
</div>