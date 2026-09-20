<?php
include('../../header.php');
?>

<style>
.contact-hero {
    background: linear-gradient(rgba(0,0,0,0.6), rgba(37,99,235,0.7)),
                url('<?= BASE_URL ?>img/kontakti.jpg') center/cover no-repeat;
    padding: 120px 0;
}

.glass-card {
    background: rgba(255,255,255,0.85);
    backdrop-filter: blur(10px);
    border-radius: 20px;
}

.info-icon {
    font-size: 28px;
    width: 60px;
    height: 60px;
    background: linear-gradient(135deg,#2563eb,#1e3a8a);
    color: white;
    display:flex;
    align-items:center;
    justify-content:center;
    border-radius:50%;
    margin-bottom:15px;
}
</style>

<link rel="stylesheet" href="<?= BASE_URL ?>css/style.css?v=2">

<!-- HERO -->
<section class="contact-hero text-white text-center fade-up">
    <div class="container">
        <h1 class="display-4 fw-bold">Na Kontaktoni</h1>
        <p class="lead opacity-75">Jemi gjithmonë të hapur për komunikim.</p>
    </div>
</section>

<!-- INFO CARDS -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="row text-center g-4">
            <div class="col-md-4 fade-up">
                <div class="glass-card p-4 shadow h-100">
                    <div class="info-icon">📍</div>
                    <h5 class="fw-bold">Adresa</h5>
                    <p class="text-muted">Rr. Flaka Janarit Nr.18, Viti</p>
                </div>
            </div>

            <div class="col-md-4 fade-up">
                <div class="glass-card p-4 shadow h-100">
                    <div class="info-icon">📞</div>
                    <h5 class="fw-bold">Telefoni</h5>
                    <p class="text-muted">+383 44 000 000</p>
                </div>
            </div>

            <div class="col-md-4 fade-up">
                <div class="glass-card p-4 shadow h-100">
                    <div class="info-icon">✉️</div>
                    <h5 class="fw-bold">Email</h5>
                    <p class="text-muted">info@kuvendilezhes.com</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- FORM + MAP -->
<section class="py-5">
    <div class="container">
        <div class="row g-5 align-items-center">

            <!-- FORM -->
            <div class="col-lg-6  fade-up">
                <div class="glass-card p-5 shadow-lg">
                    <h3 class="fw-bold mb-4 text-primary">Dërgo Mesazh</h3>
                    <form onsubmit="return sendMail()">
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Emri</label>
                            <input type="text" id="emri" class="form-control form-control-lg rounded-3" required>
                        </div>
                    
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Email</label>
                            <input type="email" id="email" class="form-control form-control-lg rounded-3" required>
                        </div>
                    
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Mesazhi</label>
                            <textarea id="mesazhi" rows="2" class="form-control form-control-lg rounded-3" required></textarea>
                        </div>
                    

                            <button type="submit" class="btn btn-primary btn-lg px-4 rounded-3">
                                Dërgo Mesazhin →
                            </button>

                    </form>
                </div>
            </div>

            <!-- MAP -->
            <div class="col-lg-6 fade-up">
                <div class="shadow-lg rounded-4 overflow-hidden">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d641.7145344014061!2d21.36210209615652!3d42.317683671705325!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x135463c8b169362b%3A0x861d7b8dd9932e09!2sKuvendi%20i%20Lezh%C3%ABs%2C%2018%20Flaka%20e%20Janarit%2C%20Viti%2061000!5e1!3m2!1sen!2s!4v1771785934256!5m2!1sen!2s" 
                      width="100%" 
                        height="500" 
                        style="border:0;" 
                        allowfullscreen="" 
                        loading="lazy" 
                       >
                      </iframe>
                </div>
            </div>

        </div>
    </div>
</section>

<script>
function sendMail() {
    var emri = document.getElementById("emri").value;
    var email = document.getElementById("email").value;
    var mesazhi = document.getElementById("mesazhi").value;

    var subject = "Mesazh nga faqja e kontaktit";
    var body = "Emri: " + emri + "%0D%0A";
    body += "Email: " + email + "%0D%0A%0D%0A";
    body += "Mesazhi:%0D%0A" + mesazhi;

    window.location.href = "mailto:kuvendilezhes@gmail.com?subject=" 
        + encodeURIComponent(subject) 
        + "&body=" + body;

    return false;
}
</script>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<?php include('../../footer.php'); ?>