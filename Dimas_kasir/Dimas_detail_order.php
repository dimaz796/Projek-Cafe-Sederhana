<?php
include "connection.php";
include "navbar.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Detail Order</title>
</head>
<body>
<div class="main" style="padding-top: 20px; margin-left: 225px;">
        <table>
            <tr>
                <td>
                    <h2 class="mb-4">Detail Order</h2>
                </td>
                <?php
                
                if(isset($_GET['id'])){
                    $id_order = $_GET['id'];
                    $dimas_re="SELECT * FROM `dimas_order` 
                    INNER JOIN dimas_pelanggan 
                    ON dimas_pelanggan.id_pelanggan = dimas_order.id_pelanggan
                    INNER JOIN dimas_user 
                    ON dimas_user.id_user = dimas_order.id_user where id_order=$id_order";
                    $dimas_r=mysqli_query($conn,$dimas_re);
                while($dimas_dtorder = mysqli_fetch_array($dimas_r)){
                    $dimasno=$dimas_dtorder['no_meja'];
                    $dimaspl=$dimas_dtorder['nama_pelanggan'];
                    $dimastgl=$dimas_dtorder['tanggal'];
                    $dimasidp=$dimas_dtorder['id_pelanggan'];
                    $id_order = $dimas_dtorder['id_order'];
                }
                $dimas_sql="SELECT * FROM `dimas_order` 
                            INNER JOIN dimas_detail_order ON dimas_order.id_order = dimas_order.id_order 
                            INNER JOIN dimas_menu ON dimas_menu.id_menu = dimas_detail_order.id_menu 
                            WHERE dimas_order.id_order=$id_order";
                    $dimas_result = mysqli_query($conn, $dimas_sql);
                    while($dimas_row = mysqli_fetch_array($dimas_result)) {
                        $dimas_menu = $dimas_row['nama_menu'];
                        $dimas_harga = $dimas_row['harga_menu'];
                        $dimas_jumlah = $dimas_row['jumlah'];
                        $dimas_status = $dimas_row['status_order'];
                        $dimas_id_menu = $dimas_row['id_menu'];
                    }
                }
                $dimas_badge= ["Belum Selesai"=>"danger","Selesai"=>"primary", "Menunggu Pembayaran"=>"warning",];
                if (isset($_POST['add'])) {
                    $id_menu = $_POST['id_menu'];
                    $jumlah = $_POST['jumlah'];
                    $sql = "SELECT * FROM dimas_detail_order
                        WHERE id_order = '$id_order' AND id_menu = '$id_menu'";

                $detailordertemp = mysqli_query($conn, $sql);
                $cek = mysqli_num_rows($detailordertemp);

                    $dimas_sql = "INSERT INTO `dimas_detail_order` VALUES (NULL, '$id_order', '$id_menu', '$jumlah', 'Belum Selesai')";
                    $query = mysqli_query($conn, $dimas_sql);                   
            }
                
               
                ?>
            </tr>
        <form method="POST">
                <?php
                    $dimas_sql = "SELECT * FROM `dimas_order_temp`
                                     WHERE id_user = '".$_SESSION['id_user']."'
                                     AND tanggal = '".date('Y-m-d')."'";
                    $dimas_order_temp = mysqli_query($conn, $dimas_sql);

                    $dimas_row = mysqli_fetch_array($dimas_order_temp);
                    
                    if ($dimas_row) {
                        $id_order_temp = $dimas_row['id_order_temp'];
                        $no_meja = $dimas_row['no_meja'];
                        $id_pelanggan = $dimas_row['id_pelanggan'];
                    } else {
                        $id_order_temp = "";
                        $no_meja = 0;
                        $id_pelanggan = 0;
                    }
                ?>
            <tr>
                <tr>
                    <td>No Meja</td>
                </tr>
                <td>
                    <div class="mb-3" role="group">
                        <input type="hidden" name="id_order" value="<?=$id_order?>">
                        <input type="radio" class="btn-check" name="no_meja" autocomplete="off" value="<?=$id_order?>" <?=$id_order == $id_order ? 'checked' : ''?>>
                        <label class="btn btn-outline-primary">Meja <?=$dimasno?></label>
                    </div>
                </td>
            </tr>
            <tr>
                <tr>
                    <td>Pelanggan</td>
                </tr>
                <td>
                    <div class="input-group mb-4" style="width: 1050px;">
                        <input class="form-control" value="<?=$dimaspl?>" disabled>
                    </div>
                </td>
            </tr>
            <tr>
                <tr>
                    <td>Tanggal</td>
                </tr>
                <td>
                    <div class="input-group mb-4" style="width: 1050px;">
                        <input class="form-control" value="<?=$dimastgl?>" disabled>
                    </div>
                </td>
            </tr>
            <tr>
                <tr>    
                    <td>Tambah Menu</td>
                </tr>
                <td>
                    <?php
                        $dimas_sql = "SELECT * FROM `dimas_menu`";
                        $dimas_hasil = mysqli_query($conn, $dimas_sql);
                    ?>
                    <div class="input-group mb-3">
                        <select class="form-select" name="id_menu">
                            <option selected>-- Pilih Menu --</option>
                            <?php foreach ($dimas_hasil as $dimas_menu): ?>
                            <option value="<?=$dimas_menu['id_menu']?>"><?=$dimas_menu['nama_menu']?></option>
                            <?php endforeach; ?>
                        </select>
                        <input type="number" class="form-control" name="jumlah" placeholder="Jumlah" min="1">
                        <input class="btn btn-primary" type="submit" value="Tambah" name="add"></input>
                    </div>
                </td>
                </tr>
            </tr>
            <tr>
                <tr>
                    <td>
                        <?php
                            $dimas_sql ="SELECT * FROM `dimas_detail_order` 
                            JOIN dimas_menu ON dimas_detail_order.id_menu = dimas_menu.id_menu 
                            WHERE `id_order`='$id_order'";
                            $dimas_temp = mysqli_query($conn, $dimas_sql);
                        ?>
                        <table class="table table-fluid table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Menu</th>
                                    <th>Harga</th>
                                    <th>Jumlah</th>
                                    <th class="text-end">Subtotal</th>
                                    <th class="text-center">Status</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $total = 0; foreach ($dimas_temp as $k => $dimas_row):?>
                                    <?php  $status = $dimas_row['status_detail_order'];?>
                                <tr>
                                    <td><?= $k+1; ?></td>
                                    <td><?= $dimas_row['nama_menu'] ?></td>
                                    <td>Rp.<?= number_format($dimas_row['harga_menu']); ?></td>
                                    <td><?= $dimas_row['jumlah'] ?></td>
                                    <td class="text-end">Rp.<?= number_format($dimas_row['harga_menu'] * $dimas_row['jumlah']); ?></td>
                                    <td class="text-center"><div class="badge text-bg-<?= $dimas_badge[$dimas_row['status_detail_order']] ?>"><?= $dimas_row['status_detail_order']?></div></td>
                                    <td class="text-center">
                                        <?php
                                        if ($dimas_row['status_detail_order'] == 'Belum Selesai') {
                                            echo "<a href='Dimas_proses_order.php?id_detail_order=$dimas_row[id_detail_order]&id_order=$dimas_row[id_order]' class='btn btn-success me-1'><i class='bi bi-check2'></i> Proses</a>";
                                            echo "<a href='Dimas_hapus_detail.php?id_detail_order=$dimas_row[id_detail_order]&id_order=$dimas_row[id_order]' class='btn btn-danger'><i class='bi bi-trash3'></i></a>";
                                        }
                                        ?>
                                    </td>
                                </tr>
                                <?php $total += ($dimas_row['harga_menu'] * $dimas_row['jumlah']); endforeach; ?>
                                <th>Grand Total</th>
                                <th colspan="4" class="text-end">Rp.<?=number_format($total)?></th>
                                <?php
                                $sql = "UPDATE `dimas_order` 
                                        SET `total` = '$total' 
                                        WHERE `dimas_order`.`id_order` = $id_order;";
                                $query = mysqli_query($conn,$sql);
                                ?>
                            </tbody>
                        </table>
                    </td>
                </tr>
            </tr>
            <tr>
                <td>
                    </td>
                </tr>
            </form>
            <tr>
                <td><?php if ($status != "Belum Selesai") :?>
           <form action="Dimas_proses_bayar.php" method="post">
            <input type="hidden" name="total" value="<?= $total ?>">
            <input type="hidden" name="id_order" value="<?= $id_order?>">
            <input class="btn btn-primary w-100" type="submit" value="Bayar" name="bayar">
        </form>
        <?php endif?></td>
            </tr>
        </table>

        

</div>
</body>
</html>

