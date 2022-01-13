<?php 
session_start();
require '../components/c_functions.php';
$user_id = $_GET['id'];
$username = getResult("SELECT * FROM users WHERE user_id = $user_id")[0]['username'];

$action = mysqli_query($database, "INSERT INTO request_seller VALUES (NULL, $user_id, '$username', 'menunggu')");
if($action) {
    echo "<script>
        alert('Request Berhasil!');
        window.location='../pages/dashboard/'
    </script>";
} else {
    echo "<script>
        alert('Request Gagal!');
        window.location='../pages/dashboard/'
    </script>";
}
?>