<?php
    require('../koneksi.php');
   
    $id = $_GET['id'];

    $query = mysqli_query($conn,"DELETE FROM calon_siswa WHERE id=$id");

    header('Location: ../daftarsiswa.php');
 
?>