<?php

include('Database.php');

class Drejtimet extends Database {



    
    // Drejtimet

     public function save_drejtimi($drejtimi){
        $sql="insert into drejtimet(drejtimi)values('$drejtimi')";
        $this->conn->query($sql);
        header('Location: ../admin-frontend/drejtim_shto_form.php');
    }

    public function index_drejtimi(){
        $sql="select * from drejtimet";
        $results=$this->conn->query($sql);
        return $results->fetch_all(MYSQLI_ASSOC);
    }



    
}

?>