<?php
include('../smtp/PHPMailerAutoload.php');
class Donordb{
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
    public function signup($name,$email,$phone,$address,$pincode,$bgroup,$state,$city,$pass,$age){
        $sql="INSERT INTO donor (name,email,phone,address,pincode,blood_group,state,city,password,age) VALUES (:name,:email,:phone,:address,:pincode,:bgroup,:state,:city,:pass,:age)";
        $stmt=$this->conn->prepare($sql);
        $stmt->execute(['name' => $name,'email' => $email,'phone' => $phone,'address' => $address,'pincode' => $pincode,'bgroup' => $bgroup,'state' => $state,'city' => $city,'pass' => $pass,'age' =>$age]);

        return true;
    }

    public function exists($email)
    {
        $sql="SELECT COUNT(*) FROM donor WHERE email=:email";
        $stmt=$this->conn->prepare($sql);
        $stmt->execute(['email'=>$email]);
        $no_of_users=$stmt->fetchColumn();
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

    public function generateOTP()
    {
        return rand(100000,999999);
    }

    public function Login($email,$password)
    {
        $sql="SELECT COUNT(*) FROM donor WHERE email = :email AND password = :password";
        $stmt=$this->conn->prepare($sql);
        $stmt->execute(['email' => $email, 'password' => $password]);
        $no_of_users=$stmt->fetchColumn();
        return $no_of_users;
    }

    public function Get_data($email)
    {
        $sql="SELECT * FROM donor WHERE email = :email";
        $stmt=$this->conn->prepare($sql);
        $stmt->execute(['email' => $email]);
        $result=$stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

    public function ForgetPassword($email,$pass){
        $sql2="UPDATE donor SET password = :pass WHERE email= :email";
        $stmt2=$this->conn->prepare($sql2);
        $res=$stmt2->execute(["pass"=>$pass,"email"=>$email]);
        return true;
    }

    public function update_user($name,$email,$phone,$address,$pincode,$bloodgroup,$state,$city,$age)
    {
        $sql="UPDATE donor SET name= :name, phone= :phone, address= :address, pincode= :pincode, blood_group= :bloodgroup, state= :state, city= :city, age= :age WHERE email= :email";

        $stmt=$this->conn->prepare($sql);

        $stmt->execute(['name'=>$name,'email'=>$email,'phone'=>$phone,'address'=>$address,'pincode'=>$pincode,'bloodgroup'=>$bloodgroup,'state'=>$state,'city'=>$city,'age'=>$age]);

    }

    public function update_image($email,$imagepath)
    {
        $sql="UPDATE donor SET picture= :imagepath WHERE email= :email";
        $stmt=$this->conn->prepare($sql);

        $stmt->execute(['imagepath'=>$imagepath,'email'=>$email]);

    }
    public function update_password($email,$password)
    {
        $sql="UPDATE donor SET password= :password WHERE email= :email";
        $stmt=$this->conn->prepare($sql);
        $stmt->execute(['password'=>$password,'email'=>$email]);
        

    }

    public function Change_Availiability($email){
        $sql="UPDATE donor SET availability= 0 WHERE email= :email";
        $stmt=$this->conn->prepare($sql);
        $stmt->execute(['email'=>$email]);
    }

    public function Change_Availiability_To_One($email){
        $sql="UPDATE donor SET availability= 1 WHERE email= :email";
        $stmt=$this->conn->prepare($sql);
        $stmt->execute(['email'=>$email]);
    }

    public function Contact_History($email){
        $data = array();
        $sql = "SELECT br.picture,br.name,br.email,br.blood_group,date_time
                FROM contact_details cd
                JOIN member br ON cd.requester_id = br.id
                JOIN donor bd ON cd.donor_id = bd.id
                WHERE bd.email = :email";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['email' => $email]);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach ($result as $row) {
            $data[] = $row;
        }
    
        return $data;
    }
    public function Acceptence($email)
    {
        $sql="UPDATE member SET accepted= 0 WHERE email= :email";
        $stmt=$this->conn->prepare($sql);
        $stmt->execute(['email'=>$email]);
    }

    public function AcceptTable($donemail,$reqemail){
        $sql="INSERT INTO acceptance (donor_email,req_email,accepted) VALUES (:donemail,:reqemail,0)";
        $stmt=$this->conn->prepare($sql);
        $stmt->execute(['donemail'=>$donemail,'reqemail'=>$reqemail]);
        return true;
    }

    public function getaccept($donemail,$reqemail){
        $sql="SELECT * FROM acceptance WHERE donor_email = :donemail AND req_email = :reqemail";
        $stmt=$this->conn->prepare($sql);
        $stmt->execute(['donemail' => $donemail, 'reqemail'=>$reqemail]);
        $result=$stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

    public function getacceptrej($donemail,$reqemail){
        $sql="INSERT INTO acceptance (donor_email,req_email,accepted) VALUES (:donemail,:reqemail,1)";
        $stmt=$this->conn->prepare($sql);
        $stmt->execute(['donemail' => $donemail, 'reqemail'=>$reqemail]);
        return true;
    }

    public function allcount($donemail,$reqemail)
    {
        $sql="SELECT COUNT(*) FROM acceptance WHERE donor_email = :donemail AND req_email = :reqemail";
        $stmt=$this->conn->prepare($sql);
        $stmt->execute(['donemail' => $donemail, 'reqemail'=>$reqemail]);
        $no_of_users=$stmt->fetchColumn();
        return $no_of_users;
    }
    
}

?>