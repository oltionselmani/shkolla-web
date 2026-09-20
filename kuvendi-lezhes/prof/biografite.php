<?php
include('prof-header.php');
require_once('../classes/Publikimet.php');

$pub = new Publikimet();

$limit = 9;
$page = isset($_GET['page']) ? max(1, (int)$_GET['page']) : 1;
$offset = ($page - 1) * $limit;

$total = $pub->countBiografite();
$pages = ceil($total / $limit);

if($page > $pages && $pages > 0){
    $page = $pages;
    $offset = ($page - 1) * $limit;
}

$result = $pub->getAllBiografite($limit, $offset);
?>

<style>
.biografite-page {
    background: #f5f5f5;
    padding: 50px 0;
}

.biografite-page .container {
    max-width: 1200px;
}

.biografite-page .card {
    border: none;
    border-radius: 12px;
    overflow: hidden;
    background: #fff;
    display: flex;
    flex-direction: column;
    height: 470px;
    transition: 0.3s;
}

.biografite-page .card:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 25px rgba(0,0,0,0.15);
}

.biografite-page .card img {
    width: 100%;
    height: 250px;
    object-fit: cover;
    object-position: top;
}

.biografite-page .card-body {
    flex: 1;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
}

.pagination .page-item.active .page-link {
    background-color: #007bff;
    border-color: #007bff;
}

.pagination .page-link {
    color: #007bff;
}
</style>

<div class="biografite-page">
    <div class="container mt-5" style="min-height:70vh">
        <div class="row">

        <?php if($result && $result->num_rows > 0): ?>
            <?php while($row = $result->fetch_assoc()): ?>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card shadow-sm">

                        <?php if(!empty($row['foto']) && file_exists("../publikimet/publikim-backend/biografite/".$row['foto'])): ?>
                            <img src="<?= BASE_URL ?>publikimet/publikim-backend/biografite/<?= $row['foto']; ?>" 
                                 alt="<?= htmlspecialchars($row['emri'].' '.$row['mbiemri']); ?>">
                        <?php else: ?>
                            <img src="<?= BASE_URL ?>img/default-profile.png">
                        <?php endif; ?>

                        <div class="card-body">
                            <div>
                                <h5><?= htmlspecialchars($row['emri'].' '.$row['mbiemri']); ?></h5>

                                <?php if(!empty($row['statusi'])): ?>
                                    <div class="text-danger fw-bold mb-2">
                                        <?= htmlspecialchars($row['statusi']); ?>
                                    </div>
                                <?php endif; ?>

                                <p>
                                    <?= substr(strip_tags($row['njohuri']),0,100).'...'; ?>
                                </p>
                            </div>

                            <a href="biografia-prof.php?id=<?= $row['id']; ?>" 
                               class="btn btn-primary mt-2">
                               Lexo më shumë
                            </a>
                        </div>

                    </div>
                </div>
            <?php endwhile; ?>
        <?php else: ?>
            <div class="col-12 text-center">
                <p>Nuk ka biografi.</p>
            </div>
        <?php endif; ?>

        </div>

        <!-- Pagination -->
        <?php if($pages > 1): ?>
        <nav class="mt-4">
            <ul class="pagination justify-content-center">

                <!-- Previous -->
                <li class="page-item <?= ($page <= 1) ? 'disabled' : '' ?>">
                    <a class="page-link" 
                       href="?page=<?= $page-1 ?>">
                       Pas
                    </a>
                </li>

                <?php for($i=1; $i <= $pages; $i++): ?>
                    <li class="page-item <?= ($i==$page) ? 'active' : '' ?>">
                        <a class="page-link" href="?page=<?= $i ?>">
                            <?= $i ?>
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
        <?php endif; ?>

    </div>
</div>

<?php
include('prof-footer.php');
?>