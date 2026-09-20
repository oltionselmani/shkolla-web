<?php
include("prof-header.php");
?>

<div class="container my-5" style="min-height:60vh;">

    <!-- HEADER -->
    <div class="card shadow-lg border-0 rounded-4 mb-4">
        <div class="card-body text-white p-5 rounded-4"
             style="background: linear-gradient(135deg,#0d6efd,#0dcaf0);">

            <h2 class="fw-bold mb-2">
                <i class="bi bi-mortarboard-fill me-2"></i>
                Mirë se vini në Dashboard
            </h2>

            <p class="mb-0 fs-5">
                Menaxhoni nxënësit, notat, mungesat dhe raportet tuaja.
            </p>

        </div>
    </div>

    <!-- QUICK ACTIONS -->
    <div class="row g-4">

        <div class="col-md-4">
            <div class="card shadow-sm border-0 rounded-4 h-100 dashboard-card">
                <div class="card-body text-center p-4">
                    <i class="bi bi-people-fill fs-1 text-primary mb-3"></i>
                    <h5 class="fw-bold">Nxënësit</h5>
                    <p class="text-muted">Shiko dhe menaxho nxënësit e klasës.</p>
                    <a href="<?= BASE_URL ?>prof/nxenesit.php" 
                       class="btn btn-outline-primary btn-sm px-4">
                       Hape
                    </a>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card shadow-sm border-0 rounded-4 h-100 dashboard-card">
                <div class="card-body text-center p-4">
                    <i class="bi bi-journal-text fs-1 text-success mb-3"></i>
                    <h5 class="fw-bold">Notat</h5>
                    <p class="text-muted">Shto dhe shiko notat e nxënësve.</p>
                    <a href="<?= BASE_URL ?>prof/nxenesit.php" 
                       class="btn btn-outline-success btn-sm px-4">
                       Hape
                    </a>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card shadow-sm border-0 rounded-4 h-100 dashboard-card">
                <div class="card-body text-center p-4">
                    <i class="bi bi-file-earmark-text fs-1 text-warning mb-3"></i>
                    <h5 class="fw-bold">Raportet</h5>
                    <p class="text-muted">Shiko raportet e performancës.</p>
                    <a href="<?= BASE_URL ?>prof/nxenesit.php" 
                       class="btn btn-outline-warning btn-sm px-4">
                       Hape
                    </a>
                </div>
            </div>
        </div>

    </div>

</div>

<style>
.dashboard-card {
    transition: all 0.3s ease;
}

.dashboard-card:hover {
    transform: translateY(-6px);
    box-shadow: 0 10px 25px rgba(0,0,0,0.1);
}

.card {
    border-radius: 20px;
}
</style>

<?php
include('prof-footer.php');
?>