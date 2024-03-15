<?php
include "connection.php";

$id_detail_order = $_GET['id_detail_order'];
$id_order = $_GET['id_order'];

$dimas_sql = "DELETE FROM `dimas_detail_order` WHERE id_detail_order = $id_detail_order";
$dimas_hapus = mysqli_query($conn, $dimas_sql);
$dimas_ai = "ALTER TABLE `dimas_detail_order` AUTO_INCREMENT = $id_detail_order";
$dimas_reset = mysqli_query($conn, $dimas_ai);

if ($dimas_hapus && $dimas_reset) {
    $dimas_sql = "SELECT * FROM `dimas_detail_order` 
                     JOIN `dimas_menu` ON dimas_detail_order.id_menu = dimas_menu.id_menu
                     WHERE dimas_detail_order.id_order = '$id_order'";
    $dimas_detail = mysqli_query($conn, $dimas_sql);

    $dimas_total = 0;
    while ($dimas_row = mysqli_fetch_array($dimas_detail)) {
        $dimas_total = $dimas_total + ($dimas_row['jumlah'] + $dimas_row['harga_menu']);
    }

    $dimas_sql = "UPDATE `dimas_order` SET total = $dimas_total WHERE id_order = '$id_order'";
    $dimas_query = mysqli_query($conn, $dimas_sql);

    echo "
        <script>
            window.location.href='Dimas_detail_order.php?id=$id_order';
        </script>
    ";
}
?>