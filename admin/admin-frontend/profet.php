<?php
include('../admin-header.php');
include('../../classes/User.php');

$user = new User();


if (isset($_POST['search']) && $_POST['search'] != '') {
    $profa = $user->kerkoProfa($_POST['search']); 
} else {
    $profa = $user->indexProfa(); 
}
?>

<div class="container" style="height: 88.3vh">
    <div class="row justify-content-center">
        <div class="col-md-11">

            <div class="my-3 d-flex justify-content-between align-items-center">
                <p class="display-1">Lista e Profave</p>
                <a href="<?= BASE_URL ?>admin/admin-frontend/prof_shto.php" class="btn btn-secondary btn-lg w-25 p-3">Shto Prof</a>
            </div>

            <!-- Search -->
            <form method="POST" action="">
                <div class="row mb-4">
                    <div class="col-md-12 input-group">
                        <input 
                            type="text" 
                            name="search" 
                            class="form-control w-75" 
                            placeholder="Kërko profin sipas emrit..." 
                            value="<?= isset($_POST['search']) ? htmlspecialchars($_POST['search']) : ''; ?>"
                        >
                        <button type="submit" class="btn btn-primary w-25">Search</button>
                    </div>
                </div>
            </form>

            <!-- Tabela -->
            <table class="table table-striped table-bordered text-center align-middle">
                <thead class="table-light">
                    <tr>
                        <th>Emri</th>
                        <th>Mbiemri</th>
                        <th>Email</th>
                        <th>Telefoni</th>
                        <th>Kujdestar i klasës</th>
                        <th>Veprimet</th>
                    </tr>
                </thead>

                <tbody>
                    <?php foreach ($profa as $p): ?>
                        <tr>

                            <td><?= htmlspecialchars($p['emri']) ?></td>
                            <td><?= htmlspecialchars($p['mbiemri']) ?></td>
                            <td><?= htmlspecialchars($p['email']) ?></td>
                            <td><?= htmlspecialchars($p['telefoni'] ?? '-') ?></td>
                            <td><?= htmlspecialchars($p['kujdestar_klasa'] ?? '-') ?></td>
                            <td>
                                <a href="<?= BASE_URL ?>admin/admin-frontend/prof_edit_form.php?id=<?= $p['id']; ?>" class="btn btn-warning btn-sm" style="width: 20%">Edit</a>
                                <a href="<?= BASE_URL ?>admin/admin-backend/prof_fshi.php?id=<?= $p['id']; ?>" class="btn btn-danger btn-sm" style="width: 20%" onclick="return confirm('A je i sigurt që dëshiron ta fshish këtë prof?');">Fshi</a>
                                <a href="<?= BASE_URL ?>admin/admin-frontend/cakto_klasen.php?id=<?= $p['id']; ?>" class="btn btn-primary btn-sm" style="width: 50%">Cakto Klasën</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

        </div>
    </div>
</div>
