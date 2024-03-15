<?php
 include 'connection.php';
 if (isset($_POST['bayar'])) {
    $id_order = $_POST['id_order'];
    $dimas_status = 'Selesai';

    $dimas_sql = "UPDATE `dimas_order` SET status_order = '$dimas_status'
                     WHERE id_order = '$id_order'";
    $dimas_query = mysqli_query($conn, $dimas_sql);
if ($dimas_query) {
   

    echo "<script>
    alert('Pembayaran Berhasil Berikut Struknya');
            window.location.href = 'Dimas_pembayaran.php?id_order=$id_order';
          </script>";
}      
 else {
    echo "<script>
        alert('Pembayaran Gagal');
         window.location.href = 'Dimas_transaksi_order.php';
          </script>";
    }
 }
?>