<?php
include('../../classes/Nxenesi.php');
include('../admin-header.php');

echo "<div class='container mt-5'>";

if($_SERVER['REQUEST_METHOD']=="POST"){

    $error = [];

    // Lenda
    if(isset($_POST['lenda']) && !empty($_POST['lenda'])) {

        $lenda = htmlspecialchars(strip_tags(trim($_POST['lenda'])));

        if(strlen($lenda) < 2) {
            $error[] = "Lenda duhet te perbehet nga se paku 3 karaktere!";
        }

    } else {
        $error[] = "Ju lutemi te plotesoni fushen e lendes!";
    }

    // ID
    if(isset($_POST['id']) && !empty($_POST['id'])) {
        $id = $_POST['id'];
    } else {
        $error[] = "ID e lendes mungon!";
    }

    if(count($error) > 0){
        foreach($error as $err){
            echo "<p>".$err."</p>";
        }
    }
    else{
        $lendet = new Nxenesi();
        $lendet->update_lenda($id, $lenda);
    }
}
