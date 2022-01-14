<?php 
session_start();
require '../components/c_functions.php';
$user_id = $_GET['id'];

$action = mysqli_query($database, "DELETE FROM users WHERE user_id = $user_id");
if($action) {
    echo "<script>
        alert('Akun Dihapus!');
        window.location='../pages/dashboard/?tab=kelola-user'
    </script>";
} else {
    echo "<script>
        alert('Akun gagal dihapus!');
        window.location='../pages/dashboard/?tab=kelola-user'
    </script>";
}
?>