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

        header("Location: profili-prof.php?success=foto");
        exit;

    } else {
        header("Location: profili-prof.php?error=foto");
        exit;
    }
}

// ================== EMAIL ==================
if(isset($_POST['ndrysho_email'])) {

    $email = trim($_POST['email']);

    if(filter_var($email, FILTER_VALIDATE_EMAIL)) {

        // Kontrollo a ekziston email-i
        if(!$userObj->emailExists($email, $userId)) {

            $userObj->updateEmail($userId, $email);

            // update session
            $_SESSION['user_email'] = $email;

            header("Location: profili-prof.php?success=email");
            exit;

        } else {

            header("Location: profili-prof.php?error=email_exists");
            exit;
        }

    } else {

        header("Location: profili-prof.php?error=email_invalid");
        exit;
    }
}

// ================== PASSWORD ==================
if(isset($_POST['ndrysho_password'])) {

    $password = $_POST['password'];
    $confirm  = $_POST['confirm_password'];

    if($password === $confirm) {

        $userObj->updatePassword($userId, $password);

        header("Location: profili-prof.php?success=password");
        exit;

    } else {

        header("Location: profili-prof.php?error=password");
        exit;
    }
}
