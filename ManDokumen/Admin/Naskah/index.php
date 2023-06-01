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
    // Proses pengiriman formulir
    // ...
    $nama = $_POST['nama'];
    $tanggal = $_POST['tanggal'];
    $judul_buku = $_POST['Judul'];
    $alamat = $_POST['alamat'];
    $no_hp = $_POST['no_hp'];
    $jk = $_POST['jk'];
    $file = upload();

    $sql = "INSERT INTO naskah (nama, tanggal, judul_buku, alamat, no_hp, jenis_kelamin, file_buku) 
            VALUES ('$nama', '$tanggal', '$judul_buku', '$alamat', '$no_hp', '$jk', '$file')";
    if (mysqli_query($conn, $sql)) {
        // Data berhasil ditambahkan.
    } else {
        // Terjadi kesalahan saat menambahkan data.
    }
}
function upload() {
    $namaFile = $_FILES["file_buku"]["name"];
    $tmpName = $_FILES["file_buku"]["tmp_name"];

    $ekstensiGambar = explode(".", $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));

    // $namaFileBaru = uniqid();
    // $namaFileBaru .= ".";
    // $namaFileBaru .= $ekstensiGambar;

    move_uploaded_file($tmpName, 'upload/' . $namaFile);

    return $namaFile;
}

// Menampilkan tabel data
?>
<?php
// Menghapus data jika tombol hapus diklik
// if (isset($_GET['hapus_id'])) {
//     $hapus_id = $_GET['hapus_id'];
//     $hapus_query = "DELETE FROM komik WHERE id = '$hapus_id'";
//     $hapus_result = mysqli_query($conn, $hapus_query);
//     if ($hapus_result) {
//         echo "Data berhasil dihapus.";
//     } else {
//         echo "Gagal menghapus data: " . mysqli_error($conn);
//     }
// }
?>
<form method="POST" action="" enctype="multipart/form-data">
                    <h1 class="title" align="center">Formulir Naskah</h1>
                <table border="0" cellpadding="2" cellspacing="0" align="center">
                    <tr>
                        <td>
                            <label class="nama">Nama </label> 
                        </td>
                        <td>:</td>
                        <td>
                            <input type="text" name="nama" required id="nama"> 
                        </td> 
                    </tr>
                    <tr>
                        <td>
                            <label>Tanggal </label>
                        </td>
                        <td>:</td>
                        <td>
                            <input type= "date" name= "tanggal" required>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Judul Naskah</label>
                        <td>:</td>
                        </td>
                        <td>
                            <input type="text" name="Judul" required id="judul"> 
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Alamat</label>
                        </td>
                        <td valign="middle">:</td>
                        <td>
                            <textarea name="alamat" id="" cols="40" rows="5" required></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>No Telp Hp</label>
                        </td>
                        <td valign="middle">:</td>
                        <td>
                           <input type= "Number" name="no_hp" required>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Jenis Kelamin</label>
                        </td>
                        <td valign="middle">:</td>
                        <td>
                            <input type="radio" name="jk" value="Laki-laki" required> Laki-laki
                            <input type="radio" name="jk" value="Perempuan" required> Perempuan
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>file Buku</label>
                        </td>
                        <td valign="middle">:</td>
                        <td>
                            <input type="file" name="file_buku" required>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="submit" name="submit"value="submit">
                        </td>
                    </tr>
                </table>
</form>
<?php
// $servername = "localhost";
// $username = "root";
// $password = "";
// $dbname = "rak_buku";
// $conn = new mysqli($servername, $username, $password, $dbname);
// if (!$conn) {
//     die("Koneksi gagal: " . mysqli_connect_error());
// }

// if (isset($_POST['submit'])) {
//     // Proses pengiriman formulir
//     // ...

//     $sql = "INSERT INTO komik (nama, tanggal, judul_buku, alamat, no_hp, jenis_kelamin, file_buku) 
//             VALUES ('$nama', '$tanggal', '$judul_buku', '$alamat', '$no_hp', '$jk', '$file_buku')";
//     if (mysqli_query($conn, $sql)) {
//         // Data berhasil ditambahkan.
//     } else {
//         // Terjadi kesalahan saat menambahkan data.
//     }
// }

// Menampilkan tabel data
?>
    <div id="table">
        <fieldset class="background">
            <table class= "table text-nowrap" border="1" cellpadding="5" cellspacing="5" align="center">
                <legend>
                    <h2 class="title" align = "center">Data Form Naskah</h2>
                </legend>
                <thread>
                    <tr>
                  
                        <th >Nama</th>
                        <th >Tanggal</th>
                        <th >Judul Buku</th>
                        <th >Alamat</th>
                        <th >No Hp</th>
                        <th >Jenis Kelamin</th>
                        <th >File Buku</th>
                        <th> Aksi </th>
                    </tr>
                </thread>
                <?php
                $query = "SELECT * FROM naskah";
                $result = mysqli_query($conn, $query);
                while ($row = mysqli_fetch_assoc($result)) {
                ?>
                        <tr>
                            <td><?php echo $row['nama']?></td>
                            <td><?php echo $row['tanggal']?></td>
                            <td><?php echo $row['judul_buku']?></td>
                            <td><?php echo $row['alamat']?></td>
                            <td><?php echo $row['no_hp']?></td>
                            <td><?php echo $row['jenis_kelamin']?></td>
                            <td><?php echo $row['file_buku']?></td>
                            <td align="center">
                        <a href="Naskah/Edit.php?id=<?php echo $row['id_buku'] ?>">Edit</a> |
                        <a href="Naskah/Delete.php?hapus_id=<?php echo $row['id_buku'] ?>">Hapus</a>
                    </td>
                </tr>
            <?php } ?>
        </table>
    </fieldset>
</div>

<?php
// Menghapus data jika tombol hapus diklik
// if (isset($_GET['hapus_id'])) {
//     $hapus_id = $_GET['hapus_id'];
//     $hapus_query = "DELETE FROM komik WHERE id = '$hapus_id'";
//     $hapus_result = mysqli_query($conn, $hapus_query);
//     if ($hapus_result) {
//         echo "Data berhasil dihapus.";
//     } else {
//         echo "Gagal menghapus data: " . mysqli_error($conn);
//     }
// }
?>