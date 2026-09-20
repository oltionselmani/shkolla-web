<?php 
define('BASE_URL', 'http://localhost/kuvendi-lezhes/');

 session_start();

if(!isset($_SESSION['is_publisher']) || !$_SESSION['is_publisher']) {
    header("Location: ../llogaria/login_form.php");
    exit;
}
$publisher_id = $_SESSION['user_id'];
$publisher_emri = $_SESSION['user_name'];


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

.dropdown-submenu {
  position: relative;
}

.dropdown-submenu > .dropdown-menu {
  top: 0;
  left: 100%;
  margin-top: -1px;
}

.dropdown-submenu:hover > .dropdown-menu {
  display: block;
}



</style>
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
            <a class="nav-link fw-bold" href="<?= BASE_URL ?>publikimet/publikim-dashboard.php">Dashboard</a>
          </li>

          <li class="nav-item border-end">
            <a class="nav-link fw-bold" href="<?= BASE_URL ?>publikimet/lista-publikimeve.php">Lista Publikimeve</a>
          </li>

          <li class="nav-item border-end">
            <a class="nav-link fw-bold" href="<?= BASE_URL ?>publikimet/me-te-rejat.php">Me Te Rejat</a>
          </li>

          <li class="nav-item border-end">
            <a class="nav-link fw-bold" href="<?= BASE_URL ?>publikimet/biografi-publish.php">Krijo Biografi</a>
          </li>

          <li class="nav-item border-end">
            <a class="nav-link fw-bold" href="<?= BASE_URL ?>publikimet/lista-biografive.php">Lista Biografive</a>
          </li>

          <li class="nav-item border-end">
            <a class="nav-link fw-bold" href="<?= BASE_URL ?>publikimet/biografite.php">Biografite</a>
          </li>


          <a class="nav-link fw-bold" href="#">Publikues</a>

            
            <?php if(isset($_SESSION['is_publisher']) && $_SESSION['is_publisher']): ?>
                
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