<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Blood Requester Signup</title>
  <link rel="stylesheet" href="Consumer_signupstyle.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>

<body>
  <?php
    include "Assests/_navbar.php";
?>
  <div class="inner">
    <div class="heading">
      <h3>Join As Blood Requester</h3>
    </div>
  </div>
  <div class="inner2">
    <div class="loginform">
      <h1 class="stylish-underline" style="color: #fe0000;">Signup</h1>
      <div class="formfield">
        <form id="signup-form" method="post">
          <div class="mb-3">
            <label for="email" class="form-label">Name</label>
            <input type="text" name="email" class="form-control" id="email" aria-describedby="emailHelp">
          </div>
          <div class="mb-3">
            <label for="name" class="form-label">Email address</label>
            <input type="text" name="D_Name" class="form-control" id="email" aria-describedby="emailHelp">
          </div>
          <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Phone Number</label>
            <input type="number" name="number" class="form-control" id="pass">
          </div>
          <div class="mb-3">
            <label for="exampleFormControlTextarea1">Address</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
          </div>
          <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Pin Code</label>
            <input type="number" name="pin" class="form-control" id="pass">
          </div>
          <div class="mb-3">
            <label for="inputState">Blood Group</label>
            <select id="inputState" class="form-control">
              <option selected>Choose...</option>
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
          <div class="mb-3">
            <label for="inputState">State</label>
            <select id="inputState" class="form-control">
              <option selected>Choose...</option>
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
          <div class="mb-3">
            <label for="email" class="form-label">City</label>
            <input type="text" name="email" class="form-control" id="email" aria-describedby="emailHelp">
          </div>
          <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input type="password" name="pass" class="form-control" id="pass">
          </div>
          <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Confirm Password</label>
            <input type="password" name="pass" class="form-control" id="pass">
          </div>
          <div class="mb-3">
            <label for="exampleFormControlFile1">Upload Your Picture</label>
            <input type="file" class="form-control-file" id="exampleFormControlFile1">
          </div>
          <button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Submit</button>
          </button>
        </form>
        <p id="new">Back to <a href="#" style="color:#fe0000;">LogIn</a></p>
      </div>
    </div>
  </div>
  <!-- Modal -->
  <div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">An OTP Is Send To Your Gmail Please Enter To Continue</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form>
            <div class="mb-3">
              <label for="exampleInputPassword1" class="form-label">Enter OTP</label>
              <input type="number" name="pass" class="form-control" id="pass">
            </div>
            <button type="button" class="btn btn-primary" name="otpsub">Submit OTP</button>
          </form>
        </div>
      </div>
    </div>
  </div>
  <?php include "Assests/_footer.php" ?>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script>
    // jQuery to handle the form submission and show the modal
    $(document).ready(function () {
      $("#signup-form").submit(function (event) {
        console.log("opened")
        event.preventDefault();
        $("#myModal").modal("show");
      });
    });
  </script>
</body>

</html>