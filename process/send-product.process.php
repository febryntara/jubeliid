<?php
require '../components/c_functions.php';
if(isset($_GET['confirm'])){
    $order_id = $_REQUEST['order_id'];
    $statusChange = mysqli_query($database, "UPDATE tb_orders SET status = 'barang dikirim' WHERE order_id = ".$order_id);
    if($statusChange){
        echo "<script>alert('Barang sedang dikirim!');window.location='../pages/dashboard/?tab=penjualan'</script>";
    }
    
}

if(isset($_GET['order_id'])){
    $order_id = $_REQUEST['order_id'];
    $statusChange = mysqli_query($database, "UPDATE tb_orders SET status = 'barang dikirim' WHERE order_id = ".$order_id);
    if($statusChange){
        echo "<script>alert('Barang sedang dikirim!');window.location='../pages/dashboard/?tab=penjualan&menu=pesanan-masuk'</script>";
    }
    
}