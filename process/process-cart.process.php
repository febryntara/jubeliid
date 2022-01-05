<?php 
session_start();
require '../components/c_functions.php';
$buyer_id = $_SESSION['loginData']['user_id'];
unset($_SESSION['cart']);
$qty = $_POST['qty'];
$product_price = $_POST['product_price'];
$product_id = $_POST['product_id'];
$seller_id = $_POST['seller_id'];
$seller_id = array_count_values($seller_id);

foreach ($seller_id as $key => $value) {
    $query = "";
    $id_arr = [];
    $price_arr = [];
    $collection = [];
    for ($i=0; $i < count($product_id); $i++) { 
        $query .= "user_id = $key AND product_id = ".$product_id[$i];
        if($i != count($product_id)-1){
            $query .= " OR ";
        }
        $qty_arr[] = [
            "product_id" => $product_id[$i],
            "qty" => $qty[$i]
        ];
    }
    // var_dump($query);
    $collection = getResult("SELECT product_id,product_price,product_name,user_id FROM products WHERE $query");
    for($i = 0; $i < count($collection); $i++){
        $id_arr[] = $collection[$i]['product_id'];
        $price_arr[] = $collection[$i]['product_price'];
    }
    for ($i=0; $i < count($qty_arr); $i++) { 
        for ($j=0; $j < count($collection); $j++) { 
            if($qty_arr[$i]['product_id']==$collection[$j]['product_id']){
               $collection[$j] += ["qty"=>$qty_arr[$i]["qty"]];
            }
        }
    }
   
    // var_dump($collection);
    $make_order = orderProcess($collection, $buyer_id);
}

if($make_order==true){
    echo "<script>alert('Order berhasil diproses!')</script>";
} else {
    $new_order = getResult("SELECT order_id from tb_orders ORDER BY order_id DESC")[0]['order_id'];
    mysqli_query($database, "DELETE FROM tb_orders WHERE order_id = $new_order");
    echo "<script>alert('Order gagal diproses! Coba ulang!')</script>";
}
echo "<script>window.location='../pages/dashboard?tab=pesanan&menu=dikemas'</script>";