<?php
include('publikimet-header.php');
require_once('../classes/Publikimet.php');

$publikim = new Publikimet();
$result = $publikim->getAll(1000, 0); 
?>

<div class="container mt-5" style="min-height: 70vh">
    <h2 class="mb-4">Lista e Publikimeve</h2>

    <div class="table-responsive">
        <table class="table table-hover align-middle">
            <thead class="table-dark">
                <tr>
                    <th>#</th>
                    <th>Titulli</th>
                    <th>Njohuri</th>
                    <th>Foto</th>
                    <th>Data</th>
                    <th>Veprimet</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $count = 1;
                while($row = $result->fetch_assoc()): 
                ?>
                    <tr>
                        <td><?php echo $count++; ?></td>
                        <td><?php echo strip_tags($row['titulli']); ?></td>
                        <td><?php echo substr(strip_tags($row['njohuri']), 0, 50) . '...'; ?></td>
                        <td>
                            <?php if(!empty($row['foto_1'])): ?>
                                <img src="publikim-backend/foto-publikimet/<?php echo $row['foto_1']; ?>" 
                                     alt="Foto" class="rounded" 
                                     style="width:60px; height:60px; object-fit:cover; border:1px solid #ccc;">
                            <?php else: ?>
                                <span class="text-muted">Nuk ka foto</span>
                            <?php endif; ?>
                        </td>
                        <td><?php echo date("d-m-Y H:i", strtotime($row['created_at'])); ?></td>
                        <td>
                          <div class="d-flex gap-2">
                              <a href="publikim.php?id=<?php echo $row['id']; ?>" class="btn btn-primary btn-sm flex-grow-1">
                                  <i class="bi bi-eye"></i> Shiko
                              </a>
                              <form action="fshi-publikim.php" method="POST" onsubmit="return confirm('A je i sigurt që doni ta fshini këtë publikim?');" class="flex-grow-1 m-0">
                                  <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                  <button type="submit" class="btn btn-danger btn-sm w-100 h-100">
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
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>


<?php
include('publikimet-footer.php');
?>