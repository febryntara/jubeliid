<?php
$currentPage = isset($_GET['part']) ? $_GET['part'] : 1;
$tab = 'semua';
$key = $_GET['key'] ?? NULL;

if (isset($_GET['category'])) {
  $category = $_GET['category'];
  $c_lower = strtolower($category);
  //  $products = getResult("SELECT * FROM products WHERE category = '$category'");
  $products = paginationAndSearchQuery($currentPage, 1, $c_lower)[0];
} else if (isset($_REQUEST['keyword'])) {
  $category = 'Pilih Kategori';
  $key = $_REQUEST['keyword'];
  // $products = getResult("SELECT * FROM products WHERE product_name LIKE '%$key%' OR category LIKE '%$key%'");
  $products = paginationAndSearch($key, $currentPage)[0];
} else if (isset($_GET['tab'])) {
  $category = 'Semua';
  $key = $_GET['tab'];
  $tab = $key;
  switch ($key) {
    case 'terlaris':
      // $products = getResult("SELECT * FROM products ORDER BY sold DESC");
      $products = paginationAndSearchQuery($currentPage, 2, NULL)[0];
      break;
    case 'terbaru':
      // $products = getResult("SELECT * FROM products ORDER BY product_id DESC");
      $products = paginationAndSearchQuery($currentPage, 3, NULL)[0];
      break;
    default:
      //  $products = getResult("SELECT * FROM products ORDER BY product_id DESC");
      $products = paginationAndSearch(NULL, $currentPage)[0];
      break;
  }
} else {
  $tab = 'semua';
  $category = "Semua";
  // $products = getResult("SELECT * FROM products ORDER BY product_id DESC");
  $products = paginationAndSearch($key, $currentPage)[0];
}
?>
<div class="container-fluid bg-dark" style="height: 250px;">&nbsp;</div>
<div class="container-lg pb-5">
  <div id="carouselExampleControls" class="carousel slide homeImage" data-bs-ride="carousel">
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="./assets/img/homeBgr.jpg" class="d-block w-100" alt="image1">
      </div>
      <div class="carousel-item">
        <img src="./assets/img/homeBgr1.jpg" class="d-block w-100" alt="image2">
      </div>
      <div class="carousel-item">
        <img src="./assets/img/homeBgr2.jpg" class="d-block w-100" alt="image3">
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
<nav class="navbar navbar-expand-lg navbar-light p-2" id="products">
  <select class="border border-dark" onchange="javascript:handleSelect(this)">
    <option><?= $category; ?></option>
    <option class="<?= $class = $category == 'Semua' ? 'd-none' : NULL ?>" value="?page=products#products">Semua</option>
    <option class="<?= $class = $category == 'Fashion' ? 'd-none' : NULL ?>" value="?page=products&category=Fashion#products">Fashion</option>
    <option class="<?= $class = $category == 'Perkakas' ? 'd-none' : NULL ?>" value="?page=products&category=Perkakas#products">Perkakas</option>
    <option class="<?= $class = $category == 'Alat Masak' ? 'd-none' : NULL ?>" value="?page=products&category=Alat Masak#products">Alat Masak</option>
  </select>
  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav1" aria-controls="navbarNav1" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse text-center" id="navbarNav1">
    <ul class="navbar-nav ms-auto">
      <li class="nav-item m-1 active">
        <a class="link-reset <?= $class = $tab == 'semua' ? 'fw-bold' : NULL ?>" href="?page=products&tab=semua#products">Semua Produk</a>
      </li>
      <li class="nav-item m-1">
        <a class="link-reset <?= $class = $tab == 'terlaris' ? 'fw-bold' : NULL ?>" href="?page=products&tab=terlaris#products">Produk Terlaris</a>
      </li>
      <li class="nav-item m-1">
        <a class="link-reset <?= $class = $tab == 'terbaru' ? 'fw-bold' : NULL ?>" href="?page=products&tab=terbaru#products">Produk Terbaru</a>
      </li>
    </ul>
    <form action="?page=products" method="POST" class="text-center ms-auto">
      <input type="text" name="keyword" autocomplete="off" class="border border-dark">
      <button type="submit" class="btn btn-warning">
        <ion-icon class="text-light" name="search-outline"></ion-icon>
      </button>
    </form>
  </div>
