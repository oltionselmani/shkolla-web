<?php
include('../admin-header.php');
include('../../classes/User.php');


echo "<div class='container mt-5'>";

?>

<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card shadow-lg p-4 rounded rounded-5">

            <p class="h1 text-primary mb-4">➕ Shto Profesor</p>

            <form method="POST" action="<?= BASE_URL ?>admin/admin-backend/prof_save.php">
                <div class="mb-3">
                    <label class="form-label">Emri</label>
                    <input type="text" name="emri" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Mbiemri</label>
                    <input type="text" name="mbiemri" class="form-control" required>
                </div>
                
                <div class="mb-3">
                    <label class="form-label">Telefoni</label>
                    <input type="text" name="telefoni" class="form-control">
                </div>

                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Fjalëkalimi</label>
                    <input type="password" name="password" class="form-control" required>
                </div>

                <div class="d-flex justify-content-center">
                    <button type="submit" class="btn btn-primary w-50">Shto Profesor</button>
                </div>
            </form>

        </div>
    </div>
</div>
