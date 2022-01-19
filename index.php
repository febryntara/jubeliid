<?php
session_start();
require './components/c_functions.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php include_once './components/c_meta_pack.php' ?>
</head>
<body>
    <div>
        <?php require_once './components/c_nav.php' ?>
    </div>
    <div>
        <?php include './components/c_pages.php' ?>
    </div>
    <div>
        <?php include './components/c_footer.php' ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>

