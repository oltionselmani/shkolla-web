<?php
include('../../classes/Nxenesi.php');
include('../admin-header.php'); 

if($_SERVER['REQUEST_METHOD']=="POST"){

    $error=[];

    // Emri
    if(isset($_POST['emri']) && !empty($_POST['emri'])){
        $emri = htmlspecialchars(strip_tags(trim($_POST['emri'])));
        if(strlen($emri)<2){
            $error[]="Emri duhet të ketë të paktën 2 karaktere!";
        }
    } else {
        $error[]="Ju lutemi plotësoni emrin!";
    }

    // Mbiemri
    if(isset($_POST['mbiemri']) && !empty($_POST['mbiemri'])){
        $mbiemri = htmlspecialchars(strip_tags(trim($_POST['mbiemri'])));
        if(strlen($mbiemri)<2){
            $error[]="Mbiemri duhet të ketë të paktën 2 karaktere!";
        }
    } else {
        $error[]="Ju lutemi plotësoni mbiemrin!";
    }

    // Klasa
    if(isset($_POST['klasa']) && !empty($_POST['klasa'])){
        $klasa = htmlspecialchars(strip_tags(trim($_POST['klasa'])));
    } else {
        $error[]="Ju lutemi plotësoni klasën!";
    }

    // Drejtimi
    if(isset($_POST['drejtimi_id']) && !empty($_POST['drejtimi_id'])){
        $drejtimi_id=htmlspecialchars(strip_tags(trim($_POST['drejtimi_id'])));
        $drejtimi_id=filter_var($drejtimi_id,FILTER_VALIDATE_INT);
    } else {
        $error[]="Ju lutemi zgjidhni drejtimin!";
    }

    // ID
    if(isset($_POST['id']) && !empty($_POST['id'])){
        $id = htmlspecialchars(strip_tags(trim($_POST['id'])));
        $id = filter_var($id, FILTER_VALIDATE_INT);
    } else {
        $error[] = "ID e nxënësit nuk është e saktë!";
    }

    // gabimet
    if(count($error)>0){
        foreach($error as $err){
            echo "<p style='color:red;'>$err</p>";
        }
    } else {
        $nx = new Nxenesi();
        $nx->perditeso_nxenesin($id, $emri, $mbiemri, $klasa, $drejtimi_id);
        exit;
    }
}
