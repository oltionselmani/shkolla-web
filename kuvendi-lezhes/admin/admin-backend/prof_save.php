<?php
include('../admin-header.php');
include('../../classes/User.php');


echo "<div class='container mt-5'>";

if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $errors = [];

    // Emri
    if(isset($_POST['emri']) && !empty($_POST['emri'])){
        $emri = htmlspecialchars(strip_tags(trim($_POST['emri'])));
        if(strlen($emri) < 2){
            $errors[] = "Emri duhet të përbëhet nga të paktën 2 karaktere!";
        }
    } else {
        $errors[] = "Ju lutemi shkruani emrin!";
    }

    // Mbiemri
    if(isset($_POST['mbiemri']) && !empty($_POST['mbiemri'])){
        $mbiemri = htmlspecialchars(strip_tags(trim($_POST['mbiemri'])));
        if(strlen($mbiemri) < 2){
            $errors[] = "Mbiemri duhet të përbëhet nga të paktën 2 karaktere!";
        }
    } else {
        $errors[] = "Ju lutemi shkruani mbiemrin!";
    }

    // Email
    if(isset($_POST['email']) && !empty($_POST['email'])){
        $email = filter_var(trim($_POST['email']), FILTER_VALIDATE_EMAIL);
        if(!$email){
            $errors[] = "Email jo valid!";
        }
    } else {
        $errors[] = "Ju lutemi shkruani emailin!";
    }

    // Telefoni
    if(isset($_POST['telefoni']) && !empty($_POST['telefoni'])){
        $telefoni = htmlspecialchars(strip_tags(trim($_POST['telefoni'])));
    } else {
        $telefoni = null;
    }

    // Password
    if(isset($_POST['password']) && !empty($_POST['password'])){
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    } else {
        $errors[] = "Ju lutemi shkruani fjalëkalimin!";
    }

    if(count($errors) > 0){
        foreach($errors as $err){
            echo "<div class='alert alert-danger'>$err</div>";
        }
    } else {
        $user=new User();
        $result = $user->shtoProf($emri, $mbiemri, $telefoni, $email, $password);
        if($result){
            echo "<div class='alert alert-success'>Prof u shtua me sukses!</div>";
            echo "<a href='".BASE_URL."admin/admin-frontend/profet.php' class='btn btn-primary mt-3'>Kthehu te lista e profave</a>";
        } else {
            echo "<div class='alert alert-danger'>Ndodhi një gabim gjatë shtimit!</div>";
            echo "<a href='".BASE_URL."admin/admin-frontend/prof_shto.php' class='btn btn-secondary mt-3'>Provo përsëri</a>";
        }
    }
}
?>