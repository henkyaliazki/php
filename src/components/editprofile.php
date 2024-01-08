<?php
session_start();
global $connection;
include 'connection.php';

if (!isset($_SESSION['id_register'])) {
    header("Location: login.php");
    exit();
}

$action = $_GET['action'] ?? '';

if ($action === 'save') {
    $userId = $_SESSION['id_register'];

    // Ambil data dari formulir
    $firstName = mysqli_real_escape_string($connection, $_POST['firstName']);
    $lastName = mysqli_real_escape_string($connection, $_POST['lastName']);
    $country = mysqli_real_escape_string($connection, $_POST['country']);
    $city = mysqli_real_escape_string($connection, $_POST['city']);
    $posCode = mysqli_real_escape_string($connection, $_POST['posCode']);
    $gender = mysqli_real_escape_string($connection, $_POST['gender']);
    $phoneNumber = mysqli_real_escape_string($connection, $_POST['phoneNumber']);
    $birthDate = mysqli_real_escape_string($connection, $_POST['birthDate']);
    $email = mysqli_real_escape_string($connection, $_POST['email']);

    // Update data pengguna
    $updateQuery = "UPDATE tbl_register SET 
                    nama_depan = '$firstName',
                    nama_belakang = '$lastName',
                    negara = '$country',
                    kota = '$city',
                    kode_pos = '$posCode',
                    jenis_kelamin = '$gender',
                    nomor_handphone = '$phoneNumber',
                    tanggal_lahir = '$birthDate',
                    email = '$email'
                    WHERE id_register = $userId";

    $updateResult = $connection->query($updateQuery);

    if (!$updateResult) {
        die("Error updating user data: " . $connection->error);
    }
//    jika sukses
    header("Location: ../dashboard.php");
    exit();
} else {
    header("Location: editprofile.php");
    exit();
}
?>
