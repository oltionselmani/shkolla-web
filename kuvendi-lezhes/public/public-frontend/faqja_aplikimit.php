<?php
include('../../header.php');
?>

<style>
    .hero {
        position: relative;
        background: url('../../img/aktiviteti-3.jpg') center/cover no-repeat;
        color: white;
        padding: 120px 0; 
        display: flex;
        align-items: center;
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
    }

    .hero .hero-content {
        position: relative;
        z-index: 2; 
    }

    .hero h1 {
        font-size: 3rem;
        font-weight: 700;
        line-height: 1.2;
        margin-bottom: 20px;
    }

    .hero p.lead {
        font-size: 1.3rem;
        margin-bottom: 30px;
        max-width: 500px;
    }

    .hero .btn {
        border: 2px solid #fff;
        color: #fff;
        padding: 12px 25px;
        border-radius: 8px;
        font-size: 1.1rem;
        transition: all 0.3s ease;
    }

    .hero .btn:hover {
        background: rgba(255,255,255,0.2);
        color: #fff;
        transform: translateY(-3px);
        box-shadow: 0 8px 20px rgba(0,0,0,0.3);
    }

    @media(max-width: 768px){
        .hero h1 {
            font-size: 2.2rem;
        }
        .hero p.lead {
            font-size: 1.1rem;
            max-width: 100%;
        }
        .hero .btn {
            width: 100%;
            text-align: center;
        }
    }
</style>

<header class="hero">
    <div class="container hero-content">
        <div class="row align-items-center" style="min-height:50vh">
            <div class="col-lg-6">
                <h1 class="display-4 fw-bold mb-3">Shkolla E Mesme Kuvendi Lezhes</h1>
                <p class="lead mb-4">Webfaqja oficiale e shkolles se mesme Kuvendi Lezhes. Apliko ketu per tu regjistruar ne shkollen tone!</p>

                <a href="<?= BASE_URL ?>public/public-frontend/aplikim_form.php" class="btn btn-outline-light btn-lg">
                    <i class="fab fa-google-play me-2"></i>Apliko
                </a>
            </div>
        </div>
    </div>
</header>

<?php
include('../../footer.php');
?>
