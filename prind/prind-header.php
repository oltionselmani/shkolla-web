<?php
require_once('../config/config.php');
session_start();

if(!isset($_SESSION['is_prind']) || !$_SESSION['is_prind']) {
    header("Location: ../llogaria/login_form.php");
    exit;
}

$prind_id   = $_SESSION['user_id'];
$prind_emri = $_SESSION['user_name'];

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
<title>Kuvendi i Lezhës - Prind</title>

<link rel="icon" type="image/png" sizes="32x32" href="<?= BASE_URL ?>img/icon.jpg">


<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet" href="<?= BASE_URL ?>style.css?v=2">

</head>
<body>

<!-- ================= NAVBAR ================= -->
<nav class="navbar navbar-expand-lg shadow-sm sticky-top bg-white">
<div class="container">

<a class="navbar-brand fw-bold text-primary" href="<?= BASE_URL ?>prind/prind-dashboard.php">
    <img src="<?= BASE_URL ?>img/icon.jpg" style="height:5vh" class="me-2">
    Kuvendi i Lezhës
</a>

<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#nav">
<span class="navbar-toggler-icon"></span>
</button>

<div class="collapse navbar-collapse justify-content-end" id="nav">
<ul class="navbar-nav align-items-lg-center">

<li class="nav-item">
  <a class="nav-link" href="<?= BASE_URL ?>prind/prind-dashboard.php">Ballina</a>
</li>

<li class="nav-item">
  <a class="nav-link" href="<?= BASE_URL ?>prind/njohuri.php">Njohuri</a>
</li>

<li class="nav-item">
  <a class="nav-link" href="<?= BASE_URL ?>prind/me-te-rejat.php">Më të Rejat</a>
</li>

<li class="nav-item">
  <a class="nav-link" href="<?= BASE_URL ?>prind/biografite.php">Biografitë</a>
</li>


<li class="nav-item"><a class="nav-link" href="<?= BASE_URL ?>prind/faqja_aplikimit.php">Apliko</a></li>


<li class="nav-item">
  <a class="nav-link" href="<?= BASE_URL ?>prind/prind-nxenes.php">Fëmijët</a>
</li>

<li class="nav-item">
  <a class="nav-link" href="<?= BASE_URL ?>prind/nxenesi_shto_form.php">Shto Nxënës</a>
</li>

<li class="nav-item">
  <a class="nav-link" href="<?= BASE_URL ?>prind/kontakti.php">Kontakti</a>
</li>

<!-- ================= DROPDOWN PROFILI ================= -->
<li class="nav-item dropdown ms-lg-3">
  <a class="btn btn-primary dropdown-toggle d-flex align-items-center" data-bs-toggle="dropdown">
    <img src="<?= $fotoProfil ?>" 
         class="rounded-circle me-2" 
         style="width:30px;height:30px;object-fit:cover;">
    <?= htmlspecialchars($prind_emri) ?>
  </a>

  <ul class="dropdown-menu dropdown-menu-end shadow border-0 rounded-4">
    <li>
      <a class="dropdown-item" href="<?= BASE_URL ?>prind/profili-prind.php">
        Profili Im
      </a>
    </li>
    <li><hr class="dropdown-divider"></li>
    <li>
      <a class="dropdown-item text-danger" href="<?= BASE_URL ?>llogaria/logout.php">
        Log Out
      </a>
    </li>
  </ul>
</li>

</ul>
</div>
</div>
</nav>

