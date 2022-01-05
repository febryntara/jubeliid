<?php
require '../components/c_functions.php';
if(isset($_POST['confirm'])){
    $order_id = $_REQUEST['order_id'];
    $statusChange = mysqli_query($database, "UPDATE tb_orders SET status = 'barang diterima' WHERE order_id = ".$order_id);
    if($statusChange){
        echo "<script>alert('Barang telah diterima');window.location='../pages/dashboard/?tab=pesanan&menu=dikemas'</script>";
    }
    
}
if(isset($_GET['order_id'])){
    $order_id = $_REQUEST['order_id'];
    $statusChange = mysqli_query($database, "UPDATE tb_orders SET status = 'barang diterima' WHERE order_id = ".$order_id);
    if($statusChange){
        echo "<script>alert('Barang telah diterima');window.location='../pages/dashboard/?tab=pesanan&menu=dikemas'</script>";
    }
    
}