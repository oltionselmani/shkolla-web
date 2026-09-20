<?php
include('../admin-header.php');
include('../../classes/User.php');

$user = new User();
$id = $_GET['id'] ?? 0;


$profa = $user->find($id);
?>

<div class="container-fluid bg-body-tertiary align-content-center" style="height:88.3vh">
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card shadow-lg p-3 rounded rounded-5">

            <p class="h1 text-primary mb-3">✏️ Edit Profin</p>

            <form action="<?= BASE_URL ?>admin/admin-backend/prof_update.php" method="post">

                <input type="hidden" name="id" value="<?= $profa['id'] ?>">

                <div class="mb-3">
                    <label class="form-label">Emri:</label>
                    <input type="text" class="form-control" name="emri" value="<?= htmlspecialchars($profa['emri']) ?>">
                </div>

                <div class="mb-3">
                    <label class="form-label">Mbiemri:</label>
                    <input type="text" class="form-control" name="mbiemri" value="<?= htmlspecialchars($profa['mbiemri']) ?>">
                </div>

                <div class="mb-3">
                    <label class="form-label">Email:</label>
                    <input type="email" class="form-control" name="email" value="<?= htmlspecialchars($profa['email']) ?>">
                </div>

                <div class="mb-3">
                    <label class="form-label">Telefoni:</label>
                    <input type="text" class="form-control" name="telefoni" value="<?= htmlspecialchars($profa['telefoni']) ?>">
                </div>

                <div class="mb-3 w-100 d-flex justify-content-center">
                    <button class="btn btn-outline-primary w-50" type="submit">Ruaj Ndryshimet</button>
                </div>

            </form>

        </div>
    </div>
</div>
</div>