<?php
include('admin-header.php');
?>

<h2 class="display-4 m-5">
    Admin Dashboard
</h2>



        
         <div class="container">
           <a class="nav-link text-dark active" aria-current="page" href="<?php echo BASE_URL ?>admin/admin-dashboard.php">Home</a>
        
        



        <!-- Sherbimet -->
        
          <a class="nav-link dropdown-toggle text-dark"
             href="#"
             id="sherbimetDropdown"
             role="button"
             data-bs-toggle="dropdown"
             aria-expanded="false">
             Shërbimet
          </a>
        
          <ul class="dropdown-menu">
            <li>
              <a class="dropdown-item" href="<?= BASE_URL ?>admin/admin-frontend/drejtim_shto_form.php">Shto Drejtim</a>
            </li>
            <li>
              <a class="dropdown-item" href="<?= BASE_URL ?>admin/admin-frontend/lenda_shto_form.php">Shto Lëndë</a>
            </li>

            
          </ul>
        

        <!-- Listat -->
        
          <a class="nav-link dropdown-toggle text-dark"
             href="#"
             id="sherbimetDropdown"
             role="button"
             data-bs-toggle="dropdown"
             aria-expanded="false">
             Listat
          </a>
        
          <ul class="dropdown-menu">
            <li>
              <a class="dropdown-item" href="<?= BASE_URL ?>admin/admin-frontend/drejtimet.php">Lista Drejtimeve</a>
            </li>
            <li>
              <a class="dropdown-item" href="<?= BASE_URL ?>admin/admin-frontend/lendet.php">Lista Lëndëve</a>
            </li>
            <li>
              <a class="dropdown-item" href="<?= BASE_URL ?>admin/admin-frontend/nxenesit.php">Lista Nxënësve</a>
            </li>
          </ul>
        </li>

      
            <a class="nav-link text-dark" href="<?= BASE_URL ?>admin/admin-frontend/nxenesit_filter.php">Nxenesit e Filtruar</a>
     

        
            <a class="nav-link text-dark" href="<?= BASE_URL ?>admin/admin-frontend/profet.php">Ndaj Kujdestarinë</a>
       
         </div>
