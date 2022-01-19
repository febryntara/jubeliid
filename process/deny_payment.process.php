<?php

include '../components/c_functions.php';
if(isset($_GET['id'])){
    $id = $_GET['id'];
    mysqli_query($database, "UPDATE tb_orders SET status = 'dibatalkan' WHERE order_id = $id");
    mysqli_query($database, "UPDATE payments SET payment_status = 'pembayaran ditolak', payment_date = NOW() WHERE order_id = $id");
    echo "<script>
        alert('Pembayaran berhasil ditolak!');
        window.location = '../pages/dashboard?tab=pembayaran'
    </script>";
} else {
    echo "<script>
        alert('ID tak tersedia, coba ulangi!');
        window.location = '../pages/dashboard?tab=pembayaran'
    </script>";
}