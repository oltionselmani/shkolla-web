<?php

include('Database.php');

class User extends Database {



    public function signup($emri, $mbiemri, $telefoni, $email, $password) {

    try {

        $sql = "
            INSERT INTO users (emri, mbiemri, telefoni, email, password)
            VALUES ('$emri', '$mbiemri', '$telefoni', '$email', '$password')
        ";

        $this->conn->query($sql);

        echo "<script>
                alert('Llogaria u krijua me sukses!');
                window.location.href = 'login_form.php';
              </script>";
        exit;

    } catch (mysqli_sql_exception $e) {

        // Duplicate email
        if ($e->getCode() == 1062) {
            echo "<script>
                    alert('Ky email është përdorur më herët. Ju lutem përdorni një email tjetër.');
                    window.history.back();
                  </script>";
            exit;
        }

        // Error tjeter
        echo "<script>
                alert('Ndodhi një gabim gjatë regjistrimit. Provo përsëri.');
                window.history.back();
              </script>";
        exit;
    }
}



    public function login($email,$password) {

        $sql="SELECT * FROM users WHERE email='$email' LIMIT 1";
        $result=$this->conn->query($sql);
    
        if($result->num_rows > 0) {
    
            $user = $result->fetch_assoc();
    
            if(password_verify($password,$user['password'])) {
    
                session_start();
    
                // Session
                $_SESSION['user_id']   = $user['id'];
                $_SESSION['user_name'] = $user['emri'];
                $_SESSION['user_foto'] = $user['foto'];
                $_SESSION['roli']      = $user['roli'];
    
                // Rolet
                if($user['roli'] == 'member') {
                    $_SESSION['is_member'] = true;
                    header('Location: ../index.php');
                    exit;
                }
    
                if($user['roli'] == 'admin') {
                    $_SESSION['is_admin'] = true;
                    header('Location: ../admin/admin-dashboard.php');
                    exit;
                }
    
                if($user['roli'] == 'prof') {
                    $_SESSION['is_prof'] = true;
                    $_SESSION['kujdestar_klasa'] = $user['kujdestar_klasa'];
                    header('Location: ../prof/prof-dashboard.php');
                    exit;
                }
    
                if($user['roli'] == 'prind') {
                    $_SESSION['is_prind'] = true;
                    header('Location: ../prind/prind-dashboard.php');
                    exit;
                }

                if($user['roli'] == 'publisher') {
                    $_SESSION['is_publisher'] = true;
                    header('Location: ../publikimet/publikim-dashboard.php');
                    exit;
                }
    
            } else {
                echo "<script>alert('Email ose Password nuk jane valide!');</script>";
                  echo "<script>window.location.href = 'login_form.php'</script>";
            }
    
        } else {
            echo "<script>alert('Email ose Password nuk jane valide!');</>";
            echo "<script>window.location.href = 'login_form.php'</script>";
        }
    }


    public function index_drejtimi(){
        $sql="select * from drejtimet";
        $results=$this->conn->query($sql);
        return $results->fetch_all(MYSQLI_ASSOC);
    }


    public function logout() {
        session_start();
        session_destroy();
        header('Location: ../index.php');
    }










     public function merrKlasatELira() {
        $sql = "
            SELECT DISTINCT n.klasa
            FROM nxenesit n
            WHERE n.klasa NOT IN (
                SELECT kujdestar_klasa 
                FROM users 
                WHERE roli = 'prof' 
                AND kujdestar_klasa IS NOT NULL
            )
            ORDER BY n.klasa ASC
        ";
        $result = $this->conn->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }


    public function merrKlasatELiraMeAktuale($prof_id) {
        $sql = "
            SELECT DISTINCT n.klasa
            FROM nxenesit n
            WHERE n.klasa NOT IN (
                SELECT kujdestar_klasa 
                FROM users 
                WHERE roli = 'prof' 
                AND kujdestar_klasa IS NOT NULL
                AND id != $prof_id
            )
            ORDER BY n.klasa ASC
        ";
        $result = $this->conn->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }


    public function profet() {
        $sql = "
            SELECT id, emri, mbiemri, email, telefoni, kujdestar_klasa
            FROM users
            WHERE roli='prof'
            ORDER BY emri ASC
        ";
        $result = $this->conn->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }


    public function caktoKujdestarin($prof_id, $klasa) {

        $klasa_safe = $this->conn->real_escape_string($klasa);
        $sql_check = "
            SELECT * FROM users 
            WHERE roli='prof' 
            AND kujdestar_klasa='$klasa_safe'
            AND id != $prof_id
        ";
        $res = $this->conn->query($sql_check);
        if($res->num_rows > 0) {
            return false; 
        }

        $sql = "UPDATE users SET kujdestar_klasa='$klasa_safe' WHERE id=$prof_id";
        return $this->conn->query($sql);



    }

    public function find($id) {
        $sql = "SELECT * FROM users WHERE id='$id' LIMIT 1";
        $res = $this->conn->query($sql);
        return $res->fetch_assoc();
    }


