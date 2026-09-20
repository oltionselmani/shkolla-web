<?php
include('../classes/Aplikimet.php');
include('prind-header.php');

echo "<div class='container mt-5'>";

if($_SERVER['REQUEST_METHOD'] == 'POST') {

    $error_text = [];

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


    // Drejtimi
    if(isset($_POST['drejtimi_id']) && !empty($_POST['drejtimi_id'])) {

        $drejtimi_id=htmlspecialchars(strip_tags(trim($_POST['drejtimi_id'])));
        $drejtimi_id=filter_var($drejtimi_id,FILTER_VALIDATE_INT);

    }


    // ================= QERTIFIKATA E LINDJES =================
if (isset($_FILES['qertifikata_lindjes']) && $_FILES['qertifikata_lindjes']['error'] === 0) {

    $allowedTypes = ['image/jpeg', 'image/png', 'image/jpg', 'image/gif'];

    if (!in_array($_FILES['qertifikata_lindjes']['type'], $allowedTypes)) {
        $error_text[] = "Qertifikata e lindjes duhet të jetë JPG, PNG ose GIF.";
    } else {

        $targetDir = "uploads/";
        if (!file_exists($targetDir)) {
            mkdir($targetDir, 0777, true);
        }

        $originalName_q = basename($_FILES['qertifikata_lindjes']['name']);
        $qertifikata_name = time() . "_qertifikata_" . $originalName_q;
        $targetFile_q = $targetDir . $qertifikata_name;

        if (!move_uploaded_file($_FILES['qertifikata_lindjes']['tmp_name'], $targetFile_q)) {
            $error_text[] = "Gabim gjatë ngarkimit të qertifikatës së lindjes.";
        }

    }

} else {
    $error_text[] = "Ju lutemi ngarkoni qertifikatën e lindjes.";
}

// ================= DEFTESA =================
if (isset($_FILES['deftesa']) && $_FILES['deftesa']['error'] === 0) {

    $allowedTypes = ['image/jpeg', 'image/png', 'image/jpg', 'image/gif'];

    if (!in_array($_FILES['deftesa']['type'], $allowedTypes)) {
        $error_text[] = "Deftesa duhet të jetë JPG, PNG ose GIF.";
    } else {

        $targetDir = "uploads/";
        if (!file_exists($targetDir)) {
            mkdir($targetDir, 0777, true);
        }

        $originalName_d = basename($_FILES['deftesa']['name']);
        $deftesa_name = time() . "_deftesa_" . $originalName_d;
        $targetFile_d = $targetDir . $deftesa_name;

        if (!move_uploaded_file($_FILES['deftesa']['tmp_name'], $targetFile_d)) {
            $error_text[] = "Gabim gjatë ngarkimit të deftesës.";
        }

    }

} else {
    $error_text[] = "Ju lutemi ngarkoni deftesën.";
}



    if(count($error_text) > 0) {

        foreach($error_text as $error_message) {
            echo "<p class='alert alert-danger text-danger'>$error_message</p>";
        }

        echo "<a href='". BASE_URL ."prind/aplikim_form.php' class='btn btn-lg btn-outline-danger'>Kthehu te forma</a>";


    } else {

        $aplikimi=new Aplikimet();
        $aplikimi->ruaj_aplikimet($emri,$mbiemri,$email,$drejtimi_id, $qertifikata_name,$deftesa_name);

        
    }
}
?>