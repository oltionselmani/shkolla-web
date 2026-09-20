<?php
session_start();
include('../../classes/User.php');
include('../admin-header.php');

if(!isset($_SESSION['is_admin']) || !$_SESSION['is_admin']) {
    header("Location: ../llogaria/login_form.php");
    exit;
}


$user = new User();

$prof_id = intval($_GET['id']);
$prof = $user->find($prof_id);


$klasat = $user->merrKlasatELiraMeAktuale($prof_id);
?>



<div class="container">
    <div class="row mt-5">
        <div class="col-md-8">
            <h3>Cakto klasë për <?= $prof['emri'].' '.$prof['mbiemri']; ?></h3>
            <form method="post" action="<?= BASE_URL ?>admin/admin-backend/ruaj_klasen.php">

    <input type="hidden" name="prof_id" value="<?= $prof_id; ?>">
    

    <label class="form-label">Zgjedh klasën</label>
    <select name="kujdestar_klasa" class="form-select" required>
        <option value="">-- Zgjedh klasën --</option>
        <?php foreach ($klasat as $k): ?>
            <option value="<?= $k['klasa']; ?>"
                <?= ($prof['kujdestar_klasa'] == $k['klasa']) ? 'selected' : ''; ?>>
                <?= $k['klasa']; ?>
            </option>
        <?php endforeach; ?>
    </select>

    <button class="btn btn-success mt-3">Ruaj</button>
    <a href="profet.php" class="btn btn-secondary mt-3">Kthehu</a>
</form>
        </div>
    </div>
</div>