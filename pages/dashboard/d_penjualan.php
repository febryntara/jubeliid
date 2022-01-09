<?php 
    $menu = isset($_GET['menu']) ? $_GET['menu'] : 'laporan-penjualan';
?>
<div>
    <ul class="d-menu text-center" style="list-style: none;">
        <li class="d-menu-item <?= $class = $menu == 'laporan-penjualan' ? 'd-menu-active' : NULL ?>">
            <a class="link-reset" href="?tab=penjualan&menu=laporan-penjualan">Laporan Penjualan</a>
        </li>
        <li class="d-menu-item <?= $class = $menu == 'pesanan-masuk' ? 'd-menu-active' : NULL ?>">
            <a class="link-reset" href="?tab=penjualan&menu=pesanan-masuk">Pesanan Masuk</a>
        </li>
        <li class="d-menu-item <?= $class = $menu == 'dibatalkan' ? 'd-menu-active' : NULL ?>">
            <a class="link-reset" href="?tab=penjualan&menu=dibatalkan">Dibatalkan</a>
        </li>
    </ul>
    <?php 
        $menu = isset($_GET['menu']) ? $_GET['menu'] : 'laporan-penjualan';
        switch ($menu) {
            case 'pesanan-masuk':
                include 'd_pesanan-masuk.php';
                break;
            case 'dibatalkan':
                include 'd_batal_p.php';
                break;
            default:
                include 'd_laporan-penjualan.php';
                break;
        }
    ?>
</div>