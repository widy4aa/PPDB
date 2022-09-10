<?php
    require('../koneksi.php');
   
   $id = $_GET['id'];
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

   
    $query = mysqli_query($conn,"UPDATE calon_siswa SET nik='$nik', kk='$kk', nisn='$nisn',nama='$nama',tgl_lahir='$tgl_lahir',jurusan='$jurusan',tgl_pendaftaran='$tgl_pendaftaran',no_hp='$no_hp',alamat='$alamat',nama_ayah='$nama_ayah',nama_ibu='$nama_ibu',asal_sekolah='$asal_sekolah',status='$status' WHERE id = $id");

    if ($query) {
        header('Location: ../daftarsiswa.php');
    }
?>