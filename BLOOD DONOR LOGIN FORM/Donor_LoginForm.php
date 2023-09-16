

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
      <h3>Join As Donors</h3>
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
        <p id="new">New User? <span style="color:#fe0000;">Sign Up</span></p>
      </div>
    </div>
  </div>
  <?php include "Assests/_footer.php" ?>
</body>

</html>