<?php




if($_SERVER['REQUEST_METHOD']=='POST') {

    $error=[];


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

    }
    else {
        $error[]="Ju lutemi te plotesoni fushen e password-it!";
    }
    
    



    if(count($error)>0) {

        foreach($error as $err) {
            echo "<p>".$err."</p>";
        }

    }
    else {

        include('../classes/User.php');
        $user=new User();
        $user->login($email,$password);
        

    }


}

?>