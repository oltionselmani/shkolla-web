<?php
include('header.php');

require_once('classes/Publikimet.php');

$pub = new Publikimet();
$lajmet = $pub->getLatestLajmet(3);

?>

<link rel="stylesheet" href="<?= BASE_URL ?>css/style.css?v=2">

<style>
  .hero {
    background: linear-gradient(rgba(17,24,39,0.7), rgba(30,64,175,0.7)), 
                url('<?= BASE_URL ?>img/index_background.jpg') center/cover no-repeat fixed;
    padding: 120px 0;
  }
</style>



<!-- ================= HERO ================= -->
<section class="hero text-white fade-up">
  <div class="container text-center hero-content">
    <h1 class="display-4 fw-bold">
      Shkolla e Mesme <br>
      <span class="text-info">"Kuvendi i Lezhës"</span>
    </h1>
    <p class="lead mt-3 mb-4">
      Institucion arsimor i përkushtuar ndaj shkëlqimit akademik.
    </p>
    <a href="<?= BASE_URL ?>public/public-frontend/njohuri.php" class="btn btn-light btn-lg me-2">📚 Mëso Më Shumë</a>
    <a href="<?= BASE_URL ?>public/public-frontend/faqja_aplikimit.php" class="btn btn-outline-light btn-lg">🎓 Apliko Tani</a>
  </div>
</section>

<!-- ================= STATS ================= -->
<div class="container my-5">
  <div class="row g-4 text-center">
    <div class="col-md-3 fade-up">
      <div class="card shadow stat-card p-4">
        <h3 class="fw-bold text-primary" data-target="750">0</h3>
        <p class="text-muted">Nxënës</p>
      </div>
    </div>
    <div class="col-md-3 fade-up">
      <div class="card shadow stat-card p-4">
        <h3 class="fw-bold text-success" data-target="35">0</h3>
        <p class="text-muted">Profesorë</p>
      </div>
    </div>
    <div class="col-md-3 fade-up">
      <div class="card shadow stat-card p-4">
        <h3 class="fw-bold text-purple" data-target="20">0</h3>
        <p class="text-muted">Lëndë</p>
      </div>
    </div>
    <div class="col-md-3 fade-up">
      <div class="card shadow stat-card p-4">
        <h3 class="fw-bold text-warning" data-target="25">0</h3>
        <p class="text-muted">Vite Eksperiencë</p>
      </div>
    </div>
  </div>
</div>

<!-- Count Up Script -->
<script>
document.addEventListener("DOMContentLoaded", () => {
  const counters = document.querySelectorAll(".stat-card h3");
  const speed = 200; 

  counters.forEach(counter => {
    const updateCount = () => {
      const target = +counter.getAttribute("data-target");
      const count = +counter.innerText.replace("+","");

      const increment = Math.ceil(target / speed);

      if(count < target){
        counter.innerText = count + increment + "+";
        setTimeout(updateCount, 20);
      } else {
        counter.innerText = target + "+";
      }
    };

    
    const observer = new IntersectionObserver(entries => {
      entries.forEach(entry => {
        if(entry.isIntersecting){
          updateCount();
          observer.unobserve(entry.target);
        }
      });
    }, { threshold: 0.5 });
    observer.observe(counter);
  });
});
</script>


<!-- ================= ABOUT ================= -->
<section class="py-5 bg-white fade-up">
  <div class="container">
    <div class="row align-items-center g-5">
      <div class="col-lg-6">
        <h2 class="fw-bold mb-4">Rreth Shkollës Sonë</h2>
        <p class="text-muted">
          Shkolla e Mesme "Kuvendi i Lezhës" është institucion i përkushtuar ndaj
          formimit akademik dhe moral të të rinjve.
        </p>
        <a href="<?= BASE_URL ?>public/public-frontend/njohuri.php" class="btn btn-primary mt-3">
          Lexo Më Shumë →
        </a>
      </div>
      <div class="col-lg-6 about-image">
        <img src="<?= BASE_URL ?>img/about.jpg" class="img-fluid shadow">
        <div class="about-badge">
          <h3 class="fw-bold mb-0">25+</h3>
          <small>Vite Përvoje</small>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ================= KONTAKTI ================= -->
