<?php
include('../classes/Aplikimet.php');
include('prof-header.php');

$aplikimetObj = new Aplikimet();
$drejtim_id = 2;       // Drejtimi Shoqëror
$status = 'aprovuar';  
$search = isset($_POST['search']) ? $_POST['search'] : '';

$aplikimet = $aplikimetObj->kerko_aplikimin_sipas_drejtimi_dhe_status($drejtim_id, $status, $search);
?>

<div class="container my-5" style="min-height:60vh">

    <!-- Hero / Header -->
    <div class="text-center mb-4 p-4 rounded-4 shadow-lg" style="background: linear-gradient(135deg, #0d6efd, #6610f2); color:white;">
        <h1 class="fw-bold mb-2"><i class="bi bi-folder-check me-2"></i>Aplikimet e Aprovuar - Shoqëror</h1>
        <p class="mb-0 opacity-75">Lista e nxënësve të aprovuar në drejtimin Shoqëror</p>
    </div>

    <!-- Search -->
    <div class="mb-4 text-center">
        <form method="POST" class="d-flex justify-content-center">
            <input type="text" name="search" placeholder="Kërko emrin ose mbiemrin..." 
                   class="form-control w-50 shadow-sm" value="<?= htmlspecialchars($search) ?>">
            <button type="submit" class="btn btn-primary ms-2 shadow-sm">Kërko</button>
        </form>
    </div>

    <!-- Tabela -->
    <?php include('rezultatet_table.php'); ?>

</div>

<?php include('prof-footer.php'); ?>