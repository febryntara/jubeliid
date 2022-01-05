<?php 
    $menu = isset($_GET['menu']) ? $_GET['menu'] : 'inpayment';
?>
<div>
    <ul class="d-menu text-center" style="list-style: none;">
        <li class="d-menu-item <?= $class = $menu == 'inpayment' ? 'd-menu-active' : NULL ?>">
            <a class="link-reset" href="?tab=pembayaran&menu=inpayment">InPayment</a>
        </li>
        <li class="d-menu-item <?= $class = $menu == 'payed' ? 'd-menu-active' : NULL ?>">
            <a class="link-reset" href="?tab=pembayaran&menu=payed">Payed</a>
        </li>
    </ul>
    <?php 
        $menu = isset($_GET['menu']) ? $_GET['menu'] : 'inpayment';
        switch ($menu) {
            case 'payed':
                include 'd-payed.php';
                break;
            default:
                include 'd-inpayment.php';
                break;
        }
    ?>
</div>