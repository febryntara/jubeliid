<?php 
$menu = isset($_GET['menu']) ? $_GET['menu'] : 'kelola-user';
$user_id = $_SESSION['loginData']['user_id'];
$data_header = getResult("SELECT * FROM users WHERE status_id != 3");
// $data_collections = getResult("SELECT * FROM tb_orders INNER JOIN tb_order_detail USING(order_id)");
?>
<div>
    <ul class="d-menu text-center" style="list-style: none;">
        <li class="d-menu-item <?= $class = $menu == 'kelola-user' ? 'd-menu-active' : NULL ?>">
            <a class="link-reset" href="?tab=kelola-user">Kelola User</a>
        </li>
    </ul>
    <table class="d-list-table tb-lp mt-5">
       <tr class="text-center">
           <th>No</th>
           <th>Nama User</th>
           <th>Status</th>
           <th>Aksi</th>
       </tr>
       <?php $index = 1;?>
       <?php foreach($data_header as $data):?>
        <tr class="text-center">
            <td><?= $index++; ?></td>
            <td><?= $data['username']; ?></td>
            <td><?= $print = ($data['status_id'] == 1) ? 'Pembeli' : 'Penjual' ?></td>
            <td>
                <a href="../../process/delete-user.process.php?id=<?= $data['user_id'] ?>&key=delete" class="btn btn-danger">Hapus</a>
            </td>
        </tr>
        <?php endforeach; ?>
   </table>
</div>