<?php 
session_start();
unset($_SESSION['cart']);

header("location:../pages/dashboard?tab=pesanan");