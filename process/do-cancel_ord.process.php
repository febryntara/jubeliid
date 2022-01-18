<?php 
require '../components/c_functions.php';
if(isset($_GET['order_id'])){
    $order_id = $_REQUEST['order_id'];
} else {
    $order_id = $_REQUEST['order_id'];
}
goBackStok($order_id);
$cancel = mysqli_query($database, "UPDATE tb_orders SET status = 'dibatalkan' WHERE order_id = $order_id");
echo "<script>
    alert('Order Dibatalkan!');
    window.location = '../pages/dashboard?tab=pesanan'
 </script>";
?>