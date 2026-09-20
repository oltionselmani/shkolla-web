<?php
include('../../header.php');
require_once('../../classes/Publikimet.php');

if(!isset($_GET['id'])){
    die("Biografia nuk u gjet!");
}

$id = (int)$_GET['id'];
$publikim = new Publikimet();
$row = $publikim->getBiografiaById($id);

if(!$row){
    die("Biografia nuk u gjet!");
}
?>

<style>
.biografia-prof-page {
    padding: 60px 0;
    background: #f9f9f9;
    min-height: 80vh;
}

.biografia-prof-page .card {
    border: none;
    border-radius: 12px;
    box-shadow: 0 8px 25px rgba(0,0,0,0.1);
    overflow: hidden;
    display: flex;
    flex-direction: column;
    align-items: center;
    max-width: 700px;
    margin: 0 auto;
    text-align: center;
}

.biografia-prof-page .card img {
    width: 350px; 
    height: 350px;
    object-fit: cover;
    border-radius: 50%;
    margin-top: 30px;
}

.biografia-prof-page .card-body {
    padding: 30px 20px;
}

.biografia-prof-page .card-body h2 {
    font-weight: 700;
    margin-bottom: 15px;
    font-size: 1.8rem;
}

.biografia-prof-page .card-body p {
    font-size: 1rem;
    color: #555;
    line-height: 1.7;
}

.biografia-prof-page .btn-back {
    margin-top: 20px;
}

</style>

<link rel="stylesheet" href="<?= BASE_URL ?>css/style.css?v=2">

<div class="biografia-prof-page">
    <div class="container">
        <div class="card">
            <?php if($row['foto'] && file_exists("../../publikimet/publikim-backend/biografite/".$row['foto'])): ?>
                <img src="<?= BASE_URL ?>publikimet/publikim-backend/biografite/<?= $row['foto']; ?>" alt="<?= htmlspecialchars($row['emri'].' '.$row['mbiemri']); ?>">
            <?php else: ?>
                <img src="<?= BASE_URL ?>img/default-profile.png" alt="Foto prof">
            <?php endif; ?>

            <div class="card-body">
                <h2><?= htmlspecialchars($row['emri'].' '.$row['mbiemri']); ?></h2>
                <p><?= nl2br(strip_tags($row['njohuri'])); ?></p>

                <a href="biografite.php" class="btn btn-secondary btn-back">⟵ Kthehu tek biografitë</a>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<?php
include('../../footer.php');
?>
