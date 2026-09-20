<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

<style>

footer.bg-primary {
  background: linear-gradient(135deg, #1e3a8a, #2563eb); 
}

footer h5 {
  color: #fff;
}
footer .footer-link {
  color: #fff;
  text-decoration: none;
  transition: color 0.3s, text-decoration 0.3s;
}
footer .footer-link:hover {
  color: #ffd700;
  text-decoration: underline;
  font-size: 1.05rem;
}

/* Ikonat sociale */

footer .social-link i {
  display: inline-block;       
  color: #fff;
  font-size: 1.5rem;
  transition: color 0.3s, transform 0.3s;
}

footer .social-link:hover i {
  color: #ffd700;
  transform: scale(1.3);       
}
</style>

<footer class="bg-primary text-white pt-5 pb-4">

  <div class="container">
    <div class="row">

      <!-- Rreth Nesh -->
      <div class="col-md-4 mb-3 fade-up">
        <h5 class="fw-bold">Rreth Nesh</h5>
        <p>Kuvendi i Lezhës është një platformë informative që synon të promovojë historinë dhe trashëgiminë kombëtare shqiptare, duke ofruar përmbajtje edukative për të gjithë të interesuarit.</p>
      </div>

      <!-- Linqe te shpejta -->
      <div class="col-md-4 mb-3 fade-up">
        <h5 class="fw-bold">Linqe të shpejta</h5>
        <ul class="list-unstyled">
          <li><a href="<?= BASE_URL ?>prof/prof-dashboard.php" class="footer-link text-decoration-none text-white">Home</a></li>
          <li><a href="<?= BASE_URL ?>prof/nxenesit.php" class="footer-link text-decoration-none text-white">Nxenesit</a></li>
        </ul>
      </div>

      <!-- Rrjetet Sociale -->
      <div class="col-md-4 mb-3 fade-up">
        <h5 class="fw-bold">Follow Us</h5>
        <ul class="list-inline social-icons">
          <li class="list-inline-item"><a href="https://www.facebook.com/KuvendiiLezhesViti" target="_blank" class="social-link"><i class="bi bi-facebook"></i></a></li>
          <li class="list-inline-item"><a href="#" class="social-link"><i class="bi bi-twitter"></i></a></li>
          <li class="list-inline-item"><a href="#" class="social-link"><i class="bi bi-instagram"></i></a></li>
        </ul>
      </div>

    </div>

    <hr class="border-light">

    <!-- Copy Right -->
    <div class="row">
      <div class="col-md-12 text-center">
        <p class="mb-0">&copy; 2026 Kuvendi Lezhës / Oltion Selmani. All rights reserved.</p>
      </div>
    </div>
  </div>

</footer>



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



<!-- &copy; 2026 Oltion Selmani. All rights reserved. -->