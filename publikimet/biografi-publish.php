<?php
include('publikimet-header.php');
?>

<div class="container mt-5" style="min-height: 80vh">

    <!-- Hero / Header -->
    <div class="text-center mb-4 p-4 rounded-4 shadow-lg" style="background: linear-gradient(135deg,#0d6efd,#6610f2); color:white;">
        <h1 class="fw-bold mb-2"><i class="bi bi-person-badge me-2"></i>Krijo Biografin e Profëve</h1>
        <p class="mb-0 opacity-75">Shto informacion për profesorët me foto dhe njohuri të shkurtëra</p>
    </div>

    <!-- Form -->
    <form action="publikim-backend/biografia_save.php" method="POST" enctype="multipart/form-data" class="shadow-sm mb-5 p-4 rounded-4 bg-white">
        <div class="mb-3">
            <label class="form-label fw-semibold">Emri i Prof-it</label>
            <input type="text" name="emri" class="form-control shadow-sm" required>
        </div>

        <div class="mb-3">
            <label class="form-label fw-semibold">Mbiemri i Prof-it</label>
            <input type="text" name="mbiemri" class="form-control shadow-sm" required>
        </div>

        <div class="mb-3">
            <label class="form-label fw-semibold">Pozita / Statusi</label>
            <input type="text" name="statusi" class="form-control shadow-sm" placeholder="Profesor / Drejtor / etj" required>
        </div>

        <div class="mb-3">
            <label class="form-label fw-semibold">Njohuri rreth Prof-it</label>
            <textarea name="njohuri" class="form-control shadow-sm" rows="6" required></textarea>
        </div>

        <div class="mb-3">
            <label class="form-label fw-semibold">Foto Prof-it</label>
            <input type="file" name="foto" accept="image/*" class="form-control previewInput shadow-sm">
        </div>

        <div id="previewFotos" class="mb-3 d-flex flex-wrap gap-2"></div>

        <button type="submit" class="btn btn-primary my-3 shadow-sm px-4 py-2">
            <i class="bi bi-cloud-upload-fill me-1"></i> Publiko
        </button>
    </form>
</div>

<script>
const inputFoto = document.querySelector('.previewInput');
const previewDiv = document.getElementById('previewFotos');

inputFoto.addEventListener('change', function(){
    previewDiv.innerHTML = ''; 

    if(this.files && this.files[0]){
        const reader = new FileReader();
        reader.onload = function(e){
            const img = document.createElement('img');
            img.src = e.target.result;
            img.style.height = '100px';
            img.style.border = '1px solid #ccc';
            img.style.padding = '2px';
            img.style.borderRadius = '8px';
            img.style.boxShadow = '0 2px 8px rgba(0,0,0,0.1)';
            previewDiv.appendChild(img);
        }
        reader.readAsDataURL(this.files[0]);
    }
});
</script>

<?php
include('publikimet-footer.php');
?>