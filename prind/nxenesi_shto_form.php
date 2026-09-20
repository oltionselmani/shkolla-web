<?php
include('prind-header.php');
include('../classes/User.php');


$nx = new User();
$drejtimet = $nx->index_drejtimi();

?>

<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-lg-6">

            <div class="card shadow-sm p-4">
                <h2 class="mb-4 text-center">Shto Nxënës</h2>

                <form action="nxenesi_save.php" method="POST" enctype="multipart/form-data">
                    
                    <input type="hidden" name="prind_id" value="<?= $prind_id ?>">

                    <div class="mb-3">
                        <label for="emri" class="form-label">Emri</label>
                        <input type="text" class="form-control" id="emri" name="emri" required>
                    </div>

                    <div class="mb-3">
                        <label for="mbiemri" class="form-label">Mbiemri</label>
                        <input type="text" class="form-control" id="mbiemri" name="mbiemri" required>
                    </div>

                    <div class="mb-3">
                        <label for="klasa" class="form-label">Klasa</label>
                        <input type="text" class="form-control" id="klasa" name="klasa" required>
                    </div>

                    <div class="mb-3">
                        <label for="drejtimi_id" class="form-label">Drejtimi</label>
                        <select class="form-select" name="drejtimi_id" id="drejtimi_id" required>
                            <option value="">Zgjidh Drejtimin</option>
                            <?php

                            foreach($drejtimet as $d) {
                                echo "<option value='{$d['id']}'>{$d['drejtimi']}</option>";
                            }
                            ?>
                        </select>
                    </div>

                    

                    <button type="submit" class="btn btn-danger w-100">Shto Nxënës</button>
                </form>

            </div>
        </div>
    </div>
</div>

<?php include('../footer.php'); ?>
