<?php
include('../../header.php');
require_once('../../classes/Publikimet.php');

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

/* HERO BIOGRAFITE */
.bio-hero {
    background: linear-gradient(rgba(0,0,0,0.6), rgba(30,64,175,0.7)),
                url('<?= BASE_URL ?>img/about_us.jpg') center/cover no-repeat;
    padding: 120px 0;
    color: white;
    text-align: center;
}

.bio-hero h1 {
    font-size: 3rem;
    font-weight: 700;
}

.bio-hero p {
    font-size: 1.1rem;
    opacity: 0.9;
}

.bio-breadcrumb {
    font-size: 0.9rem;
    opacity: 0.85;
}

.bio-breadcrumb a {
    color: #fff;
    text-decoration: none;
}

.bio-breadcrumb a:hover {
    text-decoration: underline;
}

</style>

<link rel="stylesheet" href="<?= BASE_URL ?>css/style.css?v=2">

<!-- ================= HERO BIOGRAFITE ================= -->
<section class="bio-hero fade-up">
    <div class="container">
        <div class="bio-breadcrumb mb-3">
            <a href="<?= BASE_URL ?>">Ballina</a> / Profesorët
        </div>

        <h1>👨‍🏫 Biografitë e Profesorëve</h1>
        <p>Njihuni me stafin tonë akademik dhe përvojën e tyre profesionale.</p>
    </div>
</section>

<div class="biografite-page">
    <div class="container mt-5" style="min-height:70vh">
        <div class="row">

        <?php if($result && $result->num_rows > 0): ?>
            <?php while($row = $result->fetch_assoc()): ?>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card shadow-sm fade-up">

                        <?php if(!empty($row['foto']) && file_exists("../../publikimet/publikim-backend/biografite/".$row['foto'])): ?>
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

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<?php
include('../../footer.php');
?>