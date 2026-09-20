<?php
session_start();
include('../config/config.php');
include('../classes/User.php');

if(!isset($_SESSION['user_id'])) {
    header("Location: ../llogaria/login_form.php");
    exit;
}

$userObj = new User();
$userId = $_SESSION['user_id'];

$uploadPath = "../public/public-backend/uploads/profili/";

// ================== FOTO ==================
if(isset($_POST['ndrysho_foto']) && isset($_FILES['foto'])) {

    $fotoTmp  = $_FILES['foto']['tmp_name'];
    $fotoName = time() . "_" . basename($_FILES['foto']['name']);
    $fotoDest = $uploadPath . $fotoName;

    if(move_uploaded_file($fotoTmp, $fotoDest)) {

        $userObj->updateFoto($userId, $fotoName);

        // update session
        $_SESSION['user_foto'] = $fotoName;

        header("Location: profili-admin.php?success=foto");
        exit;

    } else {
        header("Location: profili-admin.php?error=foto");
        exit;
    }
}

// ================== PASSWORD ==================
if(isset($_POST['ndrysho_password'])) {

    $password = $_POST['password'];
    $confirm  = $_POST['confirm_password'];

    if($password === $confirm) {

        $userObj->updatePassword($userId, $password);

        header("Location: profili-admin.php?success=password");
        exit;

    } else {

        header("Location: profili-admin.php?error=password");
        exit;
    }
}
