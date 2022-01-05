<?php 
    $menu = isset($_GET['menu']) ? $_GET['menu'] : 'keranjang';
?>
<div>
    <ul class="d-menu text-center" style="list-style: none;">
        <li class="d-menu-item <?= $class = $menu == 'keranjang' ? 'd-menu-active' : NULL ?>">
            <a class="link-reset" href="?tab=pesanan&menu=keranjang">Keranjang</a>
        </li>
        <li class="d-menu-item <?= $class = $menu == 'dikemas' ? 'd-menu-active' : NULL ?>">
            <a class="link-reset" href="?tab=pesanan&menu=dikemas">Dikemas</a>
        </li>
        <li class="d-menu-item <?= $class = $menu == 'diterima' ? 'd-menu-active' : NULL ?>">
            <a class="link-reset" href="?tab=pesanan&menu=diterima">Diterima</a>
        </li>
        <li class="d-menu-item <?= $class = $menu == 'dibatalkan' ? 'd-menu-active' : NULL ?>">
            <a class="link-reset" href="?tab=pesanan&menu=dibatalkan">Dibatalkan</a>
        </li>
    </ul>
    <?php 
        $menu = isset($_GET['menu']) ? $_GET['menu'] : 'keranjang';
        switch ($menu) {
            case 'dikemas':
                include 'd-kemas.php';
                break;
            case 'diterima':
                include 'd-kirim.php';
                break;
            case 'dibatalkan':
                include 'd_batal.php';
                break;
            default:
                include 'd-keranjang.php';
                break;
        }
    ?>
</div>