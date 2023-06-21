<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Register</title>
    <style>
      body {
        font-family: Arial, sans-serif;
        background-color: #5cb85c; /* Warna latar belakang hijau */
        /* background-image: url("ManDokumen/Images/header.jpg"); Ganti dengan path gambar buku yang diinginkan */
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
        padding: 20px;
        box-sizing: border-box;
      }
      
      .container {
        max-width: 400px;
        margin: 0 auto;
        background-color: rgba(255, 255, 255, 0.8); /* Warna latar belakang transparan */
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
      }
      
      input[type="text"],
      input[type="password"] {
        width: 90%;
        padding: 10px;
        margin-bottom: 10px;
        border: 1px solid #ccc;
        border-radius: 4px;
      }
      
      input[type="submit"] {
        width: 380px;
        padding: 10px;
        background-color: #4caf50;
        color: #fff;
        border: none;
        border-radius: 4px;
        cursor: pointer;
      }
      input[type="submit"]:active {
        transform: translateY(10px);
      }
      
      input[type="submit"]:hover {
        background-color: #aaaaff;
         transition: 0.8s;
         
         box-shadow: 0 10px 10px 0 rgba(0,0,0,0.10), 0 10px 10px 0 rgba(0,0,0,0.15);
  
      }
      
      .warning {
        color: red;
        margin-bottom: 10px;
      }
    </style>
  </head>
  <body>
  <div class="kepala">
    <img src="../images/kepala2.jpg" height="100%" width="100%">
  </div>

  <div class="tittle">
    <h1 align="center">Selamat Datang di Website Rak Buku</h1>
    </div>

    <div class="container">
      <form method="POST">
        <input type="text" name="email" value="" autocomplete="off" placeholder="Email">
        <br/>
        <input type="password" name="password" value="" autocomplete="off" placeholder="Kata sandi">
        <br/>
        <input type="text" name="name" value="" autocomplete="off" placeholder="Nama lengkap">
        <br/>
        <div class="submit">
          <a href="login.php">
          <input type="submit" name="submit" value="Register"> 
        </div>

        <div class="tittle">
          <h5 align="center">jika telah mendaftar silahkan login</h5>
        </div>
        
        <!-- <input type="submit" name="submit" value="Register"> -->
      </form>
      
      <?php
        session_start();
        require_once 'koneksi.php';

        if(isset($_SESSION['is_login']) || isset($_COOKIE['_logged'])) {
          header('location: login.php');
          exit();
        }

        if(isset($_POST['submit'])) {
          $email    = strip_tags($_POST['email']);
          $password = strip_tags($_POST['password']);
          $name     = strip_tags($_POST['name']);

          if(empty($email) || empty($password) || empty($name)) {
            echo '<div class="warning"><b>Warning!</b> Silahkan isi data yang diperlukan.</div>';
          } elseif($koneksi) {
            $stmt = $koneksi->prepare('SELECT email FROM register WHERE email = ?');
            $stmt->bind_param('s', $email);
            $stmt->execute();
            $result = $stmt->get_result();
            if($result->num_rows > 0) {
              echo '<div class="warning"><b>Warning!</b> Email telah terdaftar.</div>';
              exit();
            }

            $stmt = $koneksi->prepare('INSERT INTO register (email, password, nama_lengkap) VALUES (?, ?, ?)');
            $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
            $stmt->bind_param('sss', $email, $hashedPassword, $name);
            if($stmt->execute()) {
              echo 'Pendaftaran berhasil!';
            } else {
              echo 'Pendaftaran gagal!';
            }
          } else {
            echo 'Koneksi database gagal!';
          }
        }
      ?>
    </div>
  </body>
</html>