<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Blood Consumer</title>
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
            <h2>Donor</h2>
            <ul>
                <li id="li1"><a href="#" id="D"><i class="fas fa-home"></i>Dashboard</a></li>
                <li id="li2"><a href="#" id="S"><i class="fas fa-home"></i>Search Donors</a></li>
                <li id="li3"><a href="#" id="P"><i class="fas fa-user"></i>Profile</a></li>
                <li id="li4"><a href="#" id="EP"><i class="fas fa-address-card"></i>Edit Profile</a></li>
                <li id="li5"><a href="#" id="CP"><i class="fa-solid fa-file-invoice"></i>Change Password</a></li>
                <li><a href="#"><i class="fa-solid fa-power-off"></i>Logout</a></li>
            </ul>
        </div>
        <div class="main_content">
            <div class="header Dashboard">Welcome Blood Consumer Name </div>
            <div class="info Dashboard">
                <img src="E4TYBW4W6JCA.jpg" alt="" class="Dashboard">
            </div>
            <div id="Search_donors" style="display: none;align-items: center;justify-content: center;">
                <div class="enter_blood_group" >
                    <form style="display:flex; align-items:center; justify-content:space-evenly; border:2px solid black; height: 200px; width:800px;"> 
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Example select</label>
                            <select class="form-control" id="exampleFormControlSelect1">
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Email address</label>
                            <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
                          </div>
                          <div class="buttons"style="display:flex;flex-direction:column;">
                            <button type="button" class="btn btn-primary">Search</button>
                        </div>
                    </form>
                </div>
                <div id="search_result">

                </div>
                <div class="donor_details">

                </div>
            </div>

            <div id="Profile">
                <div class="profile-pic"></div>
                <div class="Text">John Doe</div>
                <div class="Text">johndoe@gmail.com</div>
                <div class="Text">6289814242</div>
                <div class="Text">28, South Baishnav Para Road Post Garifa Dist 24 PGS North</div>
                <div class="Text">West Bengal</div>
                <div class="Text">Naihati</div>
            </div>
            <div id="Edit_Profile" style="display: none;align-items: center;justify-content: center;">
                <div class="container">
                    <form>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Name</label>
                            <input type="text" class="form-control custom-input" id="exampleInputEmail1"
                                aria-describedby="emailHelp" placeholder="Enter email">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email address</label>
                            <input type="email" class="form-control custom-input" id="exampleInputEmail1"
                                aria-describedby="emailHelp" placeholder="Enter email">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Phone Number</label>
                            <input type="number" class="form-control custom-input" id="exampleInputEmail1"
                                aria-describedby="emailHelp" placeholder="Enter email">
                        </div>
                        <div class="form-group">
                            <label for="inputAddress">Address</label>
                            <input type="text" class="form-control custom-input" id="inputAddress"
                                placeholder="1234 Main St">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Pin Code</label>
                            <input type="number" class="form-control custom-input" id="exampleInputEmail1"
                                aria-describedby="emailHelp" placeholder="Enter email">
                        </div>
                        <div class="form-group">
                            <label for="color">Blood Group</label><br>
                            <select id="color" name="color" class="form-control custom-input">
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
                                <option value="red">Red</option>
                                <option value="green">Green</option>
                                <option value="blue">Blue</option>
                                <option value="yellow">Yellow</option>
                                <option value="orange">Orange</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">City</label>
                            <input type="text" class="form-control custom-input" id="exampleInputEmail1"
                                aria-describedby="emailHelp" placeholder="Enter email">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlFile1">Example file input</label><br>
                            <input type="file" class="form-control-file custom-input" id="exampleFormControlFile1">
                        </div>
                        <br>
                        <button type="submit" class="btn btn-primary">Save Changes</button>
                    </form>
                </div>
            </div>
            <div id="Change_Password" style="display: none;align-items: center;justify-content: center;">
                <div class="container">
                    <form>
                        <div class="form-group custom-form">
                            <label for="exampleInputEmail1">Enter Previous Password</label>
                            <input type="password" class="form-control" id="exampleInputEmail1"
                                aria-describedby="emailHelp">
                        </div>
                        <div class="form-group custom-form">
                            <label for="exampleInputPassword1">Enter New Password</label>
                            <input type="password" class="form-control" id="exampleInputPassword1">
                        </div>
                        <div class="form-group custom-form">
                            <label for="exampleInputPassword1">Confirm Password</label>
                            <input type="password" class="form-control" id="exampleInputPassword1">
                        </div>
                        <button type="submit" class="btn btn-primary">Set Password</button>
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