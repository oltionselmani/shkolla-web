<?php
require_once("Database.php");

class Publikimet extends Database {


   public function krijo_publikimin($titulli, $njohuri, $fotot){
    $titulli = $this->conn->real_escape_string(trim($titulli));
    $njohuri = $this->conn->real_escape_string(trim($njohuri));
    $user_id = $_SESSION['user_id'];

    $fotonames = [];


    $folder = __DIR__ . "/../publikimet/publikim-backend/foto-publikimet/";
    if(!file_exists($folder)) mkdir($folder, 0777, true);

    $allowed = ['image/jpeg','image/png','image/webp'];
    $maxSize = 2 * 1024 * 1024; // 2MB

    for($i=0; $i<4; $i++){
        if(isset($fotot['name'][$i]) && $fotot['error'][$i] == 0){
            $type = $fotot['type'][$i];
            $size = $fotot['size'][$i];
            $tmp  = $fotot['tmp_name'][$i];

            if(in_array($type, $allowed) && $size <= $maxSize){
                $newName = time().'_'.$i.'_'.preg_replace("/[^a-zA-Z0-9.\-_]/","",$fotot['name'][$i]);

                if(move_uploaded_file($tmp, $folder.$newName)){
                    $fotonames[$i] = $newName;
                }
            }
        }
    }


    for($i=0; $i<4; $i++){
        if(!isset($fotonames[$i])) $fotonames[$i] = NULL;
    }

    $sql = "INSERT INTO publikimet (user_id, titulli, njohuri, foto_1, foto_2, foto_3, foto_4)
            VALUES ('$user_id', '$titulli', '$njohuri', 
                    '{$fotonames[0]}', '{$fotonames[1]}', '{$fotonames[2]}', '{$fotonames[3]}')";

    return $this->conn->query($sql);
}

    // Fshi publikim
    public function fshiPublikimin($id) {
        $id = (int)$id;
    
    
        $row = $this->getById($id);
        if(!$row) return false;
    
        $folder = __DIR__ . "/../publikimet/publikim-backend/foto-publikimet/";
        for($i=1; $i<=4; $i++){
            $foto = $row['foto_'.$i] ?? null;
            if($foto && file_exists($folder.$foto)){
                unlink($folder.$foto);
            }
        }
    
        $sql = "DELETE FROM publikimet WHERE id='$id'";
        return $this->conn->query($sql);
    }
    

    // pagination
    public function getAll($limit, $offset){
        $sql = "SELECT publikimet.*, users.emri, users.mbiemri
                FROM publikimet
                JOIN users ON publikimet.user_id = users.id
                ORDER BY publikimet.created_at DESC
                LIMIT $limit OFFSET $offset";
        return $this->conn->query($sql);
    }

    // publikimet
    public function countAll(){
        $sql = "SELECT COUNT(*) as total FROM publikimet";
        return $this->conn->query($sql)->fetch_assoc()['total'];
    }

    // Merr 1 publikim 
    public function getById($id){
        $sql = "SELECT publikimet.*, users.emri, users.mbiemri
                FROM publikimet
                JOIN users ON publikimet.user_id = users.id
                WHERE publikimet.id = '$id'";
        return $this->conn->query($sql)->fetch_assoc();
    }


    // Krijo biografin e profit
    public function krijo_biografine($emri, $mbiemri, $njohuri, $foto = null, $statusi = null){
        $emri = $this->conn->real_escape_string($emri);
        $mbiemri = $this->conn->real_escape_string($mbiemri);
        $njohuri = $this->conn->real_escape_string($njohuri);
        $statusi = $this->conn->real_escape_string($statusi);
    
        $sql = "INSERT INTO biografite (emri, mbiemri, statusi, njohuri, foto) 
                VALUES ('$emri', '$mbiemri', '$statusi', '$njohuri', '$foto')";
        return $this->conn->query($sql);
    }


    // Merr te gjitha biografit
    public function getAllBiografite($limit=100, $offset=0){
        $sql = "SELECT * FROM biografite
                ORDER BY id DESC
                LIMIT $limit OFFSET $offset";
        return $this->conn->query($sql);
    }

    // Merr biografin sipas ID
    public function getBiografiaById($id){
        $id = (int)$id;
        $sql = "SELECT * FROM biografite WHERE id='$id'";
        return $this->conn->query($sql)->fetch_assoc();
    }

    public function countBiografite() {
        $sql = "SELECT COUNT(*) as total FROM biografite";
        $result = $this->conn->query($sql);
        $row = $result->fetch_assoc();
        return $row['total'];
    }


    // Fshi biografin
    public function fshiBiografia($id){
        $id = (int)$id;
        $row = $this->getBiografiaById($id);
        if(!$row) return false;

        // fshi foton
        if($row['foto']){
            $folder = __DIR__ . "/../publikimet/publikim-backend/biografite/";
            if(file_exists($folder.$row['foto'])){
                unlink($folder.$row['foto']);
            }
        }

        $sql = "DELETE FROM biografite WHERE id='$id'";
        return $this->conn->query($sql);
    }

    public function getLatestLajmet($limit = 3) {
        $sql = "SELECT p.*, u.emri, u.mbiemri 
                FROM publikimet p
                LEFT JOIN users u ON p.user_id = u.id
                ORDER BY p.created_at DESC 
                LIMIT ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $limit);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }




}
?>
