<?php
include('header.php');
include('classes/Publikimet.php');

$pub = new Publikimet();
$lajmet = $pub->getLatestLajmet(3);

$bio = new Publikimet();
$result = $bio->getAllBiografite(32);
$profesoret = $result->fetch_all(MYSQLI_ASSOC); 

$chunks = array_chunk($profesoret, 4); 
$first = true;
foreach($chunks as $chunk){
    echo '<div class="carousel-item ' . ($first ? 'active' : '') . '">';
    echo '<div class="row g-4">';
    foreach($chunk as $p){
        
    }
    echo '</div></div>';
    $first = false;
}
?>

<div class="index-main-div position-relative d-flex align-items-start">
  <div class="shop-now p-3 p-md-4">
    <h1 class="" style="font-size: 2 rem">
      Shkolla e Mesme "Kuvendi i Lezhës"
    </h1>
    <a href="<?= BASE_URL ?>/public/public-frontend/njohuri.php"
       class="d-flex align-items-center justify-content-between mt-3 btn btn-primary">
      MERR NJOHURI
      <span><i class="fa-solid fa-grip ms-2"></i></span>
    </a>
  </div>
</div>

<!-- About Us -->
<div class="container my-5">
  <div id="rreth_nesh" class="row align-items-center">
    <div class="col-md-6 mb-4 about-img">
      <img src="<?= BASE_URL ?>img/about_us.jpg" class="shadow-lg p-3 img-fluid" alt="Rreth Nesh">
    </div>

    <div class="col-md-6 about-info p-3">
      <h1 class="text-center">Rreth Nesh</h1>
      <p>
        Shkolla e Mesme “Kuvendi i Lezhës” është një institucion arsimor në
        <a href="https://maps.app.goo.gl/Zknjz1P7XQvaV4TD8" target="_blank">Kosovë</a>
        i përkushtuar ndaj formimit akademik, moral dhe qytetar të të rinjve. Duke u mbështetur në vlerat kombëtare, dijen bashkëkohore dhe traditën arsimore shqiptare, shkolla jonë synon të përgatisë nxënës të aftë, të përgjegjshëm dhe të gatshëm për sfidat e së ardhmes. Me një staf të kualifikuar dhe të përkushtuar pedagogjik, “Kuvendi i Lezhës” ofron mësimdhënie cilësore, ambiente të sigurta dhe mbështetje të vazhdueshme për zhvillimin intelektual dhe personal të nxënësve. Ne i kushtojmë rëndësi të veçantë mendimit kritik, kreativitetit, disiplinës dhe bashkëpunimit. Shkolla jonë promovon barazi, respekt dhe përfshirje, duke krijuar një mjedis ku çdo nxënës ndihet i vlerësuar dhe i motivuar për të dhënë më të mirën nga vetja. Përmes aktiviteteve mësimore, kulturore dhe sportive, ne synojmë të zhvillojmë jo vetëm njohuritë, por edhe karakterin dhe vetëbesimin e të rinjve. “Kuvendi i Lezhës” mbetet e përkushtuar ndaj misionit të saj për të ndërtuar një brez të arsimuar, të ndërgjegjshëm dhe kontribuues aktiv në shoqërinë kosovare dhe më gjerë.
      </p>
    </div>

    <div class="col-12 mt-4">
      <iframe src="https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d539.6150531002681!2d21.36178165347684!3d42.317730142777386!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zNDLCsDE5JzA0LjEiTiAyMcKwMjEnNDIuNSJF!5e1!3m2!1sen!2s!4v1770455532836!5m2!1sen!2s" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
  </div>
</div>

<style>

.card {
    border: 1px solid #ddd;
    border-radius: 8px;
    overflow: hidden;
    transition: transform 0.3s, box-shadow 0.3s;
    background: #fff;
    display: flex;
    flex-direction: column;
    height: 400px;
}

.card-body {
    flex: 1;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
}

.card:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 20px rgba(0,0,0,0.15);
}

.card-body h5 {
    font-size: 1.2rem;
    margin-bottom: 10px;
}

.card-body p {
    font-size: 0.95rem;
    color: #555;
    margin-bottom: 10px;
}

.card-body small {
    color: #888;
}

