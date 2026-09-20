<?php
include('prof-header.php');

if(!isset($_SESSION['is_prof']) || !$_SESSION['is_prof']) {
    header("Location: ../llogaria/login_form.php");
    exit;
}

include('../classes/User.php');
$userObj = new User();
$user = $userObj->getUserById($_SESSION['user_id']);


$defaultFoto = BASE_URL . "public/public-backend/uploads/profili/default-profile.png";

$fotoProfil = (!empty($user['foto']))
    ? BASE_URL . "public/public-backend/uploads/profili/" . htmlspecialchars($user['foto'])
    : $defaultFoto;
?>

<div class="container my-5">
    <h2 class="mb-4">Profili Im, <?= $user['emri'] ?></h2>



    <!-- Foto -->
    <div class="mb-4">
        <img src="<?= $fotoProfil ?>" 
             class="rounded-circle img-thumbnail" 
             width="150" height="150"
             style="object-fit:cover;">
    </div>

    <!-- Ndrysho Foto -->
    <form action="profili-prof-save.php" method="POST" enctype="multipart/form-data" class="mb-4">
        <div class="mb-3">
            <label class="form-label">Ndrysho Foto Profilit</label>
            <input type="file" name="foto" class="form-control" required>
        </div>
        <button type="submit" name="ndrysho_foto" class="btn btn-primary">
            Ruaj Foto
        </button>
    </form>

    <!-- NDrysho Email -->
    <form action="profili-prof-save.php" method="POST">
        <div class="mb-3">
            <label class="form-label">Ndrysho Email</label>
            <input type="email" name="email" class="form-control mb-3" required>
            <button type="submit" name="ndrysho_email" class="btn btn-warning">
                Ndrysho Email
            </button>
        </div>
    </form>
    

    <!-- Ndrysho Password -->
    <form action="profili-prof-save.php" method="POST">
        <div class="mb-3">
            <label class="form-label">Fjalëkalim i Ri</label>
            <input type="password" name="password" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Konfirmo Fjalëkalimin</label>
            <input type="password" name="confirm_password" class="form-control" required>
        </div>
        <button type="submit" name="ndrysho_password" class="btn btn-warning">
            Ndrysho Password
        </button>
    </form>
</div>

<?php include('prof-footer.php'); ?>