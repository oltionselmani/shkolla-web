<?php
include('prof-header.php');
include('../classes/Nxenesi.php');


$id=$_GET['id'];
$nx=new Nxenesi();
$nxenesi=$nx->find($id);

if (!$nxenesi) {
    echo "<div class='container my-5'><p class='alert alert-danger text-center'>Nxënësi nuk u gjet.</p></div>";

    exit;
}


$lendet = $nx->index_lenda();

?>

<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-lg-6">
            <div class="card shadow-lg p-4 rounded rounded-5">

                <h2 class="mb-4 text-center">Shto / Përditëso Notat</h2>

                <form action="save_notat.php" method="POST">

                    <!-- Nxënës -->
                    <input type="hidden" name="nxenesi_id" value="<?= $nxenesi['id'] ?>">

                    <div class="mb-3">
                        <label class="form-label">Nxënës</label>
                        <input type="text" class="form-control" value="<?= htmlspecialchars($nxenesi['emri'] . ' ' . $nxenesi['mbiemri']) ?>" disabled>
                    </div>

                    <!-- Lenda -->
                    <div class="mb-3">
                        <label for="lenda_id" class="form-label">Zgjidh Lëndën</label>
                        <select class="form-select" name="lenda_id" id="lenda_id" required>
                            <option value="">Zgjidh Lëndën</option>
                            <?php foreach($lendet as $l): ?>
                                <option value="<?= $l['id'] ?>"><?= htmlspecialchars($l['lenda']) ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <!-- Notat -->
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="gj1_p1" class="form-label">Gjysmëvjetori 1 - Perioda 1</label>
                            <input type="number" name="gj1_p1" class="form-control" min="0" max="100" >
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="gj1_p2" class="form-label">Gjysmëvjetori 1 - Perioda 2</label>
                            <input type="number" name="gj1_p2" class="form-control" min="0" max="100" >
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="gj2_p1" class="form-label">Gjysmëvjetori 2 - Perioda 1</label>
                            <input type="number" name="gj2_p1" class="form-control" min="0" max="100" >
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="gj2_p2" class="form-label">Gjysmëvjetori 2 - Perioda 2</label>
                            <input type="number" name="gj2_p2" class="form-control" min="0" max="100" >
                        </div>
                    </div>

                    <button type="submit" class="btn btn-danger w-100 mt-3">Ruaj Notat</button>
                </form>
            </div>
        </div>
    </div>
</div>
