<?php
include('prind-header.php');
require_once('../classes/Publikimet.php');

if(!isset($_GET['id'])) {
    die("Publikimi nuk u gjet!");
}

$id = (int)$_GET['id'];

$publikim = new Publikimet();
$row = $publikim->getById($id);

if(!$row) {
    die("Publikimi nuk u gjet!");
}


$fotos = array_filter([
    $row['foto_1'] ?? null,
    $row['foto_2'] ?? null,
    $row['foto_3'] ?? null,
    $row['foto_4'] ?? null
], fn($f) => isset($f) && trim($f) !== '');
?>

<style>
    
.carousel-control-prev-icon,
.carousel-control-next-icon {
    background-color: rgba(0, 0, 0, 0.7); 
    border-radius: 50%; 
    width: 40px;  
    height: 40px;
    background-size: 50%, 50%; 
    background-position: center;
    background-repeat: no-repeat;
}


.carousel-control-prev-icon:hover,
.carousel-control-next-icon:hover {
    background-color: rgba(0, 0, 0, 0.9);
}

</style>


<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<div class="container mt-5">
    <div class="card mb-4">
        <?php if(count($fotos) > 0): ?>
            <div id="carousel-<?php echo $row['id']; ?>" class="carousel slide" data-bs-ride="carousel" data-bs-interval="3000">
                <div class="carousel-inner">
                    <?php $first = true; ?>
                    <?php foreach($fotos as $foto): ?>
                        <div class="carousel-item <?php if($first){ echo 'active'; $first=false; } ?>">
                            <img src="<?= BASE_URL ?>publikimet/publikim-backend/foto-publikimet/<?php echo $foto; ?>" 
                                 class="d-block w-100" style="height:400px; object-fit:cover;">
                        </div>
                    <?php endforeach; ?>
                </div>

                <?php if(count($fotos) > 1): ?>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carousel-<?php echo $row['id']; ?>" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carousel-<?php echo $row['id']; ?>" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                <?php endif; ?>
            </div>
        <?php endif; ?>

        <div class="card-body">
            <h3 class="card-title"><?php echo strip_tags($row['titulli']); ?></h3>
            <p class="card-text"><?php echo nl2br(strip_tags($row['njohuri'])); ?></p>
            <small class="text-muted">
                Nga: <?php echo $row['emri'] . " " . $row['mbiemri']; ?>
            </small>
        </div>
    </div>

    <a href="me-te-rejat.php" class="btn btn-secondary my-5">Kthehu tek publikimet</a>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<?php
include('prind-footer.php');
?>