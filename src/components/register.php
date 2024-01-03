<?php
session_start();
global $connection;
include 'connection.php';

function showAlertAndRedirect($message, $location)
{
    global $connection;
    $errorMessage = mysqli_error($connection);
    echo "<script>alert('$message $errorMessage'); window.location.href='$location';</script>";
}


$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$email = $_POST['email'];
$country = $_POST['country'];
$city = $_POST['city'];
$posCode = $_POST['posCode'];
$birthDate = $_POST['birthDate'];
$gender = $_POST['gender'];
$countryCode = $_POST['countryCode'];
$phoneNumber = $_POST['phoneNumber'];
$documentType = $_POST['documentType'];
$identityNumber = $_POST['identityNumber'];
$username = $_POST['username'];
$password = md5($_POST['password']);

// File handling
$image = $_FILES['image'];
$imageSize = $_FILES['image']['size'];
$allowedExtensions = ['jpg', 'jpeg', 'png'];
$uploadPath = '../data/uploads/';

if (isset($_POST['register'])) {
    // Check if username is already registered
    $usernameCheckQuery = "SELECT * FROM tbl_register WHERE username = '$username'";
    $result = mysqli_query($connection, $usernameCheckQuery);

    if (!$result->num_rows > 0) {
        // Check image file size
        if ($imageSize > 1048576) {
            showAlertAndRedirect('Ukuran file gambar harus kurang dari 1 MB', 'register.php');
        } else {
            $imageExtension = pathinfo($image['name'], PATHINFO_EXTENSION);

            // Check if the image has an allowed extension
            if (in_array(strtolower($imageExtension), $allowedExtensions)) {
                // Generate a unique filename for the image
                $uniqueFilename = uniqid('img_') . '.' . $imageExtension;
                $imagePath = $uploadPath . $uniqueFilename;

                // Move the uploaded image to the destination folder
                if (move_uploaded_file($image['tmp_name'], $imagePath)) {
                    // Insert user data into the database
                    $insertQuery = "INSERT INTO tbl_register(nama_depan, nama_belakang, email, negara, kota, kode_pos, 
                          tanggal_lahir, jenis_kelamin, kode_negara, nomor_handphone, jenis_identitas, 
                          nomor_identitas,foto, username, password)
                                    VALUES('$firstName','$lastName','$email','$country','$city','$posCode','$birthDate','$gender',
                                      '$countryCode','$phoneNumber','$documentType','$identityNumber','$uniqueFilename',
                                       '$username','$password')";

                    $insertResult = mysqli_query($connection, $insertQuery);


                    if ($insertResult) {
                        showAlertAndRedirect('Pendaftaran Anda Berhasil', '../index.php');
                    } else {
                        showAlertAndRedirect('Pendaftaran Anda Gagal', '../register.php');
                    }
                } else {
                    showAlertAndRedirect('Gagal mengunggah file gambar', '../register.php');
                }
            } else {
                showAlertAndRedirect('Ekstensi file gambar tidak diizinkan', '../register.php');
            }
        }
    } else {
        showAlertAndRedirect('Username Sudah Terdaftar', '../index.php');
    }
}
