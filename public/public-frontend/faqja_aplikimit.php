<?php
include('../../header.php');
?>

<style>

.hero {
    position: relative;
    background: url('../../img/aktiviteti-3.jpg') center/cover no-repeat;
    min-height: 70vh;
    color: white;
    display: flex;
    align-items: center;
    overflow: hidden;
}

.hero::before {
    content: '';
    position: absolute;
    top:0;
    left:0;
    width:100%;
    height:100%;
    background: linear-gradient(135deg, rgba(255,25,101,0.6), rgba(8,141,230,0.6));
    z-index: 1;
    transition: all 0.6s ease;
}

.hero .hero-content {
    position: relative;
    z-index: 2;
    opacity: 0;
    transform: translateY(50px);
    animation: fadeInUp 1s forwards 0.3s;
}

@keyframes fadeInUp {
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

/* Breadcrumb */
.hero .breadcrumb {
    background: transparent;
    padding: 0;
    margin-bottom: 15px;
}

.hero .breadcrumb a {
    color: rgba(255,255,255,0.8);
    text-decoration: none;
    transition: color 0.3s;
}

.hero .breadcrumb a:hover {
    color: #00ffd6;
}


.hero h1 {
    font-size: 3rem;
    font-weight: 700;
    line-height: 1.2;
    margin-bottom: 20px;
    animation: fadeInUp 1s forwards 0.5s;
}

.hero h1 span.text-info {
    color: #00ffd6;
}

.hero p.lead {
    font-size: 1.3rem;
    max-width: 550px;
    margin-bottom: 30px;
    animation: fadeInUp 1s forwards 0.7s;
}

/* Butoni */
.hero .btn {
    border: 2px solid #fff;
    color: #fff;
    padding: 12px 30px;
    border-radius: 12px;
    font-size: 1.15rem;
    transition: all 0.4s ease;
    box-shadow: 0 8px 20px rgba(0,0,0,0.3);
    animation: fadeInUp 1s forwards 0.9s;
}

.hero .btn:hover {
    background: rgba(255,255,255,0.25);
    color: #00ffd6;
    transform: translateY(-5px);
    box-shadow: 0 12px 30px rgba(0,0,0,0.4);
}





@media(max-width:992px){
    .hero h1 { font-size: 2.5rem; }
    .hero p.lead { font-size: 1.15rem; max-width:100%; }
    .hero .btn { width: 100%; text-align:center; }
    .hero .hero-image { margin-top: 30px; }
}
</style>

<link rel="stylesheet" href="<?= BASE_URL ?>css/style.css?v=2">

<header class="hero">
    <div class="container hero-content">
        <div class="row align-items-center">
            
            <!-- Teksti -->
            <div class="col-lg-6">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= BASE_URL ?>">Ballina</a></li>
                        <li class="breadcrumb-item active text-white" aria-current="page">Aplikimi</li>
                    </ol>
                </nav>

                <h1>Shkolla e Mesme <span class="text-info">Kuvendi i Lezhës</span></h1>
                <p class="lead">Webfaqja zyrtare e shkollës. Apliko tani dhe bëhu pjesë e komunitetit tonë akademik dhe të rinjve që duan të shkëlqejnë!</p>

                <a href="<?= BASE_URL ?>public/public-frontend/aplikim_form.php" class="btn btn-outline-light btn-lg">
                    <i class="fas fa-pencil-alt me-2"></i>Apliko Tani
                </a>
            </div>


        </div>
    </div>
</header>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<?php
include('../../footer.php');
?>