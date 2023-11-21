<?php
  session_start();
  $has_error=false;
  $error="";
  $is_right=false;
  $success='';
  require_once "../Blood_Consumer_login_form/ConsumerDb.php";
  require_once "../BLOOD DONOR LOGIN FORM/donordb.php";
  $db=new Consumerdb();
  $db2=new Donordb();
  if (!isset($_SESSION['loggedin']) || ($_SESSION['loggedin'] != true)) 
  {
      header("location: ../Blood_Consumer_login_form/Consumer_LoginForm.php");
      exit; 
  }

  $data=$db->Contacted_Donors($_SESSION['username']);
  $datas=$db->Get_data($_SESSION['username']);

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
  <title>Spread The Red (Member)</title>
    <link rel="icon" type="images/x-icon" href="../blood.png">
  <link rel="stylesheet" href="consumer.css">
  <!--link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css"-->
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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
            <th scope="col" style="color: black;">SL NO</th>
            <th scope="col" style="color: black;">Profile Picture</th>
            <th scope="col" style="color: black;">Donor's Name</th>
            <th scope="col" style="color: black;">Donor's Email</th>
            <th scope="col" style="color: black;">Donor's Phone</th>
            <th scope="col" style="color: black;">Requested Blood</th>
            <th scope="col" style="color: black;">Timing</th>
            <th scope="col" style="color: black;">Request Status</th>
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
                $datassss=$db->getaccept($row['email'],$_SESSION['username']);
                  if($db->allcount($row['email'],$_SESSION['username'])==1 && $datassss['accepted']==0){
                     $d=$db2->Get_data($row['email']);
                     echo $d['phone'];
                  }else{
                    echo "";
                  }
                ?></td>
              </td>
            <td><?php echo $row['blood_group'];?></td>
            <td><?php echo $row['date_time'];?></td>
            <td style="color: blue;"><b><?php 
              $datassss=$db->getaccept($row['email'],$_SESSION['username']);
              if($db->allcount($row['email'],$_SESSION['username'])==1 && $datassss['accepted']==0){
                echo "Accepted";
              }else if($db->allcount($row['email'],$_SESSION['username'])==0){
                echo "Pending";
              }
              else if($db->allcount($row['email'],$_SESSION['username'])==1 && $datassss['accepted']==1){
                echo "Rejected";
              }
            ?></b></td>
            <td><button type="button" class="btn btn-danger three">Report</button></td>
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
              <input type="hidden" name="reporter" value="<?php echo $datas['email'];?>" class="form-control" id="nemail" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
              <input type="hidden" name="reportie"  class="form-control" id="donemail" aria-describedby="emailHelp">
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
  let b = document.getElementsByClassName('three');
  Array.from(b).forEach((elements)=>{
    elements.addEventListener('click',(e)=>{
      $('#reportModal').modal('toggle');
      console.log('Listened');
      tr = e.target.parentNode.parentNode;
      email = tr.getElementsByTagName("td")[3].innerText;
      donemail.value = email;
    })
  });
</script>


</body>



</html>