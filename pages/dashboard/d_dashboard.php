<?php 
 $infoUser = $_SESSION['loginData'];
 $user_id = $infoUser['user_id'];
 $database_user_id = getResult("SELECT * FROM request_seller WHERE user_id = $user_id")[0]['user_id'];
 $alpha = $infoUser['status_id'] == 1 ? NULL : 'd-none';
 $alpha = $database_user_id == $user_id ? 'd-none' : NULL;
?>
<div>
    <h3>Pengumuman dari Jubeli.ID <span class="badge bg-secondary">New</span></h3>
    <a href="../../process/do_request.process.php?id=<?= $infoUser['user_id'] ?>" class="btn btn-success <?= $alpha ?>">Request Seller</a>
</div>