<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "411212053_henkyaliazkipratama";

//connection database create
$connection = mysqli_connect($servername, $username, $password, $database);
//cek connection
if (!$connection) {
    die("Connection Failed : " . mysqli_connect_error());
}
//echo "Connection Success";
//mysqli_close($connection);