    public function indexProfa() {
        $sql = "SELECT * FROM users WHERE roli='prof' ORDER BY emri ASC";
        $result = $this->conn->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function kerkoProfa($search) {
        $search = $this->conn->real_escape_string($search);
        $sql = "SELECT * FROM users 
                WHERE roli='prof' 
                AND (emri LIKE '%$search%' OR mbiemri LIKE '%$search%' OR email LIKE '%$search%')
                ORDER BY emri ASC";
        $result = $this->conn->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }





    // Update prof
    public function updateProf($id, $emri, $mbiemri, $email, $telefoni) {
    
        $sql = "UPDATE users 
                SET emri='$emri', mbiemri='$mbiemri', email='$email', telefoni='$telefoni'
                WHERE id=$id AND roli='prof'";
    
        if($this->conn->query($sql)) {
            echo "<script>
                    alert('Prof u përditësua me sukses!');
                    window.location.href = '".BASE_URL."admin/admin-frontend/profet.php';
                  </>";
        } else {
            echo "Gabim: ".$this->conn->error;
        }
    }
    
    // Delete prof
    public function deleteProf($id) {
        $sql = "DELETE FROM users WHERE id=$id AND roli='prof'";
        if($this->conn->query($sql)) {
            echo "<script>
                    alert('Prof u fshi me sukses!');

                  </script>";
                header('Location: admin-frontend/profet.php');
        } else {
            echo "Gabim: ".$this->conn->error;
        }
    }


    public function shtoProf($emri, $mbiemri, $telefoni, $email, $password){

    

        $check = $this->conn->query("SELECT * FROM users WHERE email='$email'");
        if($check->num_rows > 0){
            return false; 
        }
    
        $sql = "INSERT INTO users (emri, mbiemri, telefoni, email, password, roli) 
                VALUES ('$emri', '$mbiemri', '$telefoni', '$email', '$password', 'prof')";
    
        return $this->conn->query($sql);
    }


    public function gjej_prindin_sipas_email($email){

    
        $sql = "SELECT * FROM users 
                WHERE email='$email' 
                AND roli='prind' 
                LIMIT 1";
    
        $result = $this->conn->query($sql);
    
        if($result->num_rows > 0){
            return $result->fetch_assoc();
        }
    
        return false;
    }



    // Shto Nxenesit
    public function shto_nxenesin(string $emri,string $mbiemri,string $klasa, $drejtimi_id,$prind_id) {
        
        $sql="INSERT INTO nxenesit(emri,mbiemri,klasa,drejtim_id,prind_id) VALUES('$emri','$mbiemri','$klasa','$drejtimi_id',$prind_id)";

        $this->conn->query($sql);

         echo "<script>alert('Nxënësi u ruajt me sukses!'); window.location.href='nxenesi_shto_form.php';</script>";

    }

    public function shto_nxenesin_admin(string $emri,string $mbiemri,string $klasa, $drejtimi_id) {
        
        $sql="INSERT INTO nxenesit(emri,mbiemri,klasa,drejtim_id) VALUES('$emri','$mbiemri','$klasa','$drejtimi_id')";

        $this->conn->query($sql);

         echo "<script>alert('Nxënësi u ruajt me sukses!'); window.location.href='nxenesi_shto_form.php';</script>";

    }



    public function getUserById($id) {
        $sql = "SELECT * FROM users WHERE id=$id LIMIT 1";
        $result = $this->conn->query($sql);
        return $result->fetch_assoc();
    }
    
    public function updateFoto($id, $foto) {


    $sqlOld = "SELECT foto FROM users WHERE id=$id LIMIT 1";
    $result = $this->conn->query($sqlOld);
    $user   = $result->fetch_assoc();

    $oldFoto = $user['foto'];


    if(!empty($oldFoto) && $oldFoto != 'default-profile.png') {

        $oldPath = "../public/public-backend/uploads/profili/" . $oldFoto;

        if(file_exists($oldPath)) {
            unlink($oldPath); 
        }
    }

    // Update databazen me foton e re
    $sql = "UPDATE users SET foto='$foto' WHERE id=$id";
    return $this->conn->query($sql);
}

    public function updateEmail($id, $email) {

        $email = $this->conn->real_escape_string($email);
    
        $sql = "UPDATE users SET email='$email' WHERE id='$id'";
        return $this->conn->query($sql);
    }

   public function emailExists($email, $currentUserId) {

        $email = $this->conn->real_escape_string($email);
    
        $sql = "SELECT id FROM users 
                WHERE email='$email' 
                AND id != '$currentUserId'";
    
        $result = $this->conn->query($sql);
    
        return $result->num_rows > 0;
    }
    


    
    public function updatePassword($id, $password) {
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $sql = "UPDATE users SET password='$hash' WHERE id=$id";
        return $this->conn->query($sql);
    }
    








}

?>