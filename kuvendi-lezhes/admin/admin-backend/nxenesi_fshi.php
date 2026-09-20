<?php
include('../../classes/Nxenesi.php');

if(isset($_GET['id']) && !empty($_GET['id'])){
    
    $id = $_GET['id'];

    $nx = new Nxenesi();
    $nx->fshi_nxenesin($id);

} else {
    echo "ID e nxënësit mungon!";
}
?>