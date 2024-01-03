<?php
session_start();
global $connection;
include './components/connection.php';

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="data/bootstrap-5.3.2-dist/css/bootstrap.min.css">
    <title>Dashboard</title>
</head>
<body>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a href="#" class="navbar-brand">
            <img src="" alt="" class="d-inline-block align-text-top" width="30" height="24">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText"
                aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a href="#" class="nav-link active">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">Lihat Data</a>
                </li>
            </ul>
            <span class="navbar-text ">
       Welcome | <?php
                echo $_SESSION['username'] ?? 'Guest'; ?>
            </span>
            <a href="index.php" class="btn btn-secondary mx-2">Logout</a>
        </div>
    </div>
</nav>
<!--end nav-->

<div class="container">
    <div class="row">
        <div class="col-12 my-5">
            <h3 class="text-center">Selamat Datang, <?php
                echo $_SESSION['username'] ?? 'Guest'; ?></h3>
        </div>
        <div class="row">
            <div class="col-md-4">
                <img src="data/uploads/ <?php echo $_SESSION['image'] ?>" alt="photodash" class="img-fluid">
            </div>
            <div class="col-md-7">
                <img src="" alt="">
            </div>
        </div>
    </div>
</div>
<script src="data/bootstrap-5.3.2-dist/js/bootstrap.bundle.js"></script>
</body>
</html>
