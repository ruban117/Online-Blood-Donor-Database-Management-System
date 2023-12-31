<?php
session_start();
require_once "../Blood_Consumer_login_form/ConsumerDb.php";
$db=new Consumerdb();
if (!isset($_SESSION['loggedin']) || ($_SESSION['loggedin'] != true)) 
{
    header("location: ../BLOOD DONOR LOGIN FORM/Donor_LoginForm.php");
    exit; 
}
$data=$db->Get_data($_SESSION['username']);

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
                <li id="li1" style="background-color: #594f8d;"><a href="consumer.php" id="D"><i class="fas fa-home"></i>Dashboard</a></li>
                <li id="li2"><a href="search_donors.php" id="A"><i class="fa-solid fa-magnifying-glass"></i>&nbsp;Search Donors</a></li>
                <li id="li3"><a href="profile.php" id="P"><i class="fas fa-user"></i>Profile</a></li>
                <li id="li4"><a href="edit_profile.php" id="EP"><i class="fas fa-address-card"></i>Edit Profile</a></li>
                <li id="li5"><a href="change_password.php" id="CP"><i class="fa-solid fa-file-invoice"></i>Change Password</a></li>
                <li id="li6"><a href="viewcontacteddonors.php" id="CP"><i class="fa-solid fa-file-invoice"></i>View Contact History</a></li>
                <li><a href="logout.php"><i class="fa-solid fa-power-off"></i>Logout</a></li>
            </ul>
        </div>
        <div class="main_content">
            <div class="header Dashboard">Welcome <?php echo $data['name'];?> </div>
            <div class="info Dashboard">
                <img src="E4TYBW4W6JCA.jpg" alt="" class="Dashboard">
            </div>
            <div id="Change_Password" style="display: none;align-items: center;justify-content: center;">
                <div class="container">
                    <form method="post">
                        <div class="form-group custom-form">
                            <label for="exampleInputEmail1">Enter Previous Password</label>
                            <input type="password" class="form-control" id="exampleInputEmail1"
                                aria-describedby="emailHelp" name="PP">
                        </div>
                        <div class="form-group custom-form">
                            <label for="exampleInputPassword1">Enter New Password</label>
                            <input type="password" class="form-control" id="exampleInputPassword1" name="NP">
                        </div>
                        <div class="form-group custom-form">
                            <label for="exampleInputPassword1">Confirm Password</label>
                            <input type="password" class="form-control" id="exampleInputPassword1" name="CP">
                        </div>
                        <button type="submit" class="btn btn-primary" name="CSB">Set Password</button>
                    </form>
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