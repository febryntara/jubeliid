<?php
session_start();
require_once '../components/vendor/autoload.php';
require_once '../components/c_functions.php';
// DATA RESOURCE GATERING
$user_id = $_SESSION['loginData']['user_id'];
$data_header = getResult("SELECT * FROM tb_orders WHERE seller_id = $user_id AND status = 'barang diterima' ORDER BY order_id DESC");

// PDF PROCESS
$mpdf = new \Mpdf\Mpdf();
$html = '
    <center><h2>REPORT SUMARRY</h2></center>
    <table border="1" cellpadding="10" cellspacing="0" class="d-list-table tb-lp mt-1">
       <tr>
           <th>No</th>
           <th>Kode Order</th>
           <th>Pembeli</th>
           <th>Tanggal Order</th>
           <th>Tanggal Bayar</th>
           <th>Keterangan</th>
           <th>Total</th>
       </tr>';
        $i = 1;
       foreach ($data_header as $data) {
           $name = getResult("SELECT full_name FROM users WHERE user_id = ".$data['user_id'])[0]['full_name'];
           $html .= '<tr>
                <td>'. $i++ .'</td>
                <td>'. $data["order_code"] .'</td>
                <td>'. $name .'</td>
                <td>'. $data["order_date"] .'</td>
                <td>'. $data["payment_date"] .'</td>
                <td>'. $data["status"] .'</td>
                <td>Rp.'. $data["total"] .'</td>
           </tr>';
       }

$html .= '</table>
';
$mpdf->WriteHTML($html);
$mpdf->Output();