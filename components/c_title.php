<?php 
$title = 'home';
if(isset($_GET['page'])){
    $title = $_GET['page'];
}
switch($title){
    case 'products':
        echo "Products";
        break;
    case 'about':
        echo "About Us";
        break;
    case 'login':
        echo "Login";
        break;
    case 'register':
        echo "Register";
        break;
    default:
        echo "Home Page";
        break;
}