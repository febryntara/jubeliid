<?php 
 $infoUser = $_SESSION['loginData'];
 $alpha = $infoUser['status_id'] == 1 ? 'Switch to Seller' : ($infoUser['status_id'] == 2 ? 'Switch to Buyer' : 'd-none');
?>
<div>
    <h3>Pengumuman dari Jubeli.ID <span class="badge bg-secondary">New</span></h3>
    <a href="../../process/switch_mode.process.php?request_id=<?= $infoUser['user_id'] ?>" class="btn btn-success <?= $alpha ?>"><?= $alpha ?></a>
</div>