<?php
include('prind-header.php');
include('../classes/Nxenesi.php');

$nx = new Nxenesi();

$id = $_GET['id'] ?? 0;
$id = filter_var($id, FILTER_VALIDATE_INT);

if(!$id){
    echo "<div class='container mt-5 alert alert-danger shadow-sm'>ID e pavlefshme.</div>";
    exit;
}

$nxenesi = $nx->find($id);
if(!$nxenesi){
    echo "<div class='container mt-5 alert alert-danger shadow-sm'>Nxënësi nuk u gjet.</div>";
    exit;
}

$notat = $nx->getNotatNxenesi($id);

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
    if($grade >= 2) return "warning";
    return "danger";
}

$total_gj1 = 0; $count_gj1 = 0;
$total_gj2 = 0; $count_gj2 = 0;

if(!empty($notat)){
    foreach($notat as $row){
        $avg1 = avg_grade($row['gj1_p1'],$row['gj1_p2']);
        $avg2 = avg_grade($row['gj2_p1'],$row['gj2_p2']);

        if($avg1 !== null){ $total_gj1 += $avg1; $count_gj1++; }
        if($avg2 !== null){ $total_gj2 += $avg2; $count_gj2++; }
    }
}

$mesatarja_gj1 = $count_gj1 > 0 ? $total_gj1/$count_gj1 : null;
$mesatarja_gj2 = $count_gj2 > 0 ? $total_gj2/$count_gj2 : null;

$vals = [];
if($mesatarja_gj1 !== null) $vals[] = $mesatarja_gj1;
if($mesatarja_gj2 !== null) $vals[] = $mesatarja_gj2;

$mesatarja_vjetore = count($vals) > 0 ? array_sum($vals)/count($vals) : null;

$color = $mesatarja_vjetore !== null ? grade_color($mesatarja_vjetore) : "secondary";
?>

<div class="container my-5" style="min-height:55vh">

    <div class="card shadow-lg border-0 rounded-4 fade-up">

        <!-- HEADER -->
        <div class="card-header d-flex justify-content-between text-white p-4 rounded-top-4"
             style="background: linear-gradient(135deg,#0d6efd,#0dcaf0);">

            <h4 class="mb-0 fw-bold">
                <i class="bi bi-graph-up-arrow me-2"></i>
                Raporti i Nxënësit:
                <?= htmlspecialchars($nxenesi['emri'].' '.$nxenesi['mbiemri']) ?>
            </h4>

            <div class="mb-0 w-25">
                <a href="<?= BASE_URL ?>/prind/prind-nxenes.php" class="text-decoration-none text-white btn btn-outline-dark w-75 p-3">Kthehu</a>
            </div>

        </div>

        <div class="card-body p-4">

        <?php if(!empty($notat)): ?>

            <div class="table-responsive">
                <table class="table align-middle text-center">

                    <thead class="table-light">
                        <tr>
                            <th>Mesatarja Gj. I</th>
                            <th>Mesatarja Gj. II</th>
                            <th>Mesatarja Vjetore</th>
                            <th>Mungesat</th>
                            <th>Me Arsye</th>
                            <th>Pa Arsye</th>
                            <th>Nota Sjelljes</th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr class="fw-semibold">

                            <td>
                                <span class="badge bg-info px-3 py-2 fs-6">
                                    <?= is_numeric($mesatarja_gj1) ? number_format($mesatarja_gj1,2) : '-' ?>
                                </span>
                            </td>

                            <td>
                                <span class="badge bg-primary px-3 py-2 fs-6">
                                    <?= is_numeric($mesatarja_gj2) ? number_format($mesatarja_gj2,2) : '-' ?>
                                </span>
                            </td>

                            <td>
                                <span class="badge bg-<?= $color ?> px-4 py-2 fs-5">
                                    <?= is_numeric($mesatarja_vjetore) ? round($mesatarja_vjetore) : '-' ?>
                                </span>

                                <?php if($mesatarja_vjetore !== null): ?>
                                    <div class="progress mt-3" style="height:8px;">
                                        <div class="progress-bar bg-<?= $color ?>"
                                             style="width: <?= ($mesatarja_vjetore/5)*100 ?>%">
                                        </div>
                                    </div>
                                <?php endif; ?>
                            </td>

                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>

                        </tr>
                    </tbody>

                </table>
            </div>

        <?php else: ?>

            <div class="text-center py-4">
                <i class="bi bi-exclamation-circle text-warning fs-1"></i>
                <p class="mt-3 text-muted">Nuk ka raport për këtë nxënës.</p>
            </div>

        <?php endif; ?>

        </div>

    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>


<?php include('prind-footer.php'); ?>