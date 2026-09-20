<?php
include('prof-header.php');
require_once('../classes/Publikimet.php');

$pub = new Publikimet();

// Pagination
$limit = 9;
$page = isset($_GET['page']) ? max(1, (int)$_GET['page']) : 1;
$offset = ($page - 1) * $limit;

$result = $pub->getAll($limit, $offset);
$total = $pub->countAll();
$pages = ceil($total / $limit);
?>

<style>

.publikim-page {
    background-color: #f5f5f5; 
    padding: 60px 0;
    min-height: 100vh;
}
.card {
    border: 1px solid #ddd;
    border-radius: 8px;
    overflow: hidden;
    transition: transform 0.3s, box-shadow 0.3s;
    background: #fff;
    display: flex;
    flex-direction: column;
    height: 400px;
}

.card-body {
    flex: 1;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
}

.card:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 20px rgba(0,0,0,0.15);
}

.card-body h5 {
    font-size: 1.2rem;
    margin-bottom: 10px;
}

.card-body p {
    font-size: 0.95rem;
    color: #555;
    margin-bottom: 10px;
}

.card-body small {
    color: #888;
}

.carousel-inner img {
    width: 100%;
    height: 200px;
    object-fit: cover;
    border-bottom: 1px solid #ddd;
}

.carousel-control-prev-icon,
.carousel-control-next-icon {
    background-color: rgba(0,0,0,0.5);
    border-radius: 50%;
}

.pagination .page-item.active .page-link {
    background-color: #007bff;
    border-color: #007bff;
    color: #fff;
}

.pagination .page-link {
    color: #007bff;
}
</style>
<div class="publikim-page">
<div class="container mt-5" style="min-height: 70vh">
    <div class="row">

        <?php while($row = $result->fetch_assoc()): ?>
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card shadow-sm">

                    <?php 

                    $fotos = [
                        $row['foto_1'] ?? null,
                        $row['foto_2'] ?? null,
                        $row['foto_3'] ?? null,
                        $row['foto_4'] ?? null
                    ];

                    $fotos = array_filter($fotos, fn($f) => isset($f) && trim($f) != '');

                    if(count($fotos) > 0): 
                    ?>
                        <div id="carousel-<?php echo $row['id']; ?>" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-inner">
                                <?php $first = true; ?>
                                <?php foreach($fotos as $foto): ?>
                                    <div class="carousel-item <?php if($first){ echo 'active'; $first=false; } ?>">
                                        <img src="<?= BASE_URL ?>publikimet/publikim-backend/foto-publikimet/<?php echo $foto; ?>" class="d-block w-100">
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
                        <h5 class="card-title"><?php echo strip_tags($row['titulli']); ?></h5>
                        <p class="card-text">
                            <?php echo substr(strip_tags($row['njohuri']), 0, 120) . " ..."; ?>
                        </p>
                        <a href="publikim.php?id=<?php echo $row['id']; ?>" class="text-decoration-none fw-bold">
                            > Lexo më shumë
                        </a>
                        <br>
                        <small class="text-muted">
                            Nga: <?php echo $row['emri'] . " " . $row['mbiemri']; ?>
                        </small>
                    </div>
                </div>
            </div>
        <?php endwhile; ?>

    </div>

    <!-- Pagination -->
    <nav>
        <ul class="pagination justify-content-center mt-4">
            <!-- Previous -->
                <li class="page-item <?= ($page <= 1) ? 'disabled' : '' ?>">
                    <a class="page-link" 
                       href="?page=<?= $page-1 ?>">
                       Pas
                    </a>
                </li>
            <?php for($i = 1; $i <= $pages; $i++): ?>
                <li class="page-item <?php if($i==$page) echo 'active'; ?>">
                    <a class="page-link" href="?page=<?php echo $i; ?>">
                        <?php echo $i; ?>
                    </a>
                </li>
            <?php endfor; ?>
            <!-- Next -->
                <li class="page-item <?= ($page >= $pages) ? 'disabled' : '' ?>">
                    <a class="page-link" 
                       href="?page=<?= $page+1 ?>">
                       Para
                    </a>
                </li>
        </ul>
    </nav>
</div>

</div>


<?php
include('prof-footer.php');
?>