<?php
session_start();
global $connection;
include('connection.php');

function clean_input($data) {
    global $connection;
    return mysqli_real_escape_string($connection, trim($data));
}

if (isset($_POST["login"])) {
    $username = clean_input($_POST['username']);
    $password = md5(clean_input($_POST['password']));

    // Query SQL menggunakan prepared statement
    $query = "SELECT * FROM tbl_register WHERE username=? AND password=?";
    $stmt = mysqli_prepare($connection, $query);

    // Bind parameters dan eksekusi query
    mysqli_stmt_bind_param($stmt, "ss", $username, $password);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    // Periksa hasil query
    if ($result) {
        // Periksa apakah ada baris yang sesuai
        if (mysqli_num_rows($result) > 0) {

            //ambil data user
            $user = mysqli_fetch_assoc($result);
            $_SESSION['id_register'] = $user['id_register'];
            $_SESSION['image']= $user['image'];
            $_SESSION['username'] =$user['username'];

            header("Location: ../dashboard.php");
            exit();
        } else {
            echo "Login gagal. Username atau password salah.";
        }
    } else {
        echo "Error: " . mysqli_error($connection);
    }
}
