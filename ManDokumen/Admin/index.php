<!DOCTYPE html>
<html>
    <head>
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
                    <li><a href="index.php?page=Komik">Komik</a></li>
                    <li><a href="index.php?page=Laporan">Laporan</a></li>
                    <li><a href="index.php?page=Majalah">Majalah</a></li>
                    <li><a href="index.php?page=Naskah">Naskah</a></li>
                    <li><a href="index.php?page=Novel">Novel</a></li>
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
                    if(isset($_GET['page'])){
                        $page= $_GET['page'];
                        switch ($page){
                            case'Komik': 
                                include "Komik/index.php";
                                break;
                            case 'Laporan':
                                include "Laporan/index.php";
                                break;
                            case 'Majalah':
                                include "Majalah/index.php";
                                break;
                            case 'Naskah':
                                include "Naskah/index.php";
                                break;
                            case 'Novel':
                                include "Novel/index.php";
                                break;
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