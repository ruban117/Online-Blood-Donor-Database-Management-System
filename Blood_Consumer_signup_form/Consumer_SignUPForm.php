<?php

require_once '../Blood_Consumer_login_form/ConsumerDb.php';
require_once '../Mail/smtpmailer.php';
$db=new Consumerdb();
$m=new Mail();
$has_error=false;
$email_pattern = "/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/";
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
  else if(!filter_var($email, FILTER_VALIDATE_EMAIL) || !preg_match($email_pattern, $email)){
    $has_error=true;
    $error="Please Check Your Email";
  }
  else if($password!=$confirm_password)
  {
    $has_error=true;
    $error="password did not matched";

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
    $html='<p>Dear Blood Member/Requester</p><br>
               <p>Your One Time Password (OTP) for creating account: <b>'.$otp.'</b></p><br>
               <p>Please note that the OTP is valid for only one session. If you try to refresh the page or <p>leave the OBDDMS portal, you will be required to regenerate a new OTP.</p><br>
               <p>If you did not request this OTP, please connect with us immediately at obddms@gmail.com.</p><br><br>
               <p>Regards,</p><br>
               <p>Social Service Group</p><br>
               <p>Online Blood Donors Database Management System</p><br>
               <p>obddms@gmail.com</p><br>';

    $m->smtp_mailer($email,'OBDDMS:Email Id Verification ', $html);
    header("Location: ../Blood_Consumer_login_form/otp.php");



  }
  
}

?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Spread The Red (Member Signup)</title>
  <link rel="icon" type="images/x-icon" href="../blood.png">
  <link rel="stylesheet" href="Consumer_signupstyle.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>

<body>
  <?php
    include "Assests/_navbar.php";
?>
  <div class="inner">
    <div class="heading">
      <h3>Join As Member</h3>
    </div>
  </div>
  <div class="inner2">
    <div class="loginform">
      <h1 class="stylish-underline" style="color: #fe0000;">Signup</h1>
      <div class="formfield">
        <form method="post" action="">
          <div class="mb-3">
            <label for="email" class="form-label">Name</label>
            <input type="text" name="name" class="form-control" style="width : 440px;" id="name" aria-describedby="emailHelp" required>
          </div>
          <div class="mb-3">
            <label for="name" class="form-label">Email address</label>
            <input type="text" name="email" class="form-control" id="email" aria-describedby="emailHelp" required>
          </div>
          <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Phone Number</label>
            <input type="number" name="phone" class="form-control" id="numb" required>
          </div>
          <div class="mb-3">
            <label for="exampleFormControlTextarea1">Address</label>
            <textarea class="form-control" name="address" id="exampleFormControlTextarea1" rows="3" required></textarea>
          </div>
          <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Pin Code</label>
            <input type="number" name="pin" class="form-control" id="pin" required>
          </div>
          <div class="mb-3">
            <label for="inputState">Blood Group</label>
            <select id="inputState" class="form-control" name="bgroup" required>
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
            <label for="inputState">State</label>
            <select id="inputState" class="form-control" name="state" required>
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
            <label for="email" class="form-label">City</label>
            <input type="text" name="city" class="form-control" id="email" aria-describedby="emailHelp" required>
          </div>
          <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input type="password" name="pass" class="form-control" id="pass" required>
          </div>
          <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Confirm Password</label>
            <input type="password" name="cpass" class="form-control" id="pass" required>
          </div>
          <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Age</label>
            <input type="number" name="age" class="form-control" id="pass" required>
          </div>
          <button type="submit" name="sub" id="fsub" class="btn btn-primary">Submit</button>
          </button>
        </form>
        <p id="new">Back to <a href="../Blood_Consumer_login_form/Consumer_LoginForm.php" style="color:#fe0000;">LogIn</a></p>
      </div>
    </div>
  </div>
  </div>
  <?php include "Assests/_footer.php" ?>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script>
    // jQuery to handle the form submission and show the modal
    $(document).ready(function () {
      $("#signup-form").submit(function (event) {
        console.log("opened")
        event.preventDefault();
        $("#myModal").modal("show");
      });
    });

    let wait=document.getElementById('fsub');
    wait.addEventListener('click',(e)=>{
      wait.textContent = 'Please Wait...';
    });
  </script>
</body>

</html>