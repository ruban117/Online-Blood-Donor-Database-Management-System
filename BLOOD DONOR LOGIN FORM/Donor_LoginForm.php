<?php
require_once "donordb.php";
$db=new Donordb();
if(isset($_POST['sub']))
{
  $email=$_POST['email'];
  $password=$_POST['pass'];

  if($db->Login($email,$password)==1)
  {
    session_start();
    $_SESSION['loggedin']=true;
    $_SESSION['username']=$email;
    header("Location: ../Blood_Donor/blood_donor.php");

  }
}
?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Donor Login</title>
  <link rel="stylesheet" href="loginstyle.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>

<body>
<?php
    include "Assests/_navbar.php";
?>
  
  <div class="inner">
    <div class="heading">
      <h3>Login As Donors</h3>
    </div>
  </div>
  <div class="inner2">
    <div class="loginform">
      <h1 class="stylish-underline">Log in</h1>
      <div class="formfield">
        <form action="" method="post">
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
        <p id="new">New User? <a href="../BLOOD DONOR SIGNUP FORM/Donor_SignUPForm.php" style="color:#fe0000;">Sign Up</a></p>
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
          <form>
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Email address</label>
              <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
              <label for="exampleInputPassword1" class="form-label">Change Password</label>
              <input type="password" class="form-control" id="exampleInputPassword1">
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
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
  </script>
</body>

</html>