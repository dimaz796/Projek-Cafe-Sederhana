

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TAMBAH ORDER</title>
    <link rel="stylesheet" href="style-tambah.css">
</head>
<body>
    <?php
        include "connection.php";
        include "navbar.php";

        $dimas_data = mysqli_query($conn, "SELECT * FROM dimas_menu");
        $dimas_sql = mysqli_fetch_all($dimas_data);

        $dimas_data2 = mysqli_query($conn, "SELECT * FROM dimas_pelanggan");
        $dimas_sql2 = mysqli_fetch_all($dimas_data2);

        $dimas_data_tambah = mysqli_query($conn, "SELECT * FROM `dimas_detail_order` JOIN dimas_menu ON dimas_detail_order.id_menu = dimas_menu.id_menu");
        $dimas_sql_tambah = mysqli_fetch_all($dimas_data_tambah);
    ?>

    <div class="main">
    <h1>Orderan Baru</h1>

    <?php
        if (isset($_POST['add'])) {

            $no_meja = $_POST['no_meja'];
            $id_pelanggan = $_POST['id_pelanggan'];
            $id_order_temp = $_POST['id_order_temp'];

            if ($no_meja == "" & $id_pelanggan == "") {
                echo "<script>alert('Meja dan Pelanggan Harus diisi!');</script>";
            }else {
                $id_menu = $_POST['id_menu'];
                $jumlah = $_POST['jumlah'];
                $id_user = $_SESSION['id_user'];

                if ($id_order_temp == "") {
                    $sql = "INSERT INTO dimas_order_temp
                            VALUES (NULL, '$no_meja', '".date('Y-m-d')."', '$id_user', '$id_pelanggan')";
                    $query = mysqli_query($conn, $sql);
                }

                $sql = "SELECT * FROM dimas_detail_order_temp
                        WHERE id_user = '$id_user' AND id_menu = '$id_menu' 
                        AND tanggal = '".date('Y-m-d')."'";

                $detailordertemp = mysqli_query($conn, $sql);
                $cek = mysqli_num_rows($detailordertemp);

                if ($cek > 0) {
                    $data_detail = mysqli_fetch_array($detailordertemp);
                    $jumlah_update = $jumlah + $data_detail['jumlah'];
                    $sql = "UPDATE dimas_detail_order_temp SET jumlah = '$jumlah_update'
                            WHERE id_user = '$id_user' AND id_menu = '$id_menu'";
                    $query = mysqli_query($conn, $sql);
                }else {
                    $sql = "INSERT INTO dimas_detail_order_temp
                            VALUES (NULL, '".date('Y-m-d')."' , '$id_user', '$id_menu', '$jumlah')";
                    $query = mysqli_query($conn, $sql);
                }
            }
    
        }elseif (isset($_POST['order'])) {
            date_default_timezone_set("Asia/Jakarta");
            $dimas_meja = $_POST['no_meja'];
            $dimas_total = $_POST['total'];
            $dimas_kasir = $_SESSION['id_user'];
            $dimas_pelanggan = $_POST['id_pelanggan'];
            $dimas_sql = "INSERT INTO `dimas_order` 
                            (`id_order`, `no_meja`, `tanggal`, `id_user`, `id_pelanggan`, `total`, `status_order`) 
                            VALUES (NULL, '$dimas_meja', '".date("Y-m-d H:i:s")."', '$dimas_kasir', '$dimas_pelanggan', '$dimas_total', 'Belum Selesai')";
            $dimas_query = mysqli_query($conn, $dimas_sql);

            if ($dimas_query) {
                echo "<script>
                        alert('Data Order Berhasil Disimpan');
                        window.location.href = 'Dimas_transaksi_order.php';
                    </script>";
            } else {
                echo "<script>
                        alert('Data Pelanggan Gagal Disimpan');
                        window.location.href = 'Dimas_transaksi_order.php';
                    </script>";
            }
        }
    ?>

    <form method="post">
        
        <?php
            $sql = "SELECT * FROM dimas_order_temp
                    WHERE id_user = '".$_SESSION['id_user']."'
                    AND tanggal = '".date('Y-m-d')."'";
            $ordertemp = mysqli_query($conn, $sql);

            $row = mysqli_fetch_array($ordertemp);

            if ($row) {
                $id_order_temp = $row['id_order_temp'];
                $no_meja = $row['no_meja'];
                $id_pelanggan = $row['id_pelanggan'];
            }else {
                $id_order_temp = "";
                $no_meja = 0;
                $id_pelanggan = 0;
            }
         
        ?>

        <input type="hidden" name="id_order_temp" value="<?= $id_order_temp ?>">

        <label>No Meja</label><br>
            <div class="btn-group mb-3" role="group">
                <?php for ($i=1; $i <= 10; $i++): ?>
                <input type="radio" class="btn-check" name="no_meja" id="btnradio<?= $i ?>" autocomplete="off" value="<?= $i ?>" <?=($no_meja==$i)?'checked':''?> >
                <label class="btn btn-outline-primary" name="no_meja" for="btnradio<?= $i ?>" value="<?= $i ?>">Meja <?= $i ?></label>
                <?php endfor; ?>
            </div><br>

        <label for="">Pelanggan</label><br>
            <select class="form-select w-100" name="id_pelanggan" id="">
                <option value="">Pilih Nama Pelanggan</option>
                <?php 
                    foreach ($dimas_sql2 as $val) {
                ?>
                <option value="<?= $val[0] ?>" <?= $id_pelanggan == $val[0]  ? 'selected' : '' ?>><?= $val[1] ?></option>
                <?php } ?>
            </select><br> 

        <label for="">Tambah Menu</label><br>
            <div class="form input-group">
                <select class="form-select w-50" name="id_menu" id="">
                    <option value="">Pilih Menu</option>
                        <?php 
                            foreach ($dimas_sql as $val) {
                        ?>
                    <option value="<?= $val[0] ?>"><?= $val[1] ?></option>
                    <?php } ?>
                </select>

                <input class="form-control w-25" type="number" name="jumlah" placeholder="Jumlah">

                <input class="btn btn-primary w-25" type="submit" name="add" value="Tambah">
            </div><br>

    </form> 

        <?php
                $sql = "SELECT * FROM `dimas_detail_order_temp` 
                        JOIN dimas_menu ON dimas_detail_order_temp.id_menu = dimas_menu.id_menu 
                        WHERE dimas_detail_order_temp.id_user = '".$_SESSION['id_user']."' and dimas_detail_order_temp.tanggal = '".date('Y-m-d')."'";

                $query = mysqli_query($conn, $sql);
        ?>

        <table class='table table-bordered table-striped table-hover'>
            <tr>
                <th>No</th>
                <th>Nama Menu</th>
                <th>Harga</th>
                <th>Jumlah</th>
                <th>Subtotal</th>
                <th>Aksi</th>
            </tr>
            <?php
                $total = 0;
                foreach ($query as $k => $row) {
            ?>
            <tr>
                <td><?= $k+1 ?></td>
                <td><?= $row['nama_menu'] ?></td>
                <td>Rp. <?= number_format($row['harga_menu']) ?></td>
                <td><?= $row['jumlah'] ?></td>
                <td>Rp. <?= number_format($row['harga_menu'] * $row['jumlah']) ?></td>
                <td class="text-center">
                    <a href="hapus-detail-order-temp.php?id=<?=$row['id_detail_order_temp'] ?>"><button class="btn btn-danger">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16" >
                        <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6Z"/>
                        <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1ZM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118ZM2.5 3h11V2h-11v1Z"/>
                        </svg> 
                        Hapus</button></a>
                </td>
            </tr>
            <?php $total += ($row['harga_menu'] * $row['jumlah']); } ?>
            <tr>
                <th>Grand Total</th>
                <input type="hidden" name="total" value="<?=$total?>"> 
                <th class="text-end" colspan="4">Rp. <?= number_format($total) ?></th>
            </tr>
        </table>

        <form action="Dimas_proses_order.php" method="post">
            <input type="hidden" name="id_order_temp" value="<?= $id_order_temp ?>">
            <input type="hidden" name="total" value="<?= $total ?>">
            <input class="btn btn-primary w-100" type="submit" value="Order" name="simpan">
        </form>
    
    </div>
    
</body>
</html>