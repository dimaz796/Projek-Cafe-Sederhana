<?php
include "navbar.php";

$dimas_sql ="SELECT * FROM `dimas_detail_order` 
JOIN dimas_menu ON dimas_detail_order.id_menu = dimas_menu.id_menu 
JOIN dimas_order ON dimas_detail_order.id_order = dimas_order.id_order 
JOIN dimas_kategori ON dimas_menu.id_kategori = dimas_kategori.id_kategori
WHERE `dimas_kategori`.`id_kategori`='1'";
$dimas_temp = mysqli_query($conn, $dimas_sql);
$Dimas_Total_Makanan = 0;
$Dimas_Stok_Habis_Makanan = 0;
foreach ($dimas_temp as $dimas_row){
    $Dimas_stok_makanan = $dimas_row['id_kategori'];
    $Dimas_tot_makanan = ($Dimas_stok_makanan == "1") ? 1 : 0 ;
    $Dimas_Stok_Habis_Makanan += $Dimas_tot_makanan;

    $Dimas_makanan = $dimas_row['harga_menu'];
    $Dimas_jumlah = $dimas_row['jumlah'];
    $total_makanan = $Dimas_makanan * $Dimas_jumlah; 
    $Dimas_Total_Makanan += $total_makanan; 
    $total = $dimas_row['total'];
    
}

$dimas_sql ="SELECT * FROM `dimas_detail_order` 
JOIN dimas_menu ON dimas_detail_order.id_menu = dimas_menu.id_menu 
JOIN dimas_order ON dimas_detail_order.id_order = dimas_order.id_order 
JOIN dimas_kategori ON dimas_menu.id_kategori = dimas_kategori.id_kategori
WHERE `dimas_kategori`.`id_kategori`='2'";
$dimas_temp = mysqli_query($conn, $dimas_sql);
$Dimas_Total_Minuman = 0;
$Dimas_Stok_Habis_Minuman = 0;
foreach ($dimas_temp as $dimas_row){
    $Dimas_stok_minuman = $dimas_row['id_kategori'];
    $Dimas_tot_minuman = ($Dimas_stok_minuman == "2") ? 1 : 0 ;
    $Dimas_Stok_Habis_Minuman += $Dimas_tot_minuman;

    $Dimas_minuman = $dimas_row['harga_menu'];
    $Dimas_jumlah = $dimas_row['jumlah'];
    $total_minuman = $Dimas_minuman * $Dimas_jumlah; 
    $Dimas_Total_Minuman += $total_minuman; 
    $total = $dimas_row['total'];
    
}

$dimas_sql ="SELECT * FROM `dimas_order` 
JOIN dimas_pelanggan ON dimas_order.id_pelanggan = dimas_pelanggan.id_pelanggan 
WHERE `dimas_pelanggan`.`jenis_kelamin`='Laki-laki'";
$dimas_temp = mysqli_query($conn, $dimas_sql);
$total_laki = 0;
foreach ($dimas_temp as $dimas_row){
    $Dimas_laki = $dimas_row['jenis_kelamin'];
    $Dimas_tot_laki = ($Dimas_laki == "Laki-laki") ? 1 : 0 ;
    $total_laki += $Dimas_tot_laki; 
}

$dimas_sql ="SELECT * FROM `dimas_order` 
JOIN dimas_pelanggan ON dimas_order.id_pelanggan = dimas_pelanggan.id_pelanggan 
WHERE `dimas_pelanggan`.`jenis_kelamin`='Perempuan'";
$dimas_temp = mysqli_query($conn, $dimas_sql);
$total_perempuan = 0;
foreach ($dimas_temp as $dimas_row){
    $Dimas_perempuan = $dimas_row['jenis_kelamin'];
    $Dimas_tot_perempuan = ($Dimas_perempuan == "Perempuan") ? 1 : 0 ;
    $total_perempuan += $Dimas_tot_perempuan; 
}

 



?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Cafe</title>
    <!-- Masukkan pustaka Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body><div class="main">
    <h2>Laporan Keuangan Cafe</h2><br><br>
    <div class="d-flex" style="width:350px; heigth:250px; margin-left:50px">
        <!-- Canvas untuk Diagram Lingkaran Penjualan -->
        <canvas id="penjualanChart" width="400" height="400"></canvas>

        <!-- Canvas untuk Diagram Lingkaran Pengeluaran -->
        <canvas id="pengeluaranChart" width="400" height="400"></canvas>

        <!-- Canvas untuk Diagram Lingkaran Pendapatan Bersih -->
        <canvas id="pendapatanBersihChart" width="400" height="400"></canvas>

        <script>
            // Data penjualan (contoh, sesuaikan dengan data sebenarnya)
            var penjualanData = [<?=$Dimas_Total_Makanan?>,<?=$Dimas_Total_Minuman?>, 0];
            
            // Data pengeluaran (contoh, sesuaikan dengan data sebenarnya)
            var pengeluaranData = [<?=$total_laki?>,<?=$total_perempuan?>];
            
            // Hitung pendapatan bersih
            var pendapatanBersih = penjualanData.reduce((a, b) => a + b, 0) - pengeluaranData.reduce((a, b) => a + b, 0);
            
            // Data pendapatan bersih (contoh, sesuaikan dengan data sebenarnya)
            var pendapatanBersihData = [<?=$Dimas_Stok_Habis_Makanan?>,<?=$Dimas_Stok_Habis_Minuman?>];

            // Konfigurasi Chart
            var config = {
                type: 'doughnut',
                data: {
                    labels: ['Penjualan Makanan', 'Penjualan Minuman'],
                    datasets: [{
                        data: penjualanData,
                        backgroundColor: ['rgb(255, 99, 132)', 'rgb(54, 162, 235)', 'rgb(255, 255, 255)'],
                    }]
                },
                options: {
                    responsive: true,
                }
            };

            // Buat dan tampilkan Diagram Lingkaran Penjualan
            var penjualanChart = new Chart(document.getElementById('penjualanChart').getContext('2d'), config);

            // Konfigurasi Chart untuk Pengeluaran
            config.data.labels = ['Pelanggan Laki-Laki','Pelanggan Perempuan'];
            config.data.datasets[0].data = pengeluaranData;

            // Buat dan tampilkan Diagram Lingkaran Pengeluaran
            var pengeluaranChart = new Chart(document.getElementById('pengeluaranChart').getContext('2d'), config);

            // Konfigurasi Chart untuk Pendapatan Bersih
            config.data.labels = ['Makanan Yang Habis', 'Minuman Yang Habis'];
            config.data.datasets[0].data = pendapatanBersihData;
            config.data.datasets[0].backgroundColor = ['rgb(75, 192, 192)', 'rgb(255, 99, 132)'];

            // Buat dan tampilkan Diagram Lingkaran Pendapatan Bersih
            var pendapatanBersihChart = new Chart(document.getElementById('pendapatanBersihChart').getContext('2d'), config);
        </script>
        
    </div>
    <br><br><br><br>
    <h5>Total Omset Yang di Dapatkan Perbulan Ini : Rp.<?= number_format($Dimas_Total_Makanan + $Dimas_Total_Minuman)?></h5>
    <h5>Total Pelanggan Yang Datang Perbulan Ini : <?= $total_laki + $total_perempuan ?></h5>
    <h5>Total Menu Yang Di Pesan Perbulan Ini : <?= $Dimas_Stok_Habis_Minuman + $Dimas_Stok_Habis_Makanan?></h5>


    
    
</div>
</body>
</html>
