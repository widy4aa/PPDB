<?php
    session_start();
    require('../koneksi.php');
   
   $jurusan=$_POST['jurusan'];

   $queryJurusan = mysqli_query($conn,"SELECT * FROM jurusan");
   foreach ($queryJurusan as $key => $jurus) {
     if ($jurus['jurusan'] == $jurusan) {
        $_SESSION['message_add_jurusan'] = 'Jurusan sudah ada';
        header('Location: ../tambah_jurusan.php');
     }
   }

    $query = mysqli_query($conn,"INSERT INTO jurusan (jurusan) VALUES ('$jurusan')");

    if ($query) {
        header('Location: ../jurusan.php');
    }
?>