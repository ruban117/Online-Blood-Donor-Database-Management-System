<?php
    session_start();
    require_once '../Admin Login/Admindb.php';
    require_once '../BLOOD DONOR LOGIN FORM/donordb.php';
    require_once '../Blood_Consumer_login_form/ConsumerDb.php';
    require_once '../Mail/smtpmailer.php';

    $db=new AdminDb();
    $db2=new Donordb();
    $db3=new Consumerdb();
    $m=new Mail();
    if (!isset($_SESSION['loggedin']) || ($_SESSION['loggedin'] != true)) {
        header("location: ../Admin Login/Admin_login.php");
        exit;
    }
    $no_error=false;
    $success='';
    $err=false;
    $error='';

    if(isset($_POST['sub'])){
      $mail=$_POST['rby'];
      $mail2=$_POST['rto'];
      $msg='
        Dear User,<br><br>
        We sincerely apologize for any inconvenience caused, and we have successfully issued a warning to the user with the email address: '.$mail2.'<br><br>
        We hope you won`t encounter a similar situation in the future, and we appreciate your understanding.<br><br>
        Regards,<br><br>
        Social Service Investigating Team,<br><br>
        Online Blood Doner Database Management System<br><br>
        Email:- obddms2023@gmail.com
      ';
      $m->smtp_mailer($mail,'OBDDMS: Your Report Has Been Aproved', $msg);
      $msg2='
        Dear User,<br><br>
        You recieved a warning from OBDDMS for Violating our terms and condition<br><br>
        If you do it further you will be blocked for lifetime.<br><br>
        Regards,<br><br>
        Social Service Investigating Team,<br><br>
        Online Blood Doner Database Management System<br><br>
        Email:- obddms2023@gmail.com
      ';
      $m->smtp_mailer($mail2,'OBDDMS: You Get A Warning', $msg2);
      $no_error=true;
      $success="Warning Sent Successfully";
    }

    if(isset($_POST['bsub'])){
      $email=$_POST['rt'];
      $donor=$db2->Get_data($email);
      $member=$db3->Get_data($email);

      if($db2->exists($email) == 1 && $donor['is_block']==0){
        $db2->Block($email);
        $msg2='
        Dear User,<br><br>
        You have been blocked from OBDDMS for Violating our terms and condition<br><br>
        To review it contact in this email obddms2023@gmail.com<br><br>
        Regards,<br><br>
        Social Service Investigating Team,<br><br>
        Online Blood Doner Database Management System<br><br>
        Email:- obddms2023@gmail.com
      ';
      $m->smtp_mailer($email,'OBDDMS: You Have Been Blocked', $msg2);
      $no_error=true;
      $success="User Blocked";
      }
      else if($db3->exists($email) == 1 && $member['is_block']==0){
        $db3->Block($email);
        $msg2='
        Dear User,<br><br>
        You have been blocked from OBDDMS for Violating our terms and condition<br><br>
        To review it contact in this email obddms2023@gmail.com<br><br>
        Regards,<br><br>
        Social Service Investigating Team,<br><br>
        Online Blood Doner Database Management System<br><br>
        Email:- obddms2023@gmail.com
      ';
      $m->smtp_mailer($email,'OBDDMS: You Have Been Blocked', $msg2);
      $no_error=true;
      $success="User Blocked";
      }
      else{
        $err=true;
        $error='User Already Blocked!!';
      }
    }

    if(isset($_POST['csub'])){
      $email=$_POST['rep'];
      $donor=$db2->Get_data($email);
      $member=$db3->Get_data($email);

      if($db2->exists($email) == 1 && $donor['is_block']==1){
        $db2->UnBlock($email);
        $msg2='
        Dear User,<br><br>
        Your account has been unblocked<br><br>
        If you do any malpractice further your account will be blocked forever<br><br>
        Regards,<br><br>
        Social Service Investigating Team,<br><br>
        Online Blood Doner Database Management System<br><br>
        Email:- obddms2023@gmail.com
      ';
      $m->smtp_mailer($email,'OBDDMS: Your Account Unblocked', $msg2);
      $no_error=true;
      $success="User Unblocked";
      }
      else if($db3->exists($email) == 1 && $member['is_block']==1){
        $db3->UnBlock($email);
        $msg2='
        Dear User,<br><br>
        Your account has been unblocked<br><br>
        If you do any malpractice further your account will be blocked forever<br><br>
        Regards,<br><br>
        Social Service Investigating Team,<br><br>
        Online Blood Doner Database Management System<br><br>
        Email:- obddms2023@gmail.com
      ';
      $m->smtp_mailer($email,'OBDDMS: Your Account Unblocked', $msg2);
      $no_error=true;
      $success="User Unblocked";
      }
      else{
        $err=true;
        $error='User Is Not Blocked!!';
      }
    }

    $data=$db->ReadReports();

?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Spread The Red (Admin)</title>
    <link rel="icon" type="images/x-icon" href="../blood.png">
  <link rel="stylesheet" href="admin_page.css">
  <!--link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css"-->
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
  <!---------------------------------Send Warning MODAL---------------------------->
  <div class="modal fade" id="warnModal">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Send Warning</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <!-- Modal body -->
        <div class="modal-body px-4">
          <form action="" method="post" id="form-data">
            <div class="form-group">
              <label for="exampleInputEmail1">Reported By</label>
              <input type="email" name='rby' class="form-control" id="rby" aria-describedby="emailHelp">
            </div>
            <br>
            <div class="form-group">
              <label for="exampleInputEmail1">Report To</label>
              <input type="email" name='rto' class="form-control" id="rto" aria-describedby="emailHelp">
            </div>
            <br>
            <div class="form-group">
              <button type="submit" name="sub" id="ffffsub" class="btn btn-danger btn-block">Send</button>
            </div>
          </form>
        </div>

        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>

      </div>
    </div>
  </div>


  <!---------------------------------Block Modal---------------------------->
  <div class="modal fade" id="blockModal">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Block User</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <!-- Modal body -->
        <div class="modal-body px-4">
          <form action="" method="post" id="form-data">
            <div class="form-group">
              <label for="exampleInputEmail1">Block</label>
              <input type="email" name='rt' class="form-control" id="rt" aria-describedby="emailHelp">
            </div>
            <br>
            <div class="form-group">
              <button type="submit" name="bsub" id="fffsub" class="btn btn-danger btn-block">Block User</button>
            </div>
          </form>
        </div>

        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>

      </div>
    </div>
  </div>

  <!---------------------------------Unblock Modal---------------------------->
  <div class="modal fade" id="unblockModal">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Unblock User</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <!-- Modal body -->
        <div class="modal-body px-4">
          <form action="" method="post" id="form-data">
            <div class="form-group">
              <input type="email" name='rep' class="form-control" id="rep" aria-describedby="emailHelp">
            </div>
            <br>
            <div class="form-group">
              <button type="submit" name="csub" id="ffsub" class="btn btn-danger btn-block">Unblock User</button>
            </div>
          </form>
        </div>

        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>

      </div>
    </div>
  </div>
  <?php if($no_error){?>
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?php echo $success; ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
          <?php }?>
  <?php if($err){?>
          <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <?php echo $error; ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
          <?php }?>
<table id="myTable" class="table table-striped">
    <thead class="thead-dark">
      <tr>
        <th scope="col" style="color: black;">SL No</th>
        <th scope="col" style="color: black;">Reported By</th>
        <th scope="col" style="color: black;">Report To</th>
        <th scope="col" style="color: black;">Report Description</th>
        <th scope="col" style="color: black;">Send Warning</th>
        <th scope="col" style="color: black;">Block User</th>
        <th scope="col" style="color: black;">Unblock User</th>
        <th scope="col" style="color: black;">Status</th>
      </tr>
    </thead>
    <tbody>
    <?php $i=1; foreach($data as $row){?>
      <tr>
        <th scope="row"><?php echo $i; ?></th>
        <td><?php echo $row['reporter']; ?></td>
        <td><?php echo $row['reportie']; ?></td>
        <td><?php echo $row['content']; ?></td>
        <td><button type="button" class="btn btn-warning warn">Send</button></td>
        <td><button type="button" class="btn btn-danger block">Block User</button></td>
        <td><button type="button" class="btn btn-success unblock">Unblock User</button></td>
        <td style="color:blue;"><?php 
          $a=$db2->Get_data($row['reportie']);
          $b=$db3->Get_data($row['reportie']);
          if($db2->exists($row['reportie'])==1){
            if($a['is_block']==1){
              echo "<b>Blocked</b>";
            }else{
              echo "<b>Active</b>";
            }
          }else if($db3->exists($row['reportie'])==1){
            if($b['is_block']==1){
              echo "<b>Blocked</b>";
            }else{
              echo "<b>Active</b>";
            }
          }
         ?></td>

      </tr>
      <?php $i++; }?>
    </tbody>
  </table>
  <script  src="https://code.jquery.com/jquery-3.7.0.js"></script>
  <script  src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
  <script  src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
<script src="adminscript.js"></script>
<script>
  let table = new DataTable('#myTable');
  let a=document.getElementsByClassName('warn');
  let b=document.getElementsByClassName('block');
  let c=document.getElementsByClassName('unblock');
  let wait=document.getElementById('ffsub');
    wait.addEventListener('click',(e)=>{
      wait.textContent = 'Please Wait...';
    });
    let wait2=document.getElementById('fffsub');
    wait2.addEventListener('click',(e)=>{
      wait2.textContent = 'Please Wait...';
    });
    let wait3=document.getElementById('ffffsub');
    wait3.addEventListener('click',(e)=>{
      wait3.textContent = 'Please Wait...';
    });
  Array.from(a).forEach((elements)=>{
    elements.addEventListener('click',(e)=>{
      $('#warnModal').modal('toggle');
      console.log('Listened');
      let c=e.target.parentNode.parentNode;
      let repby=c.getElementsByTagName("td")[0].innerText;
      let repto=c.getElementsByTagName("td")[1].innerText;
      rby.value=repby;
      rto.value=repto;
    })
  });

  Array.from(b).forEach((elements)=>{
    elements.addEventListener('click',(e)=>{
      $('#blockModal').modal('toggle');
      console.log('Listened');
      let c=e.target.parentNode.parentNode;
      let rept=c.getElementsByTagName("td")[1].innerText;
      rt.value=rept;
    })
  });

  Array.from(c).forEach((elements)=>{
    elements.addEventListener('click',(e)=>{
      $('#unblockModal').modal('toggle');
      console.log('Listened');
      let c=e.target.parentNode.parentNode;
      let rept=c.getElementsByTagName("td")[1].innerText;
      rep.value=rept;
    })
  });
</script>


</body>



</html>