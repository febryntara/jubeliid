<?php
$userId = $_SESSION['loginData']['user_id'];
$products = getResult("SELECT * FROM products WHERE user_id = $userId");
if (isset($_POST['cari'])) {
    $keyword = isset($_POST['keyword']) ? $_POST['keyword'] : '';
    $products = getResult("SELECT * FROM products WHERE (product_name LIKE '%$keyword%' OR category LIKE '%$keyword%') AND user_id = $userId");
}
if (isset($_POST['refresh'])) {
    $products = getResult("SELECT * FROM products WHERE user_id = $userId");
}
if (isset($_GET['delete'])) {
    deleteProduct($_GET['delete']);
}
if (isset($_POST['simpan'])) {
    editProduct($_POST);
    // var_dump($_POST, $_FILES);
}
?>
<div class="d-list-produk">
    <form action="" method="POST" class="d-list-form">
        <div class="d-none">
            <label class="d-block" for="categori">Kategori</label>
            <input class="d-list-input" list="category" name="category" autocomplete="off">
            <datalist id="category">
                <option value="semua">Semua</option>
                <option value="fashion">Fashion</option>
                <option value="perkakas">Perkakas</option>
                <option value="alat masak">Alat Masak</option>
            </datalist>
        </div>
        <div>
            <label class="d-block" for="search">Keyword</label>
            <input class="border border-dark" type="text" name="keyword" id="search" autocomplete="off" placeholder="nama / kategori produk">
        </div>
        <div class="d-list-button">
            <button type="submit" name="cari" class="btn btn-warning">Cari</button>
            <button type="submit" name="refresh" class="btn btn-dark">
                <ion-icon name="refresh"></ion-icon>
            </button>
        </div>
    </form>

    <table class="d-list-table mt-5">
        <tr>
            <th>No</th>
            <th>Kategori</th>
            <th>Kode Produk</th>
            <th>Nama Produk</th>
            <th>Stok</th>
            <th>Harga</th>
            <th>Aksi</th>
        </tr>
        <?php $index = 0;
        $productId = [] ?>
        <?php foreach ($products as $product) : $index++;
            $productId[] = $product['product_id'] ?>
            <tr>
                <td><?= $index; ?></td>
                <td><?= $product['category']; ?></td>
                <td><?= $product['product_code']; ?></td>
                <td><?= $product['product_name']; ?></td>
                <td><?= $product['stok']; ?></td>
                <td>Rp. <?= $product['product_price']; ?></td>
                <td>
                    <div class="d-flex g-2">
                        <button type="button" class="btn btn-warning me-2" data-bs-toggle="modal" data-bs-target="#exampleModal<?= $product['product_id'] ?>">
                            Detail
                        </button>
                        <a class="btn btn-danger" href="?tab=produk&menu=list&delete=<?= $product['product_id'] ?>" onclick="return confirm('Yakin ingin hapus <?= $product['product_name']; ?>?')">Hapus</a>
                    </div>
                </td>
            </tr>
        <?php endforeach; ?>
        <tr class="<?= $class = count($products) > 0 ? 'd-none' : NULL ?>">
            <td colspan="7">Data Tidak Ditemukan</td>
        </tr>
    </table>
    <!-- Modal -->
    <?php foreach ($productId as $id) : ?>
        <?php $productDetail = getResult("SELECT * FROM products WHERE product_id = $id")[0] ?>
        <div class="modal fade" id="exampleModal<?= $id ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <form class="modal-content" action="" method="POST" enctype="multipart/form-data">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel"><?= $productDetail['product_name']; ?></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        <input type="hidden" name="product_id" value="<?= $productDetail['product_id'] ?>">
                        <input type="hidden" name="product_code" value="<?= $productDetail['product_code']; ?>">
                        <input type="hidden" name="user_id" value="<?= $productDetail['user_id']; ?>">
                        <input type="hidden" name="sold" value="<?= $productDetail['sold'] ?>">
                        <input type="hidden" name="oldImage" value="<?= $productDetail['gambar'] ?>">
                    </div>
                    <div class="modal-body">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-12">
                                    <img class="d-block d-image-center w-100" src="../../assets/img/<?= $productDetail['gambar'] ?>" alt="">
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-md-5 fw-bold">
                                    Gambar
                                </div>
                                <div class="col-md-7">
                                    <input class="d-list-input" type="file" name="gambar">
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-md-5 fw-bold">
                                    Nama Produk
                                </div>
                                <div class="col-md-7">
                                    <input class="d-list-input" type="text" name="product_name" value="<?= $productDetail['product_name'] ?>">
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-md-5 fw-bold">
                                    Kategori
                                </div>
                                <div class="col-md-7">
                                    <select class="d-list-input" id="category" name="category" value="<?= $productDetail['category'] ?>" required>
                                        <option value="fashion">Fashion</option>
                                        <option value="perkakas">Perkakas</option>
                                        <option value="alat masak">Alat Masak</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-md-5 fw-bold">
                                    Kode Produk
                                </div>
                                <div class="col-md-7">
                                    <span class="d-list-input border border-dark"><?= $productDetail['product_code']; ?></span>

                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-md-5 fw-bold">
                                    Stok Barang
                                </div>
                                <div class="col-md-7">
                                    <input class="d-list-input" name="stok" type="number" value="<?= $productDetail['stok'] ?>">
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-md-5 fw-bold">
                                    Terjual
                                </div>
                                <div class="col-md-7">
                                    <span class="d-list-input" class="d-list-input"><?= $productDetail['sold'] ?></span>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-md-5 fw-bold">
                                    Harga (Rp)
                                </div>
                                <div class="col-md-7">
                                    <input class="d-list-input" type="number" name="product_price" value="<?= $productDetail['product_price'] ?>">
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-md-5 fw-bold">
                                    Deskripsi
                                </div>
                                <div class="col-md-7">
                                    <textarea class="d-list-input" name="deskripsi" rows="4"><?= $productDetail['deskripsi'] ?></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
                        <button type="submit" name="simpan" class="btn btn-warning">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    <?php endforeach; ?>
</div>