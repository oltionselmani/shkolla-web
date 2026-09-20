<?php
include('../classes/Nxenesi.php');
include('prof-header.php');

$nx = new Nxenesi();


if(!isset($_SESSION['is_prof']) || !$_SESSION['is_prof']) {
    header("Location: ../llogaria/login_form.php");
    exit;
}


$prof_klasa = isset($_SESSION['kujdestar_klasa']) ? trim($_SESSION['kujdestar_klasa']) : '';
$search = $_POST['search'] ?? '';

$nxenesit = [];

if($prof_klasa) {
    if($search != '') {

        $nxenesit = $nx->kerko_nxenesin_klase($prof_klasa, $search);
    } else {

        $nxenesit = $nx->nxenesit_sipas_klase_prof($prof_klasa);
    }
} else {
    echo "<div class='alert alert-warning'>Kujdestar_klasa nuk është caktuar për këtë profesor.</div>";
}


?>

<div class="container" style="height: 78.3vh">
    <div class="row justify-content-center">
        <div class="col-md-11">

            <div class="my-3 d-flex justify-content-between align-items-center">
                <p class="display-1">Nxënësit e Klasës Suaj (<?= htmlspecialchars($prof_klasa); ?>)</p>
            </div>

            <!-- Search -->
            <form method="POST" action="">
                <div class="row mb-4">
                    <div class="col-md-12 input-group">
                        <input 
                            type="text" 
                            name="search" 
                            class="form-control w-75" 
                            placeholder="Kërko nxënësin sipas emrit..." 
                            value="<?= htmlspecialchars($search); ?>"
                        >
                        <button type="submit" class="btn btn-primary w-25">Search</button>
                    </div>
                </div>
            </form>

            <!-- Tabela -->
            <div class="table-responsive">
                <table class="table table-striped table-bordered text-center align-middle">
                <thead class="table-light">
                    <tr>
                        <th>Emri</th>
                        <th>Mbiemri</th>
                        <th>Klasa</th>
                        <th>Prindi</th>
                        <th>Telefoni Prindit</th>
                        <th>Notat</th>
                        <th>Mungesat</th>
                        <th>Raporti</th>
                    </tr>
                </thead>

                <tbody>
                <?php if(!empty($nxenesit)): ?>
                    <?php foreach($nxenesit as $nx): ?>
                        <tr>
                            <td><?= htmlspecialchars($nx['emri']); ?></td>
                            <td><?= htmlspecialchars($nx['mbiemri']); ?></td>
                            <td><?= htmlspecialchars($nx['klasa']); ?></td>
                            <td><?= htmlspecialchars($nx['prindi'] ?? '-'); ?></td>
                            <td><?= htmlspecialchars($nx['telefoni'] ?? '-'); ?></td>
                            
                            <td>
                                <a href="<?= BASE_URL ?>prof/notat_form.php?id=<?php echo $nx['id']; ?>" class="btn btn-info btn-sm my-1" >Shto Nota</a>
                                <a href="<?= BASE_URL ?>prof/lista_notave.php?id=<?php echo $nx['id']; ?>" class="btn btn-info btn-sm my-1" >Lista Notave</a>    
                            </td>
        
                            <td>
                                <a href="mungesat.php?id=<?php echo $nx['id']; ?>" class="btn btn-primary btn-sm my-1" >Shto Mungesa</a>
                                <a href="mungesat.php?id=<?php echo $nx['id']; ?>" class="btn btn-primary btn-sm my-1"  >Lista Mungesave</a>
                            </td>
                            
                            <td>
                                <a href="<?= BASE_URL ?>prof/raporti.php?id=<?php echo $nx['id']; ?>" class="btn btn-secondary btn-sm" style="width: 100%">Raporti</a>
                            </td>
                            
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="6">Nuk ka nxënës në klasën tuaj</td>
                    </tr>
                <?php endif; ?>
                </tbody>
            </table>
            </div>

        </div>
    </div>
</div>

<?php
include('prof-footer.php');
?>