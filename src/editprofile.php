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
    <title>Edit Profile</title>
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
                    <a href="dashboard.php" class="nav-link active">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a href="" class="nav-link">Lihat Data</a>
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
        <form style="margin-top: 20px;" method="post" action="components/register.php" enctype="multipart/form-data" class="form-control">
            <div class="card-header d-flex justify-content-center">
               <h4>Edit Profile</h4>
            </div>
            <div class="row  d-flex justify-content-center">
                <div class="col-md-4">
                    <label>Nama Depan</label>
                    <input type="text" name="firstName" placeholder="Nama Depan" class="form-control">
                </div>
                <div class="col-md-4">
                    <label>Nama Belakang</label>
                    <input type="text" name="lastName" placeholder="Nama Belakang" class="form-control">
                </div>
            </div>
            <div class="row  d-flex justify-content-center">
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
                <div class="col-md-4">
                    <label>Kota</label>
                    <input type="text" name="city" class="form-control">
                </div>
            </div>
            <div class="row  d-flex justify-content-center">
                <div class="col-md-4">
                    <label>Kode Pos</label>
                    <input type="text" name="posCode" class="form-control">
                </div>
                <div class="col-md-4">
                    <label>Jenis Kelamin</label>
                    <select class="form-select" name="gender" aria-label="Default select example">
                        <option value="Men">Laki-Laki</option>
                        <option value="Female">Perempuan</option>
                    </select>
                </div>
            </div>
            <div class="row  d-flex justify-content-center">
                <div class="col-md-4">
                    <label>No Hp</label>
                    <input type="text" name="phoneNumber" class="form-control">
                </div>
                <div class="col-md-4">
                    <label>Tanggal Lahir</label>
                    <input type="date" name="birthDate" class="form-control">
                </div>
            </div>
            <div class="row  d-flex justify-content-center">
                <div class="col-md-8">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control">
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-md-4"></div>
                <div class="col-md-4">
                    <button type="submit" name="save" value="
                        save" class="btn btn-primary col-md-12"><i class='bx bx-save'></i>Simpan
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
