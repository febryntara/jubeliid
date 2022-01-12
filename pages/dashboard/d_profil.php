<?php 
    $infoUser = $_SESSION['loginData'];
    $dataOrder = getResult("SELECT * FROM tb_orders WHERE user_id = ".$infoUser['user_id']);
    $dataOrder_2 = getResult("SELECT * FROM tb_orders WHERE seller_id = ".$infoUser['user_id']);
    $orderCount = count($dataOrder);
    $orderGet = count($dataOrder_2);
    $moneySpend = 0;
    $moneyGet = 0;
    foreach ($dataOrder as $data) {
        $moneySpend += $data['total'];
    }
    foreach ($dataOrder_2 as $data) {
        $moneyGet += $data['total'];
    }
    $alpha = $infoUser['status_id'] == 2 ? NULL : 'd-none';
?>

<div class="<?= $class = $infoUser['status_id'] == '3' ? 'd-none' : NULL ?>">
    <div class="alert alert-secondary" role="alert">
        Username : <?= $infoUser['username'] ?>
    </div>
    <div class="alert alert-secondary" role="alert">
        Full Name : <?= $infoUser['full_name'] ?>
    </div>
    <div class="alert alert-secondary" role="alert">
        Order Count : <?= $orderCount ?>
    </div>
    <div class="alert alert-secondary <?= $alpha ?>" role="alert">
        Order Get : <?= $orderGet ?>
    </div>
    <div class="alert alert-secondary" role="alert">
       Money Spend : Rp. <?= $moneySpend ?>
    </div>
    <div class="alert alert-secondary <?= $alpha ?>" role="alert">
        Money Get : Rp. <?= $moneyGet ?>
    </div>
</div>
