<?php
require 'config.php';
if(!empty($_SESSION["id"])){
  header("Location: index.php");
}

if(isset($_POST["submit"])){
  $name = $_POST["name"];
  $email = $_POST["email"];
  $phone = $_POST["phone"];
  $nik = $_POST["nik"];
  $pedukuhan = $_POST["pedukuhan"];
  $password = $_POST["password"];
  $confirmpassword = $_POST["confirmpassword"];
  $duplicate = mysqli_query($conn, "SELECT * FROM users WHERE nik = '$nik' OR email = '$email'");
  if(mysqli_num_rows($duplicate) > 0){
    echo
    "<script> showPopup('Email Sudah Digunakan'); </script>";
  }
  else{
    if($password == $confirmpassword){
      $query = "INSERT INTO users VALUES('','$name','$email', '$password', '$phone', '$nik','$password')";
      mysqli_query($conn, $query);
      echo
      "<script> showPopup('Pendaftaran Sukses'); </script>";
    }
    else{
      echo
      "<script> showPopup('Pendaftaran Gagal'); </script>";
    }
  }
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Registration</title>
    <link rel="stylesheet" href="login.css">
    <!-- Di dalam file HTML -->
    <script>
      function showPopup(message) {
        document.getElementById('popup-message').innerText = message;
        document.getElementById('popup').style.display = 'block';
        document.getElementById('overlay').style.display = 'block';
      }

      function hidePopup() {
        document.getElementById('popup').style.display = 'none';
        document.getElementById('overlay').style.display = 'none';
      }
    </script>
  </head>
  <body>
    <div id="overlay" class="overlay"></div>

    <div id="popup" class="popup">
      <p id="popup-message"></p>
      <button onclick="hidePopup()">Tutup</button>
    </div>
    <div class="regis-container">

      <h2>Daftar</h2>
      <form class="" action="" method="post" autocomplete="off">
          <div class="txt_field">
            <input type="text" name="name" id="name" required />
            <label for="name">Nama</label>
          </div>
          <div class="txt_field">
            <input type="email" name="email" id="email" required />
            <span></span>
            <label for="email">Email</label>
          </div>
          <div class="txt_field">
            <input type="tel" name="phone" id="phone" required />
            <span></span>
            <label for="phone">Nomor Telepon</label>
          </div>
          <div class="txt_field">
            <input type="text" name="nik" id="nik" required />
            <span></span>
            <label for="nik">NIK</label>
          </div>
          <div class="txt_field">
              <input type="text" name="pedukuhan" id="pedukuhan" required />
              <span></span>
              <label for="pedukuhan">Pedukuhan</label>
            </div>
            <div class="txt_field">
              <input type="password" name="password" id="password" required />
              <span></span>
              <label for="password">Kata Sandi</label>
            </div>
            <div class="txt_field">
              <input type="password" name="confirmpassword" id="confirmpassword" required />
              <span></span>
              <label for="confirmpassword">Ulangi Kata Sandi</label>
            </div>
          <button type="submit" name="submit">Login</button>
          <div class="signup_link">
          Sudah punya akun? <a href="/login/login.php">Masuk</a>
          </div>
        </div>
      </form> 
    </div>
    <br>
  </body>
</html>
