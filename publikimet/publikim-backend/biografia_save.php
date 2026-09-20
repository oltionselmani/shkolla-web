<?php
require_once("../../classes/Publikimet.php");
include('../publikimet-header.php');

$error_text = [];

if($_SERVER['REQUEST_METHOD'] == 'POST') {

    // EMRI
    if(isset($_POST['emri']) && !empty(trim($_POST['emri']))) {
        $emri = htmlspecialchars(strip_tags(trim($_POST['emri'])));
        if(strlen($emri) < 2){
            $error_text[] = "Emri duhet të ketë të paktën 2 karaktere.";
        }
    } else {
        $error_text[] = "Ju lutemi plotësoni emrin.";
    }

    // MBIEMRI
    if(isset($_POST['mbiemri']) && !empty(trim($_POST['mbiemri']))) {
        $mbiemri = htmlspecialchars(strip_tags(trim($_POST['mbiemri'])));
        if(strlen($mbiemri) < 2){
            $error_text[] = "Mbiemri duhet të ketë të paktën 2 karaktere.";
        }
    } else {
        $error_text[] = "Ju lutemi plotësoni mbiemrin.";
    }

    // STATUSI
    if(isset($_POST['statusi']) && !empty(trim($_POST['statusi']))){
        $statusi = htmlspecialchars(strip_tags(trim($_POST['statusi'])));
    } else {
        $statusi = null; 
    }
    
    


    // NJOHURI
    if(isset($_POST['njohuri']) && !empty(trim($_POST['njohuri']))) {
        $njohuri = htmlspecialchars(strip_tags(trim($_POST['njohuri'])));
        if(strlen($njohuri) < 5){
            $error_text[] = "Njohuria është shumë e shkurtër.";
        }
    } else {
        $error_text[] = "Ju lutemi plotësoni njohurinë.";
    }

    // FOTO 
    $foto = $_FILES['foto'] ?? null;
    $allowedTypes = ['image/jpeg','image/png','image/webp'];
    $maxSize = 2*1024*1024;
    $fotoName = null;

    if($foto && isset($foto['name']) && $foto['error'] == 0){
        if(!in_array($foto['type'], $allowedTypes)){
            $error_text[] = "Foto duhet të jetë JPEG, PNG ose WEBP.";
        } elseif($foto['size'] > $maxSize){
            $error_text[] = "Foto nuk mund të jetë më shumë se 2MB.";
        } else {
            $uploadDir = "biografite/";
            if(!is_dir($uploadDir)){
                mkdir($uploadDir, 0755, true);
            }
            $fotoName = time() . "_" . basename($foto['name']);
            $dest = $uploadDir . $fotoName;
            if(!move_uploaded_file($foto['tmp_name'], $dest)){
                $error_text[] = "Gabim gjatë ngarkimit të fotos.";
            }
        }
    }


    if(count($error_text) > 0){
        foreach($error_text as $err){
            echo "<p class='alert alert-danger'>$err</p>";
        }
        echo "<a href='../biografia-publish.php' class='btn btn-outline-danger'>Kthehu tek forma</a>";
        exit;
    }


    $publikim = new Publikimet();
    $result = $publikim->krijo_biografine($emri, $mbiemri, $njohuri, $fotoName, $statusi);

    if($result){
       echo "<script>alert('Biografia u ruajt me sukses!');</script>";
       echo "<script>window.location.href = '../biografite.php';</script>";
    } else {
        echo "<p class='alert alert-danger'>Gabim gjatë ruajtjes së biografisë.</p>";
    }
}
?>