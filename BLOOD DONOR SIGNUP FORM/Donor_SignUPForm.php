<?php

require_once '../BLOOD DONOR LOGIN FORM/donordb.php';
$db=new Donordb();
$has_error=false;
$error="";
if(isset($_POST['sub']))
{
  $name=$_POST['name'];
  $email=$_POST['email'];
  $phone=$_POST['phone'];
  $address=$_POST['address'];
  $pin=$_POST['pin'];
  $blood_group=$_POST['bgroup'];
  $state=$_POST['state'];
  $city=$_POST['city'];
  $password=$_POST['pass'];
  $confirm_password=$_POST['cpass'];
  $age=$_POST['age'];
  if($db->exists($email)==1)
  {
    $has_error=true;
    $error="email already exists";
  }
  else if($password!=$confirm_password)
  {
    $has_error=true;
    $error="password did not matched";

  }
  else if($age<18)
  {
    $has_error=true;
    $error="unable to create account ! because you are not adult";
  }
  else
  {
    $otp=$db->generateOTP();
    session_start();
    $_SESSION['loggedin']=true;
    $_SESSION['name']=$name;
    $_SESSION['email']=$email;
    $_SESSION['phone']=$phone;
    $_SESSION['address']=$address;
    $_SESSION['pin']=$pin;
    $_SESSION['blood_group']=$blood_group;
    $_SESSION['state']=$state;
    $_SESSION['city']=$city;
    $_SESSION['password']=$password;
    $_SESSION['age']=$age;
    
    
    $_SESSION['otp']=$otp;
    $html='<p>Dear Blood Donor</p><br>
               <p>Your One Time Password (OTP) for creating account: <b>'.$otp.'</b></p><br>
               <p>Please note that the OTP is valid for only one session. If you try to refresh the page or <p>leave the OBDDMS portal, you will be required to regenerate a new OTP.</p><br>
               <p>If you did not request this OTP, please connect with us immediately at obddms@gmail.com.</p><br><br>
               <p>Regards,</p><br>
               <p>Social Service Group</p><br>
               <p>Online Blood Donors Database Management System</p><br>
               <p>obddms@gmail.com</p><br>';

    $db->smtp_mailer($email,'OBDDMS:Email Id Verification ', $html);
    header("Location: ../BLOOD DONOR LOGIN FORM/otp.php");



  }
  
}

?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Donor Signup</title>
  <link rel="stylesheet" href="signupstyle.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>

<body>
  <?php
    include "Assests/_navbar.php";
?>
  <div class="inner">
    <div class="heading">
      <h3>Join As Donors</h3>
    </div>
  </div>
  <div class="inner2">
    <div class="loginform">
      <h1 class="stylish-underline" style="color: #fe0000;">Signup</h1>
      <div class="formfield">
        
        <form method="post" action="">
          <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" name="name" class="form-control" id="email" aria-describedby="emailHelp">
          </div>
          <div class="mb-3">
            <label for="email" class="form-label">Email address</label>
            <input type="text" name="email" class="form-control" id="email" aria-describedby="emailHelp">
          </div>
          <div class="mb-3">
            <label for="phone" class="form-label">Phone Number</label>
            <input type="number" name="phone" class="form-control" id="pass">
          </div>
          <div class="mb-3">
            <label for="address">Address</label>
            <textarea class="form-control" name="address" id="exampleFormControlTextarea1" rows="3"></textarea>
          </div>
          <div class="mb-3">
            <label for="pin_code" class="form-label">Pin Code</label>
            <input type="number" name="pin" class="form-control" id="pass">
          </div>
          <div class="mb-3">
            <label for="blood_group">Blood Group</label>
            <select id="inputState" name="bgroup" class="form-control">
              <option selected>Choose...</option>
              <option>A+</option>
              <option>A-</option>
              <option>B+</option>
              <option>B-</option>
              <option>O+</option>
              <option>O-</option>
              <option>AB+</option>
              <option>AB-</option>
            </select>
          </div>
          <div class="mb-3">
            <label for="state">State</label>
            <select id="inputState" name="state" class="form-control">
              <option selected>Choose...</option>
              <option>Andhra Pradesh</option>
              <option>Arunachal Pradesh</option>
              <option>Assam</option>
              <option>Bihar</option>
              <option>Chhattisgarh</option>
              <option>Goa</option>
              <option>Gujarat</option>
              <option>Haryana</option>
              <option>Himachal Pradesh</option>
              <option>Jharkhand</option>
              <option>Karnataka</option>
              <option>Kerala</option>
              <option>Madhya Pradesh</option>
              <option>Manipur</option>
              <option>Meghalaya</option>
              <option>Mizoram</option>
              <option>Nagaland</option>
              <option>Odisha</option>
              <option>Punjab</option>
              <option>Rajasthan</option>
              <option>Sikkim</option>
              <option>Tamil Nadu</option>
              <option>Telangana</option>
              <option>Tripura</option>
              <option>Uttar Pradesh</option>
              <option>Uttarakhand</option>
              <option>West Bengal</option>
            </select>
          </div>
          <div class="mb-3">
            <label for="city" class="form-label">City</label>
            <input type="text" name="city" class="form-control" id="email" aria-describedby="emailHelp">
          </div>
          <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" name="pass" class="form-control" id="pass">
          </div>
          <div class="mb-3">
            <label for="cpassword" class="form-label">Confirm Password</label>
            <input type="password" name="cpass" class="form-control" id="pass">
          </div>
          
          <div class="mb-3">
            <label for="age" class="form-label">age</label>
            <input type="number" name="age" class="form-control" id="pass">
          </div>
          <button type="submit" class="btn btn-primary" name="sub">Submit</button>
        </form>
        <p id="new">Back to <a href="../BLOOD DONOR LOGIN FORM/Donor_LoginForm.php" style="color:#fe0000;">LogIn</a></p>
      </div>
    </div>
  </div>
  
  <?php include "Assests/_footer.php" ?>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  
</body>

</html>