<?php 
    $newRelease = getResult("SELECT * FROM products ORDER BY product_id DESC LIMIT 6");
    $bestSellers = getResult("SELECT * FROM products ORDER BY sold DESC LIMIT 3");
    if(isset($_SESSION['loginData'])){
        $infoUser = $_SESSION['loginData'];
    } else $infoUser['user_id'] = 'none';
?>

<div class="container-fluid bg-dark" style="height: 250px;">&nbsp;</div>
<div class="container-lg pb-5">
    <div id="carouselExampleControls" class="carousel slide homeImage" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="./assets/img/homeBgr1.jpg" class="d-block w-100" alt="image1">
            </div>
            <div class="carousel-item">
                <img src="./assets/img/homeBgr2.jpg" class="d-block w-100" alt="image2">
            </div>
            <div class="carousel-item">
                <img src="./assets/img/homeBgr.jpg" class="d-block w-100" alt="image3">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</div>
<div class="container-lg mt-5">
    <div class="container-lg text-center">
        <h1 style="letter-spacing: 5px;" class="homeH1">Market Place Terlengkap <br/> Kualitas Produk Tinggi</h1>
        <p class="homeP">Belanja Berbagai Produk Terkini, Bisa Bebas Ongkir ke Seluruh Bali. Cek Sekarang! Solusi Untuk Belanja Online Dengan Mudah. Banyak Produk yang Bagus di Jubeli.ID</p>
    </div>
    <div class="container-lg mt-5">
        <div class="row gap-3">
            <div class="col-sm col-lg-2">
                <h3>Produk Terlaris</h3>
                <a href="?page=products&tab=terlaris" class="btn btn-dark"> See All <span>&rarr;</span></a>
            </div>
            <?php foreach($bestSellers as $data): ?>
            <div class="col-sm col-lg-3 text-center border border-2 border-dark rounded pt-2 pb-2">
                <a href="?page=detail&id=<?= $data['product_id'] ?>"><img src="./assets/img/<?= $data['gambar'] ?>" alt="" class="d-block w-100 rounded"></a>
                <p class="mt-4 mb-0"><?= $data['product_name'] ?></p>
                <p style="overflow: hidden;" class="mb-0"><b>Rp. <?= $data['product_price'] ?></b></p>
                <a class="btn btn-warning" href="./process/add-cart.process.php?product_id=<?= $data['product_id'] ?>">Add To Cart</a>
                <!-- <a class="btn btn-primary">Detail</a> -->
            </div>
            <?php endforeach; ?>
        </div>
    </div>
    <div class="container-lg mt-5 pt-5">
        <div class="row gap-3 justify-content-center">
            <div class="col-sm col-lg-12 text-center">
                <h2>Produk Terbaru</h2>
                <a href="?page=products&tab=terbaru" class="btn btn-dark"> See All <span>&rarr;</span></a>
            </div>
            <?php foreach($newRelease as $data): ?>
            <div class="col-sm col-lg-3 text-center border border-2 border-dark rounded pt-2 pb-2">
                <a href="?page=detail&id=<?= $data['product_id'] ?>"><img src="./assets/img/<?= $data['gambar'] ?>" alt="" class="d-block w-100 rounded"></a>
                <p class="mt-4 mb-0"><?= $data['product_name'] ?></p>
                <p style="overflow: hidden;" class="mb-0"><b>Rp. <?= $data['product_price'] ?></b></p>
                <a class="btn btn-warning <?= $class = $infoUser['user_id'] == $data['user_id'] ? 'd-none' : NULL ?>" href="./process/add-cart.process.php?product_id=<?= $data['product_id'] ?>">Add To Cart</a>
                <a class="btn btn-primary <?= $class = $infoUser['user_id'] != $data['user_id'] ? 'd-none' : NULL ?>" href="?page=detail&id=<?= $data['product_id'] ?>">See Details</a>
                <!-- <a class="btn btn-primary">Detail</a> -->
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>