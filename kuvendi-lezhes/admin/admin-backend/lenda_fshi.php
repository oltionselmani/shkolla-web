<?php
include('../../classes/Nxenesi.php');

$id = $_GET['id'];
$nx = new Nxenesi();
$nx->fshi_lenden($id);

?>