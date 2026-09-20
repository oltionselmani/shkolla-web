<?php
include('../header.php');
?>

<style>
    .login-stil {
        min-height: 88.2vh;
        background: linear-gradient(rgba(0,0,0,0.4), rgba(0,0,0,0.4)), url('<?= BASE_URL ?>img/signuppp.jpg') center/cover no-repeat fixed;
        background-size: cover;
        background-position: center;
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 40px 0;
    }

    .login-form {
        background: rgba(255,255,255,0.15); 
        backdrop-filter: blur(10px); 
        padding: 50px 30px;
        border-radius: 15px;
        box-shadow: 0 8px 25px rgba(0,0,0,0.3);
        width: 100%;
    }

    .login-form input {
        background: rgba(255,255,255,0.25);
        color: #fff;
        border: 1px solid rgba(255,255,255,0.4);
        padding: 12px 15px;
        border-radius: 8px;
        transition: all 0.3s ease;
    }

    .login-form input:focus {
        background: rgba(255,255,255,0.35);
        border-color: rgba(255,255,255,0.7);
        color: #fff;
        box-shadow: 0 0 10px rgba(255,255,255,0.3);
    }

    .login-form .btn {
        background: rgba(255,255,255,0.25);
        color: #fff;
        border: 1px solid rgba(255,255,255,0.4);
        padding: 12px 20px;
        border-radius: 8px;
        width: 100%;
        transition: all 0.3s ease;
    }

    .login-form .btn:hover {
        background: rgba(255,255,255,0.4);
        color: #000;
        border-color: rgba(255,255,255,0.7);
    }

    .login-form p.h1 {
        color: #fff;
        text-align: center;
        font-weight: bold;
        margin-bottom: 40px;
    }

    .login-form label {
        color: #fff;
        font-weight: 500;
    }

</style>
<link rel="stylesheet" href="<?= BASE_URL ?>css/style.css?v=2">
<div class="login-stil">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <form action="login.php" method="post" class="login-form">

                    <p class="h1">Log In</p>

                    <!-- Email -->
                    <div class="mb-4">
                        <label for="email" class="form-label">Email:</label>
                        <input type="email" name="email" id="email" class="form-control">
                    </div>

                    <!-- Password -->
                    <div class="mb-3">
                        <label for="password" class="form-label">Password:</label>
                        <input type="password" name="password" id="password" class="form-control">
                    </div>

                    <div class="mb-4">
                        <a href="signup_form.php" class="text-white fw-bold" style="text-decoration: underline; font-size: 0.95rem;">
                            Nuk kam llogari?
                        </a>
                    </div>

                    <div class="mb-3">
                        <button class="btn" type="submit">Log In</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

<?php
include('../footer.php');
?>