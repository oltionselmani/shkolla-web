<?php
include('../admin-header.php');
include('../../classes/Nxenesi.php');

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
?>

<div class="container my-5">
    <h2 class="mb-4">
        Notat e Nxënësit: 
        <?= htmlspecialchars($nxenesi_data['emri'] . ' ' . $nxenesi_data['mbiemri']) ?>
    </h2>

    <div class="table-responsive">
        <table class="table table-bordered table-striped">
        <thead class="table-light">
            <tr>
                <th>Lënda</th>
                <th>Gjysmëvjetori I</th>
                <th>Gjysmëvjetori II</th>
                <th>Nota Përfundimtare</th>
            </tr>
        </thead>

        <tbody>
        <?php if(!empty($result_notat)): ?>
            <?php foreach($result_notat as $row): ?>

                <?php
                    $avg1  = avg_grade($row['gj1_p1'], $row['gj1_p2']);
                    $avg2  = avg_grade($row['gj2_p1'], $row['gj2_p2']);
                    $final = avg_grade($avg1, $avg2);
                ?>

                <tr>
                    <td><?= htmlspecialchars($row['lenda']) ?></td>

                    <!-- GJYSMEVJETORI I -->
                    <td>
                        <div class="d-flex" 
                             style="height:100px; border:1px solid #dee2e6; border-radius:8px; overflow:hidden;">

                            <div class="d-flex flex-column justify-content-center align-items-center flex-fill"
                                 style="border-right:1px solid #dee2e6;">

                                <div class="py-2 w-100 text-center border-bottom">
                                    <?= is_numeric($row['gj1_p1']) ? $row['gj1_p1'] : '-' ?>
                                </div>

                                <div class="py-2 w-100 text-center">
                                    <?= is_numeric($row['gj1_p2']) ? $row['gj1_p2'] : '-' ?>
                                </div>
                            </div>

                            <div class="d-flex justify-content-center align-items-center flex-fill bg-light">
                                <span class="fw-bold fs-5">
                                    <?= $avg1 !== null ? round($avg1) : '-' ?>
                                </span>
                            </div>

                        </div>
                    </td>


                    <!-- GJYSMEVJETORI II -->
                    <td>
                        <div class="d-flex" 
                             style="height:100px; border:1px solid #dee2e6; border-radius:8px; overflow:hidden;">

                            <div class="d-flex flex-column justify-content-center align-items-center flex-fill"
                                 style="border-right:1px solid #dee2e6;">

                                <div class="py-2 w-100 text-center border-bottom">
                                    <?= is_numeric($row['gj2_p1']) ? $row['gj2_p1'] : '-' ?>
                                </div>

                                <div class="py-2 w-100 text-center">
                                    <?= is_numeric($row['gj2_p2']) ? $row['gj2_p2'] : '-' ?>
                                </div>
                            </div>

                            <div class="d-flex justify-content-center align-items-center flex-fill bg-light">
                                <span class="fw-bold fs-5">
                                    <?= $avg2 !== null ? round($avg2) : '-' ?>
                                </span>
                            </div>

                        </div>
                    </td>


                    <!-- NOTA PERFUNDIMTARE -->
                    <td class="p-2">
                        <div class="d-flex justify-content-center align-items-center bg-light"
                             style="height:100%; min-height:100px;">

                            <span class="fw-bold fs-4">
                                <?= $final !== null ? round($final) : '-' ?>
                            </span>

                        </div>
                    </td>

                </tr>

            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="4" class="text-center">
                    Nuk ka nota për këtë nxënës.
                </td>
            </tr>
        <?php endif; ?>
        </tbody>
        </table>
    </div>
</div>
