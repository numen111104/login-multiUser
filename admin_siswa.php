<?php
include('inc_header.php');
if(!in_array('siswa', $_SESSION['admin_akses'])) {
    echo 'you not have the acces';
    include('inc_footer.php');
    exit();
}
?>
<h1>WELCOME TO SISWA PAGE</h1>
<?php
include("inc_footer.php");
?>