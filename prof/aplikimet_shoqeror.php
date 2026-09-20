<?php
include('../classes/Aplikimet.php');
include('prof-header.php');

$aplikimet = new Aplikimet();

$drejtim_shoqeror_id = 2; 
$result = $aplikimet->aplikimet_sipas_drejtimi_dhe_status($drejtim_shoqeror_id, 'ne pritje');
?>

<div class="container my-5" style="min-height:60vh">

    <!-- HEADER -->
    <div class="card shadow-lg border-0 rounded-4 mb-4">
        <div class="card-body text-white rounded-4 p-4"
             style="background: linear-gradient(135deg,#6610f2,#0d6efd);">

            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h3 class="fw-bold mb-1">
                        <i class="bi bi-folder2-open me-2"></i>
                        Aplikimet – Drejtimi Shoqëror
                    </h3>
                    <p class="mb-0 opacity-75">
                        Lista e aplikimeve në pritje
                    </p>
                </div>

                <div class="text-end">
                    <h4 class="fw-bold mb-0"><?= $result->num_rows ?></h4>
                    <small>Total në pritje</small>
                </div>
            </div>

        </div>
    </div>

    <!-- TABLE -->
    <div class="card shadow-sm border-0 rounded-4">
        <div class="card-body">

            <div class="table-responsive">
                <table class="table align-middle text-center modern-table">

                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Emri</th>
                            <th>Statusi</th>
                            <th>Dokumentet</th>
                            <th>Data</th>
                            <th>Veprimet</th>
                        </tr>
                    </thead>

                    <tbody>

                    <?php if ($result->num_rows > 0): ?>
                        <?php while ($row = $result->fetch_assoc()): ?>

                            <?php
                                if ($row['status'] == 'ne pritje') {
                                    $status = '<span class="badge bg-warning text-dark px-3 py-2">Në pritje</span>';
                                } elseif ($row['status'] == 'aprovuar') {
                                    $status = '<span class="badge bg-success px-3 py-2">Aprovuar</span>';
                                } else {
                                    $status = '<span class="badge bg-danger px-3 py-2">Refuzuar</span>';
                                }
                            ?>

                            <tr>
                                <td class="fw-semibold"><?= $row['id']; ?></td>

                                <td>
                                    <div class="fw-bold">
                                        <?= htmlspecialchars($row['emri']); ?>
                                        <?= htmlspecialchars($row['mbiemri']); ?>
                                    </div>
                                </td>

                                <td><?= $status ?></td>

                                <td>
                                    <div class="d-flex justify-content-center gap-2">

                                        <!-- Qertifikata -->
                                        <img src="../public/public-backend/uploads/<?= htmlspecialchars($row['qertifikata_lindjes']); ?>"
                                             class="doc-thumb"
                                             data-bs-toggle="modal"
                                             data-bs-target="#qertModal<?= $row['id']; ?>">

                                        <!-- Deftesa -->
                                        <img src="../public/public-backend/uploads/<?= htmlspecialchars($row['deftesa']); ?>"
                                             class="doc-thumb"
                                             data-bs-toggle="modal"
                                             data-bs-target="#deftModal<?= $row['id']; ?>">

                                    </div>
                                </td>

                                <td>
                                    <span class="text-muted">
                                        <?= date('d M Y', strtotime($row['created_at'])); ?>
                                    </span>
                                </td>

                                <td>
                                    <div class="d-flex justify-content-center gap-2">

                                        <a href="aprovo_shoqeror.php?id=<?= $row['id'] ?>"
                                           class="btn btn-success btn-sm px-3 shadow-sm">
                                           <i class="bi bi-check-lg"></i>
                                        </a>

                                        <a href="refuzo_shoqeror.php?id=<?= $row['id'] ?>"
                                           class="btn btn-danger btn-sm px-3 shadow-sm">
                                           <i class="bi bi-x-lg"></i>
                                        </a>

                                    </div>
                                </td>
                            </tr>

                            <!-- MODAL QERTIFIKATA -->
                            <div class="modal fade" id="qertModal<?= $row['id']; ?>" tabindex="-1">
                                <div class="modal-dialog modal-dialog-centered modal-lg">
                                    <div class="modal-content rounded-4">
                                        <div class="modal-header">
                                            <h5 class="modal-title">
                                                Qertifikata – <?= htmlspecialchars($row['emri']); ?>
                                            </h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                        </div>
                                        <div class="modal-body text-center">
                                            <img src="../public/public-backend/uploads/<?= htmlspecialchars($row['qertifikata_lindjes']); ?>"
                                                 class="img-fluid rounded-3">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- MODAL DEFTESE -->
                            <div class="modal fade" id="deftModal<?= $row['id']; ?>" tabindex="-1">
                                <div class="modal-dialog modal-dialog-centered modal-lg">
                                    <div class="modal-content rounded-4">
                                        <div class="modal-header">
                                            <h5 class="modal-title">
                                                Dëftesa – <?= htmlspecialchars($row['emri']); ?>
                                            </h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                        </div>
                                        <div class="modal-body text-center">
                                            <img src="../public/public-backend/uploads/<?= htmlspecialchars($row['deftesa']); ?>"
                                                 class="img-fluid rounded-3">
                                        </div>
                                    </div>
                                </div>
                            </div>

                        <?php endwhile; ?>

                    <?php else: ?>

                        <tr>
                            <td colspan="6" class="py-4 text-muted">
                                <i class="bi bi-inbox fs-3"></i>
                                <div>Nuk ka aplikime në pritje.</div>
                            </td>
                        </tr>

                    <?php endif; ?>

                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>

<style>
.modern-table thead {
    background: #f8f9fa;
    font-weight: 600;
}

.modern-table tbody tr {
    transition: 0.2s ease;
}

.modern-table tbody tr:hover {
    background: #f1f5ff;
}

.doc-thumb {
    width: 55px;
    height: 55px;
    object-fit: cover;
    border-radius: 10px;
    cursor: pointer;
    transition: 0.3s;
    border: 2px solid #eee;
}

.doc-thumb:hover {
    transform: scale(1.15);
    border-color: #0d6efd;
}
</style>

<?php
include('prof-footer.php');
?>