<div class="table-responsive">
    <table class="table table-bordered table-hover align-middle text-center">
        <thead class="table-dark">
            <tr>
                <th>#</th>
                <th>Emri</th>
                <th>Mbiemri</th>
                <th>Statusi</th>
                <th>Qertifikata e Lindjes</th>
                <th>Dëftesa</th>
                <th>Data</th>
            </tr>
        </thead>
        <tbody>
    <?php if (!empty($aplikimet)): ?>
        <?php foreach ($aplikimet as $row): ?>
            <tr>
                <td><?= $row['id']; ?></td>
                <td><?= $row['emri']; ?></td>
                <td><?= $row['mbiemri']; ?></td>
                <td>
                    <?php
                        if ($row['status'] == 'ne pritje') {
                            echo '<span class="badge bg-warning text-dark">Në pritje</span>';
                        } elseif ($row['status'] == 'aprovuar') {
                            echo '<span class="badge bg-success">Aprovuar</span>';
                        } else {
                            echo '<span class="badge bg-danger">Refuzuar</span>';
                        }
                    ?>
                </td>

                <td>
                    <img src="../public/public-backend/uploads/<?= htmlspecialchars($row['qertifikata_lindjes']); ?>" 
                         style="width:70px; cursor:pointer;" 
                         data-bs-toggle="modal" 
                         data-bs-target="#qertModal<?= $row['id']; ?>">

                    <!-- Modal -->
                    <div class="modal fade" id="qertModal<?= $row['id']; ?>" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Qertifikata e Lindjes - <?= $row['emri']; ?></h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body text-center">
                                    <img src="../public/public-backend/uploads/<?= htmlspecialchars($row['qertifikata_lindjes']); ?>" class="img-fluid">
                                </div>
                            </div>
                        </div>
                    </div>
                </td>

                <td>
                    <img src="../public/public-backend/uploads/<?= htmlspecialchars($row['deftesa']); ?>" 
                         style="width:70px; cursor:pointer;" 
                         data-bs-toggle="modal" 
                         data-bs-target="#deftModal<?= $row['id']; ?>">

                    <!-- Modal -->
                    <div class="modal fade" id="deftModal<?= $row['id']; ?>" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Deftesa - <?= $row['emri']; ?></h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body text-center">
                                    <img src="../public/public-backend/uploads/<?= htmlspecialchars($row['deftesa']); ?>" class="img-fluid">
                                </div>
                            </div>
                        </div>
                    </div>
                </td>

                <td><?= date('d-m-Y', strtotime($row['created_at'])); ?></td>

            </tr>
        <?php endforeach; ?>
    <?php else: ?>
        <tr>
            <td colspan="7">Nuk ka aplikime.</td>
        </tr>
    <?php endif; ?>
</tbody>

    </table>
</div>