<?php
include('publikimet-header.php');
require_once('../classes/Publikimet.php');

$publikim = new Publikimet();
$result = $publikim->getAllBiografite(1000, 0);
?>

<div class="container mt-5" style="min-height: 70vh">

    <!-- Hero / Header -->
    <div class="text-center mb-4 p-4 rounded-4 shadow-lg" style="background: linear-gradient(135deg,#198754,#0dcaf0); color:white;">
        <h1 class="fw-bold mb-2"><i class="bi bi-person-badge me-2"></i>Biografitë e Profëve</h1>
        <p class="mb-0 opacity-75">Shiko, menaxho dhe edit biografitë e të gjithë profesorëve</p>
    </div>

    <div class="table-responsive shadow-sm rounded-4 bg-white p-3">
        <table class="table table-hover align-middle modern-table text-center">
            <thead class="table-dark">
                <tr>
                    <th>#</th>
                    <th>Emri</th>
                    <th>Mbiemri</th>
                    <th>Njohuri</th>
                    <th>Foto</th>
                    <th>Veprimet</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $count = 1;
                while($row = $result->fetch_assoc()): 
                    $shortNjohuri = substr(strip_tags($row['njohuri']), 0, 60) . '...';
                ?>
                    <tr>
                        <td class="fw-semibold"><?= $count++; ?></td>
                        <td class="fw-bold"><?= htmlspecialchars($row['emri']); ?></td>
                        <td class="fw-bold"><?= htmlspecialchars($row['mbiemri']); ?></td>
                        <td>
                            <span class="badge bg-info text-dark"><?= $shortNjohuri ?></span>
                        </td>
                        <td>
                            <?php if(!empty($row['foto']) && file_exists("publikim-backend/biografite/".$row['foto'])): ?>
                                <img src="publikim-backend/biografite/<?= $row['foto']; ?>" 
                                     alt="Foto" class="rounded-circle shadow-sm" 
                                     style="width:60px; height:60px; object-fit:cover; border:1px solid #ccc; transition:0.3s;"
                                     onmouseover="this.style.transform='scale(1.2)';" 
                                     onmouseout="this.style.transform='scale(1)';">
                            <?php else: ?>
                                <span class="text-muted">Nuk ka foto</span>
                            <?php endif; ?>
                        </td>
                        <td>
                          <div class="d-flex gap-2 justify-content-center">
                              <a href="biografia-prof.php?id=<?= $row['id']; ?>" class="btn btn-primary btn-sm flex-grow-1 shadow-sm">
                                  <i class="bi bi-eye"></i> Shiko
                              </a>
                              <form action="fshi-biografi.php" method="POST" onsubmit="return confirm('A je i sigurt që doni ta fshini këtë biografi?');" class="flex-grow-1 m-0">
                                  <input type="hidden" name="id" value="<?= $row['id']; ?>">
                                  <button type="submit" class="btn btn-danger btn-sm w-100 h-100 shadow-sm">
                                      <i class="bi bi-trash"></i> Fshi
                                  </button>
                              </form>
                          </div>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</div>

<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">

<style>
.modern-table thead {
    font-weight: 600;
    letter-spacing: 0.5px;
}

.modern-table tbody tr {
    transition: all 0.2s ease;
}

.modern-table tbody tr:hover {
    background: #f1f5ff;
    transform: scale(1.01);
}

.btn-sm {
    transition: 0.2s;
}

.btn-sm:hover {
    transform: translateY(-2px);
    box-shadow: 0 2px 10px rgba(0,0,0,0.15);
}
</style>

<?php
include('publikimet-footer.php');
?>