.carousel-inner img {
    width: 100%;
    height: 200px;
    object-fit: cover;
    border-bottom: 1px solid #ddd;
}

.carousel-control-prev-icon,
.carousel-control-next-icon {
    background-color: rgba(0,0,0,0.5);
    border-radius: 50%;
}


</style>

<!-- Latest News -->
<div class="container my-5">
  <div class="section-title text-center my-5">
            <h6 class="d-inline-block text-secondary text-uppercase pb-2">Lajmet</h6>
            <h1 class="display-4">Më të fundit!</h1>
        </div>
  <div class="row">
    <?php if($lajmet && count($lajmet) > 0): ?>
      <?php foreach($lajmet as $row): ?>
        <div class="col-lg-4 col-md-6 mb-4">
          <div class="card shadow-sm">

            <?php 
            $fotos = array_filter([
              $row['foto_1'] ?? null,
              $row['foto_2'] ?? null,
              $row['foto_3'] ?? null,
              $row['foto_4'] ?? null
            ], fn($f) => isset($f) && trim($f) !== '');
            ?>

            <?php if(count($fotos) > 0): ?>
              <div id="carousel-<?= $row['id'] ?>" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                  <?php $first = true; ?>
                  <?php foreach($fotos as $foto): ?>
                    <div class="carousel-item <?= $first ? 'active' : '' ?>">
                      <img src="<?= BASE_URL ?>publikimet/publikim-backend/foto-publikimet/<?= $foto ?>" class="d-block w-100" alt="<?= htmlspecialchars($row['titulli']) ?>">
                    </div>
                    <?php $first = false; ?>
                  <?php endforeach; ?>
                </div>

                <?php if(count($fotos) > 1): ?>
                  <button class="carousel-control-prev" type="button" data-bs-target="#carousel-<?= $row['id'] ?>" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                  </button>
                  <button class="carousel-control-next" type="button" data-bs-target="#carousel-<?= $row['id'] ?>" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                  </button>
                <?php endif; ?>
              </div>
            <?php endif; ?>

            <div class="card-body">
              <h5 class="card-title"><?= htmlspecialchars($row['titulli']) ?></h5>
              <p class="card-text"><?= substr(strip_tags($row['njohuri']), 0, 120) ?> ...</p>
              <a href="<?= BASE_URL ?>public/public-frontend/publikim.php?id=<?= $row['id'] ?>" class="text-decoration-none fw-bold">
                &gt; Lexo më shumë
              </a>
              <br>
              <small class="text-muted">
                Nga: <?= htmlspecialchars($row['emri'] . " " . $row['mbiemri']) ?>
              </small>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    <?php else: ?>
      <p class="text-center">Nuk ka lajme.</p>
    <?php endif; ?>
  </div>
</div>


<!-- Profesoret Carousel -->
<div class="container-fluid py-5">
    <div class="container py-5">
        <div class="section-title text-center mb-5">
            <h6 class="d-inline-block text-secondary text-uppercase pb-2">Profesorët</h6>
            <h1 class="display-4">Njofto profesorët tanë!</h1>
        </div>

        <div id="profesor-carousel" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
        <?php 
        $perSlide = 4; 
        $chunks = array_chunk($profesoret, $perSlide); 
        $first = true;
        foreach($chunks as $chunk): ?>
            <div class="carousel-item <?= $first ? 'active' : '' ?>">
                <div class="d-flex justify-content-center flex-wrap">
                    <?php foreach($chunk as $p): ?>
                        <div class="card team-item m-2 flex-grow-1" style="flex-basis: 23%;">
                            <a href="<?= BASE_URL ?>public/public-frontend/biografia-prof.php?id=<?= $p['id'] ?>">
                                <img class="img-fluid" src="<?= BASE_URL ?>publikimet/publikim-backend/biografite/<?= $p['foto'] ?? 'default.jpg' ?>" alt="<?= htmlspecialchars($p['emri'] . ' ' . $p['mbiemri']) ?>">
                                <div class="bg-light text-center p-2">
                                    <h5><?= htmlspecialchars($p['emri'] . ' ' . $p['mbiemri']) ?></h5>
                                    <p><?= htmlspecialchars($p['statusi'] ?? 'Profesor') ?></p>
                                </div>
                            </a>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        <?php 
        $first = false;
        endforeach; ?>
    </div>

    <button class="carousel-control-prev" type="button" data-bs-target="#profesor-carousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon bg-dark rounded-circle p-3" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#profesor-carousel" data-bs-slide="next">
        <span class="carousel-control-next-icon bg-dark rounded-circle p-3" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>



        <div class="text-center mt-4">
            <a href="<?= BASE_URL ?>public/public-frontend/biografite.php" class="btn btn-primary py-3 px-5"><b>Shiko më shumë ></b></a>
        </div>
    </div>
