<?php 
session_start();
require '../components/c_functions.php';
if(!isset($_SESSION['loginStatus'])==true){
    echo "<script>alert('anda harus login terlebih dahulu!')</script>";
    echo "<script>window.location = '../pages/auth'</script>";
}
$product_id = $_GET['product_id'];
$product = getResult("SELECT * FROM products WHERE product_id = $product_id")[0];
$stop = !empty($_SESSION['cart']) ? count($_SESSION['cart']) : 1;
$error = 0;
if(empty($_SESSION['cart'])){
    $error = 0;
} else {
    for ($i=0; $i < $stop; $i++) { 
        if($product['product_id'] == $_SESSION['cart'][$i]['product_id']){
            $error = 1;
        }
}
}
if ($error > 0){
    echo "<script>alert('". $product['product_name'] ." sudah ditambahkan!'".")</script>";
} else {
    echo "<script>alert('". $product['product_name'] ." berhasil ditambahkan!')</script>";
    $_SESSION['cart'][] = $product['product_id'];
}
if(isset($_GET['from'])== 'products'){
    echo "<script>window.location = '../?page=products&tab=semua'</script>";
} else {
    echo "<script>window.location = '../'</script>";
}

