<?php 
session_start();
session_reset();
session_destroy();
echo "<script>alert('Anda telah Logout!')</script>";
echo "<script>document.location.href = '../../index.php'</script>";
?>