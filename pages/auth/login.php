<?php 
session_start();
  $where = 'login';
  if(isset($_SESSION['loginStatus'])==true){
      echo "<script>window.location='../../?home'</script>";
  }
  if(isset($_GET['page'])){
    $where = $_GET['page'];
  }
  if(isset($_POST['back'])){
      echo "<script>window.location='../../?home'</script>";
      exit;
  }
  if(isset($_POST['login'])){
      $requestValue = requestLogin($_POST);
      if($requestValue > 0){
          echo "<script>alert('Login Berhasil!')</script>";
          echo "<script>window.location='../../?home'</script>";
      } else {
          echo "<script>alert('Login Gagal!')</script>";
      }
  }
?>

<div class="row g-0">
    <div class="col-md-order-2 col-lg-6">
        <!-- <img src="../../assets/img/authBgr.jpg" alt="Bacnground" class="d-block w-100"> -->
        <div class="auth-bgr"></div>
    </div>
    <div class="col-md-order-1 col-lg-6 bg-dark pt-5 auth-element" style="box-sizing: border-box;">
        <form action="" method="POST" class="container text-center text-light mt-5">
            <h2 class="fw-bold">Jubeli.ID</h2>
            <ul class="d-flex justify-content-center m-0 p-0 mt-5" style="list-style:none">
                <li><a style="color: <?= $class = $where == 'login' ? 'white; border-bottom: 3px solid white' : 'grey; border-bottom: 3px solid grey' ?>;" href="?page=login" class="text-decoration-none fw-bold p-1 ps-3 pe-3">LOGIN</a></li>
                <li><a style="color: <?= $class = $where == 'register' ? 'white; border-bottom: 3px solid white' : 'grey; border-bottom: 3px solid grey' ?>;" href="?page=register" class="text-decoration-none fw-bold p-1 ps-3 pe-3">REGISTER</a></li>
            </ul>
            <ul class="m-0 p-0 mt-5" style="list-style: none;">
                <li class="auth-input">
                    <span class="auth-input-span">
                        <ion-icon name="person"></ion-icon>
                    </span>
                    <input class="auth-input-field" type="text" name="username" placeholder="username" autocomplete="off">
                </li>
                <li class="auth-input mt-2">
                    <span class="auth-input-span">
                        <ion-icon name="shield"></ion-icon>
                    </span>
                    <input class="auth-input-field" type="password" name="password" placeholder="password" autocomplete="off">
                </li>
                <li>
                    <button class="btn btn-warning mt-5 fw-bold rounded-pill" type="submit" name="login">Login</button>
                </li>
                <li>
                    <button class="btn btn-secondary mt-2 fw-bold rounded-pill" type="submit" name="back">Back</button>
                </li>
            </ul>
        </form>
    </div>
</div>