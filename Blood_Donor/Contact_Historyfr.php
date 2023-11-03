<?php
  error_reporting(0);
  session_start();
  $has_error=false;
  $error="";
  require_once "../BLOOD DONOR LOGIN FORM/donordb.php";
  require_once "../Blood_Consumer_login_form/ConsumerDb.php";
  require_once '../Mail/smtpmailer.php';
  $db=new Donordb();
  $db2=new Consumerdb();
  $m=new Mail();
  if (!isset($_SESSION['loggedin']) || ($_SESSION['loggedin'] != true)) 
  {
      header("location: ../BLOOD DONOR LOGIN FORM/Donor_LoginForm.php");
      exit; 
  }
  $is_right=false;
  $success='';
  $data=$db->Contact_History($_SESSION['username']);
  $datas=$db->Get_data($_SESSION['username']);
  if(isset($_POST['accept'])){
    $email=$_POST['reqemail'];
    if($db->allcount($_SESSION['username'],$email)==0){
      $db->AcceptTable($_SESSION['username'],$email);
      $msg='
        Dear User,<br><br>
        Congratulations, Your Blood Requested Has Been Approved By '.$_SESSION['username'].'<br><br>
        Please Go to Your Profile And Go View Contact History tab to get access donor contact details.<br><br>
        Regards,<br><br>
        Social Service Group<br><br>
        Online Blood Donors Database Management System<br><br>
        Email:- obddms2023@gmail.com
      ';
      $m->smtp_mailer($email,'OBDDMS: Blood Request Acepted', $msg);
    }
  }

  if(isset($_POST['reject'])){
    $email=$_POST['reqemail2'];
    $db->getacceptrej($_SESSION['username'],$email);
    $msg='
        Dear User,<br><br>
        Your Blood Requested Has Been Rejected By '.$_SESSION['username'].'<br><br>
        Please Go to Your Profile And Go View Contact History tab to get access donor contact details.<br><br>
        Regards,<br><br>
        Social Service Group<br><br>
        Online Blood Donors Database Management System<br><br>
        Email:- obddms2023@gmail.com
      ';
      $m->smtp_mailer($email,'OBDDMS: Blood Request Rejected', $msg);
  }

  if(isset($_POST['rep'])){
    $repby=$_POST['reporter'];
    $repto=$_POST['reportie'];
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
  <title>Spread The Red (Blood Donor)</title>
  <link rel="icon" type="images/x-icon" href="../blood.png">
  <link rel="stylesheet" href="blood_donor.css">
  <!--link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css"-->
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
<?php if($is_right){?>
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?php echo $success; ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
          <?php }?>
    <table id="myTable" class="table table-striped">
        <thead class="thead-dark">
          <tr>
          <th scope="col" style="color: black;">SL NO</th>
            <th scope="col" style="color: black;">Profile Picture</th>
            <th scope="col" style="color: black;">Requester's Name</th>
            <th scope="col" style="color: black;">Requester's Email</th>
            <th scope="col" style="color: black;">Requester's Phone</th>
            <th scope="col" style="color: black;">Requested Blood</th>
            <th scope="col" style="color: black;">Timing</th>
            <th scope="col" style="color: black;">Status</th>
            <th scope="col" style="color: black;">Acceptance</th>
            <th scope="col" style="color: black;">Rejectence</th>
            <th scope="col" style="color: black;">Report User</th>
          </tr>
        </thead>
        <tbody>
        <?php $i=1; foreach($data as $row){?>
          <tr>
            <td><?php echo $i;?></td>
            <td scope="row">
              <div class="propic">
                <img src="<?php echo $row['picture']?>" alt="">
          </div>
        </td>
            <td><?php echo $row['name'];?></td>
            <td><?php echo $row['email'];?></td>
            <td><?php 
            $datassss=$db->getaccept($_SESSION['username'],$row['email']);
              if($db->allcount($_SESSION['username'],$row['email'])==1 && $datassss['accepted']==0){
                 $d=$db2->Get_data($row['email']);
                 echo $d['phone'];
              }else{
                echo "";
              }
            ?></td>
            <td><?php echo $row['blood_group'];?></td>
            <td><?php echo $row['date_time'];?></td>
            <td style="color: blue;"><?php 
              $datassss=$db->getaccept($_SESSION['username'],$row['email']);
              if($db->allcount($_SESSION['username'],$row['email'])==1 && $datassss['accepted']==0){
                echo "Accepted";
              }else if($db->allcount($_SESSION['username'],$row['email'])==0){
                echo "Pending";
              }
              else if($db->allcount($_SESSION['username'],$row['email'])==1 && $datassss['accepted']==1){
                echo "Rejected";
              }
            ?></td>
            <td><button type="button" class="btn btn-primary warn">Accept Request</button></td>
            <td><button type="button" class="btn btn-warning warn2">Reject Request</button></td>
            <td><button type="button" class="btn btn-danger report">Report</button></td>
          </tr>
          <?php $i++; }?>
        </tbody>
      </table>

      <!-- Modal Accept-->
  <div class="modal fade" id="acceptModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Do You Want To Accept User?</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form method="post" action="">
            <div class="mb-3">
              <input type="hidden" name="reqemail" id="reqemail" class="form-control" id="nemail" aria-describedby="emailHelp">
            </div>
            <div class="form-group">
              <button type="submit" name="accept" id="fsub" class="btn btn-primary btn-block">Accept</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal Reject-->
  <div class="modal fade" id="rejectModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Do You Want To Reject User?</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form method="post" action="">
            <div class="mb-3">
              <input type="hidden" name="reqemail2" id="reqemail2" class="form-control" id="nemail" aria-describedby="emailHelp">
            </div>
            <div class="form-group">
              <button type="submit" name="reject" id="fsub" class="btn btn-warning btn-block">Reject</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal Report-->
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
              <input type="hidden" name="reportie" class="form-control" id="reqemail3" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
              <input type="hidden" name="reporter" value="<?php echo $datas['email'];?>"  class="form-control" id="donemail" aria-describedby="emailHelp">
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
<script  src="https://code.jquery.com/jquery-3.7.0.js"></script>
  <script  src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
  <script  src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
    integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
    integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
    crossorigin="anonymous"></script>
<script src="adminscript.js"></script>
<script>
  let table = new DataTable('#myTable');
  let a=document.getElementsByClassName('warn');
  let b=document.getElementsByClassName('warn2');
  let c=document.getElementsByClassName('report');
  Array.from(a).forEach((elements)=>{
    elements.addEventListener('click',(e)=>{
      $('#acceptModal').modal('toggle');
      let c=e.target.parentNode.parentNode;
      let mail=c.getElementsByTagName("td")[3].innerText;
      reqemail.value=mail;
    });
  });
  Array.from(b).forEach((elements)=>{
    elements.addEventListener('click',(e)=>{
      $('#rejectModal').modal('toggle');
      let c=e.target.parentNode.parentNode;
      let mail=c.getElementsByTagName("td")[3].innerText;
      reqemail2.value=mail;
    });
  });

  Array.from(c).forEach((elements)=>{
    elements.addEventListener('click',(e)=>{
      $('#reportModal').modal('toggle');
      let c=e.target.parentNode.parentNode;
      let mail=c.getElementsByTagName("td")[3].innerText;
      reqemail3.value=mail;
    });
  });
</script>


</body>



</html>