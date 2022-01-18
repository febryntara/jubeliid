<?php 
 $infoUser = $_SESSION['loginData'];
 $user_id = $infoUser['user_id'];
 $database_user_id = getResult("SELECT * FROM request_seller WHERE user_id = $user_id");
 $alpha = count($database_user_id) == 1 ? 'd-none' : 
    ($infoUser['status_id'] == 1 ? NULL : 'd-none');
?>
<div>
    <h3>Pengumuman dari Jubeli.ID <span class="badge bg-secondary">New</span></h3>
    <a href="../../process/do_request.process.php?id=<?= $infoUser['user_id'] ?>" class="btn btn-success <?= $alpha ?>">Request Seller</a>
</div>