<?php
include('../classes/Nxenesi.php');
include('prind-header.php');

$nxObj = new Nxenesi();
$prind_id = $_SESSION['user_id'];
$nxenesit = $nxObj->nxenesit_e_prind($prind_id);
?>

<div class="container my-5" style="min-height:60vh;">

    <!-- TITULLI -->
    <div class="text-center mb-5">
        <h2 class="fw-bold text-primary">
            <i class="bi bi-people-fill me-2"></i> Fëmijët e mi
        </h2>
        <p class="text-muted">Menaxho informacionin dhe performancën e fëmijëve tuaj</p>
    </div>

    <?php if(!empty($nxenesit)): ?>

        <div class="card shadow-lg border-0 rounded-4 fade-up">
            <div class="card-body p-4">

                <div class="table-responsive">
                    <table class="table align-middle text-center table-hover">

                        <thead class="bg-primary text-white">
                            <tr>
                                <th>Emri</th>
                                <th>Mbiemri</th>
                                <th>Klasa</th>
                                <th>Drejtimi</th>
                                <th>Kujdestari</th>
                                <th>Veprime</th>
                            </tr>
                        </thead>

                        <tbody>

                        <?php foreach($nxenesit as $nx): ?>
                            <tr class="table-row">

                                <td class="fw-semibold"><?= $nx['emri']; ?></td>
                                <td><?= $nx['mbiemri']; ?></td>

                                <td>
                                    <span class="badge bg-info text-dark px-3 py-2">
                                        <?= $nx['klasa']; ?>
                                    </span>
                                </td>

                                <td><?= $nx['drejtimi']; ?></td>

                                <td>
                                    <?= ($nx['kujdestar_emri'] ?? '-') . ' ' . ($nx['kujdestar_mbiemri'] ?? '-') ?>
                                </td>

                                <td>
                                    <div class="d-flex flex-wrap justify-content-center gap-2">

                                        <a href="<?= BASE_URL ?>prind/lista_notave.php?id=<?= $nx['id']; ?>" 
                                           class="btn btn-sm btn-outline-success">
                                           <i class="bi bi-journal-text me-1"></i> Notat
                                        </a>

                                        <a href="mungesat.php?id=<?= $nx['id']; ?>" 
                                           class="btn btn-sm btn-outline-warning">
                                           <i class="bi bi-calendar-x me-1"></i> Mungesat
                                        </a>

                                        <a href="<?= BASE_URL ?>prind/raporti.php?id=<?= $nx['id']; ?>" 
                                           class="btn btn-sm btn-outline-primary">
                                           <i class="bi bi-file-earmark-text me-1"></i> Raporti
                                        </a>

                                    </div>
                                </td>

                            </tr>
                        <?php endforeach; ?>

                        </tbody>
                    </table>
                </div>

            </div>
        </div>

    <?php else: ?>

        <div class="text-center py-5">
            <div class="card shadow border-0 rounded-4 p-5">
                <i class="bi bi-emoji-frown fs-1 text-muted mb-3"></i>
                <h5 class="text-muted">Nuk ka të dhëna për fëmijë</h5>
                <p class="text-muted">Shtoni një nxënës për të filluar.</p>
            </div>
        </div>

    <?php endif; ?>

</div>

<style>
.table-row:hover {
    background-color: #f8f9fa;
    transition: 0.3s;
}

.card {
    border-radius: 20px;
}

.btn {
    transition: all 0.3s ease;
}

.btn:hover {
    transform: translateY(-2px);
}
</style>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<?php include('prind-footer.php'); ?>
