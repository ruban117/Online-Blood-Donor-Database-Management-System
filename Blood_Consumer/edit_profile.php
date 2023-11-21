<?php
session_start();
$has_error=false;
$error="";
require_once "../Blood_Consumer_login_form/ConsumerDb.php";
$db=new Consumerdb();
if (!isset($_SESSION['loggedin']) || ($_SESSION['loggedin'] != true)) 
{
    header("location: ../Blood_Consumer_login_form/Consumer_LoginForm.php");
    exit; 
}
$data=$db->Get_data($_SESSION['username']);

if(isset($_POST['save_change']))
{
    $name=$_POST['name'];
    //$email=$_POST['email'];
    $phone=$_POST['phone'];
    $address=$_POST['address'];
    $pincode=$_POST['pin'];
    $blood_group=$_POST['blood_group'];
    $state=$_POST['state'];
    $city=$_POST['city'];
    $age=$_POST['age'];

    $db->update_user($name,$_SESSION['username'],$phone,$address,$pincode,$blood_group,$state,$city,$age);

    header("Location: edit_profile.php");

    if (isset($_FILES['image']) && $_FILES['image']['error'] === 0) {
        $uploadDir = '../images/'; 
        $imageFile = $uploadDir . basename($_FILES['image']['name']); 
        
        // Move the uploaded image to the desired directory
        if (move_uploaded_file($_FILES['image']['tmp_name'], $imageFile)) {
            // Update the user's profile picture in the database
            $db->update_image($_SESSION['username'], $imageFile);
            //header("location: Edit_Profile.php");
        } else {
            echo "Error uploading the image.";
        }
    }
    

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
                <li id="li2"><a href="search_donors.php" id="A"><i class="fa-solid fa-magnifying-glass"></i>&nbsp;Search Donors</a></li>
                <li id="li3"><a href="profile.php" id="P"><i class="fas fa-user"></i>Profile</a></li>
                <li id="li4" style="background-color: #594f8d;"><a href="edit_profile.php" id="EP"><i class="fas fa-address-card"></i>Edit Profile</a></li>
                <li id="li5"><a href="change_password.php" id="CP"><i class="fa-solid fa-file-invoice"></i>Change Password</a></li>
                <li id="li6"><a href="viewcontacteddonors.php" id="CP"><i class="fa-solid fa-file-invoice"></i>View Contact History</a></li>
                <li><a href="logout.php"><i class="fa-solid fa-power-off"></i>Logout</a></li>
            </ul>
        </div>
        <div class="main_content">
            <div id="Edit_Profile" style="display: flex;align-items: center;justify-content: center;">
                <div class="container">
                    <form method="post" action="" enctype="multipart/form-data">
                    <?php if($has_error){?>
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <strong>Error!</strong>
                            <?php echo $error; ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        <?php }?>
                        <div class="form-group">
                        <label for="exampleInputEmail1">Name</label>
                        <input type="text" class="form-control custom-input" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter name" name="name" value="<?php echo $data['name'];?>">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email address</label>
                            <input type="email" class="form-control custom-input" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" name="email" value="<?php echo $data['email'];?>" disabled>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Phone Number</label>
                            <input type="number" class="form-control custom-input" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter phone number" name="phone" value="<?php echo $data['phone'];?>">
                        </div>
                        <div class="form-group">
                            <label for="inputAddress">Address</label>
                            <input type="text" class="form-control custom-input" id="inputAddress" placeholder="enter address" name="address"value="<?php echo $data['address'];?>">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Pin Code</label>
                            <input type="number" class="form-control custom-input" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter pincode" name="pin" value="<?php echo $data['pincode'];?>">
                        </div>
                        <div class="form-group">
                            <label for="color">Blood Group</label><br>
                            <select id="color" name="blood_group" class="form-control custom-input">
                                <option selected ><?php echo $data['blood_group'];?></option>
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
                            <div class="form-group">
                                <label for="color">State</label><br>
                                <select id="color" name="state" class="form-control custom-input">
                                    <option selected><?php echo $data['state'];?></option>
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
                        <div class="form-group">
                            <label for="exampleInputEmail1">City</label>
                            <input type="text" class="form-control custom-input" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter city" name="city" value="<?php echo $data['city'];?>">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Age</label>
                            <input type="text" class="form-control custom-input" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter age" name="age" value="<?php echo $data['age'];?>">
                        </div>
                        <div class="form-group" style="margin-bottom : 5px;">
                            <label for="exampleFormControlFile1">Update Image</label><br>
                            <input type="file" name="image" accept="image/*" class="form-control-file custom-input" id="image">
                        </div>
                        <button type="submit" class="btn btn-primary" name="save_change">Save Changes</button>
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