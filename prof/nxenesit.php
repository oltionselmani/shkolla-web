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

<div class="container my-5" style="min-height:60vh;">

    <!-- TITULLI -->
    <div class="text-center mb-5">
        <h2 class="fw-bold text-primary">
            <i class="bi bi-people-fill me-2"></i> Nxënësit e Klasës Suaj
        </h2>
        <p class="text-muted">
            Klasa: 
            <span class="badge bg-info text-dark px-3 py-2">
                <?= htmlspecialchars($prof_klasa); ?>
            </span>
        </p>
    </div>

    <!-- SEARCH -->
    <div class="card shadow-lg border-0 rounded-4 mb-4">
        <div class="card-body p-4">
            <form method="POST" action="">
                <div class="input-group">
                    <input 
                        type="text" 
                        name="search" 
                        class="form-control" 
                        placeholder="Kërko nxënësin sipas emrit..."
                        value="<?= htmlspecialchars($search); ?>"
                    >
                    <button type="submit" class="btn btn-primary">
                        <i class="bi bi-search me-1"></i> Kërko
                    </button>
                </div>
            </form>
        </div>
    </div>

    <?php if(!empty($nxenesit)): ?>

    <div class="card shadow-lg border-0 rounded-4 fade-up">
        <div class="card-body p-4">

            <div class="table-responsive">
                <table class="table align-middle text-center table-hover">

                    <thead class="bg-primary text-white">
                        <tr>
                            <th>Emri</th>
                            <th>Mbiemri</th>
                            <th>Klasa</th>
                            <th>Prindi</th>
                            <th>Telefoni</th>
                            <th>Veprime</th>
                        </tr>
                    </thead>

                    <tbody>

                    <?php foreach($nxenesit as $nx): ?>
                        <tr class="table-row">

                            <td class="fw-semibold">
                                <?= htmlspecialchars($nx['emri']); ?>
                            </td>

                            <td>
                                <?= htmlspecialchars($nx['mbiemri']); ?>
                            </td>

                            <td>
                                <span class="badge bg-info text-dark px-3 py-2">
                                    <?= htmlspecialchars($nx['klasa']); ?>
                                </span>
                            </td>

                            <td>
                                <?= htmlspecialchars($nx['prindi'] ?? '-'); ?>
                            </td>

                            <td>
                                <?= htmlspecialchars($nx['telefoni'] ?? '-'); ?>
                            </td>

                            <td>
                                <div class="d-flex flex-wrap justify-content-center gap-2">

                                    <a href="<?= BASE_URL ?>prof/notat_form.php?id=<?= $nx['id']; ?>" 
                                       class="btn btn-sm btn-outline-success">
                                       <i class="bi bi-plus-circle me-1"></i> Shto Nota
                                    </a>

                                    <a href="<?= BASE_URL ?>prof/lista_notave.php?id=<?= $nx['id']; ?>" 
                                       class="btn btn-sm btn-outline-info">
                                       <i class="bi bi-journal-text me-1"></i> Lista Notave
                                    </a>

                                    <a href="mungesat.php?id=<?= $nx['id']; ?>" 
                                       class="btn btn-sm btn-outline-danger">
                                       <i class="bi bi-plus-circle me-1"></i> Mungesat
                                    </a>

                                    <a href="mungesat.php?id=<?= $nx['id']; ?>" 
                                       class="btn btn-sm btn-outline-warning">
                                       <i class="bi bi-calendar-x me-1"></i> Mungesat
                                    </a>

                                    <a href="<?= BASE_URL ?>prof/raporti.php?id=<?= $nx['id']; ?>" 
                                       class="btn btn-sm btn-outline-primary">
                                       <i class="bi bi-file-earmark-text me-1"></i> Raporti
                                    </a>

                                </div>
                            </td>

                        </tr>
                    <?php endforeach; ?>

                    </tbody>
                </table>
            </div>

        </div>
    </div>

    <?php else: ?>

        <div class="text-center py-5">
            <div class="card shadow border-0 rounded-4 p-5">
                <i class="bi bi-emoji-frown fs-1 text-muted mb-3"></i>
                <h5 class="text-muted">Nuk ka nxënës në klasën tuaj</h5>
            </div>
        </div>

    <?php endif; ?>

</div>

<style>
.table-row:hover {
    background-color: #f8f9fa;
    transition: 0.3s;
}

.card {
    border-radius: 20px;
}

.btn {
    transition: all 0.3s ease;
}

.btn:hover {
    transform: translateY(-2px);
}
</style>

<?php
include('prof-footer.php');
?>