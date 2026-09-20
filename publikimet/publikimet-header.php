
<?php
require_once('../config/config.php');
session_start();

if(!isset($_SESSION['is_publisher']) || !$_SESSION['is_publisher']) {
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

<style>
    

.dropdown-menu {
  opacity: 0;
  transform: translateY(-10px);
  transition: opacity 0.25s ease, transform 0.25s ease;
  display: none;       
  pointer-events: none; 
}


.dropdown-menu.show {
  opacity: 1;
  transform: translateY(0);
  pointer-events: auto;
}

.dropdown-submenu {
  position: relative;
}

.dropdown-submenu > .dropdown-menu {
  top: 0;
  left: 100%;
  margin-top: -1px;
  display: none;
}

.dropdown-submenu > .dropdown-menu.show {
  display: block;
}



</style>

<!-- ================= NAVBAR ================= -->
<nav class="navbar navbar-expand-lg shadow-sm sticky-top bg-white">
<div class="container">

<a class="navbar-brand fw-bold text-primary" href="<?= BASE_URL ?>prind/prind-dashboard.php">
    <img src="<?= BASE_URL ?>img/icon.jpg" style="height:5vh" class="me-2">
    Kuvendi i Lezhës
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

          <li class="nav-item">
            <a class="nav-link fw-bold" href="<?= BASE_URL ?>publikimet/publikim-dashboard.php">Dashboard</a>
          </li>

          <li class="nav-item">
            <a class="nav-link fw-bold" href="<?= BASE_URL ?>publikimet/lista-publikimeve.php">Lista Publikimeve</a>
          </li>

          <li class="nav-item">
            <a class="nav-link fw-bold" href="<?= BASE_URL ?>publikimet/me-te-rejat.php">Me Te Rejat</a>
          </li>

          <li class="nav-item">
            <a class="nav-link fw-bold" href="<?= BASE_URL ?>publikimet/biografi-publish.php">Krijo Biografi</a>
          </li>

          <li class="nav-item">
            <a class="nav-link fw-bold" href="<?= BASE_URL ?>publikimet/lista-biografive.php">Lista Biografive</a>
          </li>

          <li class="nav-item">
            <a class="nav-link fw-bold" href="<?= BASE_URL ?>publikimet/biografite.php">Biografite</a>
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

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

      

          


        

            

      <script>
document.querySelectorAll('.dropdown-submenu > a').forEach(function(element){
  element.addEventListener('click', function (e) {
    e.preventDefault();
    e.stopPropagation();

    let submenu = this.nextElementSibling;

    document.querySelectorAll('.dropdown-submenu .dropdown-menu').forEach(function(menu){
      if(menu !== submenu) menu.classList.remove('show');
    });

    submenu.classList.toggle('show');
  });
});
</script>



