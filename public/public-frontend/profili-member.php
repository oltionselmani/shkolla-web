<?php
include('../../header.php');

if(!isset($_SESSION['is_member']) || !$_SESSION['is_member']) {
    header("Location: ../llogaria/login_form.php");
    exit;
}

include('../../classes/User.php');
$userObj = new User();
$user = $userObj->getUserById($_SESSION['user_id']);

$defaultFoto = BASE_URL . "public/public-backend/uploads/profili/default-profile.png";
$fotoProfil = (!empty($user['foto']))
    ? BASE_URL . "public/public-backend/uploads/profili/" . htmlspecialchars($user['foto'])
    : $defaultFoto;
?>

<style>

.profile-page {
    min-height: 80vh;
    padding: 60px 0;
}

.profile-card {
    background: #fff;
    border-radius: 15px;
    box-shadow: 0 10px 25px rgba(0,0,0,0.1);
    padding: 40px 30px;
    transition: transform 0.3s, box-shadow 0.3s;
}

.profile-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 15px 35px rgba(0,0,0,0.2);
}

.profile-img {
    width: 160px;
    height: 160px;
    object-fit: cover;
    border-radius: 50%;
    border: 4px solid #fff;
    box-shadow: 0 5px 20px rgba(0,0,0,0.15);
    transition: transform 0.3s;
}

.profile-img:hover {
    transform: scale(1.05);
}

.profile-section {
    margin-top: 30px;
}

.profile-section h5 {
    font-weight: 600;
    margin-bottom: 15px;
    color: #333;
}

.profile-section .btn {
    transition: all 0.3s;
    border-radius: 8px;
}

.profile-section .btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 6px 18px rgba(0,0,0,0.15);
}

.logout-btn {
    background: #dc3545;
    border-radius: 8px;
    padding: 12px;
    font-weight: 600;
    transition: all 0.3s;
}

.logout-btn:hover {
    background: #c82333;
    transform: translateY(-2px);
    box-shadow: 0 6px 18px rgba(0,0,0,0.15);
}

</style>

<link rel="stylesheet" href="<?= BASE_URL ?>css/style.css?v=2">

<div class="container profile-page">
    <div class="text-center mb-5">
        <h2 class="fw-bold">Profili Im, <?= htmlspecialchars($user['emri']) ?></h2>
    </div>

    <!-- FOTO + EMRI -->
    <div class="text-center mb-5">
        <img src="<?= $fotoProfil ?>" alt="Foto Profil" class="profile-img mb-3">
        <h4 class="fw-semibold"><?= htmlspecialchars($user['emri'].' '.$user['mbiemri']) ?></h4>
        <small class="text-muted"><?= htmlspecialchars($user['role'] ?? 'Member') ?></small>
    </div>

    <!-- NDRYSHO FOTO -->
    <div class="profile-card profile-section">
        <h5>Ndrysho Foton e Profilit</h5>
        <form action="<?= BASE_URL ?>public/public-backend/profili-member-save.php" method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <input type="file" name="foto" class="form-control" required>
            </div>
            <button type="submit" name="ndrysho_foto" class="btn btn-primary">Ruaj Foto</button>
        </form>
    </div>

    <!-- NDRYSHO EMAIL -->
    <div class="profile-card profile-section">
        <h5>Ndrysho Email-in</h5>
        <form action="<?= BASE_URL ?>public/public-backend/profili-member-save.php" method="POST">
            <div class="mb-3">
                <input type="email" name="email" class="form-control" placeholder="<?= htmlspecialchars($user['email']) ?>" required>
            </div>
            <button type="submit" name="ndrysho_email" class="btn btn-warning">Ndrysho Email</button>
        </form>
    </div>

    <!-- NDRYSHO PASSWORD -->
    <div class="profile-card profile-section">
        <h5>Ndrysho Fjalëkalimin</h5>
        <form action="<?= BASE_URL ?>public/public-backend/profili-member-save.php" method="POST">
            <div class="mb-3">
                <input type="password" name="password" class="form-control" placeholder="Fjalëkalim i Ri" required>
            </div>
            <div class="mb-3">
                <input type="password" name="confirm_password" class="form-control" placeholder="Konfirmo Fjalëkalimin" required>
            </div>
            <button type="submit" name="ndrysho_password" class="btn btn-warning">Ndrysho Password</button>
        </form>
    </div>

    <!-- LOG OUT -->
    <div class="profile-section mt-4">
        <form action="<?= BASE_URL ?>llogaria/logout.php" method="POST">
            <button type="submit" class="btn btn-danger logout-btn w-100 p-3 fw-bold">Log Out</button>
        </form>
    </div>
</div>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<?php include('../../footer.php'); ?>