
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Spread The Red (Home Page)</title>
  <link rel="icon" type="images/icon" href="../blood.png">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
    integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="home.css">
</head>

<body>
  <?php include 'Assests/_navbar.php'?>
  <div class="picture">
    <!-- <div class="headerpic"> -->
    <div class="quotations">
      <h4>Be The Reason For</h4>
      <h4>Someone's Heartbeat</h4>
      <h4>___________________________</h4>
      <!--------------------------------this is a auto generated for responsiveness-->
      <p>Donate the blood to help the others</p>
      <p><i>100+ People Already Utilize The Facility</i></p>
    </div>
    <!-- </div> -->
  </div>
  <div class="container-fluid">
    <div class="row mt-5">
      <div class="col col-sm-10 col-md-9 col-lg-7  col m-auto pr-5" id="write">
        Heroes login here. Join the league of lifesavers
        <hr>
      </div>
    </div>
    <div class="row mt-5 mb-5">
      <div class="col">
        <div class="d-grid gap-5 col-6 mx-auto ss">
          <button class="btn btn-danger size" type="button"><a href="../BLOOD DONOR LOGIN FORM/Donor_LoginForm.php">Join
              as Blood Donors</a></button>
          <button class="btn btn-danger size" type="button"><a
              href="../Blood_Consumer_login_form/Consumer_LoginForm.php">Join as a Member</a></button>
        </div>
      </div>
    </div>
  </div>
  <hr style="color: red;font-weight: 800;">
  <div class="container d-flex justify-content-center align-items-center" style="min-height: 100px; padding-top: 5px;">
    <h1 style="color: #fe0000;">Community Feedbacks</h1>
  </div>

  <div class="container d-flex justify-content-center align-items-center" style="min-height: 250px;">
    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel" style="height: 400px; width: 500px;">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
                aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
                aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
                aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="feedback.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5 style="color: black;">Debanjan Saha</h5>
                    <p style="color: orangered; font-weight: bold; margin-bottom: 300px;" ><i class="fa-solid fa-quote-left" style="color: #ce0d20;"></i>This Is a Good kind Of Website with proper security<i class="fa-solid fa-quote-right" style="color: #ce0d20;"></i></p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="feedback.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                  <h5 style="color: black;">Anuradha Biswas</h5>
                  <p style="color: orangered; font-weight: bold; margin-bottom: 300px;" ><i class="fa-solid fa-quote-left" style="color: #ce0d20;"></i>I save my husband from a critical blood crysis situation<i class="fa-solid fa-quote-right" style="color: #ce0d20;"></i></p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="feedback.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                  <h5 style="color: black;">Sk Abdullah</h5>
                  <p style="color: orangered; font-weight: bold; margin-bottom: 300px;" ><i class="fa-solid fa-quote-left" style="color: #ce0d20;"></i>User Friendly Design<i class="fa-solid fa-quote-right" style="color: #ce0d20;"></i></p>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
    crossorigin="anonymous"></script>
  <?php include 'Assests/_footer.php'?>
</body>

</html>