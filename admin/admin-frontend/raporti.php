<?php
include('../admin-header.php');
include('../../classes/Nxenesi.php');


$nx = new Nxenesi();


$id = $_GET['id'] ?? 0;
$id = filter_var($id, FILTER_VALIDATE_INT);

if(!$id){
    echo "<div class='container mt-5 alert alert-danger'>ID e pavlefshme.</div>";
    exit;
}


$nxenesi = $nx->find($id);
if(!$nxenesi){
    echo "<div class='container mt-5 alert alert-danger'>Nxënësi nuk u gjet.</div>";
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

$total_gj1 = 0;
$count_gj1 = 0;
$total_gj2 = 0;
$count_gj2 = 0;
?>

<div class="container my-5" style="min-height:40vh">

    <h2 class="mb-4">
        Raporti i Nxënësit:
        <?= htmlspecialchars($nxenesi['emri'] . ' ' . $nxenesi['mbiemri']) ?>
    </h2>

    <div class="table-responsive">
        <table class="table table-bordered table-striped text-center">
            <thead class="table-light">
                <tr>
                    <th>Nxënësi</th>
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

<?php if(!empty($notat)): ?>

<?php
foreach($notat as $row){

    $avg1 = avg_grade($row['gj1_p1'],$row['gj1_p2']);
    $avg2 = avg_grade($row['gj2_p1'],$row['gj2_p2']);

    if($avg1 !== null){
        $total_gj1 += $avg1;
        $count_gj1++;
    }

    if($avg2 !== null){
        $total_gj2 += $avg2;
        $count_gj2++;
    }
}

$mesatarja_gj1 = $count_gj1 > 0 ? $total_gj1/$count_gj1 : null;
$mesatarja_gj2 = $count_gj2 > 0 ? $total_gj2/$count_gj2 : null;

$vals = [];
if($mesatarja_gj1 !== null) $vals[] = $mesatarja_gj1;
if($mesatarja_gj2 !== null) $vals[] = $mesatarja_gj2;

$mesatarja_vjetore = count($vals) > 0 
    ? array_sum($vals)/count($vals)
    : null;
?>

<tr class="table-primary fw-bold">
    <td>
        <?= htmlspecialchars($nxenesi['emri'].' '.$nxenesi['mbiemri']) ?>
    </td>

    <td>
        <?= is_numeric($mesatarja_gj1) ? number_format($mesatarja_gj1,2) : '-' ?>
    </td>

    <td>
        <?= is_numeric($mesatarja_gj2) ? number_format($mesatarja_gj2,2) : '-' ?>
    </td>

    <td>
        <?= is_numeric($mesatarja_vjetore) ? round($mesatarja_vjetore) : '-' ?>
    </td>

    <td>-</td>
    <td>-</td>
    <td>-</td>
    <td>-</td>
</tr>

<?php else: ?>

<tr>
    <td colspan="8">Nuk ka raport.</td>
</tr>

<?php endif; ?>

            </tbody>
        </table>
    </div>

</div>