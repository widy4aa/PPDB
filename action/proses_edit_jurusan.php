<?php
    require('../koneksi.php');
   
   $jurusan=$_POST['jurusan'];
   $getjurusan=$_GET['jurusan'];

    $query = mysqli_query($conn,"UPDATE jurusan set jurusan='$jurusan' WHERE jurusan='$getjurusan' ");

    if ($query) {
        header('Location: ../jurusan.php');
    }
?>