</div>

<style>
.team-item {
    border-radius: 10px;
    overflow: hidden;
    background: #fff;
    box-shadow: 0 4px 15px rgba(0,0,0,0.1);
    transition: transform 0.3s, box-shadow 0.3s;
    margin-bottom: 15px;
}

#profesor-carousel .carousel-control-prev,
#profesor-carousel .carousel-control-next {
    width: 50px;
    height: 50px;
    top: 50%;
}

.team-item img {
    height: 250px;
    object-fit: cover;
    transition: transform 0.3s;
    width: 100%;
}

.team-item:hover img {
    transform: scale(1.05);
}

.team-item .bg-light {
    border-top: 1px solid #eee;
}

.team-item h5 { font-size: 1.1rem; margin: 5px 0; }
.team-item p { font-size: 0.9rem; margin: 0; color: #666; }


@media (max-width: 991px) { .team-item { flex-basis: 31%; } }
@media (max-width: 767px) { .team-item { flex-basis: 48%; } }
@media (max-width: 575px) { .team-item { flex-basis: 95%; } }





.team-item:hover .bg-light {
    background-color: #f0f8ff;
}



</style>

<link rel="stylesheet" href="<?php echo BASE_URL ?>/css/contactus.css">


<div class="container-fluid contact3 py-5 d-flex justify-content-center align-items-center">
  <div class="row w-100 justify-content-center">
    <div class="col-12 col-md-8 col-lg-6">
      <div class="contact-box">
        <h1 class="font-weight-light text-white text-center">Na Kontaktoni</h1>
        <form class="mt-4" onsubmit="sendMail(event)">
          <div class="mb-3">
            <input id="name" class="form-control" type="text" placeholder="Emri" required>
          </div>
          <div class="mb-3">
            <input id="email" class="form-control" type="email" placeholder="Email" required>
          </div>
          <div class="mb-3">
            <input id="phone" class="form-control" type="text" placeholder="Telefoni">
          </div>
          <div class="mb-3">
            <textarea id="message" class="form-control" rows="4" placeholder="Mesazhi" required></textarea>
          </div>
          <button type="submit" class="btn btn-danger-gradiant w-100 mt-2">
            Dergo
          </button>
        </form>

        <!-- Kontakt detajet -->
        <div class="row mt-4 text-center text-white">
          <div class="col-md-4 mb-3">
            <h6 class="text-white">Adresa</h6>
            <a href="https://maps.app.goo.gl/2vp9QQWdLdMZNkaN8" target="_blank" class="text-decoration-none text-white">SH.M "K.L"<br>Flaka Janarit</a>
          </div>
          <div class="col-md-4 mb-3">
            <h6 class="text-white">Telefoni</h6>
            <p>044 111 222<br>045 111 222</p>
          </div>
          <div class="col-md-4 mb-3">
            <h6 class="text-white">Email</h6>
            <p>kuvendilezhes@gmail.com</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


<script>
function sendMail(event) {
  event.preventDefault();

  const name = encodeURIComponent(document.getElementById('name').value);
  const email = encodeURIComponent(document.getElementById('email').value);
  const phone = encodeURIComponent(document.getElementById('phone').value);
  const message = encodeURIComponent(document.getElementById('message').value);

  const subject = encodeURIComponent(`Mesazh nga ${name}`);
  const body = `Emri: ${name}%0AEmail: ${email}%0ATelefoni: ${phone}%0AMesazhi: ${message}`;

  window.location.href = `mailto:kuvendilezhes@gmail.com?subject=${subject}&body=${body}`;
}
</script>



<?php include('footer.php'); ?>