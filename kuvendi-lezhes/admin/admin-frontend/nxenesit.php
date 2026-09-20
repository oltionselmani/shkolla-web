<?php

include('../admin-header.php');
include('../../classes/Nxenesi.php');

$nxenesi = new Nxenesi();

if (isset($_POST['search']) && $_POST['search'] != '') {

    $nxenesit = $nxenesi->kerko_nxenesin();
} else {

    $nxenesit = $nxenesi->index_nxenes_join();
}


?>



<div class="container" style="height: 88.3vh">
    <div class="row justify-content-center">
        <div class="col-md-11">
        
        <div class="my-3 d-flex justify-content-between align-items-center">
            <p class="display-1">Lista e Nxënësve</p>
            <a href="nxenesi_shto_admin.php" class="btn btn-secondary btn-lg w-25 p-3">Shto Nxënës</a>
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
                        value="<?php echo isset($_POST['search']) ? $_POST['search'] : ''; ?>"
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
                    <th>Drejtimi</th>
                    <th>Prindi</th>
                    <th>Veprimet</th>
                    <th>Notat</th>
                    <th>Mungesat</th>
                    <th>Raporti</th>
                </tr>
            </thead>

            <tbody>

            <?php
            
                foreach($nxenesit as $nx){
            ?>

                <tr>

                    <td><?php echo $nx['emri']; ?></td>
                    <td><?php echo $nx['mbiemri']; ?></td>
                    <td><?php echo $nx['klasa']; ?></td>
                    <td><?php echo isset($nx['drejtimi']) ? $nx['drejtimi'] : '-'; ?></td>
                    <td><?php echo isset($nx['prindi']) ? $nx['prindi'] : '-'; ?></td>

                    <td>
                        <a href="<?= BASE_URL ?>admin/admin-frontend/nxenesi_edit_form.php?id=<?php echo $nx['id']; ?>" class="btn btn-warning btn-sm my-1" >Edit</a>
                        <a href="<?= BASE_URL ?>admin/admin-backend/nxenesi_fshi.php?id=<?php echo $nx['id']; ?>" class="btn btn-danger btn-sm my-1"   onclick="return confirm('A je i sigurt që dëshiron ta fshish këtë nxënës?');">Fshi</a>
                    </td>

                    <td>
                        <a href="<?= BASE_URL ?>admin/admin-frontend/notat_form.php?id=<?php echo $nx['id']; ?>" class="btn btn-info btn-sm my-1" >Shto Nota</a>
                        <a href="<?= BASE_URL ?>admin/admin-frontend/lista_notave.php?id=<?php echo $nx['id']; ?>" class="btn btn-info btn-sm my-1" >Lista Notave</a>    
                    </td>

                    <td>
                        <a href="mungesat.php?id=<?php echo $nx['id']; ?>" class="btn btn-primary btn-sm my-1" >Shto Mungesa</a>
                        <a href="mungesat.php?id=<?php echo $nx['id']; ?>" class="btn btn-primary btn-sm my-1"  >Lista Mungesave</a>
                    </td>
                    
                    <td>
                        <a href="<?= BASE_URL ?>admin/admin-frontend/raporti.php?id=<?php echo $nx['id']; ?>" class="btn btn-secondary btn-sm" style="width: 100%">Raporti</a>
                    </td>
                    

                </tr>

            <?php
                }

            ?>

            </tbody>

        </table>
        </div>

        </div>
    </div>
</div>

