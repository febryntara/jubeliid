<?php 
    $userId = $_SESSION['loginData']['user_id'];
    if(isset($_POST['tambah-produk'])){
        // var_dump($_FILES, $_POST); die;
        insertProduct($_POST);
    }
?>

<div class="d-list-produk">
    <form action="" method="POST" class="d-tambah-form" enctype="multipart/form-data">
        <input type="hidden" name="user_id" value="<?= $userId ?>">
        <label for="product_name">Nama Produk</label>
        <input type="text" name="product_name"id="product_name" class="border border-dark" required>
        <label for="product_price">Harga</label>
        <input type="number" name="product_price"id="product_price" class="border border-dark" required>
        <label for="deskripsi">Deskripsi</label>
        <textarea name="deskripsi"id="deskripsi" rows="4" class="border border-dark" required>tidak ada deskripsi</textarea>
        <label class="d-block" for="categori">Kategori</label>
        <input class="d-list-input" list="category" name="category" autocomplete="off" class="border border-dark" required>
        <datalist id="category">
            <!-- <option value="semua">Semua</option> -->
            <option value="fashion">Fashion</option>
            <option value="perkakas">Perkakas</option>
            <option value="alat masak">Alat Masak</option>
        </datalist>
        <label for="stok">Stok</label>
        <input type="number" name="stok"id="stok" class="border border-dark" required>
        <label for="image">Gambar</label>
        <input type="file" name="gambar"id="image">
        <label>&nbsp;</label>
        <button type="submit" name="tambah-produk" class="btn btn-warning">Tambah</button>
    </form>
</div>