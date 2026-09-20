<?php
include('../admin-header.php');
include('../../classes/Nxenesi.php');

$nx = new Nxenesi();
$id = $_GET['id'];

$lendet = $nx->index_lenda();
$lenda = null;

foreach($lendet as $l){
    if($l['id'] == $id){
        $lenda = $l;
        break;
    }
}
?>

<div class="container-fluid bg-body-tertiary align-content-center" style="height:88.3vh">

<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card shadow-lg p-3 rounded rounded-5">

            <p class="h1 text-primary mb-3">✏️ Edit Lëndën</p>

            <form action="<?= BASE_URL ?>admin/admin-backend/lenda_update.php" method="post">

                <input type="hidden" name="id" value="<?= $lenda['id'] ?>">

                <!-- Lenda -->
                <div class="mb-3">
                    <label for="lenda" class="form-label">Lënda:</label>
                    <input type="text"
                           class="form-control"
                           id="lenda"
                           name="lenda"
                           value="<?= $lenda['lenda'] ?>">
                </div>

                <div class="mb-3 w-100 d-flex justify-content-center align-content-center">
                    <button class="btn btn-outline-primary w-50" type="submit">
                        Ruaj Ndryshimet
                    </button>
                </div>

            </form>

        </div>
    </div>
</div>

</div>