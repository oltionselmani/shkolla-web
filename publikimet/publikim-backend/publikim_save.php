<?php

require_once("../../classes/Publikimet.php");
include('../publikimet-header.php');

$error_text = [];

if($_SERVER['REQUEST_METHOD'] == 'POST') {

    // TITULLI
    if(isset($_POST['titulli']) && !empty($_POST['titulli'])) {
        $titulli = htmlspecialchars(strip_tags(trim($_POST['titulli'])));
        if(strlen($titulli) < 3){
            $error_text[] = "Titulli duhet të ketë të paktën 3 karaktere.";
        }
    } else {
        $error_text[] = "Ju lutemi plotësoni titullin.";
    }

    // NJOHURI
    if(isset($_POST['njohuri']) && !empty($_POST['njohuri'])) {
        $njohuri = htmlspecialchars(strip_tags(trim($_POST['njohuri'])));
        if(strlen($njohuri) < 5){
            $error_text[] = "Njohuria është shumë e shkurtër.";
        }
    } else {
        $error_text[] = "Ju lutemi plotësoni njohurinë.";
    }

    // FOTO (opsionale, 4)
    $fotot = $_FILES['fotot'] ?? null;
    $allowedTypes = ['image/jpeg','image/png','image/webp'];
    $maxSize = 2*1024*1024;

    if($fotot){
        for($i=0; $i<4; $i++){
            if(isset($fotot['name'][$i]) && $fotot['error'][$i]==0){
                if(!in_array($fotot['type'][$i], $allowedTypes)){
                    $error_text[] = "Foto ".($i+1)." duhet të jetë JPEG, PNG ose WEBP.";
                } elseif($fotot['size'][$i] > $maxSize){
                    $error_text[] = "Foto ".($i+1)." nuk mund të jetë më shumë se 2MB.";
                }
            }
        }
    }

    if(count($error_text) > 0){
        foreach($error_text as $err){
            echo "<p class='alert alert-danger'>$err</p>";
        }
        echo "<a href='../publikim-dashboard.php' class='btn btn-outline-danger'>Kthehu tek forma</a>";
        exit;
    }

    $publikim = new Publikimet();
    $result = $publikim->krijo_publikimin($titulli, $njohuri, $fotot);

    if($result){
       echo "<script>alert('Publikimi u ruajt me sukses!');</script>";
       echo "<script>window.location.href = '../me-te-rejat.php';</script>";

    } else {
        echo "<p class='alert alert-danger'>Gabim gjatë ruajtjes së publikimit.</p>";
    }
}
?>
