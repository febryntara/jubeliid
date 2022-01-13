<?php 
require '../components/c_functions.php';
if(isset($_REQUEST['id']) && isset($_REQUEST['key'])){
    $id = $_REQUEST['id'];
    $key = $_REQUEST['key'];

    if($key == 'accept'){
        $action1 = mysqli_query($database, "UPDATE users SET status_id = 2 WHERE user_id = $id");
        $action2 = mysqli_query($database, "UPDATE request_seller SET status = 'diterima' WHERE user_id = $id");

        if($action1 && $action2){
            echo "<script>
                alert('Pendaftaran Seller Berhasil!');
                window.location = '../pages/dashboard?tab=seller-request'
            </script>";
        }
    } else if($key == 'denny') {
        $action1 = mysqli_query($database, "DELETE FROM request_seller WHERE user_id = $id");
         echo "<script>
            alert('Pendaftaran Seller Ditolak!');
            window.location = '../pages/dashboard?tab=seller-request'
        </script>";
    } else {
        echo "<script>
            alert('Proses gagal! Ulang!');
            window.location = '../pages/dashboard?tab=seller-request'
        </script>";
    }

} else {
    echo "<script>
        alert('Proses gagal! Ulang!');
        window.location = '../pages/dashboard?tab=request-seller'
    </script>";
}
