<?php
include ('../admin-header.php');
?>

<div class="container-fluid bg-body-tertiary align-content-center" style="height:88.3vh">

<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card shadow-lg p-3 rounded rounded-5">
            <p class="h1 text-primary mb-3">➕ Shto Lenden</p>
          <form action="<?= BASE_URL ?>admin/admin-backend/lenda_save.php" method="post">

              <!-- Lenda -->
              <div class="mb-3">
                <label for="lenda" class="form-label">Lenda:</label>
                <input type="text" class="form-control" id="lenda" name="lenda">
             </div>


                <div class="mb-3 w-100 d-flex justify-content-center align-content-center">
                    <button class="btn btn-outline-primary w-50" type="submit">Ruaj Të Dhënat</button>
                </div>
          </form>

        </div>
    </div>
</div>



</div>