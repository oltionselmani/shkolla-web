<?php
include('../admin-header.php');
include('../../classes/User.php');


$nx = new User();
$drejtimet = $nx->index_drejtimi();
?>

<div class="container mt-5" style="min-height:88vh;">
    <div class="row justify-content-center">
        <div class="col-md-6">

            <div class="card shadow p-4">
                <h2 class="mb-4 text-center">Shto Nxënës</h2>

                <form action="../admin-backend/nxenesi_shto.php" method="POST">

                    <div class="mb-3">
                        <label>Emri</label>
                        <input type="text" name="emri" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label>Mbiemri</label>
                        <input type="text" name="mbiemri" class="form-control" required>
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

                    <div class="mb-3">
                        <label>Klasa</label>
                        <input type="text" name="klasa" class="form-control" required placeholder="Sheno me numra p.sh: 12/3">
                    </div>

                    <div class="mb-3">
                        <label>Email i Prindit</label>
                        <input type="email" name="prind_email" class="form-control">
                        <small class="text-muted">
                            Shkruaj emailin e prindit nëse ekziston në sistem.
                        </small>
                    </div>

                    <button type="submit" class="btn btn-success w-100">
                        Shto Nxënës
                    </button>

                </form>

            </div>

        </div>
    </div>
</div>
