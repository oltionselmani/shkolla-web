<?php
include('../../classes/User.php');

$id = $_GET['id'] ?? 0;
$user = new User();
$user->deleteProf($id);
?>