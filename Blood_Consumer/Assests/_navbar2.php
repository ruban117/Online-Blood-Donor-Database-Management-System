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
        .navbar-light .navbar-nav .nav-item .nav-link {
            color: #FE0000;
            font-weight: bold;
            font-size: 20px;
        }
        
        .navbar-nav > .active > .a {
            color: red;
        }

        .navbar-nav > li{
            padding-left: 30px;
            padding-right: 30px;
        }

        .navbar-brand {
            font-size: 35px; /* Adjust the font size as needed */
            padding-left: 30px;
        }
        @media only screen and (max-width: 1024px) and (min-width: 426px) {
            .navbar-nav > li{
                padding-left: 0.2rem;
                padding-right: 0.2rem;
            }
            .navbar-light .navbar-nav .nav-item .nav-link {
                font-size: 13px;
            }
        }
        .navbar{
            position:fixed;
        }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
    </head>
    <body>
    <nav class="navbar navbar-expand-md navbar-light bg-body-tertiary fixed-top">
        <div class="container-fluid ">
        <a class="navbar-brand" href="../Home Page/home.php" style= "color:#fe0000; font-size:30px;"><i class="fa-solid fa-hand-holding-droplet" style= "color:#fe0000"></i>&nbsp;<b>Spread The Red</b></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
            <ul class="navbar-nav  ">
            <li style="font-size:20px;"><a href="logout.php"><i class="fa-solid fa-power-off"></i></a></li>	
            </ul>		  
            </div>
        </div>
    </nav>
    </body>
    </html>';
?>
