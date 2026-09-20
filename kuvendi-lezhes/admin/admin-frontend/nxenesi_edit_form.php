<?php
include('../admin-header.php');
include('../../classes/Nxenesi.php');

$nx = new Nxenesi();
$id = $_GET['id'];


$nxenesi = $nx->edit_index($id);
$drejtimet = $nx->index_drejtimi();
?>

<div class="container" style="min-height:88.3vh">
    <div class="row justify-content-center">
        <div class="col-md-6 my-5">

            <div class="card shadow-lg p-4 rounded rounded-5 my-5">
                <p class="h1 text-primary mb-4">✏️ Edito Nxënësin</p>

                <form action="<?= BASE_URL ?>admin/admin-backend/nxenesi_update.php" method="post">

                    <input type="hidden" name="id" value="<?= $nxenesi['id'] ?>">

                    <!-- Emri i Prindit (disabled) -->
                    <div class="mb-3">
                        <label for="prindi" class="form-label">Prindi:</label>
                        <input type="text" id="prindi" class="form-control" value="<?= $nxenesi['prindi'] ?>" disabled>
                    </div>

                    <!-- Emri -->
                    <div class="mb-3">
                        <label for="emri" class="form-label">Emri:</label>
                        <input type="text" name="emri" id="emri" class="form-control" value="<?= $nxenesi['emri'] ?>">
                    </div>

                    <!-- Mbiemri -->
                    <div class="mb-3">
                        <label for="mbiemri" class="form-label">Mbiemri:</label>
                        <input type="text" name="mbiemri" id="mbiemri" class="form-control" value="<?= $nxenesi['mbiemri'] ?>">
                    </div>

                    <!-- Klasa -->
                    <div class="mb-3">
                        <label for="klasa" class="form-label">Klasa:</label>
                        <input type="text" name="klasa" id="klasa" class="form-control" value="<?= $nxenesi['klasa'] ?>">
                    </div>

                    <!-- Drejtimi -->
                    <div class="mb-3">
                        <label for="drejtimi_id" class="form-label">Drejtimi:</label>
                        <select id="drejtimi_id" name="drejtimi_id" class="form-select">
                            <?php foreach($drejtimet as $drejtimi){ ?>
                                <option value="<?php echo $drejtimi['id'] ?>"
                                    <?php if($drejtimi['id'] == $nxenesi['drejtim_id']) echo 'selected'; ?>>
                                    <?php echo $drejtimi['drejtimi'] ?>
                                </option>
                            <?php } ?>
                        </select>

                    </div>
                    

                    

                    <div class="mb-3 w-100 d-flex justify-content-center">
                        <button type="submit" class="btn btn-outline-primary w-50">Ruaj Ndryshimet</button>
                    </div>

                </form>

            </div>

        </div>
    </div>
</div>