<section class="py-5 text-white position-relative" style="background: linear-gradient(135deg, #1e3a8a, #2563eb);">
  <div class="container">
    <div class="text-center mb-5">
      <h2 class="fw-bold display-6">Na Kontaktoni</h2>
      <p class="opacity-75">Keni pyetje apo dëshironi më shumë informacione? Na shkruani!</p>
    </div>

    <div class="row g-4">
      
      <!-- LEFT INFO -->
      <div class="col-lg-5">
        <div class="p-4 rounded-4 shadow-lg bg-white text-dark h-100">
          <h4 class="fw-bold mb-4 text-primary">Informacion Kontakti</h4>
          
          <div class="mb-3">
            <h6 class="fw-semibold mb-1">📍 Adresa</h6>
            <p class="text-muted mb-0">Rr. Flaka Janarit Nr. 18, Viti</p>
          </div>

          <div class="mb-3">
            <h6 class="fw-semibold mb-1">📞 Telefoni</h6>
            <p class="text-muted mb-0">+383 44 000 000</p>
          </div>

          <div class="mb-3">
            <h6 class="fw-semibold mb-1">✉️ Email</h6>
            <p class="text-muted mb-0">info@kuvendilezhes.com</p>
          </div>

          <div class="mt-4">
            <h6 class="fw-semibold mb-2">🕒 Orari</h6>
            <p class="text-muted mb-0">E Hënë – E Premte</p>
            <p class="text-muted">08:00 – 16:00</p>
          </div>
        </div>
      </div>

      <!-- RIGHT FORM -->
      <div class="col-lg-7">
        <div class="p-4 rounded-4 shadow-lg bg-white text-dark">
          <form onsubmit="return dergoEmail()">
            <div class="row g-3">
              
              <div class="col-md-6">
                <label class="form-label fw-semibold">Emri</label>
                <input type="text" id="emri" class="form-control form-control-lg rounded-3" required>
              </div>
          
              <div class="col-md-6">
                <label class="form-label fw-semibold">Email</label>
                <input type="email" id="email" class="form-control form-control-lg rounded-3" required>
              </div>
          
              <div class="col-12">
                <label class="form-label fw-semibold">Mesazhi</label>
                <textarea id="mesazhi" rows="5" class="form-control form-control-lg rounded-3" required></textarea>
              </div>
          
              <div class="col-12 text-end">
                <button type="submit" class="btn btn-primary btn-lg px-4 rounded-3">
                  Dërgo Mesazhin →
                </button>
              </div>
          
            </div>
          </form>
        </div>
      </div>

    </div>
  </div>
</section>



