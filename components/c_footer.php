<?php 
  $where = 'home';
  if(isset($_GET['page'])){
    $where = $_GET['page'];
  }
?>
<!--
<div class="container-fluid bg-dark mt-5 p-3 text-center" style="color: white;height:300px">
    <h1>Jubeli.ID</h1>
    <ul style="list-style: none;" class="mt-4 d-flex justify-content-evenly w-90 m-auto">
        <li>
          <a style="text-decoration: none; color:inherit" class="" href="?page=home">Home</a>
        </li>
        <li>
          <a style="text-decoration: none; color:inherit" class="" href="?page=products">Products</a>
        </li>
        <li>
          <a style="text-decoration: none; color:inherit" class="" href="?page=about">About</a>
        </li>
        <li>
          <button type="button" class="btn btn-dark p-0" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Contact
        </button>
        </li>
      </ul>
</div>
 -->

<div class="mt-5 py-3 bg-dark container-fluid">
    <h2 class="nav-brand text-center" style="color: white;">Jubeli.ID</h2>
    <ul class="nav justify-content-center border-bottom pb-3 mb-3">
      <li class="nav-item"><a style="color: <?= $class = $where == 'home' ? 'white' : 'grey' ?>;" href="?page=home" class="nav-link px-2">Home</a></li>
      <li class="nav-item"><a style="color: <?= $class = $where == 'products' ? 'white' : 'grey' ?>;" href="?page=products" class="nav-link px-2">Products</a></li>
      <li class="nav-item"><a style="color: <?= $class = $where == 'about' ? 'white' : 'grey' ?>;" href="?page=about" class="nav-link px-2">About</a></li>
      <li class="nav-item">
        <button type="button" class="btn btn-dark text-muted " data-bs-toggle="modal" data-bs-target="#exampleModal">
            Contact
        </button>
      </li>
    </ul>
    <p class="text-center text-muted">&copy; 2021 Jubeli, Inc</p>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Our Contact</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p>email : jubeli.id@gmail.com</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-warning" style="color: white;">Ok! Got it!</button>
      </div>
    </div>
  </div>
</div>