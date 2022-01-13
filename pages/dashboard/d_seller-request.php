<?php 
$menu = isset($_GET['menu']) ? $_GET['menu'] : 'seller-request';
$user_id = $_SESSION['loginData']['user_id'];
$data_header = getResult("SELECT * FROM request_seller WHERE status = 'menunggu' ORDER BY request_id DESC");
// $data_collections = getResult("SELECT * FROM tb_orders INNER JOIN tb_order_detail USING(order_id)");
?>
<div>
    <ul class="d-menu text-center" style="list-style: none;">
        <li class="d-menu-item <?= $class = $menu == 'seller-request' ? 'd-menu-active' : NULL ?>">
            <a class="link-reset" href="?tab=seller-request">Seller Request</a>
        </li>
    </ul>
    <table class="d-list-table tb-lp mt-5">
       <tr class="text-center">
           <th>No</th>
           <th>Nama User</th>
           <th>Status</th>
           <th>Aksi</th>
       </tr>
       <?php $index = 0;?>
       <?php foreach($data_header as $data):?>
        <tr class="text-center">
            <td><?= $index+1; ?></td>
            <td><?= $data['username']; ?></td>
            <td><?= $data['status']; ?></td>
            <td>
                <a href="../../process/request-action.process.php?id=<?= $data['user_id'] ?>&key=accept" class="btn btn-success">Terima</a>
                <a href="../../process/request-action.process.php?id=<?= $data['user_id'] ?>&key=denny" class="btn btn-danger">Tolak</a>
            </td>
        </tr>
        <?php endforeach; ?>
   </table>
</div>