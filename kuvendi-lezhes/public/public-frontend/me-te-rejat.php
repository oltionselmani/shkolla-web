<?php
include('../../header.php');
require_once('../../classes/Publikimet.php');

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

.publikime-page {
    background-color: #f5f5f5; 
    padding: 60px 0;
    min-height: 100vh;
}

.publikime-page .container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 15px;
}

.publikime-page .card {
    background: #fff;
    border-radius: 12px;
    overflow: hidden;
    transition: transform 0.25s ease, box-shadow 0.25s ease;
    display: flex;
    flex-direction: column;
    height: 420px;
    border: none;
    box-shadow: 0 5px 15px rgba(0,0,0,0.1);
}

.publikime-page .card:hover {
    transform: translateY(-5px);
    box-shadow: 0 15px 30px rgba(0,0,0,0.2);
}

.publikime-page .card-body {
    flex: 1;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    padding: 20px;
}

.publikime-page .card-body h5 {
    font-size: 1.25rem;
    font-weight: 600;
    margin-bottom: 10px;
    color: #222;
}

.publikime-page .card-body p {
    font-size: 0.95rem;
    color: #555;
    margin-bottom: 10px;
}

.publikime-page .card-body a {
    font-weight: 600;
    color: #007bff;
    text-decoration: none;
    transition: color 0.2s;
}

.publikime-page .card-body a:hover {
    color: #0056b3;
    text-decoration: underline;
}

.publikime-page .card-body small {
    color: #888;
}

/* Carousel fotove */
.publikime-page .carousel-inner img {
    width: 100%;
    height: 220px;
    object-fit: cover;
    border-bottom: 1px solid #ddd;
}

.publikime-page .carousel-control-prev-icon,
.publikime-page .carousel-control-next-icon {
    background-color: rgba(0,0,0,0.4);
    border-radius: 50%;
}

/* Pagination */
.publikime-page .pagination .page-item.active .page-link {
    background-color: #007bff;
    border-color: #007bff;
    color: #fff;
}

.publikime-page .pagination .page-link {
    color: #007bff;
}

.publikime-page .pagination .page-link:hover {
    color: #0056b3;
}

</style>

<div class="publikime-page">
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
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>


<?php
include('../../footer.php');
?>