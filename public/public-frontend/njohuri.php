<?php
include('../../header.php');
?>

<link rel="stylesheet" href="<?= BASE_URL ?>/css/njohuri.css">
<link rel="stylesheet" href="<?= BASE_URL ?>/css/style.css?v=2">

<style>
/* ================= HERO ================= */
.hero {
    background: linear-gradient(135deg, rgba(30,64,175,0.7), rgba(17,24,39,0.7)),
                url('<?= BASE_URL ?>img/sukseset-3.jpg') center/cover no-repeat fixed;
    padding: 120px 0;
    text-shadow: 1px 2px 8px rgba(0,0,0,0.7);
    position: relative;
}
.hero h1 span {
    background: linear-gradient(to right, #0ea5e9, #2563eb);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
}
.hero .btn {
    border-radius: 50px;
    font-weight: 600;
    padding: 12px 30px;
    transition: all 0.3s ease;
}
.hero .btn:hover {
    background-color: #0ea5e9;
    color: #fff;
    transform: translateY(-3px);
    box-shadow: 0 8px 15px rgba(0,0,0,0.2);
}

/* ================= CARDS ================= */
.card-custom {
    border-radius: 15px;
    box-shadow: 0 12px 25px rgba(0,0,0,0.15);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    overflow: hidden;
    margin-bottom: 40px;
}
.card-custom:hover {
    transform: translateY(-5px);
    box-shadow: 0 18px 30px rgba(0,0,0,0.25);
}
.card-custom img {
    border-radius: 15px 15px 0 0;
    width: 100%;
    height: auto;
}

/* ================= FADE-UP ANIMATIONS ================= */
.fade-up {
    opacity: 0;
    transform: translateY(30px);
    transition: all 0.6s ease-out;
}
.fade-up.visible {
    opacity: 1;
    transform: translateY(0);
}

/* ================= CAROUSEL ================= */
.info-carousel img {
    border-radius: 12px;
    box-shadow: 0 10px 25px rgba(0,0,0,0.2);
    transition: transform 0.4s ease;
}
.info-carousel img:hover {
    transform: scale(1.03);
}

/* ================= BUTTONS ================= */
a.btn-outline-light {
    border-radius: 50px;
    font-weight: 600;
    letter-spacing: 0.5px;
    transition: all 0.3s ease;
}
a.btn-outline-light:hover {
    background: #2563eb;
    color: #fff;
    transform: translateY(-3px);
    box-shadow: 0 8px 20px rgba(0,0,0,0.3);
}
</style>

<!-- ================= HERO ================= -->
<section class="hero text-white text-center fade-up">
    <div class="container hero-content">
        <h1 class="display-4 fw-bold">
            Zhvillo Njohuritë Tuaja  <br>
            <span>Me Shkollën “Kuvendi i Lezhës”</span>
        </h1>
        <p class="lead mt-3 mb-4">
            Eksploro programet dhe mësimet tona për të arritur potencialin tënd akademik dhe profesional.
        </p>
        <a href="<?= BASE_URL ?>public/public-frontend/faqja_aplikimit.php" class="btn btn-outline-light btn-lg w-50">🎓 Apliko Tani</a>
    </div>
</section>

<div class="container my-5">

  <!-- ================= SEKCIONET ================= -->
  
  <?php
  $sections = [
    [
        'title'=>'Rreth Shkollës',
        'text'=>'Shkolla e Mesme “Kuvendi i Lezhës”, e vendosur në komunën e Vitisë, Kosovë, është një institucion arsimor me traditë dhe rol të rëndësishëm...',
        'images'=>['index_background.jpg','icon.jpg'],
        'order'=>'left'
    ],
    [
        'title'=>'Drejtimet Mësimore',
        'text'=>'Shkolla e Mesme “Kuvendi i Lezhës” ofron disa drejtime mësimore, të cilat u mundësojnë nxënësve të zgjedhin profilin që i përshtatet interesave...',
        'images'=>['drejtimi-1.png','drejtimi-2.png'],
        'order'=>'right'
    ],
    [
        'title'=>'Sukseset dhe Arritjet',
        'text'=>'Gjatë viteve, shkolla ka shënuar suksese të vazhdueshme në fushën akademike dhe edukative...',
        'images'=>['sukseset-1.jpg','sukseset-2.jpg','sukseset-3.jpg','sukseset-4.jpg'],
        'order'=>'left'
    ],
    [
        'title'=>'Aktivitetet Edukative dhe Kulturore',
        'text'=>'Përveç mësimit të rregullt, shkolla i kushton rëndësi të veçantë aktiviteteve jashtëmësimore...',
        'images'=>['aktiviteti-1.jpg','aktiviteti-2.jpg','aktiviteti-3.jpg','aktiviteti-4.jpg'],
        'order'=>'right'
    ],
  ];
  ?>

  <?php foreach($sections as $i => $sec): ?>
  <div class="card card-custom fade-up mb-5">
    <div class="row g-0 align-items-center">
      <?php if($sec['order']=='left'): ?>
        <div class="col-md-4">
          <div id="slider<?= $i ?>" class="carousel slide info-carousel" data-bs-ride="carousel" data-bs-interval="2000">
            <div class="carousel-inner">
              <?php foreach($sec['images'] as $j=>$img): ?>
              <div class="carousel-item <?= $j==0?'active':'' ?>">
                <img src="<?= BASE_URL ?>img/<?= $img ?>" class="d-block w-100" alt="">
              </div>
              <?php endforeach; ?>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#slider<?= $i ?>" data-bs-slide="prev">
              <span class="carousel-control-prev-icon"></span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#slider<?= $i ?>" data-bs-slide="next">
              <span class="carousel-control-next-icon"></span>
            </button>
          </div>
        </div>
        <div class="col-md-8">
          <div class="card-body">
            <h3><?= $sec['title'] ?></h3>
            <p><?= $sec['text'] ?></p>
          </div>
        </div>
      <?php else: ?>
        <div class="col-md-8">
          <div class="card-body">
            <h3><?= $sec['title'] ?></h3>
            <p><?= $sec['text'] ?></p>
          </div>
        </div>
        <div class="col-md-4">
          <div id="slider<?= $i ?>" class="carousel slide info-carousel" data-bs-ride="carousel" data-bs-interval="2000">
            <div class="carousel-inner">
              <?php foreach($sec['images'] as $j=>$img): ?>
              <div class="carousel-item <?= $j==0?'active':'' ?>">
                <img src="<?= BASE_URL ?>img/<?= $img ?>" class="d-block w-100" alt="">
              </div>
              <?php endforeach; ?>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#slider<?= $i ?>" data-bs-slide="prev">
              <span class="carousel-control-prev-icon"></span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#slider<?= $i ?>" data-bs-slide="next">
              <span class="carousel-control-next-icon"></span>
            </button>
          </div>
        </div>
      <?php endif; ?>
    </div>
  </div>
  <?php endforeach; ?>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<script>
// ================= FADE-UP ON SCROLL =================
const faders = document.querySelectorAll('.fade-up');
window.addEventListener('scroll', () => {
  faders.forEach(fader => {
    const top = fader.getBoundingClientRect().top;
    const windowHeight = window.innerHeight;
    if(top < windowHeight - 100){
      fader.classList.add('visible');
    }
  });
});
</script>

<?php
include('../../footer.php');
?>