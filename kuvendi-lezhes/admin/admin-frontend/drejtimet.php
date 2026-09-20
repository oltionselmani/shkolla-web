<?php
include('../admin-header.php');
include('../../classes/Drejtimet.php');

$dr = new Drejtimet();
$drejtimet = $dr->index_drejtimi();
?>

<div class="container-fluid bg-body-tertiary" style="min-height:88.3vh">

    <div class="row justify-content-center pt-5">
        <div class="col-md-8">

            <div class="card shadow-lg p-4 rounded rounded-5">

                <p class="h1 text-primary mb-4">📚 Lista e Drejtimeve</p>

                <table class="table table-bordered table-hover text-center align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>ID</th>
                            <th>Drejtimi</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        if(count($drejtimet) > 0){
                            $i = 1;
                            foreach($drejtimet as $d){
                                echo "
                                    <tr>
                                        <td>".$i++."</td>
                                        <td>".$d['drejtimi']."</td>
                                    </tr>
                                ";
                            }
                        } else {
                            echo "
                                <tr>
                                    <td colspan='2'>Nuk ka drejtime të regjistruara</td>
                                </tr>
                            ";
                        }
                        ?>

                    </tbody>
                </table>

                <div class="mt-3 text-center">
                    <a href="drejtim_shto_form.php" class="btn btn-outline-primary w-25">
                        ➕ Shto Drejtim
                    </a>
                </div>

            </div>

        </div>
    </div>

</div>