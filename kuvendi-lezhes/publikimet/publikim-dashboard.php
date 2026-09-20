<?php
include('publikimet-header.php');
?>

<div class="container mt-5" style="min-height: 80vh">
    <h2>Krijo Publikim</h2>

    <form action="publikim-backend/publikim_save.php" method="POST" enctype="multipart/form-data">
        <div class="mb-3">
            <label>Titulli</label>
            <input type="text" name="titulli" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Njohuri</label>
            <textarea name="njohuri" class="form-control" rows="6" required></textarea>
        </div>

        <div class="mb-3">
            <label>Foto 1 (opsionale)</label>
            <input type="file" name="fotot[]" accept="image/*" class="form-control previewInput">
        </div>
        <div class="mb-3">
            <label>Foto 2 (opsionale)</label>
            <input type="file" name="fotot[]" accept="image/*" class="form-control previewInput">
        </div>
        <div class="mb-3">
            <label>Foto 3 (opsionale)</label>
            <input type="file" name="fotot[]" accept="image/*" class="form-control previewInput">
        </div>
        <div class="mb-3">
            <label>Foto 4 (opsionale)</label>
            <input type="file" name="fotot[]" accept="image/*" class="form-control previewInput">
        </div>

        <div id="previewFotos" class="mb-3 d-flex flex-wrap gap-2"></div>

        <button type="submit" class="btn btn-primary  my-3">Publiko</button>
    </form>
</div>

<script>
const inputs = document.querySelectorAll('.previewInput');
const previewDiv = document.getElementById('previewFotos');

inputs.forEach((input, index) => {
    input.addEventListener('change', function(){
        previewDiv.innerHTML = ''; 

        inputs.forEach((inp) => {
            if(inp.files && inp.files[0]){
                const reader = new FileReader();
                reader.onload = function(e){
                    const img = document.createElement('img');
                    img.src = e.target.result;
                    img.style.height = '100px';
                    img.style.border = '1px solid #ccc';
                    img.style.padding = '2px';
                    img.style.borderRadius = '4px';
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