<?php
    include('../smtp/PHPMailerAutoload.php');
    class AdminDb{
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

        public function Login($email,$pass) {
            $sql = "SELECT COUNT(*) FROM admin WHERE email = :email AND password = :pass"; // Remove the single quotes
            $stmt = $this->conn->prepare($sql);
            $stmt->execute(['email' => $email, 'pass' => $pass]); // Use an associative array to bind the parameter
            $no_of_users = $stmt->fetchColumn(); // Use fetchColumn() to get the count
            return $no_of_users;
        }

        public function getName($email){
            $sql = "SELECT name FROM admin WHERE email = :email";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute(['email' => $email]);
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
        
            if ($result) {
                return $result['name'];
            } else {
                return null; // or handle the case where no user is found
            }
        }

        public function ViewProfile($email){
            $sql= "SELECT * FROM admin WHERE email = :email";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute(['email' => $email]);
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }

        public function Exists($email) {
            $sql = "SELECT COUNT(*) FROM admin WHERE email = :email"; // Remove the single quotes
            $stmt = $this->conn->prepare($sql);
            $stmt->execute(['email' => $email]); // Use an associative array to bind the parameter
            $no_of_users = $stmt->fetchColumn(); // Use fetchColumn() to get the count
            return $no_of_users;
        }

        public function generateOTP() {
            return rand(100000, 999999);
        }

        public function ForgetPassword($email,$pass){
            $sql = "SELECT id FROM admin WHERE email = :email";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute(['email' => $email]);
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            $id=$row['id'];
            $sql2="UPDATE admin SET password = :pass WHERE id= :id";
            $stmt2=$this->conn->prepare($sql2);
            $res=$stmt2->execute(["pass"=>$pass,"id"=>$id]);
            return true;
        }

        //get id

        public function getUserByEmail($email) {
            $sql = "SELECT * FROM `admin` WHERE email = :email";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute(['email' => $email]);
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result;
        }

        public function updateUser($email, $name, $pno, $add, $pin, $bgroup, $state, $city) {
            $sql = "UPDATE admin SET name = :name, phoneno =:pno, address =:add, pin_code =:pin, blood_group = :bgroup, state = :state, city = :city WHERE email = :email";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute(['email' => $email , 'name'=> $name, 'pno'=> $pno, 'add'=> $add, 'pin'=> $pin, 'bgroup'=> $bgroup, 'state'=> $state, 'city'=> $city]);
        }
        public function updateUserImg($email, $imagePath) {
            $sql = "UPDATE admin SET picture = :imagePath WHERE email = :email";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute(['email' => $email , 'imagePath'=> $imagePath]);
        }
        
        public function updatePassword($email, $pass){
            $sql = "UPDATE admin SET password = :pass WHERE email = :email";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute(['email' => $email, 'pass' => $pass]);
        }

        public function ReadDonors(){
            $data=array();
            $sql="SELECT * FROM donor";
            $stmt=$this->conn->prepare($sql);
            $stmt->execute();
            $result=$stmt->fetchAll(PDO::FETCH_ASSOC);
            foreach($result as $row){
                $data[]=$row;
            }
            return $data;
        }

        public function ReadMembers(){
            $data=array();
            $sql="SELECT * FROM member";
            $stmt=$this->conn->prepare($sql);
            $stmt->execute();
            $result=$stmt->fetchAll(PDO::FETCH_ASSOC);
            foreach($result as $row){
                $data[]=$row;
            }
            return $data;
        }

        public function TotalDonor() {
            $sql = "SELECT COUNT(*) FROM donor"; // Remove the single quotes
            $stmt = $this->conn->prepare($sql);
            $stmt->execute(); // Use an associative array to bind the parameter
            $no_of_users = $stmt->fetchColumn(); // Use fetchColumn() to get the count
            return $no_of_users;
        }

        public function TotalMembers() {
            $sql = "SELECT COUNT(*) FROM member"; // Remove the single quotes
            $stmt = $this->conn->prepare($sql);
            $stmt->execute(); // Use an associative array to bind the parameter
            $no_of_users = $stmt->fetchColumn(); // Use fetchColumn() to get the count
            return $no_of_users;
        }

        public function TotalReports() {
            $sql = "SELECT COUNT(*) FROM reports"; // Remove the single quotes
            $stmt = $this->conn->prepare($sql);
            $stmt->execute(); // Use an associative array to bind the parameter
            $no_of_users = $stmt->fetchColumn(); // Use fetchColumn() to get the count
            return $no_of_users;
        }
        


        public function smtp_mailer($to,$subject, $msg){
            $mail = new PHPMailer(); 
            $mail->IsSMTP(); 
            $mail->SMTPAuth = true; 
            $mail->SMTPSecure = 'tls'; 
            $mail->Host = "smtp.gmail.com";
            $mail->Port = 587; 
            $mail->IsHTML(true);
            $mail->CharSet = 'UTF-8'; 
            $mail->Username = "obddms2023@gmail.com";
            $mail->Password = "wtzcejzdqevwrxsb";
            $mail->SetFrom("obddms2023@gmail.com");
            $mail->Subject = $subject;
            $mail->Body =$msg;
            $mail->AddAddress($to);
            $mail->SMTPOptions=array('ssl'=>array(
                'verify_peer'=>false,
                'verify_peer_name'=>false,
                'allow_self_signed'=>false
            ));
            if(!$mail->Send()){
                echo $mail->ErrorInfo;
            }else{
                return 'Sent';
            }
        }

        public function ReadReports(){
            $data=array();
            $sql="SELECT * FROM reports";
            $stmt=$this->conn->prepare($sql);
            $stmt->execute();
            $result=$stmt->fetchAll(PDO::FETCH_ASSOC);
            foreach($result as $row){
                $data[]=$row;
            }
            return $data;
        }

        public function ReadAllContactedPeople(){
            $data=array();
            $sql="SELECT
            br.email AS requester_email,
            br.picture AS requester_pic,
            bd.email AS donor_email,
            bd.picture AS donor_pic,
            bd.blood_group AS req_blood,
            cd.date_time
            FROM contact_details cd
            JOIN member br ON cd.requester_id = br.id
            JOIN donor bd ON cd.donor_id = bd.id";
            $stmt=$this->conn->prepare($sql);
            $stmt->execute();
            $result=$stmt->fetchAll(PDO::FETCH_ASSOC);
            foreach($result as $row){
                $data[]=$row;
            }
            return $data;
        }
    }

?>