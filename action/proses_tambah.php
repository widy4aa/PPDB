<?php
    require('../koneksi.php');
   
   $nik=$_POST['nik'];
   $kk=$_POST['kk'];
   $nisn=$_POST['nisn'];
   $nama=$_POST['nama'];
   $tgl_lahir=$_POST['tgl_lahir'];
   $jurusan=$_POST['jurusan'];
   $tgl_pendaftaran=$_POST['tgl_pendaftaran'];
   $no_hp=$_POST['no_hp'];
   $alamat=$_POST['alamat'];
   $nama_ayah=$_POST['nama_ayah'];
   $nama_ibu=$_POST['nama_ibu'];
   $asal_sekolah=$_POST['asal_sekolah'];
   $status=$_POST['status'];

   
    $query = mysqli_query($conn,"INSERT INTO calon_siswa (nik,kk,nisn,nama,tgl_lahir,jurusan,tgl_pendaftaran,no_hp,alamat,nama_ayah,nama_ibu,asal_sekolah,status) VALUES ('$nik','$kk','$nisn','$nama','$tgl_lahir','$jurusan','$tgl_pendaftaran','$no_hp','$alamat','$nama_ayah','$nama_ibu','$asal_sekolah','$status')");

    if ($query) {
        header('Location: ../daftarsiswa.php');
    }
?>