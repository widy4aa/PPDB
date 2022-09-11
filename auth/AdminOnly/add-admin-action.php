<?php
    require('../../koneksi.php');

        $email = $_POST['email'];
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

        $query = mysqli_query($conn, "insert into user(`id`, `name`, `email`, `no_telp`, `photo_profile`, `password`) VALUES (NULL,'','$email', '', '','$password')");
        
        header('Location: ../login.php');
        // <!--JANGAN DI BULLY BANH :( -->
?>