<?php
$profesoret = $pub->getAllBiografite(100,0);
$profesoretArray = [];
if($profesoret && $profesoret->num_rows > 0){
    while($p = $profesoret->fetch_assoc()){
        $profesoretArray[] = $p;
    }
}
$chunks = array_chunk($profesoretArray, 4); // 4 cards per slide desktop (e ndryshueshme)
?>
<?php if(count($chunks) > 0): ?>
<section class="py-5 bg-light fade-up">
  <div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
      <h2 class="fw-bold">Biografitë e Profesorëve</h2>
      <a href="<?= BASE_URL ?>public/public-frontend/biografite.php" class="btn btn-outline-primary">Shiko të gjithë →</a>
    </div>

    <div id="profesorCarousel" class="carousel slide position-relative" data-bs-ride="carousel">
      <div class="carousel-inner">
        <?php foreach($chunks as $index => $chunk): ?>
          <div class="carousel-item <?= $index === 0 ? 'active' : '' ?>">
            <div class="row">
              <?php foreach($chunk as $p): ?>
                <div class="col-lg-3 col-md-6 col-12 mb-3">
                  <div class="card h-100 shadow-sm text-center p-3">
                    <img src="<?= ($p['foto'] && !empty($p['foto'])) 
                                  ? BASE_URL.'publikimet/publikim-backend/biografite/'.$p['foto'] 
                                  : BASE_URL.'public/public-backend/uploads/profili/default-profile.png' ?>" 
                         class="card-img-top rounded-circle mx-auto mb-3" style="width:120px;height:120px;object-fit:cover;">
                    <div class="card-body">
                      <h5 class="fw-bold"><?= htmlspecialchars($p['emri'].' '.$p['mbiemri']) ?></h5>
                      <small class="text-muted"><?= htmlspecialchars($p['statusi']) ?></small>
                      <p class="text-muted mt-2" style="font-size:0.9rem;"><?= substr(strip_tags($p['njohuri']),0,100) ?>...</p>
                      <a href="<?= BASE_URL ?>public/public-frontend/biografia-prof.php?id=<?= $p['id'] ?>" class="fw-semibold text-primary">
                        Lexo më shumë →
                      </a>
                    </div>
                  </div>
                </div>
              <?php endforeach; ?>
            </div>
          </div>
        <?php endforeach; ?>
      </div>

      <button class="carousel-control-prev" type="button" data-bs-target="#profesorCarousel" data-bs-slide="prev" style="width:50px; height:50px; top:50%; transform:translateY(-50%);">
        <span class="carousel-control-prev-icon bg-dark rounded-circle p-3" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#profesorCarousel" data-bs-slide="next" style="width:50px; height:50px; top:50%; transform:translateY(-50%);">
        <span class="carousel-control-next-icon bg-dark rounded-circle p-3" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>
  </div>
</section>
<?php endif; ?>


<!-- ================= LAJMET ================= -->
<section class="py-5 bg-white">
  <div class="container">
    <div class="d-flex justify-content-between align-items-center mb-5">

      <h2 class="fw-bold">Lajmet e Fundit</h2>
      <a href="<?= BASE_URL ?>public/public-frontend/me-te-rejat.php" class="btn btn-outline-primary">Shiko të gjitha →</a>

    </div>
      
    <div class="row g-4">
      <?php if($lajmet && count($lajmet)>0): ?>
        <?php foreach($lajmet as $row): ?>
          <div class="col-md-4 fade-up">
            <div class="card h-100 shadow-sm">
            <?php 
            $fotos = array_filter([
                $row['foto_1'] ?? null,
                $row['foto_2'] ?? null,
                $row['foto_3'] ?? null,
                $row['foto_4'] ?? null
            ], fn($f) => isset($f) && trim($f) !== '');
            ?>
            <?php if(count($fotos) > 0): ?>
            <img src="<?= BASE_URL ?>publikimet/publikim-backend/foto-publikimet/<?= $fotos[0] ?>" 
            class="card-img-top" style="height:200px;object-fit:cover;">
            <?php endif; ?>
            <div class="card-body">
            <small class="text-muted"><?= date("d M Y", strtotime($row['data'] ?? 'now')) ?></small>
            <h5 class="fw-bold mt-2"><?= htmlspecialchars($row['titulli']) ?></h5>
            <p class="text-muted"><?= substr(strip_tags($row['njohuri']),0,120) ?>...</p>
            <a href="<?= BASE_URL ?>public/public-frontend/publikim.php?id=<?= $row['id'] ?>" class="fw-semibold text-primary">
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


<script>
function dergoEmail() {
    var emri = document.getElementById("emri").value;
    var email = document.getElementById("email").value;
    var mesazhi = document.getElementById("mesazhi").value;

    var subject = "Mesazh nga faqja e kontaktit";
    
    var body = "Emri: " + emri + "\n";
    body += "Email: " + email + "\n\n";
    body += "Mesazhi:\n" + mesazhi;

    window.location.href = 
        "mailto:kuvendilezhes@gmail.com"
        + "?subject=" + encodeURIComponent(subject)
        + "&body=" + encodeURIComponent(body);

    return false;
}
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>


<?php include('footer.php');?>