<?php
    session_start();
    require_once '../Admin Login/Admindb.php';
    $db=new AdminDb();
    if (!isset($_SESSION['loggedin']) || ($_SESSION['loggedin'] != true)) {
        header("location: ../Admin Login/Admin_login.php");
        exit;
    }

    $user=$db->getUserByEmail($_SESSION['uname']);
    if (isset($_POST['submit'])) {
        $user = $db->getUserByEmail($_SESSION['uname']);
        
        // Check if a file was uploaded
        if (isset($_FILES['image']) && $_FILES['image']['error'] === 0) {
            $uploadDir = '../images/'; 
            $imageFile = $uploadDir . basename($_FILES['image']['name']);
            
            // Move the uploaded image to the desired directory
            if (move_uploaded_file($_FILES['image']['tmp_name'], $imageFile)) {
                // Update the user's profile picture in the database
                $db->updateUser($_SESSION['uname'], $imageFile);
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
  <title>Admin Pannel</title>
  <link rel="stylesheet" href="admin_page.css">
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
        <h2>Admin</h2>
        <ul>
            <li id="li1"><a href="dashboard.php" id="D"><i class="fas fa-home"></i>Dashboard</a></li>
            <li id="li2"><a href="Profile.php" id="P"><i class="fas fa-user"></i>Profile</a></li>
            <li id="li3"><a href="Edit_Profile.php" id="EP"><i class="fas fa-address-card"></i>Edit Profile</a></li>
            <li id="li4"><a href="changepassword.php" id="CP"><i class="fa-solid fa-file-invoice"></i>Change Password</a></li>
            <li id="li5"><a href="viewalldonors.php" id="VAD"><i class="fa-solid fa-eye"></i>View All Donors</a></li>
            <li id="li6"><a href="viewallrequesters.php" id="VAR"><i class="fa-solid fa-eye"></i>View All Requesters</a></li>
            <li id="li7"><a href="viewallreports.php" id="VARE"><i class="fa-solid fa-eye"></i>View All Reports</a></li>
            <li id="li8"><a href="vacf.php" id="VASF"><i class="fa-solid fa-eye"></i>View All Site Feedback</a></li>
            <li id="li9"><a href="vacp.php" id="VACP"><i class="fa-solid fa-eye"></i>View All Contacted People</a></li>
            <li><a href="../Admin Login/logout.php"><i class="fa-solid fa-power-off"></i>Logout</a></li>
        </ul> 
    </div>
    <div class="main_content">
        <div id="Edit_Profile" style="align-items: center;justify-content: center;">
            <div class="container">
                <form method="post" action="" enctype="multipart/form-data">
                    <div class="form-group">
                    <label for="exampleInputEmail1">Name</label>
                    <input type="text" class="form-control custom-input" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $user['name'];?>" placeholder="Enter Name">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" class="form-control custom-input" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" value="<?php echo $_SESSION['uname'];?>" disabled>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Phone Number</label>
                        <input type="number" class="form-control custom-input" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $user['phoneno'];?>" placeholder="Enter phone">
                    </div>
                    <div class="form-group">
                        <label for="inputAddress">Address</label>
                        <input type="text" class="form-control custom-input" id="inputAddress" value="<?php echo $user['address'];?>" placeholder="Enter Address">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Pin Code</label>
                        <input type="number" class="form-control custom-input" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $user['pin_code'];?>" placeholder="Enter Pin Code">
                    </div>
                    <div class="form-group">
                        <label for="color">Blood Group</label><br>
                        <select id="color"  name="color" class="form-control custom-input">
                            <option value="<?php echo $user['blood_group'];?>" selected><?php echo $user['blood_group'];?></option>
                            <option value="red">Red</option>
                            <option value="green">Green</option>
                            <option value="blue">Blue</option>
                            <option value="yellow">Yellow</option>
                            <option value="orange">Orange</option>
                        </select>
                    </div>
                        <div class="form-group">
                            <label for="color">State</label><br>
                            <select id="color" name="color" class="form-control custom-input">
                            <option value="<?php echo $user['state'];?>" selected><?php echo $user['state'];?></option>
                                <option value="red">Red</option>
                                <option value="green">Green</option>
                                <option value="blue">Blue</option>
                                <option value="yellow">Yellow</option>
                                <option value="orange">Orange</option>
                            </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">City</label>
                        <input type="text" class="form-control custom-input" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $user['city'];?>"  placeholder="Enter City">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlFile1">Example file input</label><br>
                        <input type="file" name="image" accept="image/*" class="form-control-file custom-input" id="image" value="<?php echo $user['picture'];?>">
                      </div>
                    <br>
                    <button type="submit" name="submit" class="btn btn-primary">Save Changes</button>
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
<script src="adminscript.js"></script>
<script>
  let table = new DataTable('#myTable');
</script>


</body>



</html>