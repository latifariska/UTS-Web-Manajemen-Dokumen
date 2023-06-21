<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "rak_buku";

$koneksi = new mysqli($servername, $username, $password, $dbname);
if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}