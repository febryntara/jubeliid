<?php 
    $menu = isset($_GET['menu']) ? $_GET['menu'] : 'list';
?>
<div>
    <ul class="d-menu text-center" style="list-style: none;">
        <li class="d-menu-item <?= $class = $menu == 'list' ? 'd-menu-active' : NULL ?>">
            <a class="link-reset" href="?tab=produk&menu=list">List Produk</a>
        </li>
        <li class="d-menu-item <?= $class = $menu == 'tambah' ? 'd-menu-active' : NULL ?>">
            <a class="link-reset" href="?tab=produk&menu=tambah">Tambah Produk</a>
        </li>
    </ul>
    <?php 
        $menu = isset($_GET['menu']) ? $_GET['menu'] : 'list';
        switch ($menu) {
            case 'tambah':
                include 'd-tambah-produk.php';
                break;
            
            default:
                include 'd-list-produk.php';
                break;
        }
    ?>
</div>