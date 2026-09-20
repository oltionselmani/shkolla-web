<?php
include('prind-header.php'); 
include('../classes/Nxenesi.php');

$nxenesi = new Nxenesi();
$nxenesit = $nxenesi->nxenesit_e_prindit($_SESSION['user_id']);
?>

<div class="container my-5">
    <h2 class="mb-4">Notat e Femijëve</h2>

    <?php foreach($nxenesit as $nx): ?>
        <h4><?= htmlspecialchars($nx['emri'] . ' ' . $nx['mbiemri']) ?> (Klasa <?= $nx['klasa'] ?>)</h4>
        <?php
        $notat = $nota->getNotatNxenesi($nx['id']);
        if(count($notat) == 0) {
            echo "<p class='text-warning'>Ende nuk ka nota për këtë nxënës.</p>";
        } else {
        ?>
        <table class="table table-bordered mb-4">
            <thead class="table-dark">
                <tr>
                    <th>Lënda</th>
                    <th>GJ1 P1</th>
                    <th>GJ1 P2</th>
                    <th>GJ2 P1</th>
                    <th>GJ2 P2</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($notat as $n): ?>
                    <tr>
                        <td><?= htmlspecialchars($n['lenda']) ?></td>
                        <td><?= $n['gj1_p1'] ?? '-' ?></td>
                        <td><?= $n['gj1_p2'] ?? '-' ?></td>
                        <td><?= $n['gj2_p1'] ?? '-' ?></td>
                        <td><?= $n['gj2_p2'] ?? '-' ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <?php } ?>
    <?php endforeach; ?>
</div>

<?php include('../footer.php'); ?>
