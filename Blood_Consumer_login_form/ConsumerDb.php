<?php 
//include_once('../smtp/PHPMailerAutoload.php');
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

    public function Search_Donors($pin,$blood){
        $data=array();
        $sql="SELECT * FROM donor WHERE pincode = :pin AND blood_group = :blood AND availability = 1";
        $stmt=$this->conn->prepare($sql);
        $stmt->execute(['pin' => $pin, 'blood' => $blood]);
        $result=$stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach($result as $row){
            $data[]=$row;
        }
        return $data;
    }

    public function Report($email1,$email2,$content){
        $sql="INSERT INTO reports (reporter, reportie, content) VALUES (:email1,:email2,:content)";
        $stmt=$this->conn->prepare($sql);
        $stmt->execute(['email1' => $email1, 'email2' => $email2, 'content' => $content]);
        return true;
    }

    public function Contact_Details($reqid,$donid){
        $sql="INSERT INTO contact_details (requester_id,donor_id) VALUES (:reqid,:donid)";
        $stmt=$this->conn->prepare($sql);
        $stmt->execute(['reqid' => $reqid, 'donid' => $donid]);
        return true;
    }

    public function Contacted_Donors($email){
        $data = array();
        $sql = "SELECT bd.picture,bd.name,bd.email,bd.blood_group,date_time
                FROM contact_details cd
                JOIN member br ON cd.requester_id = br.id
                JOIN donor bd ON cd.donor_id = bd.id
                WHERE br.email = :email";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['email' => $email]);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach ($result as $row) {
            $data[] = $row;
        }
    
        return $data;
    }

    public function getaccept($donemail,$reqemail){
        $sql="SELECT * FROM acceptance WHERE donor_email = :donemail AND req_email = :reqemail";
        $stmt=$this->conn->prepare($sql);
        $stmt->execute(['donemail' => $donemail, 'reqemail'=>$reqemail]);
        $result=$stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
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
