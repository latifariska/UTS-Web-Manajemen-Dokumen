<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "rak_buku";
$conn = new mysqli($servername, $username, $password, $dbname);
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

$result = mysqli_query($conn, "SHOW TABLES");

$tables = mysqli_fetch_all($result, MYSQLI_ASSOC);

?>


<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kumpulan Buku | UIN Sunan Ampel Surabaya</title>
    <link rel="stylesheet" type="text/css" href="../css/style.css">
</head>

<body>
    <div>
        <div class="kepala">
            <img src="../images/header.jpg" height="100%" width="100%">
        </div>

        <div class="menu">
            <ul class="list_menu">
                <?php
                foreach ($tables as $table) {
                    $namaTabel = ucfirst($table["Tables_in_rak_buku"]);
                    if ($namaTabel != "Register") {
                ?>
                        <li><a href="index.php?page=<?= $namaTabel ?>"><?= $namaTabel; ?></a></li>
                <?php
                    }
                }
                ?>
                <li><a href="index.php?page=tambah">Tambah Menu</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </div>

        <div>
            <div class="sisikiri">
                <h2>Visi</h2>
                <p>
                    "Menjadi Universitas Islam yang unggul dan kompetitif bertaraf internasional"
                <p>
                <p>
                <h2>Misi</h2>
                <ol>
                    <li>Menyelenggarakan pendidikan ilmu-ilmu keislaman multidisipliner serta sains dan teknologi yang unggul dan berdaya saing.</li><br>
                    <li>Mengembangkan riset ilmu-ilmu keislaman multidisipliner serta sains dan teknologi yang relevan dengan kebutuhan masyarakat.</li><br>
                    <li>Mengembangkan pola pemberdayaan masyarakat yang religius berbasis riset</li><br><br><br><br>
                </ol>
            </div>

            <div class="konten">
                <?php
                if (isset($_GET['page'])) {
                    $page = $_GET['page'];
                    switch ($page) {
                        case 'tambah':
                            include "tambahMenu.php";
                            break;
                        default:
                            include "Dokumen/index.php";
                    }
                }
                ?>
            </div>
        </div>

        <div class="kaki">
            Copyright @2023 | UIN Sunan Ampel Surabaya
        </div>
    </div>
</body>

</html>