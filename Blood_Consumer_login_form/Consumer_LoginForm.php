<?php
require_once "ConsumerDb.php";
require_once '../Mail/smtpmailer.php';
error_reporting(0);
$has_errors=false;
$err='';
$db=new Consumerdb();
$m=new Mail();
$email_pattern = "/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/";
if(isset($_POST['sub']))
{
  $email=$_POST['email'];
  $password=$_POST['pass'];

  $member=$db->Get_data($email);

  if($member['is_block']==1){
    $has_errors=true;
    $err='Your Account Is Blocked Please Contact obddms2023@gmail.com';
  }

  else if($db->Login($email,$password)==1)
  {
    session_start();
    $_SESSION['loggedin']=true;
    $_SESSION['username']=$email;
    header("Location: ../Blood_Consumer/consumer.php");

  }
  else{
    $has_errors=true;
    $err='Invalid Login Creadentials';
  }
}
  if(isset($_POST['fsub'])){
    $nemail=$_POST['nemail'];
    $npass=$_POST['npass'];
    $nconfpass=$_POST['nconfpass'];

    if($db->exists($nemail)==1 && $npass==$nconfpass){
      session_start();
      $_SESSION['mail']=$nemail;
      $_SESSION['npass']=$npass;
      $_SESSION['loggedin']=true;
      $otp=$db->generateOTP();
      $_SESSION['numotp']=$otp;
      $html='<p>Dear User</p><br>
               <p>Your One Time Password (OTP) for changing password: <b>'.$otp.'</b></p><br>
               <p>Please note that the OTP is valid for only one session. If you try to refresh the page or <p>leave the OBDDMS portal, you will be required to regenerate a new OTP.</p><br>
               <p>If you did not request this OTP, please connect with us immediately at obddms2023@gmail.com.</p><br><br>
               <p>Regards,</p><br>
               <p>Social Service Group</p><br>
               <p>Online Blood Donors Database Management System</p><br>
               <p>obddms2023@gmail.com</p><br>';

      $m->smtp_mailer($nemail,'OBDDMS: Login Email ID Verification', $html);
      header("Location: forgetotp.php");
    }
    else if(!filter_var($nemail, FILTER_VALIDATE_EMAIL) || !preg_match($email_pattern, $nemail)){
      $has_errors=true;
      $err="Please Check Your Email";
    }
    else{
      $has_errors=true;
      $err='Invalid Email/Password';
    }
}
?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Spread The Red (Member Login)</title>
  <link rel="icon" type="images/x-icon" href="../blood.png">
  <link rel="stylesheet" href="Consumer_loginstyle.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>

<body>
<?php
    include "Assests/_navbar.php";
?>
  
  <div class="inner">
    <div class="heading">
      <h3>Login As Member</h3>
    </div>
  </div>
  <div class="inner2">
    <div class="loginform">
      <h1 class="stylish-underline">Log in</h1>
      <div class="formfield">
        <form action="" method="post">
        <?php if($has_errors){?>
          <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Error!</strong>
            <?php echo $err; ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
          <?php }?>
          <div class="mb-3">
            <label for="email" class="form-label">Email address</label>
            <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp">
          </div>
          <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input type="password" name="pass" class="form-control" id="pass">
          </div>

          <button type="submit" class="btn btn-primary text-center" name="sub">Submit</button>
        </form>
        <p class="forget" data-toggle="modal" data-target="#myModal">Forget Password?</p>
        <p id="new">New User? <a href="../Blood_Consumer_signup_form/Consumer_SignUPForm.php" style="color:#fe0000;">Sign Up</a></p>
      </div>
    </div>
  </div>
  <!-- Modal -->
  <div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Change The Password</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form method="post" action="">
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Email address</label>
              <input type="email" name="nemail" class="form-control" id="nemail" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
              <label for="exampleInputPassword1" class="form-label">New Pasword</label>
              <input type="password" name="npass" class="form-control" id="npass">
            </div>
            <div class="mb-3">
              <label for="exampleInputPassword1" class="form-label">Confirm Password</label>
              <input type="password" name="nconfpass" class="form-control" id="nconfpass">
            </div>
            <div class="form-group">
              <button type="submit" name="fsub" id="fsub" class="btn btn-danger btn-block">Change Password</button>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
  <?php include "Assests/_footer.php" ?>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script>
    // jQuery to handle the form submission and show the modal
    document.getElementsByTagName('p')[0].addEventListener('click',(e)=>{
      $("#myModal").modal("show");
    })
    let wait=document.getElementById('fsub');
    wait.addEventListener('click',(e)=>{
      wait.textContent = 'Please Wait...';
    });
  </script>
</body>

</html>