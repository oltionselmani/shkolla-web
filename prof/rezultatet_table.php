<div class="table-responsive shadow-sm rounded">
    <table class="table align-middle text-center modern-table">

        <thead>
            <tr>
                <th>#</th>
                <th>Emri</th>
                <th>Statusi</th>
                <th>Dokumentet</th>
                <th>Data</th>
            </tr>
        </thead>

        <tbody>
            <?php if (!empty($aplikimet)): ?>
                <?php foreach ($aplikimet as $row): ?>

                    <?php
                        // Status badge
                        if($row['status'] == 'ne pritje'){ 
                            $status = '<span class="badge bg-warning text-dark px-3 py-2">Në pritje</span>'; 
                        } elseif($row['status'] == 'aprovuar'){ 
                            $status = '<span class="badge bg-success px-3 py-2">Aprovuar</span>'; 
                        } else { 
                            $status = '<span class="badge bg-danger px-3 py-2">Refuzuar</span>'; 
                        }
                    ?>

                    <tr>
                        <td class="fw-semibold"><?= $row['id']; ?></td>
                        <td class="fw-bold"><?= htmlspecialchars($row['emri'].' '.$row['mbiemri']); ?></td>
                        <td><?= $status ?></td>

                        <!-- Dokumentet -->
                        <td>
                            <div class="d-flex justify-content-center gap-2">

                                <?php if(!empty($row['qertifikata_lindjes'])): ?>
                                    <img src="../public/public-backend/uploads/<?= htmlspecialchars($row['qertifikata_lindjes']); ?>" 
                                         class="doc-thumb"
                                         data-bs-toggle="modal" 
                                         data-bs-target="#qertModal<?= $row['id']; ?>">
                                    <!-- Modal -->
                                    <div class="modal fade" id="qertModal<?= $row['id']; ?>" tabindex="-1">
                                        <div class="modal-dialog modal-dialog-centered modal-lg">
                                            <div class="modal-content rounded-4">
                                                <div class="modal-header bg-primary text-white">
                                                    <h5 class="modal-title">Qertifikata – <?= htmlspecialchars($row['emri']); ?></h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                </div>
                                                <div class="modal-body text-center">
                                                    <img src="../public/public-backend/uploads/<?= htmlspecialchars($row['qertifikata_lindjes']); ?>" 
                                                         class="img-fluid rounded-3">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endif; ?>

                                <?php if(!empty($row['deftesa'])): ?>
                                    <img src="../public/public-backend/uploads/<?= htmlspecialchars($row['deftesa']); ?>" 
                                         class="doc-thumb"
                                         data-bs-toggle="modal" 
                                         data-bs-target="#deftModal<?= $row['id']; ?>">
                                    <!-- Modal -->
                                    <div class="modal fade" id="deftModal<?= $row['id']; ?>" tabindex="-1">
                                        <div class="modal-dialog modal-dialog-centered modal-lg">
                                            <div class="modal-content rounded-4">
                                                <div class="modal-header bg-primary text-white">
                                                    <h5 class="modal-title">Dëftesa – <?= htmlspecialchars($row['emri']); ?></h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                </div>
                                                <div class="modal-body text-center">
                                                    <img src="../public/public-backend/uploads/<?= htmlspecialchars($row['deftesa']); ?>" 
                                                         class="img-fluid rounded-3">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endif; ?>

                            </div>
                        </td>

                        <td><span class="text-muted"><?= date('d M Y', strtotime($row['created_at'])); ?></span></td>

                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="5" class="py-4 text-muted text-center">
                        <i class="bi bi-inbox fs-3"></i>
                        <div>Nuk ka aplikime.</div>
                    </td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>

<style>
.modern-table tbody tr {
    /* Hiq transform nga rreshti */
    /* transform: scale(1.01); */
    transition: background 0.2s ease; /* vetëm background */
}

.modern-table tbody tr:hover {
    background: #f1f5ff;
    /* nuk e transformojmë rreshtin */
}

.doc-thumb {
    width: 55px;
    height: 55px;
    object-fit: cover;
    border-radius: 10px;
    cursor: pointer;
    transition: transform 0.3s, border-color 0.3s;
    border: 2px solid #eee;
}

.doc-thumb:hover {
    transform: scale(1.15);
    border-color: #0d6efd;
}
.modern-table tbody tr:hover .doc-thumb {
    transform: none !important;
}
</style>