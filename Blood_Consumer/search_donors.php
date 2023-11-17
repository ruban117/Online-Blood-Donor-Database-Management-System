<?php
session_start();
require_once "../Blood_Consumer_login_form/ConsumerDb.php";
$db=new Consumerdb();
if (!isset($_SESSION['loggedin']) || ($_SESSION['loggedin'] != true)) 
{
    header("location: ../BLOOD DONOR LOGIN FORM/Donor_LoginForm.php");
    exit; 
}
if(isset($_POST['sub'])){
    $blood=$_POST['bgroup'];
    $pin=$_POST['pin'];
    $_SESSION['blood']=$blood;
    $_SESSION['pin']=$pin;
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Spread The Red (Member)</title>
    <link rel="icon" type="images/x-icon" href="../blood.png">
    <link rel="stylesheet" href="consumer.css">
    <!--link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css"-->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">

    <style>
        /* Custom CSS to reduce input box height */
        .form-control {
            height: 40px;
            /* Adjust the height as needed */
            width: 20px;
            margin-bottom: 15px;
        }

        #Change_Password .container .custom-form {
            margin-top: 100px;
        }
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <?php
    include "Assests/_navbar2.php";
?>
    <div class="wrapper">
        <div class="sidebar">
            <h2>Members<br>(Requesters)</h2>
            <ul>
                <li id="li1"><a href="consumer.php" id="D"><i class="fas fa-home"></i>Dashboard</a></li>
                <li id="li2" style="background-color: #594f8d;"><a href="search_donors.php" id="A"><i class="fa-solid fa-magnifying-glass"></i>&nbsp;Search Donors</a></li>
                <li id="li3"><a href="profile.php" id="P"><i class="fas fa-user"></i>Profile</a></li>
                <li id="li4"><a href="edit_profile.php" id="EP"><i class="fas fa-address-card"></i>Edit Profile</a></li>
                <li id="li5"><a href="change_password.php" id="CP"><i class="fa-solid fa-file-invoice"></i>Change Password</a></li>
                <li id="li6"><a href="viewcontacteddonors.php" id="CP"><i class="fa-solid fa-file-invoice"></i>View Contact History</a></li>
                <li><a href="logout.php"><i class="fa-solid fa-power-off"></i>Logout</a></li>
            </ul>
        </div>
        <div class="main_content">
            <div id="Availibility" style="display: flex;align-items: center;justify-content: center;">
                <div class="instructions">
                    <form method="post">
                            <div class="form-group col-md-4">
                                <label for="inputState">Blood Group</label>
                                <select id="inputState" class="form-control" name="bgroup">
                                    <option selected>Choose...</option>
                                    <option>A+</option>
                                    <option>A-</option>
                                    <option>B+</option>
                                    <option>B-</option>
                                    <option>AB+</option>
                                    <option>AB-</option>
                                    <option>O+</option>
                                    <option>O-</option>
                                </select>
                            </div>
                            <div class="form-group col-md-2">
                                <label for="inputZip">Pin Code</label>
                                <input type="text" class="form-control" id="inputZip" name="pin">
                            </div>
                            <button type="submit" name="sub" class="btn btn-primary" id="sub" >Search Here</button>        
                    </form>
                </div>
                <h1 class="search_heading">Search Results</h1>
                <div class="availability">
                <iframe src="searchresults.php" frameborder="0" style="height: 600px" width="90%"></iframe>
                </div>
            </div>
        </div>
    </div>
    <?php
    include "Assests/_footer.php";
?>
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
    <script src="consumer.js"></script>


</body>



</html>