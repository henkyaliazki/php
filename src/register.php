<?php
session_start();
global $connection;
include 'components/connection.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="data/bootstrap-5.3.2-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="">
    <title>Register</title>
</head>
<body>
<!-- Menu -->
<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a href="#" class="navbar-brand">
            <img src="" alt="" class="d-inline-block align-text-top" width="30" height="24">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
                aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a href="#" class="nav-link active">Dashboard</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                       aria-expanded="false">
                        Login/Register
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="index.php">Login</a></li>
                        <li><a class="dropdown-item" href="register.php">Register</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
<!--end nav-->
<div class="container">
    <div class="row">
        <div class="col-2"></div>
    </div>
    <div class="row">
        <form style="margin-top: 20px;" method="post" action="components/register.php" enctype="multipart/form-data">
            <div class="card-header d-flex justify-content-center">
                <img alt="logo" src="data/asset/logo_undira.jpg" width="200px">
            </div>
            <div class="row gap-2 d-flex justify-content-center">
                <div class="col-md-4">
                    <label>Nama Depan</label>
                    <input type="text" name="firstName" placeholder="Nama Depan" class="form-control">
                </div>
                <div class="col-md-4">
                    <label>Nama Belakang</label>
                    <input type="text" name="lastName" placeholder="Nama Belakang" class="form-control">
                </div>
            </div>
            <div class="row gap-2 d-flex justify-content-center">
                <div class="col-md-4">
                    <label>Email</label>
                    <input type="email" name="email" placeholder="Email" class="form-control">
                </div>
                <div class="col-md-4">
                    <label>Negara</label>
                    <?php
                    $query = "SELECT nama_negara  FROM tbl_negara";
                    $result = mysqli_query($connection, $query);

                    if ($result) {
                        echo "<select name='country' class='form-control'>";

                        while ($row = mysqli_fetch_assoc($result)) {
                            $nameCountry = $row['nama_negara'];
                            echo "<option value='$nameCountry'>$nameCountry</option>";
                        }
                        echo "</select>";

                        mysqli_free_result($result);
                    }
                    ?>
                </div>
            </div>
            <div class="row gap-1 d-flex justify-content-center">
                <div class="col-md-2">
                    <label>Kota</label>
                    <input type="text" name="city" class="form-control">
                </div>
                <div class="col-md-2">
                    <label>Kode Pos</label>
                    <input type="text" name="posCode" class="form-control">
                </div>
                <div class="col-md-4">
                    <label>Tanggal Lahir</label>
                    <input type="date" name="birthDate" class="form-control">
                </div>
            </div>
            <div class="row gap-1 d-flex justify-content-center">
                <div class="col-md-4">
                    <label>Jenis Kelamin</label>
                    <select class="form-select" name="gender" aria-label="Default select example">
                        <option value="Men">Laki-Laki</option>
                        <option value="Female">Perempuan</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <label>Kode Negara</label>
                    <?php
                    $query = "SELECT kode_negara FROM tbl_negara";
                    $result = mysqli_query($connection, $query);

                    if ($result) {
                        echo "<select name='countryCode' class='form-control'>";

                        while ($row = mysqli_fetch_assoc($result)) {
                            $countryCode = $row['kode_negara'];
                            echo "<option value='$countryCode'>$countryCode</option>";
                        }
                        echo "</select>";

                        mysqli_free_result($result);
                    }
                    ?>
                </div>
                <div class="col-md-2">
                    <label>No Hp</label>
                    <input type="text" name="phoneNumber" class="form-control">
                </div>
            </div>
            <div class="row gap-1 d-flex justify-content-center">
                <div class="col-md-2">
                    <label>Jenis Indentitas</label>
                    <?php

                    $query = "SELECT nama_kartu_identitas FROM kartu_identitas";
                    $result = mysqli_query($connection,$query);

                    if ($result){
                        echo "<select name='documentType' class='form-control'>";

                        mysqli_data_seek($result, 1);

                        while ($row = mysqli_fetch_assoc($result)){
                            $documentType =$row['nama_kartu_identitas'];
                            echo "<option value='$documentType'>$documentType</option>";
                        }
                        echo "</select>";

                        mysqli_free_result($result);
                    }

                    ?>
                </div>
                <div class="col-md-2">
                    <label>No Identitas</label>
                    <input type="text" name="identityNumber" class="form-control">
                </div>
                <div class="col-md-4">
                    <label>Foto</label>
                    <input type="file" name="image" class="form-control" accept=".jpg,.png,.jpeg">
                </div>
            </div>
            <div class="row gap-2 d-flex justify-content-center">
                <div class="col-md-4">
                    <label>UserName</label>
                    <input type="text" name="username" class="form-control" placeholder="username">
                </div>
                <div class="col-md-4">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control" placeholder="password">
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-md-4"></div>
                <div class="col-md-4">
                    <button type="submit" name="register" value="
                        register" class="btn btn-primary col-md-12">Register
                    </button>
                </div>
            </div>
        </form>
    </div>
    <div class="col-2"></div>

</div>
<script src="data/bootstrap-5.3.2-dist/js/bootstrap.bundle.js"></script>
</body>
</html>