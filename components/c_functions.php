<?php
$database = mysqli_connect("localhost", "root", "", "tokomedia");

function getResult($query){
    global $database;
    $raw = mysqli_query($database, $query);
    $collection = [];
    while ($data = mysqli_fetch_assoc($raw)){
        $collection[] = $data;
    }
    return $collection;
}

function requestLogin($data) {
    $username = $data['username'];
    $password = $data['password'];
    $collection = getResult("SELECT username, password FROM users WHERE username = '$username'");
    if(count($collection)>0){
       if(password_verify($password, $collection[0]['password'])){
           $_SESSION['loginStatus'] = true;
           $_SESSION['loginData'] = getResult("SELECT * FROM users WHERE username = '$username'")[0];
           return 1;
       }
       return 0;
    }
}

function checkUser($data){
    $username = $data['username'];
    $collection = getResult("SELECT username, password FROM users WHERE username = '$username'");
    if(count($collection)>0){
        return 0;
    }
    return 1;
}

function register($data){
    global $database;
    $username = stripslashes($data['username']);
    $password = $data['password'];
    $fullName = $data['full_name'];
    $saldo = $data['saldo'];
    $status = $data['status_id'];
    if(checkUser($data)==0){
        echo "<script>alert('Username sudah digunakan!!')</script>";
        return 0;
    }
    if($data['password_2']!=$password){
        echo "<script>alert('Password anda tidak sama!')</script>";
        return 0;
    }
    $password = password_hash($password, PASSWORD_DEFAULT);
    mysqli_query($database, "INSERT INTO users VALUES (NULL, '$username', '$password', '$fullName', $status, $saldo)");
    if(mysqli_affected_rows($database)<1){
        echo "<script>alert('Kesalahan saat memasuki sistem, harap masukan data kembali!')</script>";
        return 0;
    }
    return 1;
}

function insertProduct($data){
    global $database;
    $code = uniqid("PD_");
    $name = htmlspecialchars($data["product_name"]);
    $price = htmlspecialchars($data["product_price"]);
    $category = $data['category'];
    $stok = htmlspecialchars($data["stok"]);
    $userId = $data['user_id'];
    $image = uploadImage();
    $sold = 0;
    $deskripsi = htmlspecialchars($data['deskripsi']);
    if(!$image){
        $error = -1;
    } else {
        mysqli_query($database, "INSERT INTO products VALUES (NULL, '$code', '$name', $price, '$category', $stok, $userId, '$image', $sold, '$deskripsi');");
        $error = mysqli_affected_rows($database);
    }
    if($error >= 1){
        echo "<script>alert('Item berhasil ditambah!')</script>";
    } else {
        echo "<script>alert('Item gagal ditambah!')</script>";
    }    
    echo "<script>window.location = '?tab=produk&menu=list'</script>";
}

function deleteProduct($id){
    global $database;
    mysqli_query($database, "DELETE FROM products WHERE product_id=$id");
    $error = mysqli_affected_rows($database);
    if($error >= 1){
        echo "<script>alert('Item berhasil dihapus!')</script>";
        echo "<script>window.location = '?tab=produk&menu=list'</script>";
    } else {
        echo "<script>alert('Item gagal dihapus!')</script>";
    } 
}

function uploadImage($for = "add_product"){
    $fileName = $_FILES['gambar']['name'];
    $fileLoc = $_FILES['gambar']['tmp_name'];
    $errorCode = $_FILES['gambar']['error'];
    $validExc = ['jpg', 'jpeg', 'png'];
    $generatedName = uniqid();
    $filePath = $errorCode === 4 ? 'default' : strtolower(pathinfo($fileName)['extension']);
    if($filePath=='default'){
        return 'default.jpg';
    }
    if(!in_array($filePath, $validExc)){
        echo "<script>alert('File yang di upluad harus gambar!!')</script>";
        return false;
    }
    $generatedName.='.';
    $generatedName.=$filePath;
    if($for=="add_product"){
        move_uploaded_file($fileLoc, "../../assets/img/$generatedName");
    } else if($for=="payment"){
        move_uploaded_file($fileLoc, "../assets/img/$generatedName");
    }
    return $generatedName;
}

