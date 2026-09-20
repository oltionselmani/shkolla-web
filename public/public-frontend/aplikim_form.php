<?php
include('../../header.php');
include_once('../../classes/Drejtimet.php');

$emri = isset($_COOKIE['emri']) ? $_COOKIE['emri'] : "";
$mbiemri = isset($_COOKIE['mbiemri']) ? $_COOKIE['mbiemri'] : "";

$drejtimi = new Drejtimet();
$drejtimet = $drejtimi->index_drejtimi();
?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<style>
    .aplikim-stil {
    min-height: 88.3vh;
    background: linear-gradient(rgba(0,0,0,0.4), rgba(0,0,0,0.4)), url('<?= BASE_URL ?>img/aplikimi.jpg');
    background-size: cover;
    background-position: center;
    background-attachment: fixed;
    
    display: flex;
    justify-content: center; 
    align-items: center;     
    padding: 20px;           
}

.aplikim-form {
    background: rgba(255,255,255,0.15);
    backdrop-filter: blur(10px);
    padding: 40px 30px;
    border-radius: 15px;
    box-shadow: 0 8px 25px rgba(0,0,0,0.3);
    width: 100%;
    max-width: 650px;
}


    .aplikim-form input,
    .aplikim-form select {
        background: rgba(255,255,255,0.25);
        color: #fff;
        border: 1px solid rgba(255,255,255,0.4);
        padding: 12px 15px;
        border-radius: 8px;
        transition: all 0.3s ease;
    }

    .aplikim-form input:focus,
    .aplikim-form select:focus {
        background: rgba(255,255,255,0.35);
        border-color: rgba(255,255,255,0.7);
        color: #fff;
        box-shadow: 0 0 10px rgba(255,255,255,0.3);
    }

    .aplikim-form .btn {
        background: rgba(255,255,255,0.25);
        color: #fff;
        border: 1px solid rgba(255,255,255,0.4);
        padding: 12px 20px;
        border-radius: 8px;
        width: 100%;
        transition: all 0.3s ease;
    }

    .aplikim-form .btn:hover {
        background: rgba(255,255,255,0.4);
        color: #000;
        border-color: rgba(255,255,255,0.7);
    }

    .aplikim-form p.h1 {
        color: #fff;
        text-align: center;
        font-weight: bold;
        margin-bottom: 30px;
    }

    .aplikim-form label {
        color: #fff;
        font-weight: 500;
    }

    .custom-file-wrapper {
    position: relative;
    display: inline-block;
    width: 100%;
    height: 45px;
}

.custom-file-wrapper input[type="file"] {
    width: 100%;
    height: 100%;
    opacity: 0; 
    position: absolute;
    top:0;
    left:0;
    cursor: pointer;
}

.custom-file-text {
    display: block;
    width: 100%;
    height: 100%;
    background: rgba(255,255,255,0.25);
    color: #fff;
    border: 1px solid rgba(255,255,255,0.4);
    border-radius: 8px;
    padding: 12px 15px;
    line-height: 20px;
    font-size: 0.95rem;
    pointer-events: none; 
}

.custom-file-wrapper:hover .custom-file-text,
.custom-file-wrapper input[type="file"]:focus + .custom-file-text {
    background: rgba(255,255,255,0.35);
    border-color: rgba(255,255,255,0.7);
    color: #fff;
}


.custom-file-wrapper input[type="file"]::file-selector-button {
    display: none;
}



.aplikim-form select {
    background: rgba(255,255,255,0.8); 
    color: #000;
    border: 1px solid rgba(0,0,0,0.2);
    border-radius: 8px;
    padding: 12px 15px;
}


.aplikim-form select:focus {
    background: rgba(255,255,255,1);
    border-color: rgba(0,0,0,0.5);
    color: #000;
    box-shadow: 0 0 10px rgba(0,0,0,0.2);
}

