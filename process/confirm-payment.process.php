<?php
require "../components/c_functions.php";
 $order_id = $_REQUEST['code'];
 mysqli_query($database, "UPDATE tb_orders SET status = 'menunggu pengiriman', payment_date = NOW() WHERE order_id = $order_id");
 mysqli_query($database, "UPDATE payments SET payment_status = 'pembayaran diterima', payment_date = NOW() WHERE order_id = $order_id");
 echo "<script>
    alert('Pembayaran diterima!');
    window.location = '../pages/dashboard?tab=pembayaran'
 </script>";