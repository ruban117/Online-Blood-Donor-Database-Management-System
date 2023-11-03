<?php
error_reporting(0);
$is_right=false;
$success='';
require_once "../Blood_Consumer_login_form/ConsumerDb.php";
require_once "../BLOOD DONOR LOGIN FORM/donordb.php";
require_once '../Mail/smtpmailer.php';
session_start();
$db=new Consumerdb();
$db2=new Donordb();
$m=new Mail();
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
  $html='Dear '. $datass['name'].',<br>

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
  $reqid=$datas['id'];
  $donid=$datass['id'];
  $m->smtp_mailer($mail,'OBDDMS: Reciving Blood Donation Request', $html);
  $db->Contact_Details($reqid,$donid);
  $is_right=true;
  $success='Blood Request Sent Successfully';
}

if(isset($_POST['rep'])){
  $repby=$_POST['reqemail'];
  $repto=$_POST['donemail'];
  $content=$_POST['content'];

  $db->Report($repby,$repto,$content);
  $is_right=true;
  $success='Report Sent Successfully We Will Surely Investigate It!!!';
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
<?php if($is_right){?>
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success!</strong>
            <?php echo $success; ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
          <?php }?>
  <table id="myTable" class="table table-striped">
    <thead class="thead-dark">
      <tr>
        <th scope="col" style="color: black;">SL Number</th>
        <th scope="col" style="color: black;">Profile Picture</th>
        <th scope="col" style="color: black;">Donors Name</th>
        <th scope="col" style="color: black;">Donors Blood Group</th>
        <th scope="col" style="color: black;">Donors Email Id</th>
        <th scope="col" style="color: black;">Donors Address</th>
        <th scope="col" style="color: black;">Donors City</th>
        <th scope="col" style="color: black;">Donors Age</th>
        <th scope="col" style="color: black;">Donors Pin</th>
        <th scope="col" style="color: black;">Send Blood Request</th>
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
        <td>
          <?php echo $row['address'];?>
        </td>
        <td>
          <?php echo $row['city'];?>
        </td>
        <td>
          <?php echo $row['age'];?>
        </td>
        <td>
          <?php echo $row['pincode'];?>
        </td>
        <td><button type="button" class="btn one btn-warning">Send Blood Request</button></td>
        <td><button type="button" class="btn three btn-danger">Report Donor</button></td>
      </tr>
      <?php $i++; }?>
    </tbody>
  </table>

  <!-- Modal Send Report To Blood Donor-->
  <div class="modal fade" id="reportModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Do You Want To Report This User?</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form method="post" action="">
            <div class="mb-3">
              <input type="hidden" name="reqemail" value="<?php echo $datas['email'];?>" class="form-control" id="nemail" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
              <input type="hidden" name="donemail"  class="form-control" id="donemail" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
              <label for="address">Describe Your Problem</label>
              <textarea class="form-control" name="content" id="exampleFormControlTextarea1" rows="3" required></textarea>
          </div>
            <div class="form-group">
              <button type="submit" name="rep" id="fsub" class="btn btn-danger btn-block">Report User</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>


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
              <input type="hidden" name="email" class="form-control" id="email" aria-describedby="emailHelp">
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
    let a = document.getElementsByClassName('one');
    let b = document.getElementsByClassName('three');


    Array.from(a).forEach((elements)=>{
    elements.addEventListener('click',(e)=>{
      $('#mailModal').modal('toggle');
      console.log('Listened');
      tr = e.target.parentNode.parentNode;
      email = tr.getElementsByTagName("td")[4].innerText;
      document.getElementById("email").value = email;
    })
  });

    Array.from(b).forEach((elements)=>{
    elements.addEventListener('click',(e)=>{
      $('#reportModal').modal('toggle');
      console.log('Listened');
      tr = e.target.parentNode.parentNode;
      email = tr.getElementsByTagName("td")[4].innerText;
      donemail.value = email;
    })
  });
  </script>


</body>



</html>