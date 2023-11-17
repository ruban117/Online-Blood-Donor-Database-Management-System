<?php
session_start();
require_once "../Blood_Consumer_login_form/ConsumerDb.php";
$db=new Consumerdb();
if (!isset($_SESSION['loggedin']) || ($_SESSION['loggedin'] != true)) 
{
    header("location: ../Blood_Consumer_login_form/Consumer_LoginForm.php");
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
                <li id="li1"><a href="consumer.php" id="D"><i class="fas fa-home"></i>Dashboard</a></li>
                <li id="li2"><a href="search_donors.php" id="A"><i class="fa-solid fa-magnifying-glass"></i>&nbsp;Search Donors</a></li>
                <li id="li3" style="background-color: #594f8d;"><a href="profile.php" id="P"><i class="fas fa-user"></i>Profile</a></li>
                <li id="li4"><a href="edit_profile.php" id="EP"><i class="fas fa-address-card"></i>Edit Profile</a></li>
                <li id="li5"><a href="change_password.php" id="CP"><i class="fa-solid fa-file-invoice"></i>Change Password</a></li>
                <li id="li6"><a href="viewcontacteddonors.php" id="CP"><i class="fa-solid fa-file-invoice"></i>View Contact History</a></li>
                <li><a href="logout.php"><i class="fa-solid fa-power-off"></i>Logout</a></li>
            </ul>
        </div>
        <div class="main_content">
        <div id="Profile">
            <div class="profile-pic" ><img src="<?php echo $data['picture']; ?>" alt=""></div>
            <div class="Text"><?php echo $data['name']; ?></div>
            <div class="Text" ><?php echo $data['email']; ?></div>
            <div class="Text" ><?php echo $data['phone']; ?></div>
            <div class="Text" ><?php echo $data['address']; ?></div>
            <div class="Text" ><?php echo $data['state']; ?></div>
            <div class="Text" ><?php echo $data['city']; ?></div>
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