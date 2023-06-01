<?php
$edit_id = $_GET['id'];
// Koneksi ke database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "rak_buku";
$conn = new mysqli($servername, $username, $password, $dbname);

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
$result = mysqli_query($conn, "SELECT * FROM novel WHERE id_buku = '$edit_id'");
$rows = [];
while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
}
$novel = $rows[0];
if (isset($_POST['submit'])) {
    // Proses pengiriman formulir
    // ...
    $nama = $_POST['nama'];
    $judul_buku = $_POST['Judul'];
    $alamat = $_POST['alamat'];

        // Query untuk menghapus data berdasarkan ID buku
    $sql = "UPDATE novel SET nama= '$nama', judul_buku= '$judul_buku', alamat= '$alamat' WHERE id_buku = $edit_id";

    if ($conn->query($sql) === TRUE) {
        echo "Data berhasil diedit.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?> 

<form method="POST" action="" enctype="multipart/form-data">
                    <h1 class="title" align="center">Formulir Novel</h1>
                <table border="0" cellpadding="2" cellspacing="0" align="center">
                    <tr>
                        <td>
                            <label class="nama">Nama </label> 
                        </td>
                        <td>:</td>
                        <td>
                            <input type="text" name="nama" required id="nama" value="<?= $novel['nama']; ?>"> 
                        </td> 
                    </tr>
                    <tr>
                        <td>
                            <label>Judul Novel</label>
                        <td>:</td>
                        </td>
                        <td>
                            <input type="text" name="Judul" required id="judul" value="<?= $novel['judul_buku']; ?>"> 
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Alamat</label>
                        </td>
                        <td valign="middle">:</td>
                        <td>
                            <textarea name="alamat" id="" cols="40" rows="5" required value="<?= $novel['alamat']; ?>"></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="submit" name="submit"value="submit">
                        </td>
                    </tr>
                </table>
</form>
