<?php
include('config/config.php');
session_start();
include('classes/Publikimet.php');

$pub = new Publikimet();
$lajmet = $pub->getLatestLajmet(3);

$loggedIn = isset($_SESSION['user_id']);
?>
<!DOCTYPE html>
<html lang="sq">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Kuvendi i Lezhës</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
body{
    font-family: 'Segoe UI', sans-serif;
    background:#f4f6f9;
}

/* GLASS NAVBAR */
.navbar{
    backdrop-filter: blur(12px);
    background: rgba(255,255,255,0.85) !important;
}

/* HERO */
.hero{
    background: linear-gradient(135deg,#1e3a8a,#1e40af);
    color:white;
    padding:120px 0;
    position:relative;
}
.hero h1 span{ color:#93c5fd; }

/* STATS */
.stat-card{
    border-radius:16px;
    transition:all .3s ease;
}
.stat-card:hover{
    transform:translateY(-6px);
    box-shadow:0 20px 40px rgba(0,0,0,0.15);
}

/* ABOUT IMAGE BADGE */
.about-image{
    position:relative;
}
.about-badge{
    position:absolute;
    bottom:-10px;
    left:-10px;
    background:#1e3a8a;
    color:white;
    padding:1rem 1.5rem;
    border-radius:12px;
    box-shadow:0 10px 30px rgba(0,0,0,0.3);
}

/* CARDS PREMIUM */
.card{
    border:none;
    border-radius:16px;
    transition:all .3s ease;
}
.card:hover{
    transform:translateY(-6px);
    box-shadow:0 20px 40px rgba(0,0,0,0.15);
}

/* FADE ANIMATION */
.fade-up{
    opacity:0;
    transform:translateY(30px);
    transition:all .8s ease;
}
.fade-up.show{
    opacity:1;
    transform:translateY(0);
}

/* FOOTER */
footer{
    background:#111827;
    color:#9ca3af;
}
footer h5{ color:white; }

</style>
</head>
<body>

<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg shadow-sm sticky-top">
<div class="container">
<a class="navbar-brand fw-bold text-primary" href="#">Kuvendi i Lezhës</a>
<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#nav">
<span class="navbar-toggler-icon"></span>
</button>

<div class="collapse navbar-collapse justify-content-end" id="nav">
<ul class="navbar-nav align-items-lg-center">
<li class="nav-item"><a class="nav-link" href="index.php">Ballina</a></li>
<li class="nav-item"><a class="nav-link" href="rreth-nesh.php">Rreth Nesh</a></li>
<li class="nav-item"><a class="nav-link" href="lajmet.php">Lajmet</a></li>
<li class="nav-item"><a class="nav-link" href="profesoret.php">Profesorët</a></li>
<li class="nav-item"><a class="nav-link" href="apliko.php">Apliko</a></li>

<?php if($loggedIn): ?>
<li class="nav-item dropdown ms-lg-3">
  <a class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown">
    Profili
  </a>
  <ul class="dropdown-menu dropdown-menu-end shadow border-0 rounded-4">
    <li><a class="dropdown-item" href="dashboard.php">Dashboard</a></li>
    <li><a class="dropdown-item" href="settings.php">Settings</a></li>
    <li><hr class="dropdown-divider"></li>
    <li><a class="dropdown-item text-danger" href="logout.php">Log Out</a></li>
  </ul>
</li>
<?php else: ?>
<li class="nav-item ms-lg-3">
  <a class="btn btn-primary" href="login.php">Hyr / Regjistrohu</a>
</li>
<?php endif; ?>

</ul>
</div>
</div>
</nav>

<!-- HERO -->
<section class="hero text-white fade-up">
  <div class="container text-center hero-content">
    <h1 class="display-4 fw-bold">
      Shkolla e Mesme <br>
      <span class="text-info">"Kuvendi i Lezhës"</span>
    </h1>
    <p class="lead mt-3 mb-4">
      Institucion arsimor i përkushtuar ndaj shkëlqimit akademik.
    </p>
    <a href="rreth-nesh.php" class="btn btn-light btn-lg me-2">📚 Mëso Më Shumë</a>
    <a href="apliko.php" class="btn btn-outline-light btn-lg">🎓 Apliko Tani</a>
  </div>
</section>

<!-- STATS -->
<div class="container my-5">
  <div class="row g-4 text-center">
    <div class="col-md-3 fade-up">
      <div class="card shadow stat-card p-4">
        <h3 class="fw-bold text-primary">500+</h3>
        <p class="text-muted">Nxënës</p>
      </div>
    </div>
    <div class="col-md-3 fade-up">
      <div class="card shadow stat-card p-4">
        <h3 class="fw-bold text-success">35+</h3>
        <p class="text-muted">Profesorë</p>
      </div>
    </div>
    <div class="col-md-3 fade-up">
      <div class="card shadow stat-card p-4">
        <h3 class="fw-bold text-purple">20+</h3>
        <p class="text-muted">Lëndë</p>
      </div>
    </div>
    <div class="col-md-3 fade-up">
      <div class="card shadow stat-card p-4">
        <h3 class="fw-bold text-warning">25+</h3>
        <p class="text-muted">Vite Eksperiencë</p>
      </div>
    </div>
  </div>
</div>

<!-- ABOUT -->
<section class="py-5 bg-white fade-up">
  <div class="container">
    <div class="row align-items-center g-5">
      <div class="col-lg-6">
        <h2 class="fw-bold mb-4">Rreth Shkollës Sonë</h2>
        <p class="text-muted">
          Shkolla e Mesme "Kuvendi i Lezhës" është institucion i përkushtuar ndaj
          formimit akademik dhe moral të të rinjve.
        </p>
        <a href="rreth-nesh.php" class="btn btn-primary mt-3">Lexo Më Shumë →</a>
      </div>
      <div class="col-lg-6 about-image">
        <img src="https://images.unsplash.com/photo-1509062522246-3755977927d7?w=800" class="img-fluid shadow">
        <div class="about-badge">
          <h3 class="fw-bold mb-0">25+</h3>
          <small>Vite Përvoje</small>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- LAJMET -->
<section class="py-5 bg-white">
<div class="container">
<div class="d-flex justify-content-between align-items-center mb-5">
<h2 class="fw-bold">Lajmet e Fundit</h2>
<a href="lajmet.php" class="btn btn-outline-primary">Shiko të gjitha →</a>
</div>

<div class="row g-4">
<?php if($lajmet && count($lajmet)>0): ?>
<?php foreach($lajmet as $row): ?>
<div class="col-md-4 fade-up">
<div class="card h-100 shadow-sm">
<?php if(!empty($row['foto_1'])): ?>
<img src="<?= BASE_URL ?>publikimet/publikim-backend/foto-publikimet/<?= $row['foto_1'] ?>" 
class="card-img-top" style="height:200px;object-fit:cover;">
<?php endif; ?>
<div class="card-body">
<small class="text-muted"><?= date("d M Y", strtotime($row['data'] ?? 'now')) ?></small>
<h5 class="fw-bold mt-2"><?= htmlspecialchars($row['titulli']) ?></h5>
<p class="text-muted"><?= substr(strip_tags($row['njohuri']),0,120) ?>...</p>
<a href="publikim.php?id=<?= $row['id'] ?>" class="fw-semibold text-primary">
Lexo më shumë →
</a>
</div>
</div>
</div>
<?php endforeach; ?>
<?php else: ?>
<p>Nuk ka lajme për momentin.</p>
<?php endif; ?>
</div>

</div>
</section>

<!-- CTA -->
<section class="py-5 text-center" style="background:linear-gradient(90deg,#1e3a8a,#1e40af);color:white;">
<div class="container fade-up">
<h2 class="fw-bold mb-3">Gati të fillosh udhëtimin tënd arsimor?</h2>
<p class="mb-4">Bashkohu me një institucion që formon liderët e së ardhmes.</p>
<a href="apliko.php" class="btn btn-light btn-lg">Apliko Tani</a>
</div>
</section>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script>
// Fade-in on scroll
const faders = document.querySelectorAll('.fade-up');
const appearOptions = { threshold: 0.2 };
const appearOnScroll = new IntersectionObserver(function(entries,observer){
entries.forEach(entry=>{
if(!entry.isIntersecting) return;
entry.target.classList.add('show');
observer.unobserve(entry.target);
});
},appearOptions);
faders.forEach(fader=>{ appearOnScroll.observe(fader); });
</script>

<?php
include('footer.php');
?>