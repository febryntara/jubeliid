<?php
require '../components/c_functions.php';
if(isset($_POST['confirm'])){
    $order_id = $_REQUEST['order_id'];
    //$orderInfo = getResult("SELECT * FROM tb_orders WHERE order_id = ".$order_id);
    $statusChange = mysqli_query($database, "UPDATE tb_orders SET status = 'menunggu pembayaran' WHERE order_id = ".$order_id);
    if($statusChange){
        echo "<script>alert('Order berhasil diterima');window.location='../pages/dashboard/?tab=penjualan&menu=pesanan-masuk'</script>";
    }
    
}
if(isset($_GET['order_id'])){
    $order_id = $_REQUEST['order_id'];
    //$orderInfo = getResult("SELECT * FROM tb_orders WHERE order_id = ".$order_id);
    $statusChange = mysqli_query($database, "UPDATE tb_orders SET status = 'menunggu pembayaran' WHERE order_id = ".$order_id);
    if($statusChange){
        echo "<script>alert('Order berhasil diterima');window.location='../pages/dashboard/?tab=penjualan&menu=pesanan-masuk'</script>";
    }
    
}