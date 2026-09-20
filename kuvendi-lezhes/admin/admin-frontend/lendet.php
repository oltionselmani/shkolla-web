<?php
include('../admin-header.php');
include('../../classes/Nxenesi.php');

$nx = new Nxenesi();
$lendet = $nx->index_lenda();
?>

<div class="container-fluid bg-body-tertiary" style="min-height:88.3vh">

    <div class="row justify-content-center pt-5">
        <div class="col-md-8">

            <div class="card shadow-lg p-4 rounded rounded-5">

                <p class="h1 text-primary mb-4">📘 Lista e Lëndëve</p>

                <table class="table table-bordered table-hover text-center align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>ID</th>
                            <th>Lënda</th>
                            <th>Veprime</th>
                        </tr>
                    </thead>
                    <tbody>
                
                        <?php
                        if(count($lendet) > 0){
                            $i = 1;
                            foreach($lendet as $l){
                                echo "
                                    <tr>
                                        <td>".$i++."</td>
                                        <td>".$l['lenda']."</td>
                                        <td>
                                            <a href='lenda_edit_form.php?id=".$l['id']."' 
                                               class='btn btn-sm btn-outline-warning'>
                                               ✏️ Edit
                                            </a>
                
                                            <a href='../admin-backend/lenda_fshi.php?id=".$l['id']."' 
                                               class='btn btn-sm btn-outline-danger'
                                               onclick=\"return confirm('A je i sigurt që dëshiron ta fshish këtë lëndë?');\">
                                               🗑️ Fshi
                                            </a>
                                        </td>
                                    </tr>
                                ";
                            }
                        } else {
                            echo "
                                <tr>
                                    <td colspan='3'>Nuk ka lëndë të regjistruara</td>
                                </tr>
                            ";
                        }
                        ?>
                
                    </tbody>
                </table>


                <div class="mt-3 text-center">
                    <a href="lenda_shto_form.php" class="btn btn-outline-primary w-25">
                        ➕ Shto Lëndë
                    </a>
                </div>

            </div>

        </div>
    </div>

</div>