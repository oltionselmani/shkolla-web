<?php

define('EMAIL_USER','oltionnselmani@gmail.com');
define('EMAIL_PASS','xbrc uyeh dccc wdxg');


include('Database.php');

class Aplikimet extends Database {

    // Lista e Nxenesve
    public function index() {

        $sql="SELECT * FROM aplikimet";
        $result=$this->conn->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);

    }



    // Ruaj Aplikimin e Nxenesit
    public function ruaj_aplikimet( $emri, $mbiemri, $email, $drejtimi_id,$qertifikata_name,$deftesa_name) {
        
        $sql="INSERT INTO aplikimet(emri,mbiemri,email,drejtim_id,qertifikata_lindjes,deftesa) VALUES('$emri','$mbiemri','$email','$drejtimi_id','$qertifikata_name','$deftesa_name')";

        $this->conn->query($sql);

        
        echo "<script>
              alert('Aplikimi u krye me sukses!');
              window.location.href = '../../index.php';
            </script>";
        exit;


    }

    
    public function aplikimet_sipas_drejtimi($drejtim_id)
    {
        $sql = "
            SELECT 
                a.id,
                a.emri,
                a.mbiemri,
                d.drejtimi,
                a.status,
                a.qertifikata_lindjes,
                a.deftesa,
                a.created_at
            FROM aplikimet a
            INNER JOIN drejtimet d ON a.drejtim_id = d.id
            WHERE a.drejtim_id = $drejtim_id
            ORDER BY a.created_at DESC
        ";
    
        $result = $this->conn->query($sql);
        return $result;
    }


    public function ndrysho_status($id, $status){

        // Merr aplikimin
        $sql = "SELECT * FROM aplikimet WHERE id='$id' LIMIT 1";
        $res = $this->conn->query($sql);
        $aplikimi = $res->fetch_assoc();
    
        if(!$aplikimi) return;
    
        // Ndrysho status
        $update = "UPDATE aplikimet SET status='$status' WHERE id='$id'";
        $this->conn->query($update);
    
        // Dergo email
        $to = $aplikimi['email'];
        $subject = "Rezultati i Aplikimit - Kuvendi Lezhes";
    
        if($status == 'aprovuar'){
            $message = "Pershendetje {$aplikimi['emri']},
    
        Ju njoftojme se aplikimi juaj eshte APROVUAR.
        
        Ju lutem paraqituni ne shkolle per procedurat e regjistrimit.
        
        Faleminderit,
        Kuvendi Lezhes";
            } else {
                $message = "Pershendetje {$aplikimi['emri']},
        
        Ju njoftojme se aplikimi juaj eshte REFUZUAR.
        
        Per me shume informata kontaktoni shkollen.
        
        Faleminderit,
        Kuvendi Lezhes";
            }
        
            require_once __DIR__ . '/PHPMailer/src/PHPMailer.php';
            require_once __DIR__ . '/PHPMailer/src/SMTP.php';
            require_once __DIR__ . '/PHPMailer/src/Exception.php';
            
            $mail = new PHPMailer\PHPMailer\PHPMailer(true);
            
            try {
            
                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com';
                $mail->SMTPAuth = true;
                $mail->Username = EMAIL_USER;
                $mail->Password = EMAIL_PASS;
                $mail->SMTPSecure = 'tls';
                $mail->Port = 587;
            
                $mail->setFrom(EMAIL_USER, 'Kuvendi Lezhes');
                $mail->addAddress($to);
            
                $mail->Subject = $subject;
                $mail->Body    = $message;
            
                $mail->send();
            
            } catch (Exception $e) {
                echo "Email error: " . $mail->ErrorInfo;
            }
            
    }




    public function aplikimet_sipas_drejtimi_dhe_status($drejtim_id, $status)
        {
            $sql = "
                SELECT 
                    a.id,
                    a.emri,
                    a.mbiemri,
                    a.email,
                    d.drejtimi,
                    a.status,
                    a.qertifikata_lindjes,
                    a.deftesa,
                    a.created_at
                FROM aplikimet a
                INNER JOIN drejtimet d ON a.drejtim_id = d.id
                WHERE a.drejtim_id = '$drejtim_id'
                AND a.status = '$status'
                ORDER BY a.created_at DESC
            ";
        
            return $this->conn->query($sql);
        }




    public function kerko_aplikimin_sipas_drejtimi_dhe_status($drejtim_id, $status, $search = '') {
        $search = isset($_POST['search']) ? $_POST['search'] : '';
    
        $sql = "
            SELECT * 
            FROM aplikimet
            WHERE drejtim_id = $drejtim_id
              AND status = '$status'
        ";
    
        if ($search != '') {
            $sql .= " AND (emri LIKE '%$search%' OR mbiemri LIKE '%$search%')";
        }
    
        $sql .= " ORDER BY created_at ASC";
    
        $result = $this->conn->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }






}

?>