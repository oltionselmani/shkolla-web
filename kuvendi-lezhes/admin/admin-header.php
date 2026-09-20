<?php
session_start();
define('BASE_URL','http://localhost/kuvendi-lezhes/');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kuvendi Lezhes</title>
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo BASE_URL ?>img/icon.jpg">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>

<style>
    

.dropdown-menu {
  opacity: 0;
  transform: translateY(-10px);
  transition: opacity 0.25s ease, transform 0.25s ease;
  display: block;       
  pointer-events: none; 
}


.dropdown-menu.show {
  opacity: 1;
  transform: translateY(0);
  pointer-events: auto;
}


</style>


<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo BASE_URL ?>img/icon.jpg">
    <a class="navbar-brand text-white" href="#">Kuvendi Lezhes</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">

        <li class="nav-item">
          <a class="nav-link text-white active" aria-current="page" href="<?php echo BASE_URL ?>admin/admin-dashboard.php">Home</a>
        </li>
        



        <!-- Sherbimet -->
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle text-white"
             href="#"
             id="sherbimetDropdown"
             role="button"
             data-bs-toggle="dropdown"
             aria-expanded="false">
             Shërbimet
          </a>
        
          <ul class="dropdown-menu">
            <li>
              <a class="dropdown-item" href="<?= BASE_URL ?>admin/admin-frontend/drejtim_shto_form.php">Shto Drejtim</a>
            </li>
            <li>
              <a class="dropdown-item" href="<?= BASE_URL ?>admin/admin-frontend/lenda_shto_form.php">Shto Lëndë</a>
            </li>

            
          </ul>
        </li>

        <!-- Listat -->
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle text-white"
             href="#"
             id="sherbimetDropdown"
             role="button"
             data-bs-toggle="dropdown"
             aria-expanded="false">
             Listat
          </a>
        
          <ul class="dropdown-menu">
            <li>
              <a class="dropdown-item" href="<?= BASE_URL ?>admin/admin-frontend/drejtimet.php">Lista Drejtimeve</a>
            </li>
            <li>
              <a class="dropdown-item" href="<?= BASE_URL ?>admin/admin-frontend/lendet.php">Lista Lëndëve</a>
            </li>
            <li>
              <a class="dropdown-item" href="<?= BASE_URL ?>admin/admin-frontend/nxenesit.php">Lista Nxënësve</a>
            </li>
          </ul>
        </li>

        <li class="nav-item">
            <a class="nav-link text-white" href="<?= BASE_URL ?>admin/admin-frontend/nxenesit_filter.php">Nxenesit e Filtruar</a>
        </li>

        <li class="nav-item">
            <a class="nav-link text-white" href="<?= BASE_URL ?>admin/admin-frontend/profet.php">Ndaj Kujdestarinë</a>
        </li>





          <div class="d-flex ms-5">
          <?php

            
            
            $defaultFoto = BASE_URL . "public/public-backend/uploads/profili/default-profile.png"; 
            
            
            $fotoProfil = isset($_SESSION['user_foto']) && $_SESSION['user_foto'] != ''
                ? BASE_URL . "public/public-backend/uploads/profili/" . $_SESSION['user_foto']
                : $defaultFoto;
            ?>
            
            <?php if(isset($_SESSION['is_admin']) && $_SESSION['is_admin']): ?>
                <li class="nav-link d-flex align-items-center">
                   <a href="<?= BASE_URL ?>admin/profili-admin.php">
                        <img src="<?= $fotoProfil; ?>" alt="Foto Profilit" 
                             class="rounded-circle mx-3" style="width:35px; height:35px; object-fit:cover;">
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
        </div>



        
        
      </ul>
    </div>
  </div>
</nav>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>