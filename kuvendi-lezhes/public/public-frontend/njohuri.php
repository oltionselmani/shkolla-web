<?php
include('../../header.php');

?>

    <link rel="stylesheet" href="<?php echo BASE_URL ?>/css/njohuri.css">

<div class="container my-5">

  <!-- 1. Rreth Shkolles (slider majtas) -->
  <div class="row align-items-start mb-5">
    <div class="col-md-4 mb-3 mb-md-0">
      <div id="slider1" class="carousel slide info-carousel" data-bs-ride="carousel" data-bs-interval="1700">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="<?php echo BASE_URL ?>img/index_background.jpg" class="d-block w-100" alt="">
          </div>
          <div class="carousel-item">
            <img src="<?php echo BASE_URL ?>img/icon.jpg" class="d-block w-100" alt="">
          </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#slider1" data-bs-slide="prev">
          <span class="carousel-control-prev-icon"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#slider1" data-bs-slide="next">
          <span class="carousel-control-next-icon"></span>
        </button>
        </ol>
      </div>
    </div>
    <div class="col-md-8">
      <h3>Rreth Shkollës</h3>
      <p>Shkolla e Mesme “Kuvendi i Lezhës”, e vendosur në komunën e Vitisë, Kosovë, është një institucion arsimor me traditë dhe rol të rëndësishëm në edukimin e brezave të rinj. Emri i saj lidhet me një nga ngjarjet më të rëndësishme të historisë kombëtare shqiptare, duke reflektuar vlera të forta arsimore, kulturore dhe atdhetare. Që nga themelimi, shkolla ka pasur si mision ofrimin e një arsimi cilësor dhe gjithëpërfshirës, duke përgatitur nxënësit për vazhdimin e studimeve dhe për tregun e punës. Procesi mësimor zhvillohet në një ambient të sigurt dhe mbështetës, me theks në zhvillimin intelektual, moral dhe shoqëror të nxënësve.</p>
    </div>
  </div>

  <hr>

  <!-- 2. Drejtimet Mësimore (slider djathtas) -->
  <div class="row align-items-start mb-5">
    <div class="col-md-8 order-md-1">
      <h3>Drejtimet Mësimore</h3>
      <p>Shkolla e Mesme “Kuvendi i Lezhës” ofron disa drejtime mësimore, të cilat u mundësojnë nxënësve të zgjedhin profilin që i përshtatet interesave dhe aftësive të tyre. Këto drejtime janë të ndërtuara sipas kurrikulave zyrtare dhe synojnë zhvillimin e njohurive teorike dhe praktike, duke krijuar baza të forta për studime të mëtejshme apo përfshirje profesionale.</p>
    </div>
    <div class="col-md-4 order-md-2 mb-3 mb-md-0">
      <div id="slider2" class="carousel slide info-carousel" data-bs-ride="carousel" data-bs-interval="1700">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="<?php echo BASE_URL ?>img/drejtimi-1.png" class="d-block w-100" alt="">
          </div>
          <div class="carousel-item">
            <img src="<?php echo BASE_URL ?>img/drejtimi-2.png" class="d-block w-100" alt="">
          </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#slider2" data-bs-slide="prev">
          <span class="carousel-control-prev-icon"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#slider2" data-bs-slide="next">
          <span class="carousel-control-next-icon"></span>
        </button>
      </div>
    </div>
  </div>

  <hr>

  <!-- 3. Sukseset dhe Arritjet (slider majtas) -->
  <div class="row align-items-start mb-5">
    <div class="col-md-4 mb-3 mb-md-0">
      <div id="slider3" class="carousel slide info-carousel" data-bs-ride="carousel" data-bs-interval="1700">
        <div class="carousel-inner">
            <div class="carousel-item active">
            <img src="<?php echo BASE_URL ?>img/sukseset-1.jpg" class="d-block w-100" alt="">
          </div>
          <div class="carousel-item">
            <img src="<?php echo BASE_URL ?>img/sukseset-2.jpg" class="d-block w-100" alt="">
          </div>
          <div class="carousel-item">
            <img src="<?php echo BASE_URL ?>img/sukseset-3.jpg" class="d-block w-100" alt="">
          </div>
          <div class="carousel-item">
            <img src="<?php echo BASE_URL ?>img/sukseset-4.jpg" class="d-block w-100" alt="">
          </div>
          
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#slider3" data-bs-slide="prev">
          <span class="carousel-control-prev-icon"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#slider3" data-bs-slide="next">
          <span class="carousel-control-next-icon"></span>
        </button>
      </div>
    </div>
    <div class="col-md-8">
      <h3>Sukseset dhe Arritjet</h3>
      <p>Gjatë viteve, shkolla ka shënuar suksese të vazhdueshme në fushën akademike dhe edukative. Nxënësit e saj kanë marrë pjesë dhe janë dalluar në gara diturie, aktivitete kulturore dhe sportive në nivel lokal dhe më gjerë. Shumë nga maturantët e kësaj shkolle kanë vazhduar studimet e larta në universitete të ndryshme, duke u integruar me sukses në shoqëri dhe në profesione të ndryshme.</p>
    </div>
  </div>

  <hr>

  <!-- 4. Aktivitetet Edukative dhe Kulturore (slider djathtas) -->
  <div class="row align-items-start mb-5">
    <div class="col-md-8 order-md-1">
      <h3>Aktivitetet Edukative dhe Kulturore</h3>
      <p>Përveç mësimit të rregullt, shkolla i kushton rëndësi të veçantë aktiviteteve jashtëmësimore. Organizohen aktivitete kulturore, manifestime historike, aktivitete sportive, projekte edukative dhe angazhime komunitare, të cilat ndihmojnë në zhvillimin e aftësive sociale, kreativitetit dhe punës në grup te nxënësit. Këto aktivitete kontribuojnë në formimin e individëve të përgjegjshëm, aktivë dhe të vetëdijshëm për rolin e tyre në shoqëri.</p>
    </div>
    <div class="col-md-4 order-md-2 mb-3 mb-md-0">
      <div id="slider4" class="carousel slide info-carousel" data-bs-ride="carousel" data-bs-interval="1700">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="<?php echo BASE_URL ?>img/aktiviteti-3.jpg" class="d-block w-100" alt="">
          </div>
          <div class="carousel-item">
            <img src="<?php echo BASE_URL ?>img/aktiviteti-1.jpg" class="d-block w-100" alt="">
          </div>
          <div class="carousel-item">
            <img src="<?php echo BASE_URL ?>img/aktiviteti-2.jpg" class="d-block w-100" alt="">
          </div>
          <div class="carousel-item">
            <img src="<?php echo BASE_URL ?>img/aktiviteti-4.jpg" class="d-block w-100" alt="">
          </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#slider4" data-bs-slide="prev">
          <span class="carousel-control-prev-icon"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#slider4" data-bs-slide="next">
          <span class="carousel-control-next-icon"></span>
        </button>
      </div>
    </div>
  </div>

</div>





<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>






<?php
include('../../footer.php');
?>