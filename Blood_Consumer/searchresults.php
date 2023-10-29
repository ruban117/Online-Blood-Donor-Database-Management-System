<?php
error_reporting(0);
require_once "../Blood_Consumer_login_form/ConsumerDb.php";
require_once "../BLOOD DONOR LOGIN FORM/donordb.php";
session_start();
$db=new Consumerdb();
$db2=new Donordb();
if (!isset($_SESSION['loggedin']) || ($_SESSION['loggedin'] != true)) 
{
    header("location: ../BLOOD DONOR LOGIN FORM/Donor_LoginForm.php");
    exit; 
}
$data=$db->Search_Donors($_SESSION['pin'],$_SESSION['blood']);
$datas=$db->Get_data($_SESSION['username']);
if(isset($_POST['fsub'])){
  $mail=$_POST['email'];
  $senderemail=$_SESSION['username'];
  $datass=$db2->Get_data($mail);
  $html='Dear '. $datass['name'].'<br>,

          We extend our heartfelt gratitude for your noble spirit. A blood request from ' . $datas['name'] . ' is a call for hope, and you have the opportunity to be a lifeline. By donating your blood to this individual, you can become a part of a compassionate community.
          <br><br>
          Please note, your selfless act can make a world of difference and bring renewed hope to someone in need.
          <br><br>
          With deepest regards,
          <br><br>
          Social Service Group<br><br>
          Online Blood Donors Database Management System<br><br>
          Email: obddms2023@gmail.com"<br><br>
          
          This revised email conveys the importance of the recipients blood donation and fosters a sense of community and hope.
          ';
  $db2->smtp_mailer($mail,'OBDDMS: Reciving Blood Donation Request', $html);
}


?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin Pannel</title>
  <link rel="stylesheet" href="consumer.css">
  <link rel="stylesheet"
    href="D:\XAMPP\htdocs\Online Blood Donors Database Management System Website\Online-Blood-Donor-Database-Management-System\ADMIN PANNEL\admin_page.css">
  <!--link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css"-->
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
    integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
  <table id="myTable" class="table table-striped">
    <thead class="thead-dark">
      <tr>
        <th scope="col" style="color: black;">SL Number</th>
        <th scope="col" style="color: black;">Profile Picture</th>
        <th scope="col" style="color: black;">Donors Name</th>
        <th scope="col" style="color: black;">Donors Blood Group</th>
        <th scope="col" style="color: black;">Donors Email Id</th>
        <th scope="col" style="color: black;">Send Blood Request</th>
        <th scope="col" style="color: black;">View Profile</th>
        <th scope="col" style="color: black;">Report Donor</th>
      </tr>
    </thead>
    <tbody>
      <?php $i=1; foreach($data as $row){?>
      <tr>
        <td>
          <?php echo $i;?>
        </td>
        <td scope="row">
          <div class="propic">
            <img src="<?php echo $row['picture']?>" alt="">
          </div>
        </td>
        <td>
          <?php echo $row['name'];?>
        </td>
        <td>
          <?php echo $row['blood_group'];?>
        </td>
        <td>
          <?php echo $row['email'];?>
        </td>
        <td><button type="button" class="btn one btn-warning">Send Blood Request</button></td>
        <td><button type="button" class="btn two btn-primary">View Profile</button></td>
        <td><button type="button" class="btn three btn-danger">Report Donor</button></td>
      </tr>
      <?php $i++; }?>
    </tbody>
  </table>


  <!-- Modal Send Mail For Blood Request -->
  <div class="modal fade" id="mailModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Send Blood Request</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form method="post" action="">
            <div class="mb-3">
              <input type="hidden" name="email" class="form-control" id="nemail" aria-describedby="emailHelp">
            </div>
            <div class="form-group">
              <button type="submit" name="fsub" id="fsub" class="btn btn-danger btn-block">Send Blood Request</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
  <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
    integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
    integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
    crossorigin="anonymous"></script>
  <script src="adminscript.js"></script>
  <script>
    let table = new DataTable('#myTable');
    let a = document.getElementsByClassName('one')[0];
    let b = document.getElementsByClassName('two')[0];
    let c = document.getElementsByClassName('three')[0];

    a.addEventListener('click', (e) => {
      $('#mailModal').modal('toggle');
      tr = e.target.parentNode.parentNode;
      email = tr.getElementsByTagName("td")[4].innerText;
      nemail.value = email;
    })
  </script>


</body>



</html>