function editProduct ($data){
    global $database;
    $productId = htmlspecialchars($data['product_id']);
    $productCode = htmlspecialchars($data['product_code']);
    $productName = htmlspecialchars($data['product_name']);
    $productPrice = htmlspecialchars($data['product_price']);
    $category = htmlspecialchars($data['category']);
    $stok = $data['stok'];
    $userId = htmlspecialchars($data['user_id']);
    $sold = $data['sold'];
    $deskripsi = htmlspecialchars($data['deskripsi']);
    $gambar = uploadImage();
    if($_FILES["gambar"]["error"]===4){
        $gambar = $data["oldImage"];
    }
    // var_dump($data);die;
    mysqli_query($database, "UPDATE products SET product_code = '$productCode', product_name = '$productName', product_price = $productPrice, category = '$category', stok = $stok, user_id = $userId, gambar = '$gambar', sold = $sold, deskripsi = '$deskripsi' WHERE product_id = $productId");
    // echo mysqli_error($db); die;
    $error = mysqli_affected_rows($database);
    if($error >= 1){
        echo "<script>alert('Item berhasil diubah!')</script>";
        echo "<script>window.location = '?tab=produk'</script>";
    } else {
        echo "<script>alert('Item gagal diubah!')</script>";
    } 
}

function orderProcess($array, $buyer_id){
    global $database;
    $total = 0;
    $seller_id = $array[0]['user_id'];
    $order_code = uniqid("ORD_");
    for ($i=0; $i < count($array); $i++) { 
         $total += $array[$i]['product_price'] * $array[$i]['qty'];
    }
    $make_order = mysqli_query($database, "INSERT INTO tb_orders VALUES (NULL, '$order_code', NOW(), NULL, 'menunggu konfirmasi', $buyer_id, $total, $seller_id)");
    if($make_order){
        $order_id = getResult("SELECT order_id FROM tb_orders GROUP BY order_id DESC LIMIT 1")[0]['order_id'];
    } else {
        return false;
    }
    foreach ($array as $data){
        $id = $data['product_id'];
        $qty = $data['qty'];
        $sub_total = $data['product_price'] * $data['qty'];
        $ordId = $order_id;
        $seller_id = $data['user_id'];
        mysqli_query($database, "INSERT INTO tb_order_detail VALUES ($ordId, $id, $qty, $sub_total, $seller_id, NULL)");
        if(mysqli_error($database)){
            return false;
        }
    }
    return true;
}

function insertImgPayment($data){
    global $database;
    $order_id = $data['order_id'];
    $from_id = $data['from_id'];
    $to_id = $data['to_id'];
    $amount = $data['amount'];
    $payment_status = "menunggu konfirmasi pembayaran";
    $image = uploadImage("payment");

    if(!$image){
        $error = -1;
    } else {
        mysqli_query($database, "INSERT INTO payments VALUES (NULL,$order_id,$from_id, $to_id, $amount, '$payment_status', '$image')");
        $error = mysqli_affected_rows($database);
    }
    if($error >= 1){
        echo "<script>alert('Bukti bayar berhasil diupload!')</script>";
        mysqli_query($database, "UPDATE tb_orders SET status = 'pembayaran di proses' WHERE order_id = $order_id");
    } else {
        echo "<script>alert('Bukti bayar gagal diupload!')</script>";
    }    
    echo "<script>window.location = '../pages/dashboard?tab=pesanan&menu=dikemas'</script>";
}

function decreaseStok($order_id){
    global $database;
    $collections = getResult("SELECT * FROM tb_order_detail WHERE order_id = $order_id");
    foreach ($collections as $action) {
        $updatedStok = getResult("SELECT * FROM products WHERE product_id = ".$action['product_id'])[0]['stok'] - $action['qty'];
        $updatedSold = getResult("SELECT * FROM products WHERE product_id = ".$action['product_id'])[0]['sold'] + $action['qty'];
        $doUpdate = mysqli_query($database, "UPDATE products SET stok = $updatedStok, sold = $updatedSold WHERE product_id = ".$action['product_id']);
    }
}