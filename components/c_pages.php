<?php 
$where = 'home';
if(isset($_GET['page'])){
    $where = $_GET['page'];
}
switch($where){
    case 'products':
        include './pages/products/index.php';
        break;
    case 'about':
        include './pages/about/index.php';
        break;
    case 'detail':
        include './pages/product-detail/index.php';
        break;
    default:
        include './pages/home/index.php';
        break;
}