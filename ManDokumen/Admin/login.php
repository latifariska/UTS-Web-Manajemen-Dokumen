<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Login</title>
    <style>
      body {
        font-family: Arial, sans-serif;
        background-color: #5cb85c; /* Warna latar belakang hijau */
        background-image: url("path/to/decoration.png"); /* Ganti dengan path gambar hiasan yang diinginkan */
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
        border-radius: 4px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
      }
      
      input[type="email"],
      input[type="password"] {
        width: 90%;
        padding: 10px;
        margin-bottom: 10px;
        border: 1px solid #ccc;
        border-radius: 4px;
      }
      
      input[type="checkbox"] {
        margin-bottom: 10px;
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
         
        font-weight: bold;
        font: size 13px;
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
    <h1 align="center">Isi form dibawah ini dengan benar!</h1>
    </div>

    <div class="container">
      <form method="POST">
        <input type="email" name="email" value="" autocomplete="off" placeholder="Email" required>
        <br/>
        <input type="password" name="password" value="" autocomplete="off" placeholder="Kata sandi" required>
        <br/>
        <input type="checkbox" name="remember_me"> Ingat Saya
        <br/>
        <input type="submit" name="submit" value="Login">
      </form>
      
      <?php
        session_start();
        require_once 'koneksi.php';

        if(isset($_SESSION['is_login']) || isset($_COOKIE['_logged'])) {
          header('location: index.php');
        }

        if(isset($_POST['submit'])) {
          $email    = strip_tags($_POST['email']);
          $password = strip_tags($_POST['password']);
          $remember = (!empty($_POST['remember_me']) ? $_POST['remember_me'] : '');

          if(empty($email) || empty($password)) {
            echo '<div class="warning"><b>Warning!</b> Silahkan isi semua data yang diperlukan.</div>';
          } elseif(count((array) $koneksi->query('SELECT email FROM register WHERE email = "'.$email.'"')->fetch_array()) == 0) {
            echo '<div class="warning"><b>Warning!</b> Email tidak terdaftar.</div>';
          } else {
            $register = $koneksi->query('SELECT password, nama_lengkap FROM register')->fetch_assoc();
            if(password_verify($password, $register['password'])) {
              $_SESSION['is_login'] = $register['nama_lengkap'];

              if($remember) {
                if(!isset($_COOKIE['is_logged'])) {
                  setcookie('_logged', substr(md5($email), 0, 10), time() + (60 * 60 * 24), '/');
                }
              }
              header('location: index.php');
            } else {
              echo '<div class="warning"><b>Warning!</b> Kata sandi salah.</div>';
            }
          }
        }
      ?>
    </div>
  </body>
</html>