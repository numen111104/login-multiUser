<?php
session_start();
include("inc_koneksi.php");
if (!isset($_SESSION["admin_username"])) {
  header("location:login.php");
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Document</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" />
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
  <nav class="navbar navbar-expand-lg bg-body-tertiary bg-primary-subtle">
    <div class="container-fluid bg-primary-subtle">
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link active" href="./admin_depan.php">Halaman Depan</a>
          </li>
          <?php if (in_array('guru', $_SESSION['admin_akses'])) { ?>
            <li class="nav-item">
              <a class="nav-link active" href="./admin_guru.php">Halaman Guru</a>
            </li>
          <?php } ?>
          <?php if (in_array('siswa', $_SESSION['admin_akses'])) { ?>
            <li class="nav-item">
              <a class="nav-link active" href="./admin_siswa.php">Halaman Siswa</a>
            </li>
          <?php } ?>
          <?php if (in_array('spp', $_SESSION['admin_akses'])) { ?>
            <li class="nav-item">
              <a class="nav-link active" href="./admin_spp.php">Halaman SPP</a>
            </li>
          <?php } ?>
          <li class="nav-item">
            <a class="nav-link active btn btn-outline-primary" href="./logout.php">Keluar</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>