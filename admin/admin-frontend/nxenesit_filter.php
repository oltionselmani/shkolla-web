<?php
include('../admin-header.php');
include('../../classes/Nxenesi.php');

$nx = new Nxenesi();


$drejtimet = $nx->index_drejtimi();


$drejtim_id = isset($_GET['drejtim_id']) ? intval($_GET['drejtim_id']) : 0;
$klasa = isset($_GET['klasa']) ? $_GET['klasa'] : '';


$nxenesit = [];
if($drejtim_id && $klasa){
    $nxenesit = $nx->nxenesit_sipas_drejtimi_dhe_klase($drejtim_id, $klasa);
}

?>



<div class="container my-5" style="min-height:54vh">
    <h2 class="mb-4 text-center">Nxënësit Aktivë sipas Drejtimit dhe Klasës</h2>

    <div class="row mb-4">
        <?php foreach($drejtimet as $drejtim): ?>
            <div class="col-md-6 mb-3">
                <div class="card shadow-sm p-3">
                    <h5><?= htmlspecialchars($drejtim['drejtimi']); ?></h5>

                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                            Zgjidh Klasën
                        </button>
                        <ul class="dropdown-menu">
                            <?php for($k=10; $k<=12; $k++): ?>
                                <li>
                                    <a class="dropdown-item" href="?drejtim_id=<?= $drejtim['id']; ?>&klasa=<?= $k; ?>">
                                        Klasa <?= $k; ?>
                                    </a>
                                </li>
                            <?php endfor; ?>
                        </ul>
                    </div>


                </div>
            </div>
        <?php endforeach; ?>
    </div>

    <?php if(!empty($nxenesit)): ?>
    <h4 class="mb-3">
        Nxënësit e Drejtimit <?= htmlspecialchars($nxenesit[0]['drejtimi']); ?> - Klasa <?= $klasa; ?>
    </h4>
    <div class="table-responsive">
        <table class="table table-bordered table-hover align-middle text-center">
            <thead class="table-dark">
                <tr>

                    <th>Emri</th>
                    <th>Mbiemri</th>
                    <th>Klasa</th>
                    <th>Prindi</th>
                    <th>Telefoni Prindit</th>
                    <th>Veprimet</th>
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
                        <td><?= $nx['prindi'] ?? '-'; ?></td>
                        <td><?= $nx['telefoni'] ?? '-'; ?></td>

                        <td>
                            <a href="<?= BASE_URL ?>admin/admin-frontend/nxenesi_edit_form.php?id=<?php echo $nx['id']; ?>" class="btn btn-warning btn-sm my-1" >Edit</a>
                            <a href="<?= BASE_URL ?>admin/admin-backend/nxenesi_fshi.php?id=<?php echo $nx['id']; ?>" class="btn btn-danger btn-sm my-1"   onclick="return confirm('A je i sigurt që dëshiron ta fshish këtë nxënës?');">Fshi</a>
                        </td>
    
                        <td>
                            <a href="<?= BASE_URL ?>admin/admin-frontend/notat_form.php?id=<?php echo $nx['id']; ?>" class="btn btn-info btn-sm my-1" >Shto Nota</a>
                            <a href="<?= BASE_URL ?>admin/admin-frontend/lista_notave.php?id=<?php echo $nx['id']; ?>" class="btn btn-info btn-sm my-1" >Lista Notave</a>    
                        </td>
    
                        <td>
                            <a href="mungesat.php?id=<?php echo $nx['id']; ?>" class="btn btn-primary btn-sm my-1" >Shto Mungesa</a>
                            <a href="mungesat.php?id=<?php echo $nx['id']; ?>" class="btn btn-primary btn-sm my-1"  >Lista Mungesave</a>
                        </td>
                        
                        <td>
                        <a href="<?= BASE_URL ?>admin/admin-frontend/raporti.php?id=<?php echo $nx['id']; ?>" class="btn btn-secondary btn-sm" style="width: 100%">Raporti</a>
                    </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
<?php endif; ?>


</div>