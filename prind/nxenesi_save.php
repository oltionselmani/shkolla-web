<?php
include('../classes/Nxenesi.php'); 
include('../config/config.php');

$error_text = [];

if($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Emri
    if(isset($_POST['emri']) && !empty($_POST['emri'])) {
        $emri = htmlspecialchars(strip_tags(trim($_POST['emri'])));
        if(strlen($emri)<3) {
            $error_text[]='Emri i nxenesit duhet të ketë së paku 3 karaktere.';
        }
        setcookie('emri',$emri, time()+60);
    } else {
        $error_text[] = "Ju lutemi plotësoni fushën e emrit.";
    }

    // Mbiemri
    if(isset($_POST['mbiemri']) && !empty($_POST['mbiemri'])) {
        $mbiemri = htmlspecialchars(strip_tags(trim($_POST['mbiemri'])));
        if(strlen($mbiemri)<3) {
            $error_text[]='Mbiemri i nxenesit duhet të ketë së paku 3 karaktere.';
        }
        setcookie('mbiemri',$mbiemri, time()+60);
    } else {
        $error_text[] = "Ju lutemi plotësoni fushën e mbiemrit.";
    }

    // klasa
    if(isset($_POST['klasa']) && !empty($_POST['klasa'])) {
        $klasa = htmlspecialchars(strip_tags(trim($_POST['klasa'])));
        if(strlen($klasa)<3) {
            $error_text[]='Klasa duhet të ketë së paku 3 karaktere.';
        }
        setcookie('klasa',$klasa, time()+60);
    } else {
        $error_text[] = "Ju lutemi plotësoni fushën e klases.";
    }


    // Drejtimi
    $drejtimi_id = intval($_POST['drejtimi_id'] ?? 0);
    if(!$drejtimi_id) $error_text[] = "Ju lutemi zgjidhni drejtimin.";

    // prind_id
    $prind_id = intval($_POST['prind_id'] ?? 0);
    if(!$prind_id) $error_text[] = "Prindi nuk është i identifikuar.";




    if(count($error_text) > 0) {
        foreach($error_text as $err) {
            echo "<p class='alert alert-danger'>$err</p>";
        }
        echo "<a href='nxenesi_shto_form.php' class='btn btn-outline-primary'>Kthehu te Forma</a>";
        exit;
    }

    $nx = new Nxenesi();
    $nx->shto_nxenesin($emri, $mbiemri, $klasa, $drejtimi_id,$prind_id);

    echo "<script>alert('Nxënësi u ruajt me sukses!'); window.location.href='nxenesi_shto_form.php';</script>";
}
?>
