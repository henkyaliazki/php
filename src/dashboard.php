<?php
session_start();
global $connection;
include 'components/connection.php';

if (isset($_SESSION['id_register'])) {
    $userId = $_SESSION['id_register'];

    // Query untuk mendapatkan data pengguna yang login
    $query = "SELECT * FROM tbl_register WHERE id_register = $userId";
    $result = $connection->query($query);

    if ($result) {
        $userData = $result->fetch_assoc();

        // Ambil data pengguna dari hasil query
        $firstName = $userData['nama_depan'];
        $lastName = $userData['nama_belakang'];
        $full_name = $firstName . ' ' . $lastName;
        $country = ucwords(strtolower($userData["negara"]));
        $city = $userData['kota'];
        $posCode = $userData['kode_pos'];
        $gender = $userData['jenis_kelamin'];
        $phoneNumber = $userData['nomor_handphone'];
        $birthDate = $userData['tanggal_lahir'];
        $email = $userData['email'];
        $photoName = $userData['foto'];
    } else {
        echo "Error fetching user data from the database: " . $connection->error;
    }
} else {
    echo "User not logged in.";
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="data/bootstrap-5.3.2-dist/css/bootstrap.min.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
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
                    <a href="lihatdata.php" class="nav-link">Lihat Data</a>
                </li>
            </ul>
            <span class="navbar-text ">
       Welcome | <?=$_SESSION['username'] ?? 'Guest'; ?>
            </span>
            <a href="index.php" class="btn btn-secondary mx-2">Logout</a>
        </div>
    </div>
</nav>
<!--end nav-->

<div class="container">
    <div class="row">
        <div class="col-12 my-5">
            <h3 class="text-center">Selamat Datang, <?=$_SESSION['username'] ?? 'Guest'; ?></h3>
        </div>
        <div class="row justify-content-center">
            <div class="d-flex justify-content-end">
                <a href="editprofile.php" class="btn btn-warning mb-3 justify-content-end" type="button">
                    <i class='bx bx-edit'></i>
                </a>
            </div>
            <div class="col-md-4">
                <img src="data/uploads/<?=$photoName ?>" alt="photodash" class="img-fluid">
            </div>
            <div class="col-md-8">
                <form action="" class="form-control py-4">
                    <table>
                        <tr>
                            <th>Nama </th>
                            <td>: <?=$full_name?></td>
                        </tr>
                        <tr>
                            <th>Negara</th>
                            <td>: <?=$country?></td>
                        </tr>
                        <tr>
                            <th>Kota</th>
                            <td>: <?=$city?></td>
                        </tr>
                        <tr>
                            <th>Kode Pos</th>
                            <td>: <?=$posCode?></td>
                        </tr>
                        <tr>
                            <th>Jenis Kelamin</th>
                            <td>: <?=$gender?></td>
                        </tr>
                        <tr>
                            <th>Nomor Hp</th>
                            <td>: <?=$phoneNumber?></td>
                        </tr>
                        <tr>
                            <th>Tanggal Lahir</th>
                            <td>: <?=$birthDate?></td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td>: <?=$email?></td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
    </div>
</div>
<script src="data/bootstrap-5.3.2-dist/js/bootstrap.bundle.js"></script>
</body>
</html>
