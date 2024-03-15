<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap-5.3.0-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="style2.css">
    <title>Document</title>
    <style>
        .carousel-inner > .item {
            position: relative;
            display: none;
            -webkit-transition: 0s ease-in-out left;
            -moz-transition: 0s ease-in-out left;
            -o-transition: 0s ease-in-out left;
            transition: 0s ease-in-out left;
        }
    </style>
</head>
<body class = "bg-dark text-light">
    <h3>zyy caffe</h3>
    <?php
    include "navbar.php";
    ?>

<div class="main" style="margin-left:350px">
    <center>
   

   <div class="card-body">

                    <h5 class="card-title"><?= $_SESSION['username'] ?></h5>
                    <h6>Welcome To My Website!</h6>
                </div>
              
<div class="card-footer">
<div id="carouselExampleSlidesOnly" class="carousel slide border border-secondary border-5 object-fit-none border rounded" data-bs-ride="carousel" style="width:350px; heigth:250px;" data-interval="1000">
    <div class="carousel-inner">
    <div class="carousel-item active">
    <img src="pict/logo2.gif" class="d-block w-100">
    <br>

        <button class="btn btn-secondary" type="button" data-bs-toggle="collapse" data-bs-target="#profile" aria-controls="profile">
        See Profile
        

    </button>
    <br>
    <br>
    <div class=" m-auto p-2 border rounded-2  collapse collapse-horizontal" id="profile" style="width: 100px;">
    <br>
    <h4>Dimas Aditya Herlambang</h4>

    <h6>Hi!</h6>

    <p>Bersekolah di SMKN 2 Cimahi</p>

    <ul class="list-group">

    <li class="list-group-item">
    <a class="icon-link icon-link-hover text-decoration-none text-dark" style="--bs-icon-link-transform: translate3d(0, -.125rem, 0);" href="#">
        <i class="bi bi-github"></i> Github
    </a>
    </li>   

    <li class="list-group-item">
    <a class="icon-link icon-link-hover text-decoration-none text-dark" style="--bs-icon-link-transform: translate3d(0, -.125rem, 0);" href="https://instagram.com/_____zzannn?igshid=bGpvZDhweXJONTB4">
        <i class="bi bi-instagram"></i> @dmsadyt_
    </a>
    </li>


    <li class="list-group-item">
    <a class="icon-link icon-link-hover text-decoration-none text-dark" style="--bs-icon-link-transform: translate3d(0, -.125rem, 0);" href="#">
        <i class="bi bi-envelope-paper"></i> siganteng77@gmail.com
    </a>
    </li>
    </ul>

    </div>





</div>
</div>

</center>
<script> src="bootstrap-5.3.0-dist/js/bootstrap.bundle.min.js"</script>
</body>
