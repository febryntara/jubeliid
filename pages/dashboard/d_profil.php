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

<ul class="<?= $class = $infoUser['status_id'] == '3' ? 'd-none' : NULL ?>">
    <li>Username : <?= $infoUser['username'] ?></li>
    <li>Full Name : <?= $infoUser['full_name'] ?></li>
    <li>Order Count : <?= $orderCount ?></li>
    <li class="<?= $alpha ?>">Order Get : <?= $orderGet ?></li>
    <li>Money Spend : Rp. <?= $moneySpend ?></li>
    <li class="<?= $alpha ?>">Money Get : Rp. <?= $moneyGet ?></li>
</ul>
