<?php
include('../classes/Aplikimet.php');
include('prof-header.php');

$aplikimet = new Aplikimet();

$drejtim_shoqeror_id = 2; 
// $result = $aplikimet->aplikimet_sipas_drejtimi($drejtim_shoqeror_id);
$result = $aplikimet->aplikimet_sipas_drejtimi_dhe_status($drejtim_shoqeror_id, 'ne pritje');

?>

<div class="container my-5"  style="min-height:54vh">
    <h2 class="mb-4 text-center">Lista e Aplikimeve - Drejtimi Shoqëror</h2>

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
                <th>Veprimet</th>
            </tr>
        </thead>
        <tbody>
            <?php if ($result->num_rows > 0): ?>
                <?php while ($row = $result->fetch_assoc()): ?>
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
                        <!-- Qertifikata e Lindjes me modal -->
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
                                            <img src="../public/public-backend/uploads/<?= htmlspecialchars($row['qertifikata_lindjes']); ?>" 
                                                 class="img-fluid">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>

                        <!-- Deftesa me modal -->
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
                                            <img src="../public/public-backend/uploads/<?= htmlspecialchars($row['deftesa']); ?>" 
                                                 class="img-fluid">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>

                        <td><?= date('d-m-Y', strtotime($row['created_at'])); ?></td>
                        <td>
                            <a href="aprovo_shoqeror.php?id=<?= $row['id'] ?>" class="btn btn-success btn-sm">Aprovo</a>
                            <a href="refuzo_shoqeror.php?id=<?= $row['id'] ?>" class="btn btn-danger btn-sm">Refuzo</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            <?php else: ?>
                <tr>
                    <td colspan="9">Nuk ka aplikime.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>

</div>


<?php
include('prof-footer.php');
?>