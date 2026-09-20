<?php

include('Database.php');

class Nxenesi extends Database {

    // Lista e Nxenesve
    public function index() {

        $sql="SELECT * FROM nxenesit";
        $result=$this->conn->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);

    }

    // Find
    public function find($id) {
        
        $sql="SELECT * FROM nxenesit WHERE id='$id' limit 1";
        $result=$this->conn->query($sql);
        return $result->fetch_assoc();

    }

    // Search
    public function kerko_nxenesin() {

        $search = isset($_POST['search']) ? $_POST['search'] : '';
    
        if ($search != '') {
    
            $sql = "
                SELECT 
                    n.*,
                    d.drejtimi,
                    CONCAT(p.emri,' ',p.mbiemri) AS prindi
                FROM nxenesit n
                LEFT JOIN drejtimet d ON n.drejtim_id = d.id
                LEFT JOIN users p ON n.prind_id = p.id
                WHERE 
                    n.emri LIKE '%$search%' 
                    OR n.mbiemri LIKE '%$search%'
                    OR d.drejtimi LIKE '%$search%'
                    OR p.emri LIKE '%$search%'
                    OR p.mbiemri LIKE '%$search%'
            ";
    
        } else {
    
            $sql = "
                SELECT 
                    n.*,
                    d.drejtimi,
                    CONCAT(p.emri,' ',p.mbiemri) AS prindi
                FROM nxenesit n
                LEFT JOIN drejtimet d ON n.drejtim_id = d.id
                LEFT JOIN users p ON n.prind_id = p.id
                ORDER BY n.created_at ASC
            ";
        }
    
        $result = $this->conn->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    // Shto Nxenesit
    public function shto_nxenesin(string $emri,string $mbiemri,string $klasa, $drejtimi_id,$prind_id) {
        
        $sql="INSERT INTO nxenesit(emri,mbiemri,klasa,drejtim_id,prind_id) VALUES('$emri','$mbiemri','$klasa','$drejtimi_id','$prind_id')";

        $this->conn->query($sql);

         echo "<script>alert('Nxënësi u ruajt me sukses!'); window.location.href='nxenesi_shto_form.php';</script>";

    }

    public function index_nxenes_join() {

        $sql = "
            SELECT 
                n.id,
                n.emri,
                n.mbiemri,
                n.klasa,
                d.drejtimi,
                CONCAT(u.emri, ' ', u.mbiemri) AS prindi
            FROM nxenesit n
            LEFT JOIN drejtimet d ON n.drejtim_id = d.id
            LEFT JOIN users u ON n.prind_id = u.id
            ORDER BY n.created_at DESC
        ";
    
        $result = $this->conn->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    // Editimi i Nxenesit
    public function perditeso_nxenesin($id,$emri,$mbiemri,$klasa,$drejtimi_id){
    
       $sql="UPDATE nxenesit 
             SET emri='$emri',
                 mbiemri='$mbiemri',
                 klasa='$klasa',
                 drejtim_id='$drejtimi_id'
             WHERE id='$id' LIMIT 1";
    
       $this->conn->query($sql);
    
       echo "<script>alert('Nxenesi u ruajt me sukses!'); window.location.href='../admin-frontend/nxenesit.php';</script>";
       exit;
    }


    // Merr nxenesin per edit
    public function edit_index($id) {
    
        $sql = "
            SELECT 
                n.*, 
                CONCAT(p.emri,' ',p.mbiemri) AS prindi, 
                d.drejtimi 
            FROM nxenesit n
            LEFT JOIN users p ON n.prind_id = p.id
            LEFT JOIN drejtimet d ON n.drejtim_id = d.id
            WHERE n.id = '$id' 
            LIMIT 1
        ";
    
        $result = $this->conn->query($sql);
        return $result->fetch_assoc();
    }

    // Fshirja e Nxenesve
    public function fshi_nxenesin($id) {
    
        $sql="DELETE FROM nxenesit WHERE id='$id'";
        $this->conn->query($sql);
    
         echo "<script>alert('Nxenesi u fshie me sukses!'); window.location.href='../admin-frontend/nxenesit.php';</script>";

        
    }






    // Lendet

     public function save_lenda($lenda){
        $sql="insert into lendet(lenda)values('$lenda')";
        $this->conn->query($sql);
        echo "<script>alert('Lënda u ruajt me sukses!'); window.location.href='../admin-frontend/lenda_shto_form.php';</script>";
    }

    public function index_lenda(){
        $sql="select * from lendet";
        $results=$this->conn->query($sql);
        return $results->fetch_all(MYSQLI_ASSOC);
    }

    public function update_lenda($id, $lenda){
        $sql = "UPDATE lendet SET lenda='$lenda' WHERE id='$id'";
        $this->conn->query($sql);
        echo "<script>window.location.href='../admin-frontend/lendet.php';</script>";
    }


    public function fshi_lenden($id){
        $sql = "DELETE FROM lendet WHERE id='$id'";
        $this->conn->query($sql);

        header('Location: ../admin-frontend/lendet.php');
    }



    //Drejtimet

    public function index_drejtimi(){
        $sql="select * from drejtimet";
        $results=$this->conn->query($sql);
        return $results->fetch_all(MYSQLI_ASSOC);
    }

    public function nxenesit_sipas_drejtimi_dhe_klase($drejtim_id, $klasa) {
    
        $sql = "
            SELECT 
                n.id,
                n.emri,
                n.mbiemri,
                n.klasa,
                d.drejtimi,
                CONCAT(u.emri, ' ', u.mbiemri) AS prindi,
                u.telefoni AS telefoni
            FROM nxenesit n
            LEFT JOIN drejtimet d ON n.drejtim_id = d.id
            LEFT JOIN users u ON n.prind_id = u.id
            WHERE n.drejtim_id = $drejtim_id AND n.klasa LIKE '$klasa%'
            ORDER BY n.emri ASC
        ";
    
        $result = $this->conn->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }
    

    // Femijet e prindit
    public function nxenesit_e_prindit($prind_id) {
    
        $sql = "
            SELECT 
                n.id,
                n.emri,
                n.mbiemri,
                n.klasa,
                d.drejtimi
            FROM nxenesit n
            LEFT JOIN drejtimet d ON n.drejtim_id = d.id
            WHERE n.prind_id = $prind_id
            ORDER BY n.emri ASC
        ";
    
        $result = $this->conn->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function nxenesit_e_prind($prind_id) {

    $sql = "
        SELECT 
            n.id,
            n.emri,
            n.mbiemri,
            n.klasa,
            d.drejtimi,
            k.emri AS kujdestar_emri,
            k.mbiemri AS kujdestar_mbiemri
        FROM nxenesit n
        LEFT JOIN drejtimet d ON n.drejtim_id = d.id
        LEFT JOIN users k 
            ON n.klasa = k.kujdestar_klasa AND k.roli = 'prof'
        WHERE n.prind_id = ?
        ORDER BY n.emri ASC
    ";

    $stmt = $this->conn->prepare($sql);
    $stmt->bind_param("i", $prind_id);
    $stmt->execute();
    $res = $stmt->get_result();
    return $res->fetch_all(MYSQLI_ASSOC);
}

    
    
    
    
    
    
    
    public function nxenesit_sipas_klase_prof($klasa) {
        $sql = "
            SELECT n.id, n.emri, n.mbiemri, n.klasa,
                   CONCAT(u.emri,' ',u.mbiemri) AS prindi,
                   u.telefoni
            FROM nxenesit n
            LEFT JOIN users u ON n.prind_id = u.id
            WHERE n.klasa LIKE '$klasa'
            ORDER BY n.emri ASC
        ";
        $res = $this->conn->query($sql);
        return $res ? $res->fetch_all(MYSQLI_ASSOC) : [];
    }
    
    public function kerko_nxenesin_klase($klasa, $search){
        $sql = "
            SELECT n.id, n.emri, n.mbiemri, n.klasa,
                   CONCAT(u.emri,' ',u.mbiemri) AS prindi,
                   u.telefoni
            FROM nxenesit n
            LEFT JOIN users u ON n.prind_id = u.id
            WHERE n.klasa LIKE '$klasa'
              AND (n.emri LIKE '%$search%' OR n.mbiemri LIKE '%$search%')
            ORDER BY n.emri ASC
        ";
        $res = $this->conn->query($sql);
        return $res ? $res->fetch_all(MYSQLI_ASSOC) : [];
    }
    






















// NOTAT


    public function getNotatNxenesi($nxenesi_id) {
        $sql = "SELECT n.*, l.lenda 
                FROM notat n 
                JOIN lendet l ON n.lenda_id = l.id 
                WHERE n.nxenesi_id = ?
                ORDER BY l.lenda ASC";

        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $nxenesi_id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }


    public function saveNota($nxenesi_id, $lenda_id, $gj1_p1, $gj1_p2, $gj2_p1, $gj2_p2) {
        $check = $this->conn->prepare("SELECT id FROM notat WHERE nxenesi_id=? AND lenda_id=?");
        $check->bind_param("ii", $nxenesi_id, $lenda_id);
        $check->execute();
        $res = $check->get_result();

        if($res->num_rows > 0){
            // UPDATE
            $nota = $res->fetch_assoc();
            $update = $this->conn->prepare("UPDATE notat SET gj1_p1=?, gj1_p2=?, gj2_p1=?, gj2_p2=? WHERE id=?");
            $update->bind_param("iiiii", $gj1_p1, $gj1_p2, $gj2_p1, $gj2_p2, $nota['id']);
            return $update->execute();
        } else {
            // SHTO TE REJA
            $insert = $this->conn->prepare("INSERT INTO notat (nxenesi_id, lenda_id, gj1_p1, gj1_p2, gj2_p1, gj2_p2) VALUES (?,?,?,?,?,?)");
            $insert->bind_param("iiiiii", $nxenesi_id, $lenda_id, $gj1_p1, $gj1_p2, $gj2_p1, $gj2_p2);
            return $insert->execute();

        }
    }




}

?>