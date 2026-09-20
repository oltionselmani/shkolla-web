<?php
include('../classes/Aplikimet.php');
include('prof-header.php');

$aplikimetObj = new Aplikimet();
$drejtim_id = 2;
$status = 'aprovuar';     

$search = isset($_POST['search']) ? $_POST['search'] : '';
$aplikimet = $aplikimetObj->kerko_aplikimin_sipas_drejtimi_dhe_status($drejtim_id, $status, $search);

?>

<div class="container my-5" style="min-height: 80vh;">
    
<!-- Search -->
<?php include('search.php'); ?>

<!-- Tabela e aplikimeve -->
<h2 class="mb-5 text-center text-success">
        Aplikimet e Aprovuar - Drejtimi Shoqeror
    </h2>

    <?php include('rezultatet_table.php'); ?>

</div>

<?php
include('prof-footer.php');
?>