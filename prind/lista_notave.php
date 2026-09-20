<?php
include('prind-header.php');
include('../classes/Nxenesi.php');

$nx = new Nxenesi();
$nota = new Nxenesi();

$id = $_GET['id'] ?? 0;
$id = filter_var($id, FILTER_VALIDATE_INT);

$nxenesi_data = $nx->find($id);

if(!$nxenesi_data){
    echo "<div class='container my-5'>
            <div class='alert alert-danger text-center shadow-sm'>
                Nxënësi nuk u gjet.
            </div>
          </div>";
    exit;
}

$result_notat = $nota->getNotatNxenesi($id);

function avg_grade($g1, $g2){
    $grades = [];
    if(is_numeric($g1)) $grades[] = $g1;
    if(is_numeric($g2)) $grades[] = $g2;
    if(count($grades) == 0) return null;
    return array_sum($grades)/count($grades);
}



    function grade_color($grade){
        if($grade >= 4.5) return "success";
        if($grade >= 3.5) return "primary";
        if($grade >= 2.5) return "warning";
        if($grade >= 1) return "danger";
        return "danger";
    }
?>

<div class="container my-5" style="min-height:60vh;">

    <div class="card shadow-lg border-0 rounded-4">

        <!-- HEADER -->
        <div class="card-header d-flex justify-content-between text-white rounded-top-4 p-4"
             style="background: linear-gradient(135deg,#0d6efd,#0dcaf0);">

            <h4 class="mb-0 fw-bold">
                <i class="bi bi-person-badge me-2"></i>
                <?= htmlspecialchars($nxenesi_data['emri'].' '.$nxenesi_data['mbiemri']) ?>
                <span class="badge bg-light text-dark ms-2">
                    Klasa <?= $nxenesi_data['klasa'] ?>
                </span>
            </h4>

            <a href="<?= BASE_URL ?>/prind/prind-nxenes.php"
               class="btn btn-outline-light btn-sm p-3 w-25">
               <i class="bi bi-arrow-left me-1"></i> Kthehu
            </a>

        </div>

        <div class="card-body p-4">

        <?php if(!empty($result_notat)): ?>

            <div class="table-responsive fade-up">
                <table class="table align-middle text-center table-hover">

                <thead class="table-light">
                    <tr>
                        <th>Lënda</th>
                        <th>Gjysmëvjetori I</th>
                        <th>Gjysmëvjetori II</th>
                        <th>Nota Finale</th>
                    </tr>
                </thead>

                <tbody>

                <?php foreach($result_notat as $row): ?>

                    <?php
                        $avg1  = avg_grade($row['gj1_p1'], $row['gj1_p2']);
                        $avg2  = avg_grade($row['gj2_p1'], $row['gj2_p2']);
                        $final = avg_grade($avg1, $avg2);
                        $color = $final !== null ? grade_color($final) : "secondary";
                    ?>

                    <tr class="fade-up">

                        <td class="fw-semibold">
                            <?= htmlspecialchars($row['lenda']) ?>
                        </td>

                        <!-- GJYSMVJETORI I -->
                        <td>
                            <div class="d-flex tabel-hover" 
                                 style="height:100px; border:1px solid #dee2e6; border-radius:8px; overflow:hidden;">                        

                                <!-- MAJTAS (50%) -->
                                <div class="d-flex flex-column"
                                     style="width:50%; border-right:1px solid #dee2e6;">                        

                                    <!-- P1 (50% height) -->
                                    <div class="d-flex justify-content-center align-items-center"
                                         style="height:50%; border-bottom:1px solid #dee2e6;">
                                        <?= is_numeric($row['gj1_p1']) ? $row['gj1_p1'] : '-' ?>
                                    </div>                        

                                    <!-- P2 (50% height) -->
                                    <div class="d-flex justify-content-center align-items-center"
                                         style="height:50%;">
                                        <?= is_numeric($row['gj1_p2']) ? $row['gj1_p2'] : '-' ?>
                                    </div>                        

                                </div>                        

                                <!-- DJATHTAS (50%) -->
                                <div class="d-flex justify-content-center align-items-center bg-light"
                                     style="width:50%; font-weight:bold; font-size:18px;">
                                    <?= $avg1 !== null ? round($avg1) : '-' ?>
                                </div>                        

                            </div>
                        </td>

                         <!-- GJYSMEVJETORI II -->
                    <td>
                        <div class="d-flex tabel-hover" 
                             style="height:100px; border:1px solid #dee2e6; border-radius:8px; overflow:hidden;">

                            <!-- MAJTAS -->
                            <div class="d-flex flex-column justify-content-center align-items-center"
                                 style="width:50%; border-right:1px solid #dee2e6;">

                                <div class="d-flex justify-content-center align-items-center w-100"
                                     style="height:50%; border-bottom:1px solid #dee2e6;">
                                    <?= is_numeric($row['gj2_p1']) ? $row['gj2_p1'] : '-' ?>
                                </div>

                                <div class="d-flex justify-content-center align-items-center w-100"
                                     style="height:50%;">
                                    <?= is_numeric($row['gj2_p2']) ? $row['gj2_p2'] : '-' ?>
                                </div>

                            </div>

                            <!-- DJATHTAS -->
                            <div class="d-flex justify-content-center align-items-center flex-fill bg-light">
                                <span class="fw-bold fs-5">
                                    <?= $avg2 !== null ? round($avg2) : '-' ?>
                                </span>
                            </div>

                        </div>
                    </td>


                        <!-- FINAL -->
                        <td>
                            <span class="badge bg-<?= $color ?> fs-5 px-4 py-2">
                                <?= $final !== null ? round($final) : '-' ?>
                            </span>
                        </td>

                    </tr>

                <?php endforeach; ?>

                </tbody>
                </table>
            </div>

        <?php else: ?>

            <div class="text-center py-4">
                <i class="bi bi-exclamation-circle text-warning fs-1"></i>
                <p class="mt-3 text-muted">
                    Nuk ka nota për këtë nxënës.
                </p>
            </div>

        <?php endif; ?>

        </div>
    </div>
</div>

<style>
.tabel-hover {
    justify-content:center;
    /* padding:10px; */
    border-radius:12px;
    background:#f8f9fa;
    min-height:100px;
    transition:0.3s;
}

.tabel-hover:hover {
    transform:scale(1.05);
}

.table-hover tbody tr:hover {
    background-color:#f1f5ff;
    transition:0.3s;
}

.card {
    border-radius:20px;
}
</style>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<?php include('prind-footer.php'); ?>