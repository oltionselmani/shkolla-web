<?php 
include('config/config.php'); 
session_start();

$page = basename($_SERVER['PHP_SELF']);

$messages = [
  'index.php' => 'Mirë se vini në Kuvendin e Lezhës',
  'kontakti.php' => 'Na kontaktoni për çdo pyetje',
  'njohuri.php' => 'Rreth nesh dhe misioni ynë'
];

$topMessage = $messages[$page] ?? "Kuvendi i Lezhës – Edukimi që formon gjenerata.";

// ================= FOTO PROFILIT =================

$defaultFoto = BASE_URL . "public/public-backend/uploads/profili/default-profile.png";

$fotoProfil = (isset($_SESSION['user_foto']) && !empty($_SESSION['user_foto']))
    ? BASE_URL . "public/public-backend/uploads/profili/" . $_SESSION['user_foto']
    : $defaultFoto;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kuvendi Lezhës</title>

    <link rel="stylesheet" href="<?php echo BASE_URL ?>css/style.css">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo BASE_URL ?>img/icon.jpg">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<body>

<div class="header">

  <!-- Top strip -->
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

      <a class="navbar-brand d-flex align-items-center" href="<?= BASE_URL ?>index.php">
        <img src="<?= BASE_URL ?>img/logo.jpg" style="height:9.8vh;">
      </a>

      <button class="navbar-toggler" type="button"
        data-bs-toggle="collapse"
        data-bs-target="#mainNavbar">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse justify-content-center" id="mainNavbar">
        <ul class="navbar-nav text-center">

          <li class="nav-item border-end">
            <a class="nav-link fw-bold" href="<?= BASE_URL ?>index.php">Home</a>
          </li>

          <li class="nav-item border-end">
            <a class="nav-link fw-bold" href="<?= BASE_URL ?>public/public-frontend/me-te-rejat.php">Me Te Rejat</a>
          </li>

          <li class="nav-item border-end">
            <a class="nav-link fw-bold" href="<?= BASE_URL ?>public/public-frontend/biografite.php">Biografite</a>
          </li>

          <li class="nav-item border-end">
            <a class="nav-link fw-bold" href="<?= BASE_URL ?>public/public-frontend/njohuri.php">Njohuri</a>
          </li>

          <li class="nav-item border-end">
            <a class="nav-link fw-bold" href="<?= BASE_URL ?>public/public-frontend/faqja_aplikimit.php">Apliko</a>
          </li>

          <!-- <li class="nav-item border-end">
            <a class="nav-link fw-bold" href="<?= BASE_URL ?>public/public-frontend/kontakti.php">Kontakti</a>
          </li> -->

          <!-- ================= LOGIN / PROFIL ================= -->

          <?php if(isset($_SESSION['user_id'])): ?>

              <li class="d-flex justify-content-center my-3 align-items-center">
                  <a href="<?= BASE_URL ?>public/public-frontend/profili-member.php">
                      <img src="<?= $fotoProfil; ?>" 
                           class="rounded-circle mx-3"
                           style="width:35px; height:35px; object-fit:cover;">
                  </a>
              </li>

              <li class="nav-item">
                  <a class="nav-link fw-bold" href="<?= BASE_URL ?>llogaria/logout.php">
                      Log Out
                  </a>
              </li>

          <?php else: ?>

              <li class="nav-item border-end">
                  <a class="nav-link fw-bold" href="<?= BASE_URL ?>llogaria/signup_form.php">
                      Signup
                  </a>
              </li>

              <li class="nav-item">
                  <a class="nav-link fw-bold" href="<?= BASE_URL ?>llogaria/login_form.php">
                      Login
                  </a>
              </li>

          <?php endif; ?>

        </ul>
      </div>
    </div>
  </nav>
</div>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>

