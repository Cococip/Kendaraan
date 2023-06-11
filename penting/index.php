<?php
session_start();

require_once "koneksi.php";

// Fungsi untuk melakukan redirect menggunakan JavaScript
function redirect_js($url)
{
  echo "<script>window.location.href='$url';</script>";
  exit;
}

if (isset($_POST['login'])) {
  $user = $_POST['username'];
  $pass = $_POST['password'];

  // Enkripsi password dengan MD5
  $encryptedPass = md5($pass);

  // Memeriksa login pengguna
  $query = "SELECT * FROM masyarakat WHERE username='$user' AND password='$encryptedPass'";
  $result = $koneksi->query($query);
  $row = $result->fetch_object();
  if ($row) {
    $_SESSION['login'] = $row->username;
    $_SESSION['id_mas'] = $row->id_mas;
    $_SESSION['level'] = $row->level;    
    if ($row->level == "warga") {
      redirect_js("dashboardwarga.php");
    } elseif ($row->level == "admin") {
      redirect_js("dashboard.php");
    }
  } else {
    echo "<script>alert('Username dan Password Salah.');</script>";
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Mojako</title>
  <link rel="stylesheet" href="admin/assets/vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="admin/assets/vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="admin/assets/css/style.css">
  <link rel="shortcut icon" href="admin/assets/images/favicon.ico" />
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth">
        <div class="row flex-grow">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left p-5" style="border-radius: 10px;">
              <h6 class="font-weight-light">Sign in to mojako.</h6>

              <form class="pt-3 mb-4" method="post" action="">
                <div class="form-group">
                  <label>Username</label>
                  <input type="text" class="form-control form-control-lg" name="username" placeholder="Username" autofocus />
                </div>
                <div class="form-group">
                  <label>Password</label>
                  <input type="password" class="form-control form-control-lg" name="password" placeholder="Password" />
                </div>
                <input type="submit" name="login" class="btn btn-block btn-gradient-primary btn-lg font-weight-medium auth-form-btn mt-3" value="Login">
                <a class="btn btn-block btn-gradient-danger btn-lg font-weight-medium auth-form-btn mt-3" href="../index.php">Kembali</a>
              </form>

              <div class="text-center mt-4 font-weight-light">
                Belum punya akun? <a href="registrasi.php" class="text-primary">Registrasi</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="admin/assets/vendors/js/vendor.bundle.base.js"></script>
  <script src="admin/assets/js/off-canvas.js"></script>
  <script src="admin/assets/js/hoverable-collapse.js"></script>
  <script src="admin/assets/js/misc.js"></script>
</body>

</html>
