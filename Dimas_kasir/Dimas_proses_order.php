<?php
    session_start();

    include 'connection.php';

    $id_order_get = $_GET['id_order'];
    $id_detail_order = $_GET['id_detail_order'];

    if (isset($_POST['simpan'])) {
        $dimas_id_user = $_SESSION['id_user'];
        $dimas_id_order_temp = $_POST['id_order_temp'];
        $dimas_total = $_POST['total'];

        $sql = "SELECT * FROM dimas_order_temp WHERE id_order_temp = '$dimas_id_order_temp'";
        $ordertemp = mysqli_query($conn, $sql);

        while ($row = mysqli_fetch_array($ordertemp)) {
            $dimas_no_meja = $row['no_meja'];
            $dimas_id_pelanggan = $row['id_pelanggan'];
            
            $sql = "INSERT INTO dimas_order VALUES
                    (NULL, '$dimas_no_meja', now(), '$dimas_id_user', '$dimas_id_pelanggan', $dimas_total, 'Belum Selesai')";
            
            $insert_order = mysqli_query($conn, $sql);

            $id_order = mysqli_insert_id($conn);
        }

        $sql = "SELECT * FROM dimas_detail_order_temp
                WHERE id_user = '$dimas_id_user' and tanggal = '".date('Y-m-d')."'";
        $detailordertemp = mysqli_query($conn, $sql);

        while ($row = mysqli_fetch_array($detailordertemp)) {
            $dimas_id_menu = $row['id_menu'];
            $dimas_jumlah = $row['jumlah'];

            $sql = "INSERT INTO dimas_detail_order
                    VALUES (NULL, $id_order, $dimas_id_menu, $dimas_jumlah, 'Belum Selesai')";  
            $insert_detail_order = mysqli_query($conn, $sql);
        }
            

        if ($insert_order && $insert_detail_order) {

           $sql = "DELETE FROM dimas_order_temp WHERE id_order_temp = $dimas_id_order_temp";
            $hapus_order_temp = mysqli_query($conn, $sql);
        
            $sql = "DELETE FROM dimas_detail_order_temp
                    WHERE id_user = '$dimas_id_user' and tanggal = '".date('Y-m-d')."'";
            $hapus_order_temp = mysqli_query($conn, $sql);

             echo "<script>
            alert('Data Orderan Berhasil di Simpan');
            window.location.href='Dimas_transaksi_order.php'; 
        </script>";
        }else {
         echo "<script>
            alert('Data Orderan Gagal di Simpan');
            window.location.href='Dimas_tambah_order.php'; 
        </script>";
}
    }

    elseif ($id_detail_order != "" && $id_order_get != "") {
        $dimas_sql="UPDATE `dimas_detail_order` 
                    SET status_detail_order = 'Selesai' 
                    WHERE id_detail_order = '$id_detail_order'";
        $query = mysqli_query($conn, $dimas_sql);

    
        if ($query) {
            $dimas_sql = "SELECT * FROM `dimas_detail_order`
                             WHERE id_order = '$id_order_get'
                             AND status_detail_order = 'Belum Selesai'";
            $dimas_detail = mysqli_query($conn, $dimas_sql);
            $dimas_cek = mysqli_num_rows($dimas_detail);
    
            if ($dimas_cek > 0) {
                $dimas_status = 'Belum Selesai';
            } else {
                $dimas_status = 'Menunggu Pembayaran';
            }
    
            $dimas_sql = "UPDATE `dimas_order` SET status_order = '$dimas_status'
                             WHERE id_order = '$id_order_get'";
            $dimas_query = mysqli_query($conn, $dimas_sql);
    
            echo "<script>
                    window.location.href = 'Dimas_detail_order.php?id=$id_order_get';
                  </script>";
        } else {
            echo "<script>
                    window.location.href = 'Dimas_detail_order.php?id=$id_order_get';
                  </script>";
        }
    }
?>