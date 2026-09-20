<?php
include('../../classes/Drejtimet.php');
include('../admin-header.php');

echo "<div class='container mt-5'>";

if($_SERVER['REQUEST_METHOD']=="POST"){

    $error=[];


    // Drejtimi
    if(isset($_POST['drejtimi']) && !empty($_POST['drejtimi'])) {

        $drejtimi=htmlspecialchars(strip_tags(trim($_POST['drejtimi'])));

        if(strlen($drejtimi)<2) {
            $error[]="Drejtimi duhet te perbehet nga se paku 3 karaktere!";
        }

    }
    else {
        $error[]="Ju lutemi te plotesoni fushen e drejtimit!";
    }

 
if(count($error)>0){
foreach($error as $err){
    echo"<p>".$err."</p>";
}

}
else{
    $drejtimet=new Drejtimet();
    $drejtimet->save_drejtimi($drejtimi);

}
}