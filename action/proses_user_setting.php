<?php 
    session_start();
    require('../koneksi.php');

    $loginsess = $_SESSION['login'];
    $query = mysqli_query($conn,"SELECT * FROM user WHERE id = $loginsess");
    $user = mysqli_fetch_assoc($query);
    $id = $_GET['id'];

    if ($_POST['category'] == 'changebio') {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $no_telp = $_POST['no_telp'];
    
        $query = mysqli_query($conn,"UPDATE user SET name='$name',email='$email',no_telp='$no_telp' WHERE id = $id");
        
        header('Location: ../setting.php');
    }

    if ($_POST['category'] == 'changepw') {
        $oldpw = $_POST['oldpw'];
        $newpw = $_POST['newpw'];
        
        if (password_verify($oldpw,$user['password'])) {
            $pwhash = password_hash($newpw,PASSWORD_DEFAULT);
            $queryPW = mysqli_query($conn,"UPDATE user SET password='$pwhash' WHERE id = $id");
            $_SESSION['message'] = 'success_pw';
            header('Location: ../setting.php');
        }else{
            $_SESSION['message'] = 'error_oldpw';
            header('Location: ../setting.php');
        }
        
    }

    if ($_POST['category'] == 'changepp') {
        $filename   = uniqid() . "-" . time();
        $extension  = pathinfo( $_FILES["image"]["name"], PATHINFO_EXTENSION );
        $basename   = $filename . "." . $extension;

        $fileTmp = $_FILES['image']['tmp_name'];

        if (move_uploaded_file($fileTmp,'../asset/photoProfile/' . $basename)) {
            $queryPP = mysqli_query($conn,"UPDATE user SET photo_profile='$basename' WHERE id = $id");

            if (isset($_POST['oldimg'])) {
                unlink('../asset/photoProfile/' . $_POST['oldimg']);
            }
            header('Location: ../setting.php');
        }
    }

?>