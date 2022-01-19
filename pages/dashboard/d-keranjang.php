<?php 
    if(empty($_SESSION['cart'])){
        $cart = [];
    } else {
        // $cart = $_SESSION['cart'];
        foreach($_SESSION['cart'] as $key => $value){
            $cart[] = getResult("SELECT * FROM products WHERE product_id = $value")[0];
        }
    }
    // var_dump($_SESSION['cart']);
?>

<div class="d-menu-content">
    <a href="../../process/reset-cart.process.php" class="btn btn-danger mb-2 <?= $class = empty($cart) ? 'd-none' : NULL?>">Hapus Semua Item</a>
    <div class="text-center <?= $class = !empty($cart) ? 'd-none' : NULL?>">
        <h2 >Keranjang Kosong</h2>
        <a href="../../?page=products" class="btn btn-warning mb-2">Tambah Produk</a>
    </div>
    <form action="../../process/process-cart.process.php" method="POST" class="d-menu-cart">
        <?php $index = 0 ?>
        <?php foreach($cart as $key => $item): ?>
        <div class="d-menu-items">
            <div class="d-menu-items-header">&nbsp;</div>
            <img src="../../assets/img/<?= $item['gambar'] ?>" alt="barang" class="d-block w-100">
            <p><?= $item['product_name'] ?></p>
            <p>Rp. <?= $item['product_price'] ?></p>
            <input type="number" name="qty[]" min="1" value="1" max="<?= $item['stok'] ?>">
            <input type="hidden" name="product_id[]" min="1" value="<?= $item['product_id'] ?>">
            <input type="hidden" name="product_price[]" value="<?= $item['product_price'] ?>">
            <input type="hidden" name="seller_id[]" value="<?= $item['user_id'] ?>">
            <a href="../../process/remove-cart.process.php?index=<?= $key ?>" class="link-reset">hapus</a>
            <?php $index++ ?>
        </div>
        <?php endforeach ?>
        <button type="submit" class="btn btn-success <?= $class = empty($cart) ? 'd-none' : NULL?>">Prosess</button>
    </form>
</div>