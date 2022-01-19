<?php 
session_start();
require '../components/c_functions.php';
$user_id = $_GET['request_id'];
$info = getResult("SELECT user_id, status_id FROM users WHERE user_id = $user_id")[0];
$s_id = $info['status_id'] == 1 ? 2 : ($info['status_id'] == 2 ? 1 : NULL);
mysqli_query($database, "UPDATE users SET status_id = $s_id where user_id = $user_id");
$_SESSION['loginData'] = getResult("SELECT * FROM users WHERE user_id = $user_id")[0];
echo "<script>window.location='../pages/dashboard'</script>";
?>