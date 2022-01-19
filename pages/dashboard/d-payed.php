<?php 
$user_id = $_SESSION['loginData']['user_id'];
$data_header = getResult("SELECT * FROM payments INNER JOIN tb_orders USING (order_id) WHERE (payment_status = 'pembayaran diterima' OR payment_status = 'pembayaran ditolak')");
// $data_header = [];
// foreach ($data as $key => $value) {
//     $ord_id = $value['order_id'];
//     $do = getResult("SELECT * FROM tb_orders WHERE order_id = $ord_id")[0];
//     $data_header[] = $do;
// }
//$data_header = getResult("SELECT * FROM tb_orders WHERE status = 'barang diterima' OR status = 'barang dikirim' OR status = 'menunggu pengiriman' ORDER BY order_id DESC");
// $data_collections = getResult("SELECT * FROM tb_orders INNER JOIN tb_order_detail USING(order_id)");
?>

<div>
    <!-- <a class="btn btn-primary mt-4" href="../../process/print_report.process.php" target="_blank" rel="noopener noreferrer">Cetak PDF</a> -->
    <table class="d-list-table table-kemas mt-1">
       <tr>
           <th>No</th>
           <th>Kode Order</th>
           <th>Tanggal Order</th>
           <th>Tanggal bayar</th>
           <th>Total</th>
           <th>Status</th>
           <th>Aksi</th>
       </tr>
       <?php $index = 0; $orderId_collections = []?>
       <?php foreach($data_header as $data): $index++; $orderId_collections[] = $data['order_id'] ?>
        <tr>
            <td><?= $index; ?></td>
            <td><?= $data['order_code']; ?></td>
            <td><?= $data['order_date']; ?></td>
            <td><?= is_null($data['payment_date']) ? '-' : $data['payment_date']; ?></td>
            <td>Rp. <?= $data['total']; ?></td>
            <td><?= $data['payment_status'] ?></td>
            <td>
                <div class="d-flex g-2">
                    <button type="button" class="btn btn-warning me-2" data-bs-toggle="modal" data-bs-target="#exampleModal<?= $data['order_id'] ?>">
                        Detail
                    </button>
                </div>
            </td>
        </tr>
        <?php endforeach; ?>
        <tr class="<?= $class = count($data_header) > 0 ? 'd-none' : NULL ?>">
            <td colspan="7">Data Tidak Ditemukan</td>
        </tr>
   </table>

   <!-- MODAL -->
   <?php foreach($orderId_collections as $order_id) :?>
    <?php 
        $productDetail = getResult("SELECT * FROM tb_order_detail WHERE order_id = $order_id"); 
        $orderDetail = getResult("SELECT * FROM tb_orders WHERE order_id = $order_id");
        $buyerDetail = getResult("SELECT full_name FROM users WHERE user_id = ".$orderDetail[0]['user_id'])[0]['full_name'];
        $paymentDetail = getResult("SELECT * FROM payments WHERE order_id = $order_id")[0];
    ?>
   <div class="modal fade" id="exampleModal<?= $order_id ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <form class="modal-dialog" method="POST" action="../../process/confirm-payment.process.php">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><?= $buyerDetail ?>'s Order</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <ul class="container-fluid">
                        <li class="row text-center fw-bold">
                            <div class="col-3">Produk</div>
                            <div class="col-3">Harga</div>
                            <div class="col-3">Qty</div>
                            <div class="col-3">Sub Total</div>
                        </li>
                        <?php foreach($productDetail as $data): ?>
                        <li class="row text-center">
                            <?php $productName = getResult("SELECT product_name FROM products WHERE product_id = ".$data['product_id'])[0]['product_name'];?>
                            <div class="col-3"><?= $productName; ?></div>
                            <div class="col-3">Rp. <?= $data['sub_total']/$data['qty']; ?></div>
                            <div class="col-3"><?= $data['qty']; ?></div>
                            <div class="col-3">Rp. <?= $data['sub_total']; ?></div>
                        </li>
                        <?php endforeach ?>
                        <li style="list-style: none;">
                            <img class="d-block w-100" src="../../assets/img/<?= $paymentDetail['proof'] ?>" alt="">
                        </li>
                        <input type="hidden" name="code" value="<?= $order_id ?>">
                    </ul>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
                </div>
            </div>
        </form>
    </div>
    <?php endforeach; ?>
</div>