.select-wrapper {
    position: relative;
    width: 100%;
}

.select-wrapper select {
    width: 100%;
    padding: 12px 40px 12px 15px; 
    border-radius: 8px;
    border: 1px solid rgba(255,255,255,0.5);
    background: rgba(255,255,255,0.25);
    color: #fff;
    appearance: none; 
    -webkit-appearance: none;
    -moz-appearance: none;
    font-size: 1rem;
    cursor: pointer;
    transition: all 0.3s ease;
}


.select-wrapper::after {
    content: '';
    position: absolute;
    right: 15px;
    top: 50%;
    transform: translateY(-50%) rotate(45deg);
    width: 10px;
    height: 10px;
    border-right: 2px solid #fff;
    border-bottom: 2px solid #fff;
    pointer-events: none;
    transition: transform 0.3s ease;
}


.select-wrapper select:focus {
    background: rgba(255,255,255,0.35);
    border-color: rgba(255,255,255,0.7);
    outline: none;
}

.select-wrapper:hover select {
    background: rgba(255,255,255,0.3);
}


.select-wrapper select:focus + .select-wrapper::after {
    transform: translateY(-50%) rotate(-135deg);
}


</style>
<link rel="stylesheet" href="<?= BASE_URL ?>css/style.css?v=2">

<div class="aplikim-stil">

                <div class="aplikim-form">

                    <p class="h1">Apliko</p>

                    <form action="<?= BASE_URL ?>public/public-backend/aplikimi_save.php" enctype="multipart/form-data" method="post">

                        <!-- Emri -->
                        <div class="mb-3">
                            <label for="emri">Emri:</label>
                            <input id="emri" name="emri" class="form-control text-white" value="<?= htmlspecialchars($emri) ?>">
                        </div>

                        <!-- Mbiemri -->
                        <div class="mb-3">
                            <label for="mbiemri">Mbiemri:</label>
                            <input id="mbiemri" name="mbiemri" class="form-control" value="<?= htmlspecialchars($mbiemri) ?>">
                        </div>

                        <!-- Email -->
                        <div class="mb-3">
                            <label for="email">Email:</label>
                            <input id="email" name="email" class="form-control">
                        </div>

                        <!-- Drejtimi -->
                        <div class="mb-3">
                            <label for="drejtimi_id">Selekto Drejtimin:</label>
                            <div class="select-wrapper">
                                <select id="drejtimi_id" name="drejtimi_id">
                                    <?php foreach($drejtimet as $drejtimi){ ?>
                                        <option value="<?= $drejtimi['id'] ?>"><?= $drejtimi['drejtimi'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>


                        <!-- Qertifikata Lindjes -->
                        <div class="mb-3">
                            <label for="qertifikata_lindjes">Qertifikata Lindjes:</label>
                            <div class="custom-file-wrapper">
                                <input type="file" name="qertifikata_lindjes" id="qertifikata_lindjes" accept="image/*">
                                <span class="custom-file-text">Zgjidhni foto...</span>
                            </div>
                        </div>
                        
                        <!-- Deftesa -->
                        <div class="mb-5">
                            <label for="deftesa">Deftesa:</label>
                            <div class="custom-file-wrapper">
                                <input type="file" name="deftesa" id="deftesa" accept="image/*">
                                <span class="custom-file-text">Zgjidhni foto...</span>
                            </div>
                        </div>


                        <div class="mb-3 w-100 d-flex justify-content-center">
                            <button class="btn" type="submit">Ruaj Të Dhënat</button>
                        </div>

                    </form>

                </div>

</div>

<script>
document.querySelectorAll('.custom-file-wrapper input[type="file"]').forEach(input => {
    input.addEventListener('change', function() {
        const fileName = this.files[0] ? this.files[0].name : "Zgjidhni foto...";
        this.nextElementSibling.textContent = fileName;
    });
});
</script>


<?php
include('../../footer.php');
?>