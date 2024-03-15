<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ORDER</title>
    <link rel="stylesheet" href="style-master.css">
</head>
<body>
    <?php
        include "navbar.php";

        $sql="SELECT * FROM dimas_order";
        $status = mysqli_query($conn,$sql);
    ?>

    <div class="main">
    <h1>Data Order</h1>
        <a href="Dimas_tambah_order.php"><button class="btn btn-primary">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-fill-add" viewBox="0 0 16 16">
        <path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7Zm.5-5v1h1a.5.5 0 0 1 0 1h-1v1a.5.5 0 0 1-1 0v-1h-1a.5.5 0 0 1 0-1h1v-1a.5.5 0 0 1 1 0Zm-2-6a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/>
        <path d="M2 13c0 1 1 1 1 1h5.256A4.493 4.493 0 0 1 8 12.5a4.49 4.49 0 0 1 1.544-3.393C9.077 9.038 8.564 9 8 9c-5 0-6 3-6 4Z"/>
        </svg>    
        Order</button></a><br><br>

        <?php
            include "connection.php";
		if(isset($_POST['submit'])){
				$keywoard = $_POST['search'];
                $status_order = $_POST['status_order'];
                
                if ($status_order != "") {
                    $sql = "SELECT * FROM `dimas_order` JOIN dimas_user ON dimas_order.id_user = dimas_user.id_user 
				        JOIN dimas_pelanggan ON dimas_order.id_pelanggan = dimas_pelanggan.id_pelanggan
						WHERE 
                        nama_pelanggan LIKE '%$keywoard%'
                        AND status_order = '$status_order'";	
                }
                else{
				$sql = "SELECT * FROM `dimas_order` JOIN dimas_user ON dimas_order.id_user = dimas_user.id_user 
				        JOIN dimas_pelanggan ON dimas_order.id_pelanggan = dimas_pelanggan.id_pelanggan
						WHERE 
                        nama_pelanggan LIKE '%$keywoard%'
                        OR no_meja LIKE '%$keywoard%'
                        OR tanggal LIKE '%$keywoard%'
                        OR nama_user LIKE '%$keywoard%'
                        OR total LIKE '%$keywoard%'";	
                }
		}
		else{
			$sql = "SELECT * FROM `dimas_order` JOIN dimas_user ON dimas_order.id_user = dimas_user.id_user 
				    JOIN dimas_pelanggan ON dimas_order.id_pelanggan = dimas_pelanggan.id_pelanggan";
		}
            $role = mysqli_query($conn, $sql);
            $Dimas_Bg= array("Menunggu Pembayaran"=>"warning","Selesai"=>"primary", "Belum Selesai"=>"danger", );
		
        ?>

<nav class="navbar" style ='width: 1000px;' >
  <div class="container-fluid" >
    <a class="navbar-brand"></a>
    <form class="d-flex" role="search" method="post">
	<input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search">
    <select name="status_order" id="form-kategori" class="form-select me-2">
		<option value="">ALL</option>
        <option value="Selesai">Selesai</option>
        <option value="Belum Selesai">Belum Selesai</option>
        <option value="Menunggu Pembayaran">Menunggu Pembayaran</option>
			
	  </select>  
      <button class="btn btn-outline-success me-2" type="submit" name ="submit">Search</button>
	  <button class="btn btn-outline-danger" type="submit" name ="reset">Reset</button>
    </form>
  </div>
</nav>

<table class='table table-bordered table-striped table-hover'  style ='width: 1000px;'>
            <tr>
                <th>ID Order </th>
                <th>No Meja</th>
                <th>Total</th>
                <th>Kasir</th>
                <th>Pelanggan</th>
                <th>Tanggal</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
            <?php
                foreach ($role as $row) {
            ?>
            <tr>
                <td><?= $row['id_order'] ?></td>
                <td>Meja <?= $row['no_meja'] ?></td>
                <td>Rp. <?= number_format($row['total']) ?></td>
                <td><?= $row['nama_user'] ?></td>
                <td><?= $row['nama_pelanggan'] ?></td>
                <td><?= $row['tanggal'] ?></td>
                <td><div class="badge text-bg-<?= $Dimas_Bg[$row['status_order']] ?>"><?= $row['status_order']?></div></td>
                <td>
                    <a href="Dimas_detail_order.php?id=<?= $row['id_order'] ?>"><button class="btn btn-success">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                    <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>
                    </svg>    
                    Detail Order</button></a>
                </td>
            </tr>
            <?php } ?>
        </table>
    </div>
</body>
</html>