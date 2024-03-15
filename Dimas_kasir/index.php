<!doctype html>
<html lang="en" data-bs-theme="auto">
  <head><script src="../assets/js/color-modes.js"></script>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">  
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link href="sign-in.css" rel="stylesheet">
  </head>
  <?php
session_start();
if (isset($_SESSION['status']) && $_SESSION['status'] == "login") {
	if ($_SESSION['id_role'] == 1) {
		echo "<script>window.location.href='Dimas_home_admin.php'</script>";
	}elseif ($_SESSION['id_role'] == 2) {
	echo "<script>window.location.href='Dimas_home_manager.php'</script>";
	}elseif ($_SESSION['id_role'] == 3) {
		echo "<script>window.location.href='Dimas_home_kasir.php'</script>";
		}
}	
?>
  <body class="d-flex align-items-center py-4 bg-dark justify-content-center">

    
	  <main class="form-signin w-25 m-auto bg-light rounded-4 d-flex justify-content-center align-items-center mt-5" style="height : 390px; margin-top: 300px;">
		
<form method="post" action="ceklogin.php">
<h1><center><i class="bi bi-apple" style=""></i>  </center></h1>
    <h1 class="h3 mb-3 fw-normal text-center mt-2">Please Login</h1>
	<?php
      if (isset($_GET['pesan'])) {
        if ($_GET['pesan'] == 'gagal') {
          echo "<div class='alert alert-danger text-center text-dark' role='alert'>
				Username Atau Password Salah
                </div>";
        }
        elseif ($_GET['pesan'] == 'logout') {
          echo "<div class='alert alert-info text-center text-dark' role='alert'>
                  Anda Telah Berhasil Logout
                </div>";
        }
        else {
          echo "<div class='alert alert-info text-center text-dark' role='alert'>
                  Anda Harus Login Terlebih Dahulu
                </div>";
        }
      }
    ?>

    <div class="form-floating">
      <input type="text" class="form-control mb-1" id="floatingInput" placeholder="Username" name="username">
      <label for="floatingInput">Username</label>
    </div>
    <div class="form-floating">
      <input type="password" class="form-control mb-4" id="floatingPassword" placeholder="Password" name="password">
      <label for="floatingPassword">Password</label>
    </div>

    <button class="btn btn-secondary w-100 py-2" type="submit">Login</button>

  </form>
</main>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>  

    </body>
</html>
