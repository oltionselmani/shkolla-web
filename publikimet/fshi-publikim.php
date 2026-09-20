<?php
session_start();
require_once("../classes/Publikimet.php");

if($_SERVER['REQUEST_METHOD'] !== 'POST' || !isset($_POST['id'])) {
    die("Akses i palejuar!");
}

$id = (int)$_POST['id'];
$publikim = new Publikimet();

if($publikim->fshiPublikimin($id)){
    $_SESSION['success'] = "Publikimi u fshi me sukses!";
} else {
    $_SESSION['error'] = "Gabim gjatë fshirjes së publikimit!";
}

header("Location: lista-publikimeve.php");
exit;
?>