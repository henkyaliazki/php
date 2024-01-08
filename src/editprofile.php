<?php
session_start();
global $connection;
include 'components/connection.php';

// Pengecekan Login
if (!isset($_SESSION['id_register'])) {
    header("Location: login.php");
    exit();
}

// Query untuk mendapatkan data pengguna yang login
$userId = $_SESSION['id_register'];
$query = "SELECT * FROM tbl_register WHERE id_register = $userId";
$result = $connection->query($query);

if (!$result) {
    die("Error fetching user data from the database: " . $connection->error);
}

$userData = $result->fetch_assoc();

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
        <form style="margin-top: 20px;" method="post" action="components/editprofile.php?action=save" enctype="multipart/form-data"
              class="form-control">
            <div class="card-header d-flex justify-content-center">
                <h4>Edit Profile</h4>
            </div>
            <div class="row  d-flex justify-content-center">
                <div class="col-md-4">
                    <label>Nama Depan</label>
                    <input type="text" name="firstName" value="<?= $userData['nama_depan']; ?>"
                           placeholder="Nama Depan" class="form-control">
                </div>
                <div class="col-md-4">
                    <label>Nama Belakang</label>
                    <input type="text" name="lastName" value="<?= $userData['nama_belakang']; ?>"
                           placeholder="Nama Belakang" class="form-control">
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
                    <input type="text" name="city" value="<?= $userData['kota']; ?>" class="form-control">
                </div>
            </div>
            <div class="row  d-flex justify-content-center">
                <div class="col-md-4">
                    <label>Kode Pos</label>
                    <input type="text" name="posCode" value="<?= $userData['kode_pos']; ?>" class="form-control">
                </div>
                <div class="col-md-4">
                    <label>Jenis Kelamin</label>
                    <select class="form-select" name="gender" aria-label="Default select example">
                        <option value="Men" <?php if ($userData['jenis_kelamin'] == 'Men')
                            echo 'selected'; ?>>Men
                        </option>
                        <option value="Female" <?php if ($userData['jenis_kelamin'] == 'Female')
                            echo 'selected'; ?>>Female
                        </option>
                    </select>

                </div>
            </div>
            <div class="row  d-flex justify-content-center">
                <div class="col-md-4">
                    <label>No Hp</label>
                    <input type="text" name="phoneNumber" value="<?= $userData['nomor_handphone']; ?>"
                           class="form-control">
                </div>
                <div class="col-md-4">
                    <label>Tanggal Lahir</label>
                    <input type="date" name="birthDate" value="<?= $userData['tanggal_lahir']; ?>" class="form-control">
                </div>
            </div>
            <div class="row  d-flex justify-content-center">
                <div class="col-md-8">
                    <label>Email</label>
                    <input type="email" name="email" value="<?= $userData['email']; ?>" class="form-control">
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
