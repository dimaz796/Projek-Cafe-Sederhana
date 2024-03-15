<?php
include "navbar.php";
date_default_timezone_set("Asia/Jakarta");
$date = date("D,d M Y H:i:s");
$id_order = $_GET['id_order'];
$dimas_sql ="SELECT * FROM `dimas_detail_order` 
JOIN dimas_menu ON dimas_detail_order.id_menu = dimas_menu.id_menu 
JOIN dimas_order ON dimas_detail_order.id_order = dimas_order.id_order 
JOIN dimas_pelanggan ON dimas_order.id_pelanggan = dimas_pelanggan.id_pelanggan
WHERE `dimas_detail_order`.`id_order`='$id_order'";
$dimas_temp = mysqli_query($conn, $dimas_sql);
                       
foreach ($dimas_temp as $dimas_row){
    $Dimas_no_meja = $dimas_row['no_meja'];
    $Dimas_id_order = $dimas_row['id_order'];
    $Dimas_pelanggan = $dimas_row['nama_pelanggan'];
    $total = $dimas_row['total'];
    $Dimas_pw = ($total >= 100000) ? ' Password Wifi = Makanenak123' : ' Tidak Ada Wifi,Minimal Order Rp.100.000';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pembayaran</title>
</head>
<body>
    <div class="main" >
        
    
    <table class="table table-borderless table-light" border="1" style="margin-left:400px; width:400px" >
    <tr>
        <td class="text-center" colspan="4"><br></td>
    </tr>
   <tr>
           <th class="text-center" colspan="4"><h1><i class="bi bi-apple" ></h1></i></th>
        </tr>
        <tr>
            <td class="text-center" colspan="4"><h2>Apple Cafe</h2></td>
        </tr>

        <tr>
            <td class="text-center" colspan="2"><label style="margin-right:80px">Id Transaksi : <?=$Dimas_id_order?></label></td>
            <td class="text-center" colspan="2">No Meja : <?=$Dimas_no_meja  ?></td>
        </tr>
        <tr>
            <td class="text-center" colspan="2"><label style="margin-right:80px"><?=$date?></label></td>           
            <td class="text-center" colspan="2">Nama : <?=$Dimas_pelanggan?></td>    
        </tr>
        <tr>
            <td class="text-center" colspan="4"><hr><h4>Selesai</h4><hr></td>
        </tr>
        <?php foreach ($dimas_temp as $k => $dimas_row):?>
        <tr>
            <td class="text-center"><?= $dimas_row['nama_menu'] ?></td>
            <td class="text-center">Rp.<?= number_format($dimas_row['harga_menu']); ?></td>
            <td class="text-center"><?= $dimas_row['jumlah'] ?></td>
            <td class="text-center">Rp.<?= number_format($dimas_row['harga_menu'] * $dimas_row['jumlah']); ?></td>
        </tr>
        <?php  endforeach; ?>
        <tr>
            <td class="fw-bold text-center" colspan="4"><hr></td>
        </tr>
        <tr>
            <td colspan="3" class="text-center">Total Pesanan</td>
            <td colspan="1" class="text-center">Rp.<?=number_format($total);$pajak = $total * 0.11; ?></td>
        </tr>
        <tr>
            <td colspan="3" class="text-center">Pajak </td>
            <td colspan="1" class="text-center">Rp.<?= number_format($pajak); $diskon = ($total >= 100000) ? 0.1 : 0; ?></td>
        </tr>
        <tr>
            <td colspan="3" class="text-center">Diskon </td>
            <td colspan="1" class="text-center">Rp.<?= number_format($total * $diskon) ?></td>
        </tr>
        <tr>
            <td class="fw-bold text-center" colspan="4"><hr></td>
        </tr>
        <tr>
            <td colspan="3" class="text-center">Total  </td>
            <td colspan="1" class="text-center">Rp.<?= number_format($total + $pajak - ($total * $diskon)) ?></td>
        </tr>

        <tr>
            <td class="fw-bold text-center" colspan="4"><hr></td>
        </tr>
        <tr>
            <td class="text-center" colspan="4"><?=$Dimas_pw ?></td>
        </tr>
        <tr>
            <td class="text-center" colspan="4"><h3><b>Terima kasih</b></h3></td>
        </tr>
        

    </table>
    
    </div>
    
</body>
</html>