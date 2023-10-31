<?php
echo '
    <!doctype html>
    <html lang="en">
    <head>
    <title>Bootstrap </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
    .navbar .navbar-brand {
        color: #fe0000;
    }
    
    .navbar .nav-item .nav-link {
        color: #fe0000;
        font-weight: bold;
    }
    
    .navbar .container-fluid {
        background-color: #f5f5f5;
    }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script></head>
    <body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary fixed-top">
    <div class="container-fluid">
      <a class="navbar-brand" href="../Home Page/home.php"><i class="fa-solid fa-hand-holding-droplet"></i>&nbsp;<b>Spread The Red</b></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="../Home Page/home.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../BLOOD DONOR LOGIN FORM/Donor_LoginForm.php">Donor Login</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../Blood_Consumer_login_form/Consumer_LoginForm.php">Member Login</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../About Us/aboutus.php">About Us</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../Admin Login/Admin_login.php">Admin Login</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../Contact Us/contact.php">Contact Us</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
    </body>
    </html>';
?>