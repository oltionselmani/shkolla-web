<?php


include('../../classes/User.php');




if($_SERVER['REQUEST_METHOD']=='POST') {
    
    $error = [];

// Emri
if(isset($_POST['emri']) && !empty($_POST['emri'])){
    $emri = htmlspecialchars(strip_tags(trim($_POST['emri'])));
    if(strlen($emri) < 2){
        $error[] = "Emri duhet të ketë të paktën 2 karaktere!";
    }
} else {
    $error[] = "Ju lutemi plotësoni emrin!";
}

// Mbiemri
if(isset($_POST['mbiemri']) && !empty($_POST['mbiemri'])){
    $mbiemri = htmlspecialchars(strip_tags(trim($_POST['mbiemri'])));
    if(strlen($mbiemri) < 2){
        $error[] = "Mbiemri duhet të ketë të paktën 2 karaktere!";
    }
} else {
    $error[] = "Ju lutemi plotësoni mbiemrin!";
}

// Klasa
if(isset($_POST['klasa']) && !empty($_POST['klasa'])){
    $klasa = htmlspecialchars(strip_tags(trim($_POST['klasa'])));
} else {
    $error[] = "Ju lutemi plotësoni klasën!";
}

// Drejtimi
if(isset($_POST['drejtimi_id']) && !empty($_POST['drejtimi_id'])){
    $drejtimi_id = htmlspecialchars(strip_tags(trim($_POST['drejtimi_id'])));
    $drejtimi_id = filter_var($drejtimi_id, FILTER_VALIDATE_INT);

    if($drejtimi_id === false){
        $error[] = "Drejtimi nuk është valid!";
    }

} else {
    $error[] = "Ju lutemi zgjidhni drejtimin!";
}

// Email i prindit

$prind_email = null;

if(isset($_POST['prind_email']) && !empty($_POST['prind_email'])){
    $prind_email = htmlspecialchars(strip_tags(trim($_POST['prind_email'])));
    
    if(!filter_var($prind_email, FILTER_VALIDATE_EMAIL)){
        $error[] = "Email i prindit nuk është valid!";
    }
}



if(count($error) > 0){

    foreach($error as $err){
        echo "<p style='color:red;'>$err</p>";
    }

} else {

    
   

    
    $nx = new User();

    if(!empty($prind_email)) {
    
        $user = new User();
        $prindi = $user->gjej_prindin_sipas_email($prind_email);
    
        if(!$prindi){
            echo "<p style='color:red;'>Nuk ekziston prind me këtë email ose roli nuk është 'prind'!</p>";
            exit;
        }
    
        $prind_id = $prindi['id'];
        $nx->shto_nxenesin($emri, $mbiemri, $klasa, $drejtimi_id, $prind_id);
    
    } else {
        // nese nuk ka email te prindit
        $nx->shto_nxenesin_admin($emri, $mbiemri, $klasa, $drejtimi_id);
    }
    
    header("Location: ../admin-frontend/nxenesit.php");
    exit;
   
}

}