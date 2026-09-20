<?php
include('prof-header.php');
include('../classes/Nxenesi.php');

$nx = new Nxenesi();
$nota = new Nxenesi();


$id = $_GET['id'] ?? 0;
$id = filter_var($id, FILTER_VALIDATE_INT);


$nxenesi_data = $nx->find($id);
if(!$nxenesi_data){
    echo "<div class='container my-5'>
            <p class='alert alert-danger text-center'>Nxënësi nuk u gjet.</p>
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

<style>

.card {
    border-radius: 20px;
}

.grade-box {
    display: flex;
    height: 100px;
    border: 1px solid #dee2e6;
    border-radius: 12px;
    overflow: hidden;
    background: #f8f9fa;
    transition: 0.3s;
}

.grade-box:hover {
    transform: scale(1.05);
}

.grade-left {
    width: 50%;
    display: flex;
    flex-direction: column;
    border-right: 1px solid #dee2e6;
}

.grade-left .half {
    height: 50%;
    display: flex;
    justify-content: center;
    align-items: center;
}

.grade-right {
    width: 50%;
    display: flex;
    justify-content: center;
    align-items: center;
    font-weight: bold;
    font-size: 18px;
    background: #ffffff;
}

.table-hover tbody tr:hover {
    background-color: #f1f5ff;
    transition: 0.3s;
}

</style>

<div class="container my-5" style="min-height:60vh;">

    <div class="card shadow-lg border-0 rounded-4">

        <!-- HEADER -->
        <div class="card-header d-flex justify-content-between text-white rounded-top-4 p-4"
             style="background: linear-gradient(135deg,#0d6efd,#0dcaf0);">

            <h4 class="mb-0 fw-bold">
                <i class="bi bi-journal-check me-2"></i>
                Notat e Nxënësit
                <div class="mt-2 fs-5 fw-normal">
                    <?= htmlspecialchars($nxenesi_data['emri'].' '.$nxenesi_data['mbiemri']) ?>
                </div>
            </h4>

            <a href="<?= BASE_URL ?>/prof/nxenesit.php"
               class="btn btn-outline-light btn-sm p-3 w-25">
               <i class="bi bi-arrow-left me-1"></i> Kthehu
            </a>

        </div>

        <div class="card-body p-4">

        <?php if(!empty($result_notat)): ?>

            <div class="table-responsive">
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

                    <tr>

                        <td class="fw-semibold">
                            <?= htmlspecialchars($row['lenda']) ?>
                        </td>

                        <!-- GJYSMEVJETORI I -->
                        <td>
                            <div class="grade-box">

                                <div class="grade-left">
                                    <div class="half">
                                        <?= is_numeric($row['gj1_p1']) ? $row['gj1_p1'] : '-' ?>
                                    </div>
                                    <div class="half border-top">
                                        <?= is_numeric($row['gj1_p2']) ? $row['gj1_p2'] : '-' ?>
                                    </div>
                                </div>

                                <div class="grade-right">
                                    <?= $avg1 !== null ? round($avg1) : '-' ?>
                                </div>

                            </div>
                        </td>

                        <!-- GJYSMEVJETORI II -->
                        <td>
                            <div class="grade-box">

                                <div class="grade-left">
                                    <div class="half">
                                        <?= is_numeric($row['gj2_p1']) ? $row['gj2_p1'] : '-' ?>
                                    </div>
                                    <div class="half border-top">
                                        <?= is_numeric($row['gj2_p2']) ? $row['gj2_p2'] : '-' ?>
                                    </div>
                                </div>

                                <div class="grade-right">
                                    <?= $avg2 !== null ? round($avg2) : '-' ?>
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
