<?php
include('../../classes/User.php');
include('../admin-header.php');

echo "<div class='container mt-5'>";

if($_SERVER['REQUEST_METHOD']= "POST") {

    $errors=[];

    $id=$_POST['id'] ?? '';
    $emri=htmlspecialchars(strip_tags(trim($_POST['emri'] ?? '')));
    $mbiemri=htmlspecialchars(strip_tags(trim($_POST['mbiemri'] ?? '')));
    $email=htmlspecialchars(strip_tags(trim($_POST['email'] ?? '')));
    $telefoni=htmlspecialchars(strip_tags(trim($_POST['telefoni'] ?? '')));

    if(!$id) $errors[]="ID e profesorit mungon!";
    if(strlen($emri) < 2) $errors[]="Emri duhet të ketë së paku 2 karaktere!";
    if(strlen($mbiemri) < 2) $errors[]="Mbiemri duhet të ketë së paku 2 karaktere!";
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)) $errors[]="Email jo valid!";

    if(count($errors) > 0){
        foreach($errors as $err){
            echo "<p>".$err."</p>";
        }
        echo "<a href='" . BASE_URL . "admin/admin-frontend/profet.php' class='btn btn-secondary mt-3'>Kthehu mbrapa</a>";
    } else {
        $user=new User();
        $user->updateProf($id, $emri, $mbiemri, $email, $telefoni);
    }
}