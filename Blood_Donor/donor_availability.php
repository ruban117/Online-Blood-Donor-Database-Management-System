<?php
session_start();
require_once "../BLOOD DONOR LOGIN FORM/donordb.php";
$db=new Donordb();
if (!isset($_SESSION['loggedin']) || ($_SESSION['loggedin'] != true)) 
{
    header("location: ../BLOOD DONOR LOGIN FORM/Donor_LoginForm.php");
    exit; 
}
$data=$db->Get_data($_SESSION['username']);
if(isset($_POST['yes'])){
    $db->Change_Availiability($_SESSION['username']);
    header("location: donor_availability.php");
}

if(isset($_POST['no'])){
    $db->Change_Availiability_To_One($_SESSION['username']);
    header("location: donor_availability.php");
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
<!--------------------------------------------Confirm Box Hide Profile---------------------------------------->
<div class="modal fade" id="confModal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Do You really Want To Hide Your Profie?</h4>
            </div>
            <!-- Modal body -->
            <div class="modal-body px-4">
                <form action="" method="post" id="form-data">
                    <div class="form-group">
                        <input type="submit" name="yes" id="yes" value="Yes" class="btn btn-danger">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


  <!--------------------------------------------Confirm Box UnHide Profile---------------------------------------->
  <div class="modal fade" id="confModal2">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Do You really Want To Unhide Your Profie?</h4>
            </div>
            <!-- Modal body -->
            <div class="modal-body px-4">
                <form action="" method="post" id="form-data">
                    <div class="form-group">
                        <input type="submit" name="no" id="yes" value="Yes" class="btn btn-danger">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="wrapper">
    <div class="sidebar">
        <h2>Donor</h2>
        <ul>
            <li id="li1"><a href="blood_donor.php" id="D"><i class="fas fa-home"></i>Dashboard</a></li>
            <li id="li2" style="background-color: #594f8d;"><a href="donor_availability.php" id="A"><i class="fas fa-home"></i>Availaibility Status</a></li>
            <li id="li3"><a href="donor_profile.php" id="P"><i class="fas fa-user"></i>Profile</a></li>
            <li id="li4"><a href="donor_editprofile.php" id="EP"><i class="fas fa-address-card"></i>Edit Profile</a></li>
            <li id="li5"><a href="donor_changepassword.php" id="CP"><i class="fa-solid fa-file-invoice"></i>Change Password</a></li>
            <li id="li6"><a href="Contact_History.php" id="CP"><i class="fa-solid fa-file-invoice"></i>Contact History</a></li>
            <li><a href="logout.php"><i class="fa-solid fa-power-off"></i>Logout</a></li>
        </ul> 
    </div>
    <div class="main_content">
        <div id="Availibility" style="display: flex;align-items: center;justify-content: center;">
            <div class="instructions">
                <p class="stylish-underline">Instructions</p>
                <ul class="ins">
                    <li>Age between 18-60 years</li>
                    <li> Hemoglobin not less than 12.5gm/DI </li>
                    <li>Pulse Between 50 and 100/min with no irregularities.</li>
                    <li>Blood pressure-systolic 100 to 180 mm Hg and Diastolic 50 to 100 mm Hg.</li>
                    <li> Temperature-normal</li>
                    <li>Body weight not less than 45k.g </li>
                    <li>Any healthy adult both male and female can donate blood in every 3 months.</li>
                    <li> Donors should not have any conical disease.</li>
                    <li style="color:#fe0000;font-weight:bold;"> Scroll Down to change your availability status</li>

                </ul>
            </div>
            <div class="availability">
                <p>Note:- If you click on the Hide Profile button your profile will be hided from all Members</p>
                <?php if($data['availability']==1){?>
                <p style="color: blue; font-weight: bold;">Your Profile Is Visible To All Blood Requesters</p>
                <?php }else{?>
                <p>Your Profile Is Not Visible To All Blood Requesters</p>
                <?php }?>
                <div class="buttons">
                <button type="button" class="btn hide btn-danger">Hide Profile</button>
                <button type="button" class="btn sh btn-danger">Show Profile</button>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
    include "Assests/_footer.php";
?>
<script src="donorscript.js"></script>
<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>

<script>
    let a = document.querySelector('.hide');
let b = document.querySelector('.sh');

a.addEventListener('click', (e) => {
    $('#confModal').modal('toggle');
});

b.addEventListener('click', (e) => {
    $('#confModal2').modal('toggle');
});
</script>

</body>



</html>