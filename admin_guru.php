<?php
include('inc_header.php');
if(!in_array('guru', $_SESSION['admin_akses'])) {
    echo 'you not have the acces';
    include('inc_footer.php');
    exit();
}
?>
<h1>WELCOME TO GURU PAGE</h1>
<?php
include("inc_footer.php");
?>