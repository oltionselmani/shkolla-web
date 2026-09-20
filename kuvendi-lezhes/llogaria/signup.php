<?php

include('../header.php');

if($_SERVER['REQUEST_METHOD']=='POST') {

    $error=[];

    // Emri
    if(isset($_POST['emri']) && !empty($_POST['emri'])) {

        $emri=trim(strip_tags(htmlspecialchars($_POST['emri'])));

        if(strlen($emri)<2) {
            $error[]="Emri duhet te perbehet nga se paku 3 karaktere!";
        }

    }
    else {
        $error[]="Ju lutemi te plotesoni fushen e emrit!";
    }
    
    



    // Mbiemri
    if(isset($_POST['mbiemri']) && !empty($_POST['mbiemri'])) {

        $mbiemri=trim(strip_tags(htmlspecialchars($_POST['mbiemri'])));

        if(strlen($mbiemri)<2) {
            $error[]="Mbiemri duhet te perbehet nga se paku 3 karaktere!";
        }

    }
    else {
        $error[]="Ju lutemi te plotesoni fushen e mbiemrit!";
    }
    
     // Telefoni
    if(isset($_POST['telefoni']) && !empty($_POST['telefoni'])) {

        $telefoni=trim(strip_tags(htmlspecialchars($_POST['telefoni'])));

        
        if(!preg_match('/^[0-9]{9}$/', $telefoni)) {
            $error[]="Numri i telefonit duhet te permbaje vetem numra dhe te kete 9 shifra!";
        }

    }
    else {
        $error[]="Ju lutemi te plotesoni fushen e telefonit!";
    }
    



    // Email
    if(isset($_POST['email']) && !empty($_POST['email'])) {

        $email=filter_var($_POST['email'],FILTER_SANITIZE_EMAIL);

        if(!filter_var($_POST['email'],FILTER_VALIDATE_EMAIL)){
           $error[]="Ju lutemi te shenoni nje email valide!"; 
        }

    }
    else {
        $error[]="Ju lutemi te plotesoni fushen e email-it!";
    }



    // Password
    if(isset($_POST['password']) && !empty($_POST['password'])) {

        $password=trim(strip_tags(htmlspecialchars($_POST['password'])));

        if(strlen($password)<7) {
            $error[]="Password-i duhet te perbehet nga se paku 8 karaktere!";
        }

        $password=password_hash($password,PASSWORD_DEFAULT);

    }
    else {
        $error[]="Ju lutemi te plotesoni fushen e password-it!";
    }
    
    



    if(count($error)>0) {

        foreach($error as $err) {
            echo "<p >".$err."</p>";
        }

    }
    else {

        include('../classes/User.php');
        $user=new User();
        $user->signup($emri,$mbiemri,$telefoni,$email,$password);

    }


}

?>