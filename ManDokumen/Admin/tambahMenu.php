<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "rak_buku";
$conn = new mysqli($servername, $username, $password, $dbname);
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

if (isset($_POST['submit'])) {
    // tambah tabel di database
    $namaTabel = $_POST['nama'];
    $query = "CREATE TABLE $namaTabel (
        id_buku int primary key auto_increment,
        nama varchar(20),
        tanggal date,
        judul_buku varchar(30),
        alamat text,
        no_hp varchar(15),
        jenis_kelamin varchar(15),
        file_buku blob
    )";
    if (mysqli_query($conn, $query)) {
        echo "
            <script>
                alert('Tabel berhasil ditambahkan');
                document.location.href = 'index.php'; 
            </script> 
        ";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Formulir</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
        }

        form {
            width: 400px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
        }

        input[type="text"],
        input[type="submit"] {
            display: block;
            width: 100%;
            padding: 15px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            font-size: 14px;
        }

        input[type="submit"] {
            background-color: #4caf50;
            color: #fff;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <form action="" method="post">
        <input type="text" name="nama" id="" placeholder="Nama Kategori">
        <input type="submit" value="submit" name="submit">
    </form>
</body>
</html>
