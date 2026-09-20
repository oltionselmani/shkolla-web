<?php
include('../../header.php');
?>

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

<?php
include('../../footer.php');
?>
