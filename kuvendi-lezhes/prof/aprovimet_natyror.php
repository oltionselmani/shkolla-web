<?php
include('../classes/Aplikimet.php');
include('prof-header.php');


$aplikimetObj = new Aplikimet();
$drejtim_id = 1;
$status = 'aprovuar';     

$search = isset($_POST['search']) ? $_POST['search'] : '';
$aplikimet = $aplikimetObj->kerko_aplikimin_sipas_drejtimi_dhe_status($drejtim_id, $status, $search);

?>



<div class="container my-5" style="min-height:54vh">

<!-- Search -->
<?php include('search.php'); ?>

    <h2 class="mb-4 text-center text-success">
        Aplikimet e Aprovuar - Drejtimi Natyror
    </h2>

    <?php include('rezultatet_table.php'); ?>
</div>

<?php include('prof-footer.php'); ?>