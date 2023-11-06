<?php

    class not_memberDb{
        private $dsn="mysql:host=localhost; dbname=online_blood_donors_database_management_system";
        private $user="root";
        private $pass="";
        public $conn;

        public function __construct(){
            try{
                $this->conn=new PDO($this->dsn,$this->user,$this->pass);
            }
            catch(PDOException $e){
                echo $e->getMessage();
            }
        }
    
    public function insert($name,$email,$feedback){
        $sql="INSERT INTO not_member (name,email,feedback) VALUES (:name,:email,:feedback)";
        $stmt=$this->conn->prepare($sql);
        $stmt->execute(['name' => $name,'email' => $email,'feedback' => $feedback]);

        return true;
    }
  }


?>