<?php
session_start();
include('../../classes/User.php');
include('../admin-header.php');

echo "<div class='container mt-5'>";


if (!isset($_SESSION['is_admin']) || $_SESSION['is_admin'] !== true) {
    header("Location: ../llogaria/login_form.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $error = [];

    /* PROF ID */
    if (isset($_POST['prof_id']) && !empty($_POST['prof_id'])) {

        $prof_id = htmlspecialchars(strip_tags(trim($_POST['prof_id'])));
        $prof_id = filter_var($prof_id, FILTER_VALIDATE_INT);

        if ($prof_id === false) {
            $error[] = "Profesori nuk është valid!";
        }

    } else {
        $error[] = "Ju lutemi zgjedhni profesorin!";
    }

    /* KLASA */
    if (isset($_POST['kujdestar_klasa']) && !empty($_POST['kujdestar_klasa'])) {

        $kujdestar_klasa = htmlspecialchars(strip_tags(trim($_POST['kujdestar_klasa'])));

        if (strlen($kujdestar_klasa) < 1) {
            $error[] = "Klasa nuk është valide!";
        }

    } else {
        $error[] = "Ju lutemi zgjedhni klasën!";
    }


    if (count($error) > 0) {

        foreach ($error as $err) {
            echo "<p class='text-danger'>$err</p>";
        }

        echo "<a href='javascript:history.back()' class='btn btn-secondary mt-3'>Kthehu mbrapa</a>";

    } else {

        $user = new User();
        $result = $user->caktoKujdestarin($prof_id, $kujdestar_klasa);

        if ($result) {
            echo "<script>
                    alert('Kujdestaria u caktua me sukses!');
                    window.location.href='".BASE_URL."admin/admin-frontend/profet.php';
                  </script>";
        } else {
            echo "<script>
                    alert('Kujdestaria nuk mund të caktohet (ndoshta klasa është e zënë)!');
                    window.history.back();
                  </script>";
        }

    }
}

echo "</div>";