<?php 
include('../config/config.php'); 

  session_start();


if(!isset($_SESSION['is_prind']) || !$_SESSION['is_prind']) {
    header("Location: ../llogaria/login_form.php");
    exit;
}
$prind_id = $_SESSION['user_id'];
$prind_emri = $_SESSION['user_name'];


$page = basename($_SERVER['PHP_SELF']);

$messages = [
  'index.php' => 'Mirë se vini në Kuvendin e Lezhës',
  'kontakti.php' => 'Na kontaktoni për çdo pyetje',
  'njohuri.php' => 'Rreth nesh dhe misioni ynë'
];

$topMessage = $messages[$page] ?? "Kuvendi i Lezhës – Edukimi që formon gjenerata.";


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kuvendi Lezhes</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="<?php echo BASE_URL ?>/css/style.css">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo BASE_URL ?>img/icon.jpg">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<body>


<div class="header">

  <!-- Top image strip -->
  <div class="nav-image d-flex justify-content-center align-items-center">
  <div class="container text-center py-3">
    <p class="mb-0 fw-bold text-white">
      <?= htmlspecialchars($topMessage) ?>
    </p>
  </div>
</div>

  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-light border-top border-bottom">
    <div class="container-fluid">

      <a class="navbar-brand d-flex align-items-center" href="#">
        <img src="<?php echo BASE_URL ?>img/logo.jpg" alt="Logo" style="height:9.8vh;">
      </a>

      <button class="navbar-toggler" type="button"
       data-bs-toggle="collapse"
       data-bs-target="#mainNavbar"
       aria-controls="mainNavbar"
       aria-expanded="false"
       aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse justify-content-center" id="mainNavbar">
        <ul class="navbar-nav text-center">

          <li class="nav-item border-end">
            <a class="nav-link fw-bold" href="<?= BASE_URL ?>prind/prind-dashboard.php">Home</a>
          </li>

          <li class="nav-item border-end">
            <a class="nav-link fw-bold" href="<?= BASE_URL ?>prind/me-te-rejat.php">Me Te Rejat</a>
          </li>

          <li class="nav-item border-end">
            <a class="nav-link fw-bold" href="<?= BASE_URL ?>prind/biografite.php">Biografite</a>
          </li>

          <li class="nav-item border-end">
            <a class="nav-link fw-bold" href="<?= BASE_URL ?>prind/njohuri.php">Njohuri</a>
          </li>

          <li class="nav-item border-end">
            <a class="nav-link fw-bold" href="<?= BASE_URL ?>prind/prind-nxenes.php">Femijet</a>
          </li>

          <li class="nav-item border-end">
            <a class="nav-link fw-bold" href="<?= BASE_URL ?>prind/nxenesi_shto_form.php">Shto Nxenes</a>
          </li>

          <li class="nav-item border-end">
            <a class="nav-link fw-bold" href="<?= BASE_URL ?>prind/kontakti.php">Kontakti</a>
          </li>

          <?php

            
            
            $defaultFoto = BASE_URL . "public/public-backend/uploads/profili/default-profile.png"; 
            
            
            $fotoProfil = isset($_SESSION['user_foto']) && $_SESSION['user_foto'] != ''
                ? BASE_URL . "public/public-backend/uploads/profili/" . $_SESSION['user_foto']
                : $defaultFoto;
            ?>
            
            <?php if(isset($_SESSION['is_prind']) && $_SESSION['is_prind']): ?>
                <li class="nav-link d-flex align-items-center">
                   <a href="<?= BASE_URL ?>prind/profili-prind.php">
                        <img src="<?= $fotoProfil; ?>" alt="Foto Profilit" 
                             class="rounded-circle mx-3 my-3" style="width:35px; height:35px; object-fit:cover;">
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fw-bold" href="<?= BASE_URL ?>llogaria/logout.php">Log Out</a>
                </li>
            <?php else: ?>
                <li class="nav-item border-end">
                    <a class="nav-link fw-bold" href="<?= BASE_URL ?>llogaria/signup_form.php">Signup</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fw-bold" href="<?= BASE_URL ?>llogaria/login_form.php">Login</a>
                </li>
            <?php endif; ?>

        </ul>
      </div>
    </div>
</nav>
</div>


<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>