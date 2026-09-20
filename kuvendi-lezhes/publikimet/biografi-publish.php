<?php
include('publikimet-header.php');
?>

<div class="container mt-5" style="min-height: 80vh">
    <h2>Krijo Biografin e Profeve</h2>

    <form action="publikim-backend/biografia_save.php" method="POST" enctype="multipart/form-data">
        <div class="mb-3">
            <label>Emri i Prof-it</label>
            <input type="text" name="emri" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Mbiemri i Prof-it</label>
            <input type="text" name="mbiemri" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Pozita / Statusi</label>
            <input type="text" name="statusi" class="form-control" placeholder="Profesor / Drejtor / etj" required>
        </div>


        <div class="mb-3">
            <label>Njohuri rreth Prof-it</label>
            <textarea name="njohuri" class="form-control" rows="6" required></textarea>
        </div>

        <div class="mb-3">
            <label>Foto Prof-it</label>
            <input type="file" name="foto" accept="image/*" class="form-control previewInput">
        </div>

        <div id="previewFotos" class="mb-3 d-flex flex-wrap gap-2"></div>

        <button type="submit" class="btn btn-primary my-3">Publiko</button>
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
            img.style.borderRadius = '4px';
            previewDiv.appendChild(img);
        }
        reader.readAsDataURL(this.files[0]);
    }
});
</script>

<?php
include('publikimet-footer.php');
?>
