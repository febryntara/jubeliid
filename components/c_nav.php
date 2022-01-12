<?php 
  $where = 'home';
  if(isset($_GET['page'])){
    $where = $_GET['page'];
  }
  $btnControl = 'mustLogin';
  if(isset($_SESSION['loginStatus'])==true){
    $btnControl = 'asLogin';
  }
?>
<nav class="navbar navbar-expand-sm navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Jubeli.ID</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto text-center">
        <li class="nav-item">
          <a class="nav-link <?= $class = $where == 'home' ? 'active' : NULL ?>" aria-current="page" href="?page=home">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?= $class = $where == 'products' ? 'active' : NULL ?>" href="?page=products&tab=semua">Products</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?= $class = $where == 'about' ? 'active' : NULL ?>" href="?page=about">About</a>
        </li>
      </ul>
      <?php 
        switch($btnControl){
          case 'asLogin':
            echo "
              <ul class='navbar-nav text-center ms-auto'>
                <li class='nav-item m-1'>
                      <a href='./pages/dashboard?tab=pesanan' class='btn btn-dark rounded-circle fs-5'>
                        <ion-icon name='cart-outline'></ion-icon>
                      </a>
                  </li>
                  <li class='nav-item m-1'>
                      <a href='./pages/dashboard/' class='btn btn-danger rounded-pill'>Dashboard</a>
                  </li>
                  <li class='nav-item m-1'>
                      <a href='./pages/auth/logout.php' class='btn btn-secondary rounded-pill'>Logout</a>
                  </li>
              </ul>
            ";
            break;
          default:
            echo "
              <ul class='navbar-nav text-center ms-auto'>
                  <button class='btn btn-dark rounded-circle fs-5' onclick='mustLogin()'>
                        <ion-icon name='cart-outline'></ion-icon>
                  </button>
                  <li class='nav-item m-1'>
                      <a href='./pages/auth/?page=register' class='btn btn-danger rounded-pill'>Register</a>
                  </li>
                  <li class='nav-item m-1'>
                      <a href='./pages/auth/?page=login' class='btn btn-secondary rounded-pill'>Login</a>
                  </li>
              </ul>
            ";
        }
      ?>

    </div>
  </div>
</nav>

<script>
  function mustLogin(){
     return alert('Harus login terlebih dahulu');
  }
</script>