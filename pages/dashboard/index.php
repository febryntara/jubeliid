<?php 
    session_start();
    require '../../components/c_functions.php';
    if(!isset($_SESSION['loginStatus'])==true){
        echo "<script>window.location='../../?page=home'</script>";
    }
    $infoUser = $_SESSION['loginData'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php include_once '../../components/c_meta_pack.php' ?>
</head>
<body class="bg-dark d-body">
    <div class="d-container">
        <div class="bg-dark d-sidebar">
            <ul style="list-style: none;" class="text-light d-box">
                <li>
                    <a href="?tab=profil" class="link-reset">
                        <ion-icon class="d-reverse fs-5 m-auto" name="person-circle"></ion-icon>
                        <span class="d-hide fs-2"><?= $infoUser['username']; ?></span>
                    </a>
                </li>
                <li class="mt-2">
                    <a class="link-reset" href="../../?page=beranda">
                        <ion-icon class="d-reverse fs-5 p-0 m-auto" name="arrow-back"></ion-icon>
                        <span class="d-hide fs-5">Homepage</span>
                    </a>
                </li>
                <li class="mt-2">
                    <a class="link-reset" href="../auth/logout.php">
                        <ion-icon class="d-reverse fs-5 p-0 m-auto" name="log-out"></ion-icon>
                        <span class="d-hide fs-5">Logout</span>
                    </a>
                </li>
                <li class="mt-5">
                    <a class="link-reset" href="?tab=dashboard">
                        <ion-icon class="fs-5" name="unlink"></ion-icon>
                        <span class="d-hide">Dashboard</span>
                    </a>
                </li>
                <li class="<?= $class = $infoUser['status_id'] == '2' || $infoUser['status_id'] == '1' ? NULL : 'd-none' ?>">
                    <a class="link-reset" href="?tab=pesanan">
                        <ion-icon class="fs-5" name="document-text"></ion-icon>
                        <span class="d-hide">Pesanan</span>
                    </a>
                </li>
                <li class="<?= $class = $infoUser['status_id'] !== '2' ? 'd-none' : NULL ?>">
                    <a class="link-reset" href="?tab=produk">
                        <ion-icon class="fs-5" name="cart"></ion-icon>
                        <span class="d-hide">Produk</span>
                    </a>
                </li>
                <li class="<?= $class = $infoUser['status_id'] !== '2' ? 'd-none' : NULL ?>">
                    <a class="link-reset" href="?tab=penjualan">
                        <ion-icon class="fs-5" name="cart"></ion-icon>
                        <span class="d-hide">Penjualan</span>
                    </a>
                </li>
                <li class="<?= $class = $infoUser['status_id'] !== '3' ? 'd-none' : NULL ?>">
                    <a class="link-reset" href="?tab=pembayaran">
                        <ion-icon class="fs-5" name="wallet"></ion-icon>
                        <span class="d-hide">Pembayaran</span>
                    </a>
                </li>
                <li class="<?= $class = $infoUser['status_id'] !== '3' ? 'd-none' : NULL ?>">
                    <a class="link-reset" href="?tab=seller-request">
                        <ion-icon class="fs-5" name="create-sharp"></ion-icon>
                        <span class="d-hide">Seller Request</span>
                    </a>
                </li>
                <li class="<?= $class = $infoUser['status_id'] !== '3' ? 'd-none' : NULL ?>">
                    <a class="link-reset" href="?tab=kelola-user">
                        <ion-icon class="fs-5" name="people-sharp"></ion-icon>
                        <span class="d-hide">Kelola User</span>
                    </a>
                </li>
            </ul>
        </div>
        <div class="bg-light d-content">
            <?php 
                $tab = isset($_GET['tab']) ? $_GET['tab'] :'dashboard' ;
                switch ($tab) {
                    case 'profil':
                        include './d_profil.php';
                        break;
                    case 'pesanan':
                        include './d_pesanan.php';
                        break;
                    case 'produk':
                        include './d_produk.php';
                        break;
                    case 'pembayaran':
                        include './d_pembayaran.php';
                        break;
                    case 'penjualan':
                        include './d_penjualan.php';
                        break;
                    case 'seller-request':
                        include './d_seller-request.php';
                        break;
                    case 'kelola-user':
                        include './d_kelola-user.php';
                        break;
                    default:
                        include './d_dashboard.php';
                        break;
                }
            ?>
        </div>
    </div>
       


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>
