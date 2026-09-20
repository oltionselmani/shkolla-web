<?php
include('../classes/Aplikimet.php');
$app = new Aplikimet();

$id = $_GET['id'];

$app->ndrysho_status($id, 'aprovuar');

header("Location: aplikimet_shoqeror.php");
exit;
?>