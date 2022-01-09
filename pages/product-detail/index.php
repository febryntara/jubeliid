<?php 
    if(isset($_GET['id'])){
        $id = $_GET['id'];
    } else {
        header("location:./");
    }
    $product = getResult("SELECT * FROM products WHERE product_id = $id")[0];
    $seller = getResult("SELECT full_name FROM users WHERE user_id =".$product['user_id'])[0];
    $infoUser = $_SESSION['loginData'];
?>
<div class="detail-container ">
    <img class="detail-main-image" src="./assets/img/<?= $product['gambar'] ?>" alt="<?= $product['product_name'] ?>">
    <div>
        <h2><?= $product['product_name'] ?></h2>
        <p>
            Deskripsi Produk => <br>
            <span class="ms-2 d-block">
                <?= $product['deskripsi'] ?>
            </span>
        </p>
        <p><b>Penjual</b> <?= $seller['full_name'] ?></p>
        <b>Rp. <?= $product['product_price'] ?></b>
        <div>
            <span>Stok <?= $product['stok'] ?> Pcs </span>|
            <span>Terjual <?= $product['sold'] ?> Pcs</span>
        </div>
    </div>
</div>
<div class="text-center mt-5">
    <button class="btn btn-danger <?= $class = $product['stok'] != 0 ? 'd-none' : NULL ?>" onclick="return alert('Produk Kosong!')">
        PRODUK KOSONG!
    </button>
    <a class="btn btn-warning <?= $class = $product['stok'] == 0 || $infoUser['user_id'] == $product['user_id'] ? 'd-none' : NULL ?>" href="./process/add-cart.process.php?product_id=<?= $product['product_id'] ?>">Add To Cart</a>
    <a class="btn btn-primary <?= $class = $infoUser['user_id'] == $product['user_id'] ? NULL : 'd-none' ?>">This is Your Product</a>
    <a href="<?= $link = isset($_GET['from']) ? './?page=products' : './' ?>" class="btn btn-dark">Kembali</a>
</div>