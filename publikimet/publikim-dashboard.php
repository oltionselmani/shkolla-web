<?php
include('publikimet-header.php');
?>

<div class="container mt-5 mb-5" style="min-height:80vh">

    <!-- Hero Header -->
    <div class="text-center p-4 rounded-4 shadow-lg mb-4" style="background: linear-gradient(135deg,#0d6efd,#6610f2); color:white;">
        <h1 class="fw-bold mb-2"><i class="bi bi-pencil-square me-2"></i>Krijo Publikim</h1>
        <p class="mb-0 opacity-75">Shto titull, njohuri dhe deri në 4 foto për publikimin tuaj</p>
    </div>

    <!-- Form Card -->
    <div class="card shadow-sm rounded-4 p-4">
        <form action="publikim-backend/publikim_save.php" method="POST" enctype="multipart/form-data">

            <div class="mb-3">
                <label class="form-label fw-semibold">Titulli</label>
                <input type="text" name="titulli" class="form-control form-control-lg shadow-sm" placeholder="Shkruaj titullin këtu..." required>
            </div>

            <div class="mb-3">
                <label class="form-label fw-semibold">Njohuri</label>
                <textarea name="njohuri" class="form-control form-control-lg shadow-sm" rows="6" placeholder="Shkruaj njohuritë ose përshkrimin..." required></textarea>
            </div>

            <div class="mb-3">
                <label class="form-label fw-semibold">Foto (opsionale)</label>
                <div class="d-flex flex-wrap gap-2">
                    <input type="file" name="fotot[]" accept="image/*" class="form-control previewInput w-auto">
                    <input type="file" name="fotot[]" accept="image/*" class="form-control previewInput w-auto">
                    <input type="file" name="fotot[]" accept="image/*" class="form-control previewInput w-auto">
                    <input type="file" name="fotot[]" accept="image/*" class="form-control previewInput w-auto">
                </div>
            </div>

            <div id="previewFotos" class="mb-3 d-flex flex-wrap gap-2"></div>

            <div class="text-center">
                <button type="submit" class="btn btn-primary btn-lg px-5 shadow-sm">
                    <i class="bi bi-upload me-2"></i> Publiko
                </button>
            </div>

        </form>
    </div>
</div>

<script>
const inputs = document.querySelectorAll('.previewInput');
const previewDiv = document.getElementById('previewFotos');

inputs.forEach((input) => {
    input.addEventListener('change', function(){
        previewDiv.innerHTML = ''; // Clear preview

        inputs.forEach((inp) => {
            if(inp.files && inp.files[0]){
                const reader = new FileReader();
                reader.onload = function(e){
                    const img = document.createElement('img');
                    img.src = e.target.result;
                    img.style.height = '100px';
                    img.style.border = '1px solid #ccc';
                    img.style.padding = '3px';
                    img.style.borderRadius = '6px';
                    img.style.objectFit = 'cover';
                    previewDiv.appendChild(img);
                }
                reader.readAsDataURL(inp.files[0]);
            }
        });
    });
});
</script>

<?php
include('publikimet-footer.php');
?>