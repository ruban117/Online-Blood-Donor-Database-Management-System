<?php
include('../smtp/PHPMailerAutoload.php');
class Consumerdb{
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
        $sql="INSERT INTO member (name,email,phone,address,pincode,blood_group,state,city,password,age) VALUES (:name,:email,:phone,:address,:pincode,:bgroup,:state,:city,:pass,:age)";
        $stmt=$this->conn->prepare($sql);
        $stmt->execute(['name' => $name,'email' => $email,'phone' => $phone,'address' => $address,'pincode' => $pincode,'bgroup' => $bgroup,'state' => $state,'city' => $city,'pass' => $pass,'age' =>$age]);

        return true;
    }

    public function exists($email)
    {
        $sql="SELECT COUNT(*) FROM member WHERE email=:email";
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
        $sql="SELECT COUNT(*) FROM member WHERE email = :email AND password = :password";
        $stmt=$this->conn->prepare($sql);
        $stmt->execute(['email' => $email, 'password' => $password]);
        $no_of_users=$stmt->fetchColumn();
        return $no_of_users;
    }

    public function Get_data($email)
    {
        $sql="SELECT * FROM member WHERE email = :email";
        $stmt=$this->conn->prepare($sql);
        $stmt->execute(['email' => $email]);
        $result=$stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

    public function ForgetPassword($email,$pass){
        $sql2="UPDATE member SET password = :pass WHERE email= :email";
        $stmt2=$this->conn->prepare($sql2);
        $res=$stmt2->execute(["pass"=>$pass,"email"=>$email]);
        return true;
    }

    public function update_user($name,$email,$phone,$address,$pincode,$bloodgroup,$state,$city,$age)
    {
        $sql="UPDATE member SET name= :name, phone= :phone, address= :address, pincode= :pincode, blood_group= :bloodgroup, state= :state, city= :city, age= :age WHERE email= :email";

        $stmt=$this->conn->prepare($sql);

        $stmt->execute(['name'=>$name,'email'=>$email,'phone'=>$phone,'address'=>$address,'pincode'=>$pincode,'bloodgroup'=>$bloodgroup,'state'=>$state,'city'=>$city,'age'=>$age]);

    }

    public function update_image($email,$imagepath)
    {
        $sql="UPDATE member SET picture= :imagepath WHERE email= :email";
        $stmt=$this->conn->prepare($sql);

        $stmt->execute(['imagepath'=>$imagepath,'email'=>$email]);

    }
    public function update_password($email,$password)
    {
        $sql="UPDATE member SET password= :password WHERE email= :email";
        $stmt=$this->conn->prepare($sql);
        $stmt->execute(['password'=>$password,'email'=>$email]);
        

    }
}
