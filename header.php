<?php
require_once('config/config.php');
session_start();

$loggedIn = isset($_SESSION['user_id']);

// ================= FOTO PROFILIT =================
$defaultFoto = BASE_URL . "public/public-backend/uploads/profili/default-profile.png";
$fotoProfil = (isset($_SESSION['user_foto']) && !empty($_SESSION['user_foto']))
    ? BASE_URL . "public/public-backend/uploads/profili/" . $_SESSION['user_foto']
    : $defaultFoto;
?>
<!DOCTYPE html>
<html lang="sq">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Kuvendi i Lezhës</title>
<link rel="icon" type="image/png" sizes="32x32" href="<?php echo BASE_URL ?>img/icon.jpg">
<link rel="stylesheet" href="<?= BASE_URL ?>style.css?v=2">

</head>
<body>


<!-- ================= NAVBAR ================= -->
<nav class="navbar navbar-expand-lg shadow-sm sticky-top">
<div class="container">
<a class="navbar-brand fw-bold text-primary" href="<?= BASE_URL ?>index.php">
    <img src="<?= BASE_URL ?>img/icon.jpg" style="height:5vh">Kuvendi i Lezhës</a>
<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#nav">
<span class="navbar-toggler-icon"></span>
</button>

<div class="collapse navbar-collapse justify-content-end" id="nav">
<ul class="navbar-nav align-items-lg-center">
<li class="nav-item"><a class="nav-link" href="<?= BASE_URL ?>index.php">Ballina</a></li>
<li class="nav-item"><a class="nav-link" href="<?= BASE_URL ?>public/public-frontend/njohuri.php">Njohuri</a></li>
<li class="nav-item"><a class="nav-link" href="<?= BASE_URL ?>public/public-frontend/me-te-rejat.php">Më të Rejat</a></li>
<li class="nav-item"><a class="nav-link" href="<?= BASE_URL ?>public/public-frontend/biografite.php">Biografitë</a></li>
<li class="nav-item"><a class="nav-link" href="<?= BASE_URL ?>public/public-frontend/faqja_aplikimit.php">Apliko</a></li>
<li class="nav-item"><a class="nav-link" href="<?= BASE_URL ?>public/public-frontend/kontakti.php">Kontakti</a></li>

<?php if($loggedIn): ?>
<li class="nav-item dropdown ms-lg-3">
  <a class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown">
    <img src="<?= $fotoProfil ?>" class="rounded-circle me-2" style="width:30px;height:30px;object-fit:cover;"> Profili
  </a>
  <ul class="dropdown-menu dropdown-menu-end shadow border-0 rounded-4">
    <li><a class="dropdown-item" href="<?= BASE_URL ?>public/public-frontend/profili-member.php">Dashboard</a></li>
    <li><hr class="dropdown-divider"></li>
    <li><a class="dropdown-item text-danger" href="<?= BASE_URL ?>llogaria/logout.php">Log Out</a></li>
  </ul>
</li>
<?php else: ?>
<li class="nav-item ms-lg-3">
  <a class="btn btn-primary" href="<?= BASE_URL ?>llogaria/login_form.php">Hyr / Regjistrohu</a>
</li>
<?php endif; ?>



</ul>
</div>
</div>
</nav>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
