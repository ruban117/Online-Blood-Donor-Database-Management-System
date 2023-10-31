<?php

require_once "not_member_db.php";
$is_right=false;
$success='';
$db=new not_memberDb();
if(isset($_POST['submit']))
{
  $name=$_POST['name'];
  $email=$_POST['email'];
  $feedback=$_POST['feedback'];

  $db->insert($name,$email,$feedback);
  $is_right=true;
  $success="Thanks For Your Feedback";
}


?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Spread The Red (Contact Us)</title>
    <link rel="icon" type="images/x-icon" href="../blood.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="contact.css">
</head>

<body>
    <?php include 'Assests/_navbar.php'?>
    <div class="contacform">
    <form method="post" action="">
    <?php if($is_right){?>
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success!</strong>
            <?php echo $success; ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
          <?php }?>
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Enter Your Name</label>
          <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="name">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Enter Your Email </label>
            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email">
          </div>
          <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Enter Your Feedback</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="feedback"></textarea>
          </div>
        <div class="d-grid gap-2 col-6 mx-auto">
            <button type="submit" class="btn btn-danger btn-lg" name="submit">Submit</button>
          </div>
      </form>
    </div>
    <?php include "Assests/_footer.php" ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>

</html>