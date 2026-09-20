<?php
session_start();
define('BASE_URL','http://localhost/kuvendi-lezhes/');

if(!isset($_SESSION['is_admin']) || !$_SESSION['is_admin']) {
    header("Location: ../llogaria/login_form.php");
    exit;
}
?>

<!-- ================= NAVBAR ================= -->
<nav class="navbar navbar-expand-lg sticky-top shadow-sm py-3" style="backdrop-filter: blur(12px); background: rgba(255,255,255,0.95); border-radius:12px;">
  <div class="container-fluid">
    <a class="navbar-brand fw-bold text-primary" href="#">Kuvendi Lezhes</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarAdmin" aria-controls="navbarAdmin" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarAdmin">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">

        <li class="nav-item">
          <a class="nav-link text-dark fw-medium" href="<?= BASE_URL ?>admin/admin-dashboard.php">Home</a>
        </li>

        <!-- Sherbimet -->
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle text-dark fw-medium" href="#" role="button" data-bs-toggle="dropdown">Shërbimet</a>
          <ul class="dropdown-menu rounded-3 shadow border-0">
            <li><a class="dropdown-item" href="<?= BASE_URL ?>admin/admin-frontend/drejtim_shto_form.php">Shto Drejtim</a></li>
            <li><a class="dropdown-item" href="<?= BASE_URL ?>admin/admin-frontend/lenda_shto_form.php">Shto Lëndë</a></li>
          </ul>
        </li>

        <!-- Listat -->
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle text-dark fw-medium" href="#" role="button" data-bs-toggle="dropdown">Listat</a>
          <ul class="dropdown-menu rounded-3 shadow border-0">
            <li><a class="dropdown-item" href="<?= BASE_URL ?>admin/admin-frontend/drejtimet.php">Lista Drejtimeve</a></li>
            <li><a class="dropdown-item" href="<?= BASE_URL ?>admin/admin-frontend/lendet.php">Lista Lëndëve</a></li>
            <li><a class="dropdown-item" href="<?= BASE_URL ?>admin/admin-frontend/nxenesit.php">Lista Nxënësve</a></li>
          </ul>
        </li>

        <li class="nav-item">
          <a class="nav-link text-dark fw-medium" href="<?= BASE_URL ?>admin/admin-frontend/nxenesit_filter.php">Nxenesit e Filtruar</a>
        </li>

        <li class="nav-item">
          <a class="nav-link text-dark fw-medium" href="<?= BASE_URL ?>admin/admin-frontend/profet.php">Ndaj Kujdestarinë</a>
        </li>

      </ul>

      <!-- Profile Admin -->
      <div class="d-flex align-items-center ms-3">
        <?php
          $defaultFoto = BASE_URL . "public/public-backend/uploads/profili/default-profile.png";
          $fotoProfil = isset($_SESSION['user_foto']) && $_SESSION['user_foto'] != ''
              ? BASE_URL . "public/public-backend/uploads/profili/" . $_SESSION['user_foto']
              : $defaultFoto;
        ?>
        <?php if(isset($_SESSION['is_admin']) && $_SESSION['is_admin']): ?>
        <div class="dropdown">
          <a class="btn btn-primary dropdown-toggle d-flex align-items-center" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <img src="<?= $fotoProfil ?>" class="rounded-circle me-2" style="width:35px;height:35px;object-fit:cover;border:2px solid #0d6efd;"> Admin
          </a>
          <ul class="dropdown-menu dropdown-menu-end shadow border-0 rounded-3">
            <li><a class="dropdown-item" href="<?= BASE_URL ?>admin/profili-admin.php">Profili</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item text-danger" href="<?= BASE_URL ?>llogaria/logout.php">Log Out</a></li>
          </ul>
        </div>
        <?php else: ?>
          <a class="btn btn-primary" href="<?= BASE_URL ?>llogaria/login_form.php">Hyr / Regjistrohu</a>
        <?php endif; ?>
      </div>
    </div>
  </div>
</nav>

<!-- ================= CSS ================= -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
.navbar .nav-link{ color:#1f2937; transition:0.2s; }
.navbar .nav-link:hover{ color:#0d6efd; transform:translateY(-2px); }
.navbar .btn{ border-radius:8px; transition:0.3s; }
.navbar .btn:hover{ box-shadow:0 6px 18px rgba(0,0,0,0.2); transform:translateY(-2px); }
.navbar img{ border:2px solid #0d6efd; transition:0.2s; }
.navbar img:hover{ transform:scale(1.1); }

.dropdown-menu{ 
  border-radius:12px; 
  box-shadow:0 12px 36px rgba(0,0,0,0.15); 
  transition:0.25s ease; 
}
</style>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"></script>