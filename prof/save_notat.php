<?php
include('../classes/Nxenesi.php');
include('prof-header.php');

echo "<div class='container mt-5'>";

if($_SERVER['REQUEST_METHOD']=='POST') {

    $error=[];

    // Nxenesi ID
    if(isset($_POST['nxenesi_id']) && !empty($_POST['nxenesi_id'])) {
        $nxenesi_id = filter_var($_POST['nxenesi_id'], FILTER_VALIDATE_INT);
        if(!$nxenesi_id) $error[] = "Nxënësi i zgjedhur nuk është valid!";
    } else {
        $error[] = "Ju lutemi zgjidhni nxënësin!";
    }

    // Lenda ID
    if(isset($_POST['lenda_id']) && !empty($_POST['lenda_id'])) {
        $lenda_id = filter_var($_POST['lenda_id'], FILTER_VALIDATE_INT);
        if(!$lenda_id) $error[] = "Lënda nuk është valid!";
    } else {
        $error[] = "Ju lutemi zgjidhni lëndën!";
    }


    $gj_fields = ['gj1_p1','gj1_p2','gj2_p1','gj2_p2'];
    $gj_values = [];
    foreach($gj_fields as $f) {
        if(isset($_POST[$f]) && $_POST[$f] !== '') {
            $v = filter_var($_POST[$f], FILTER_VALIDATE_INT);
            if($v === false || $v < 1 || $v > 5) {
                $error[] = "Vlera e $f duhet të jetë 1-5!";
            } else {
                $gj_values[$f] = $v;
            }
        } else {

            $gj_values[$f] = null;
        }
    }

    if(count($error)>0) {
        foreach($error as $e){
            echo "<p class='alert alert-danger p-3'>$e</p>";
        }
        echo "<a href='notat_form.php' class='btn btn-danger btn-lg'>Kthehu te Forma</a>";
        exit;
    }

    // Ruaj në DB
    $nota = new Nxenesi();
    if($nota->saveNota(
        $nxenesi_id,
        $lenda_id,
        $gj_values['gj1_p1'],
        $gj_values['gj1_p2'],
        $gj_values['gj2_p1'],
        $gj_values['gj2_p2']
    )){
        echo "<script>alert('Notat u ruajtën me sukses!'); window.location.href='nxenesit.php';</script>";
    } else {
        echo "<p class='alert alert-danger'>Gabim gjatë ruajtjes së notave.</p>";
    }

}
?>