<?php 
session_start();
$index = $_GET['index'];
$count = count($_SESSION['cart']);
unset($_SESSION['cart'][$index]);
if($count != count($_SESSION['cart'])){
    echo "<script>alert('Produk berhasil terhapus!')</script>";
} else {
    echo "<script>alert('Produk gagal terhapus!')</script>";
}
echo "<script>window.location='../pages/dashboard?tab=pesanan'</script>";
