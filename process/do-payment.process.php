<?php 
require '../components/c_functions.php';
if(isset($_GET['order_id'])){
    $order_id = $_REQUEST['order_id'];
} else {
    $order_id = $_REQUEST['order_id'];
}

$dataHeader = getResult("SELECT * FROM tb_orders WHERE order_id = $order_id")[0];
$headerDetails = getResult("SELECT * FROM tb_order_detail WHERE order_id = $order_id");
$dataSeller = getResult("SELECT * FROM users WHERE user_id = ".$dataHeader['seller_id'])[0];
$dataBuyer = getResult("SELECT * FROM users WHERE user_id = ".$dataHeader['user_id'])[0];

if(isset($_POST['confirm_payment'])){
   insertImgPayment($_POST);
}
?>

<head>
    <title>Payment</title>
    <style>
        * {
            margin: 3px;
            padding: 0;
            /* border: 1px solid red; */
        }
        .p-container {
            width: 100vh;
            margin: auto;
            margin-top: 20px;
            display: flex;
            justify-content: center;
        }
        .p-box {
            width: 50%;
            background-color: lightgrey;
            color: black;
            text-align: center;
            padding: 15px;
            box-sizing: border-box;
            border-right: black 1.5px solid;
        }
        .p-box-2 {
            width: 50%;
            background-color: lightgrey;
            color: black;
            /* text-align: center; */
            padding: 15px;
            box-sizing: border-box;
            border-left: black 1.5px solid;
        }
        .p-grid-2{
            display: grid;
            grid-template-columns: 1fr 1fr;
        }
        .p-grid-4 {
            display: grid;
            grid-template-columns: 1fr .5fr .5fr .5fr;
        }
        .pt-right {
            text-align: right;
        }
        .pt-center {
            text-align: center;
        }
        .pt-left {
            text-align: left;
        }
    </style>
</head>
<body>
    <div class="p-container">
        <div class="p-box">
            <h2>Payment</h2>
            <h4><?= $dataHeader['order_code']; ?></h3>
            <hr>
            <div>
                <div class="p-grid-2">
                    <p class="pt-left">Order Date</p>
                    <p class="pt-right"><?= $dataHeader['order_date']; ?></p>
                </div>
                <div class="p-grid-2">
                    <p class="pt-left">Seller</p>
                    <p class="pt-right"><?= $dataSeller['full_name']; ?></p>
                </div>
                <div class="p-grid-2">
                    <p class="pt-left">You</p>
                    <p class="pt-right"><?= $dataBuyer['full_name']; ?></p>
                </div>
                <hr>
                <h4>Items</h4>
                <?php foreach($headerDetails as $data): ?>
                <div class="p-grid-4">
                    <?php $product = getResult("SELECT product_name FROM products WHERE product_id = ".$data['product_id'])[0]['product_name'] ?>
                    <p class="pt-center"><?= $product ?></p>
                    <p class="pt-center"><?= $data['sub_total'] / $data['qty']; ?></p>
                    <p class="pt-center"><?= $data['qty']; ?></p>
                    <p class="pt-center"><?= $data['sub_total']; ?></p>
                </div>
                <?php endforeach ?>
                <hr>
                <div class="p-grid-2">
                    <p class="pt-left">Discount</p>
                    <p class="pt-right">0%</p>
                </div>
                <div class="p-grid-2">
                    <p class="pt-left">Total</p>
                    <b class="pt-right">Rp. <?= $dataHeader['total'] ?></b>
                </div>
                <div class="p-grid-2">
                    <p class="pt-left">Status</p>
                    <b class="pt-right"><?= $dataHeader['status'] ?></b>
                </div>
                <form class="" action="" method="POST" enctype="multipart/form-data">
                    <label for="gambar">Bukti Bayar</label>
                    <input type="hidden" name="order_id" value="<?= $dataHeader['order_id'] ?>">
                    <input type="hidden" name="from_id" value="<?= $dataBuyer['user_id'] ?>">
                    <input type="hidden" name="to_id" value="<?= $dataSeller['user_id'] ?>">
                    <input type="hidden" name="amount" value="<?= $dataHeader['total'] ?>">
                    <input type="file" name="gambar"id="gambar">
                    <button type="submit" name="confirm_payment">Konfirmasi</button>
                </form>

            </div>
        </div>
        <ol class="p-box-2">
            <h2 class="pt-center">Cara Bayar</h2><hr>
            <li>Lakukan transfer sejumlah <b>Rp. <?= $dataHeader['total'] ?></b>  ke rekening <b>014882051353783536</b> atas nama <b>admin jubeli</b></li>
            <li>Kemudian upload bukti transfer/ bukti bayar ke kolom bukti bayar</li>
            <li>Terakhir, klik konfirmasi maka pembayaran akan diproses oleh admin</li>
        </ol>
    </div>
</body>
