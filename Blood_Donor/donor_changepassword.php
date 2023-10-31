<?php
session_start();
$has_error=false;
$error="";
require_once "../BLOOD DONOR LOGIN FORM/donordb.php";
$db=new Donordb();
if (!isset($_SESSION['loggedin']) || ($_SESSION['loggedin'] != true)) 
{
    header("location: ../BLOOD DONOR LOGIN FORM/Donor_LoginForm.php");
    exit; 
}
$data=$db->Get_data($_SESSION['username']);

if(isset($_POST['set_password']))
{
  $old=$_POST['old_password'];
  $new=$_POST['new_password'];
  $confirm= $_POST['c_password'];

  if($data['password']!=$old)
  {
    $has_error=true;
    $error="previous password did not matched";
  }
  else if($new!=$confirm)
  {
    $has_error=true;
    $error="password did not matched";
  }
  else
  {
    $db->update_password($_SESSION['username'],$new);
  }
}
?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Spread The Red (Blood Donor)</title>
  <link rel="icon" type="images/x-icon" href="../blood.png">
  <link rel="stylesheet" href="blood_donor.css">
  <!--link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css"-->
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
  
  <style>
    /* Custom CSS to reduce input box height */
    .form-control{
        height: 40px; /* Adjust the height as needed */
        width: 20px;
        margin-bottom: 15px;
    }

    #Change_Password .container .custom-form{
        margin-top: 100px;
    }
</style>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
<?php
    include "Assests/_navbar2.php";
?>
<div class="wrapper">
    <div class="sidebar">
        <h2>Donor</h2>
        <ul>
            <li id="li1"><a href="blood_donor.php" id="D"><i class="fas fa-home"></i>Dashboard</a></li>
            <li id="li2"><a href="donor_availability.php" id="A"><i class="fas fa-home"></i>Availaibility Status</a></li>
            <li id="li3"><a href="donor_profile.php" id="P"><i class="fas fa-user"></i>Profile</a></li>
            <li id="li4"><a href="donor_editprofile.php" id="EP"><i class="fas fa-address-card"></i>Edit Profile</a></li>
            <li id="li5" style="background-color: #594f8d;"><a href="donor_changepassword.php" id="CP"><i class="fa-solid fa-file-invoice"></i>Change Password</a></li>
            <li id="li6"><a href="Contact_History.php" id="CP"><i class="fa-solid fa-file-invoice"></i>Contact History</a></li>
            <li><a href="logout.php"><i class="fa-solid fa-power-off"></i>Logout</a></li>
        </ul> 
    </div>
    <div class="main_content">
        <div id="Change_Password" style="display: flex;align-items: center;justify-content: center;">
            <div class="container">
                <form method="post" action="">
                <?php if($has_error){?>
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <strong>Error!</strong>
                            <?php echo $error; ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        <?php }?>
                    <div class="form-group custom-form">
                      <label for="exampleInputEmail1">Enter Previous Password</label>
                      <input type="password" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="old_password">
                    </div>
                    <div class="form-group custom-form">
                      <label for="exampleInputPassword1">Enter New Password</label>
                      <input type="password" class="form-control" id="exampleInputPassword1" name="new_password">
                    </div>
                    <div class="form-group custom-form">
                        <label for="exampleInputPassword1">Confirm Password</label>
                        <input type="password" class="form-control" id="exampleInputPassword1" name="c_password">
                      </div>
                    <button type="submit" class="btn btn-primary" name="set_password">Set Password</button>
                  </form>
            </div>
        </div>
    </div>
</div>
<?php
    include "Assests/_footer.php";
?>
<script  src="https://code.jquery.com/jquery-3.7.0.js"></script>
  <script  src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
  <script  src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
<script src="donorscript.js"></script>


</body>



</html>