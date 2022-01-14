<?php
$user_id = $_SESSION['loginData']['user_id'];
$data_header = getResult("SELECT * FROM tb_orders WHERE seller_id = $user_id AND status = 'barang diterima' ORDER BY order_id DESC");
// $data_collections = getResult("SELECT * FROM tb_orders INNER JOIN tb_order_detail USING(order_id)");
?>
<div>
    <a class="btn btn-primary mt-4" href="../../process/print_report.process.php" target="_blank" rel="noopener noreferrer">Cetak PDF</a>
    <table class="d-list-table tb-lp mt-1">
        <tr>
            <th>No</th>
            <th>Kode Order</th>
            <th>Tanggal Order</th>
            <th>Keterangan</th>
            <th>Total</th>
            <th>Aksi</th>
        </tr>
        <?php $index = 0;
        $orderId_collections = [] ?>
        <?php foreach ($data_header as $data) : $index++;
            $orderId_collections[] = $data['order_id'] ?>
            <tr>
                <td><?= $index; ?></td>
                <td><?= $data['order_code']; ?></td>
                <td><?= $data['order_date']; ?></td>
                <td><?= $data['status']; ?></td>
                <td>Rp. <?= $data['total']; ?></td>
                <td>
                    <div class="d-flex g-2">
                        <button type="button" class="btn btn-warning me-2" data-bs-toggle="modal" data-bs-target="#exampleModal<?= $data['order_id'] ?>">
                            Detail
                        </button>
                        <?php $alpha_1 = $data['status'] == "menunggu konfirmasi" ? NULL : 'd-none' ?>
                        <?php $alpha_2 = $data['status'] == "menunggu pengiriman" ? NULL : 'd-none' ?>
                        <a class="btn btn-danger <?= $alpha_1 ?>" href="../../process/confirm-order.process.php?order_id=<?= $data['order_id'] ?>" onclick="return confirm('Terima order?')">Terima Order</a>
                        <a class="btn btn-danger <?= $alpha_2 ?>" href="../../process/send-product.process.php?order_id=<?= $data['order_id'] ?>" onclick="return confirm('Kirim Barang?')">Kirim Barang</a>
                    </div>
                </td>
            </tr>
        <?php endforeach; ?>
        <tr class="<?= $class = count($data_header) > 0 ? 'd-none' : NULL ?>">
            <td colspan="6">Data Tidak Ditemukan</td>
        </tr>
    </table>

    <!-- MODAL -->
    <?php foreach ($orderId_collections as $order_id) : ?>
        <?php
        $productDetail = getResult("SELECT * FROM tb_order_detail WHERE order_id = $order_id");
        $orderDetail = getResult("SELECT * FROM tb_orders WHERE order_id = $order_id");
        $buyerDetail = getResult("SELECT full_name FROM users WHERE user_id = " . $orderDetail[0]['user_id'])[0]['full_name'];
        ?>
        <div class="modal fade" id="exampleModal<?= $order_id ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <form class="modal-dialog" method="POST" action="../../process/confirm-order.process.php">
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
                            <?php foreach ($productDetail as $data) : ?>
                                <li class="row text-center">
                                    <?php $productName = getResult("SELECT product_name FROM products WHERE product_id = " . $data['product_id'])[0]['product_name']; ?>
                                    <div class="col-3"><?= $productName; ?></div>
                                    <div class="col-3">Rp. <?= $data['sub_total'] / $data['qty']; ?></div>
                                    <div class="col-3"><?= $data['qty']; ?></div>
                                    <div class="col-3">Rp. <?= $data['sub_total']; ?></div>
                                </li>
                            <?php endforeach ?>
                            <input type="hidden" name="order_id" value="<?= $order_id ?>">
                        </ul>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
                        <button type="submit" name="confirm" class="btn btn-warning <?= $class = $orderDetail[0]['status'] == 'menunggu konfirmasi' ? NULL : 'd-none' ?>">Terima Order</button>
                        <!-- <button type="submit" name="receive" class="btn btn-warning <?= $class = $orderDetail[0]['status'] == 'sudah dibayar' ? NULL : 'd-none' ?>">Konfirmasi Pembayaran</button> -->
                        <!-- <button type="submit" name="receive" class="btn btn-warning <?= $class = $orderDetail[0]['status'] == 'menunggu pengiriman' ? NULL : 'd-none' ?>">Konfimasi Pembayaran</button> -->
                    </div>
                </div>
            </form>
        </div>
    <?php endforeach; ?>
</div>