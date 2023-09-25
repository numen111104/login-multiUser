<?php
session_start();
if (isset($_SESSION['admin_username'])) {
  header('location:admin_depan.php');
}
include('inc_koneksi.php');
$username = '';
$password = '';
$err = '';
if (isset($_POST['login'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];
  if ($username == '' && $password == '') {
    $err .= "<li>Please input your username and password!</li>";
  }
  if (empty($err)) {
    $sql1 = "SELECT * from admin WHERE username = '$username'";
    $q1 = mysqli_query($koneksi, $sql1);
    $r1 = mysqli_fetch_array($q1);
    if ($r1['password'] != md5($password)) {
      $err .= "<li>The account is not exist</li>";
    }
  }
  if (empty($err)) {
    $login_id = $r1['login_id'];
    $sql1 = "SELECT * from admin_akses where login_id = '$login_id'";
    $q1 = mysqli_query($koneksi, $sql1);
    while ($r1 = mysqli_fetch_array($q1)) {
      $akses[] = $r1['akses_id']; //spp, guru, siswa
    }
    if (empty($akses)) {
      $err .= "<li>You haven't the acces for this page</li>";
    }
  }
  if (empty($err)) {
    $_SESSION['admin_username'] = $username;
    $_SESSION['admin_akses'] = $akses;
    header("location:admin_depan.php");
    exit();
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Document</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" />
</head>

<body>
  <div class="container-fluid mt-5">
    <div class="row justify-content-center">
      <div class="col-md-4">
        <div class="card bg-body-secondary">
          <div class="card-body">
            <h5 class="card-title text-center mb-3">HALAMAN LOGIN</h5>
            <?php
            if ($err) {
              echo "<ul> $err </ul>";
            } ?>
            <form method="post" autocomplete="off">
              <div class="mb-3">
                <div class="form-floating mb-3">
                  <input type="text" class="form-control" name="username" value="<?php echo $username ?>"
                    id="floatingInput" placeholder="Masukkan username anda" />
                  <label for="floatingInput">Username</label>
                </div>
                <div class="form-floating mb-3">
                  <input type="password" class="form-control" name="password" value="<?php echo $password ?>"
                    id="floatingPassword" placeholder="Password" />
                  <label for="floatingPassword">Password</label>
                </div>
                <input type="submit" name="login" value="Masuk ke Sistem" class="btn btn-primary btn-block" />
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>