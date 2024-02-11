<?php 
require_once "fx.php";
$aff=$_POST['aff'];
?>
<div class="list-group">
    <?php 
    $plg=mysqli_query($kon,"SELECT * from jamaah where kodeaff='$aff' order by entri desc");
    while($p=mysqli_fetch_array($plg))
    {
        ?>
        <div class="list-group-item">
            <div class="row p-0">
                <div class="col-3"><small><?=$p['entri'];?></small></div>
                <div class="col-9"><?=$p['nama'];?><br><small><?=$p['ktpsim'];?> / <?=$p['hp'];?></small></div>
            </div>
        </div>
        <?php
    }
    ?>
</div>
<?php
