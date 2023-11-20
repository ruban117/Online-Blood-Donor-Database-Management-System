<?php
  session_start();
  $has_err=false;
  $err='';
  require_once 'ConsumerDb.php';
  $db=new Consumerdb();
  if (!isset($_SESSION['loggedin']) || ($_SESSION['loggedin'] != true)) {
      header("location: Consumer_LoginForm.php");
      exit;
  }

  if(isset($_POST['sub'])){
    $otp=$_POST['otpnumb'];

    if($otp == $_SESSION['numotp']){
      $db->ForgetPassword($_SESSION['mail'],$_SESSION['npass']);
      session_unset();
      session_destroy();
      header("Location: Consumer_LoginForm.php");
    }
    else{
      $has_err=true;
      $err="Invalid OTP";
    }
  }

?>


<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Otp</title>
  <link rel="stylesheet" href="otp.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>

<body>
  <?php
    include "Assests/_navbar.php";
?>

  <div class="inner">
    <div class="heading">
      <h3>An Otp Is Sent To Your Gmail Please Enter To Continue</h3>
    </div>
  </div>
  <div class="inner2">
    <div class="loginform">
      <h1 class="stylish-underline">Verifying It's You!</h1>
      <div class="formfield">
        <form action="" method="post">
        <?php if($has_err){?>
          <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Error!</strong>
            <?php echo $err; ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
          <?php }?>
          <div class="mb-3">
            <label for="otp" class="form-label">Enter OTP</label>
            <input type="number" name="otpnumb" class="form-control" id="email" aria-describedby="emailHelp">
          </div>
          <button type="submit" class="btn btn-primary text-center" name="sub">Submit</button>
        </form>
      </div>
    </div>
  </div>
  <?php include "Assests/_footer.php" ?>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</body>

</html>