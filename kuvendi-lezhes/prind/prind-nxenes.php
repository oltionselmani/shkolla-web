<?php
include('../classes/Nxenesi.php');
include('prind-header.php');

$nx = new Nxenesi();

$prind_id = $_SESSION['user_id'];

$nxenesit = $nx->nxenesit_e_prind($prind_id);
?>

<div class="container my-5">
    <h3 class="mb-4 text-center">Fëmijët e mi</h3>

    <?php if(!empty($nxenesit)): ?>
        <div class="table-responsive">
            <table class="table table-bordered table-hover align-middle text-center">
                <thead class="table-dark">

                        <th>Emri</th>
                        <th>Mbiemri</th>
                        <th>Klasa</th>
                        <th>Drejtimi</th>
                        <th>Kujdestar/e</th>
                        <th>Notat</th>
                        <th>Mungesat</th>
                        <th>Raporti</th>

                    </tr>
                </thead>
                <tbody>
                    <?php foreach($nxenesit as $nx): ?>
                        <tr>

                            <td><?= $nx['emri']; ?></td>
                            <td><?= $nx['mbiemri']; ?></td>
                            <td><?= $nx['klasa']; ?></td>
                            <td><?= $nx['drejtimi']; ?></td>
                            <td><?=  ($nx['kujdestar_emri'] ?? '-') . ' ' . ($nx['kujdestar_mbiemri'] ?? '-') ?></td>
                            
                            <td>
                                <a href="<?= BASE_URL ?>prind/lista_notave.php?id=<?php echo $nx['id']; ?>" class="btn btn-info btn-sm my-1">Shiko Notat e Fëmijës</a>    
                            </td>
        
                            <td>
                                <a href="mungesat.php?id=<?php echo $nx['id']; ?>" class="btn btn-primary btn-sm my-1">Lista e Mungesave të Fëmijës</a>
                            </td>
                            
                            <td>
                                <a href="<?= BASE_URL ?>prind/raporti.php?id=<?php echo $nx['id']; ?>" class="btn btn-secondary btn-sm" style="width: 100%">Raporti</a>
                            </td>

                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    <?php else: ?>
        <div class="alert alert-info text-center">
            Nuk ka të dhëna për fëmijë.
        </div>
    <?php endif; ?>
</div>