</nav>
<div class="products-container">
  <?php foreach ($products as $data) : ?>
    <div class="products-item">
      <a href="?page=detail&id=<?= $data['product_id'] ?>&from=products"><img src="./assets/img/<?= $data['gambar'] ?>" alt="" class="d-block w-100 rounded"></a>
      <p class="mt-4 mb-0" style="overflow: hidden;"><?= $data['product_name'] ?></p>
      <p style="overflow: hidden;" class="mb-0"><b>Rp. <?= $data['product_price'] ?></b></p>
      <button class="btn btn-danger <?= $class = $data['stok'] != 0 ? 'd-none' : NULL ?>" onclick="return alert('Produk Kosong!')">
        PRODUK KOSONG!
      </button>
      <a class="btn btn-warning <?= $class = $data['stok'] == 0 ? 'd-none' : (isset($_SESSION['loginData']['user_id']) == $data['user_id'] ? 'd-none' : NULL) ?>" href="./process/add-cart.process.php?product_id=<?= $data['product_id'] ?>&from=products">Add To Cart</a>
      <a class="btn btn-primary <?= $class = $data['stok'] == 0 ? 'd-none' : (isset($_SESSION['loginData']['user_id']) != $data['user_id'] ? 'd-none' : NULL) ?>" href="?page=detail&id=<?= $data['product_id'] ?>&from=products">See Details</a>
      <!-- <a class="btn btn-primary">Detail</a> -->
    </div>
  <?php endforeach; ?>
