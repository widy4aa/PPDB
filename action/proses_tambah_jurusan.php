<?php
    require('../koneksi.php');
   
   $jurusan=$_POST['jurusan'];

    $query = mysqli_query($conn,"INSERT INTO jurusan (jurusan) VALUES ('$jurusan')");

    if ($query) {
        header('Location: ../jurusan.php');
    }
?>