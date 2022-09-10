<?php
    require('../koneksi.php');
   
    $jurusan = $_GET['jurusan'];

    $query = mysqli_query($conn,"DELETE FROM jurusan WHERE jurusan='$jurusan'");

    header('Location: ../jurusan.php');
 
?>