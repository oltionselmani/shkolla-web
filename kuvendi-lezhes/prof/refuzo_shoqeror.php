<?php
include('../classes/Aplikimet.php');
$app = new Aplikimet();

$id = $_GET['id'];

$app->ndrysho_status($id, 'refuzuar');

header("Location: aplikimet_shoqeror.php");
exit;