</div>
<?php $alpha1 = isset($_REQUEST['keyword']) ? NULL : 'd-none' ?>
<?php $alpha2 = isset($_REQUEST['category']) ?  NULL : 'd-none' ?>
<?php $alpha3 = (isset($_REQUEST['tab']) && $_REQUEST['tab'] == 'semua') ? NULL : 'd-none' ?>
<?php $alpha4 = (isset($_REQUEST['tab']) && $_REQUEST['tab'] == 'terlaris') ? NULL : 'd-none' ?>
<?php $alpha5 = (isset($_REQUEST['tab']) && $_REQUEST['tab'] == 'terbaru') ? NULL : 'd-none' ?>
<nav aria-label="Page navigation example">
  <ul class="pagination justify-content-center">
    <li class="page-item">
      <a class="page-link text-inherit <?= $alpha1 ?>" href="?page=products&part=<?= $currentPage - 1 ?>&keyword=<?= $key = isset($_REQUEST['keyword']) ? $_REQUEST['keyword'] : NULL ?>#products" aria-label="Next">
        <span aria-hidden="true">&laquo;</span>
      </a>
      <a class="page-link text-inherit <?= $alpha2 ?>" href="?page=products&part=<?= $currentPage - 1 ?>&category=<?= $_REQUEST['category'] ?>#products" aria-label="Next">
        <span aria-hidden="true">&laquo;</span>
      </a>
      <a class="page-link text-inherit <?= $alpha3 ?>" href="?page=products&tab=semua&part=<?= $currentPage - 1 ?>#products" aria-label="Next">
        <span aria-hidden="true">&laquo;</span>
      </a>
      <a class="page-link text-inherit <?= $alpha4 ?>" href="?page=products&tab=terlaris&part=<?= $currentPage - 1 ?>#products" aria-label="Next">
        <span aria-hidden="true">&laquo;</span>
      </a>
      <a class="page-link text-inherit <?= $alpha5 ?>" href="?page=products&tab=terbaru&part=<?= $currentPage - 1 ?>#products" aria-label="Next">
        <span aria-hidden="true">&laquo;</span>
      </a>
    </li>
    <?php $whichOne = isset($_REQUEST['keyword']) ? paginationAndSearch($_REQUEST['keyword'], $currentPage)[1] : (isset($_REQUEST['category']) ? paginationAndSearchQuery(1, 1, $c_lower)[1] : (isset($_REQUEST['tab']) == 'terlaris' ? paginationAndSearchQuery(1, 2, NULL)[1] : paginationAndSearchQuery(1, 3, NULL)[1]));
    ?>
    <?php for ($i = 1; $i <= $whichOne; $i++) : ?>
      <li class="page-item <?= $bold = ($i == $currentPage ? 'fw-bold text-dark' : NULL) ?>"><a class="page-link text-inherit <?= $alpha1 ?>" href="?page=products&part=<?= $i ?>&keyword=<?= $key = isset($_REQUEST['keyword']) ? $_REQUEST['keyword'] : NULL ?>#products"><?= $i ?></a></li>
      <li class="page-item <?= $bold = ($i == $currentPage ? 'fw-bold text-dark' : NULL) ?>"><a class="page-link text-inherit <?= $alpha2 ?>" href="?page=products&part=<?= $i ?>&category=<?= $_REQUEST['category'] ?>#products"><?= $i ?></a></li>
      <li class="page-item <?= $bold = ($i == $currentPage ? 'fw-bold text-dark' : NULL) ?>"><a class="page-link text-inherit <?= $alpha3 ?>" href="?page=products&tab=semua&part=<?= $i ?>#products"><?= $i ?></a></li>
      <li class="page-item <?= $bold = ($i == $currentPage ? 'fw-bold text-dark' : NULL) ?>"><a class="page-link text-inherit <?= $alpha4 ?>" href="?page=products&tab=terlaris&part=<?= $i ?>#products"><?= $i ?></a></li>
      <li class="page-item <?= $bold = ($i == $currentPage ? 'fw-bold text-dark' : NULL) ?>"><a class="page-link text-inherit <?= $alpha5 ?>" href="?page=products&tab=terbaru&part=<?= $i ?>#products"><?= $i ?></a></li>
    <?php endfor ?>
    <!-- <?php var_dump($alpha1, $alpha2, $alpha3) ?> -->
    <li class="page-item">
      <a class="page-link text-inherit <?= $alpha1 ?>" href="?page=products&part=<?= $currentPage + 1 ?>&keyword=<?= $key = isset($_REQUEST['keyword']) ? $_REQUEST['keyword'] : NULL ?>#products" aria-label="Next">
        <span aria-hidden="true">&raquo;</span>
      </a>
      <a class="page-link text-inherit <?= $alpha2 ?>" href="?page=products&part=<?= $currentPage + 1 ?>&category=<?= $_REQUEST['category'] ?>#products" aria-label="Next">
        <span aria-hidden="true">&raquo;</span>
      </a>
      <a class="page-link text-inherit <?= $alpha3 ?>" href="?page=products&tab=semua&part=<?= $currentPage + 1 ?>#products" aria-label="Next">
        <span aria-hidden="true">&raquo;</span>
      </a>
      <a class="page-link text-inherit <?= $alpha4 ?>" href="?page=products&tab=terlaris&part=<?= $currentPage + 1 ?>#products" aria-label="Next">
        <span aria-hidden="true">&raquo;</span>
      </a>
      <a class="page-link text-inherit <?= $alpha5 ?>" href="?page=products&tab=terbaru&part=<?= $currentPage + 1 ?>#products" aria-label="Next">
        <span aria-hidden="true">&raquo;</span>
      </a>
    </li>
  </ul>
</nav>
<h2 class="text-center <?= $class = empty($products) ? NULL : 'd-none' ?>">Produk Tidak Ditemukan</h2>

<script type="text/javascript">
  function handleSelect(elm) {
    window.location = elm.value;
  }
</script>