<?php
    session_start();
    require_once '../Admin Login/Admindb.php';
    $db=new AdminDb();
    if (!isset($_SESSION['loggedin']) || ($_SESSION['loggedin'] != true)) {
        header("location: ../Admin Login/Admin_login.php");
        exit;
    }

    $data=$db->ReadAllContactedPeople();
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
    <table id="myTable" class="table table-striped">
        <thead class="thead-dark">
          <tr>
            <th scope="col" style="color: black;">Sl No</th>
            <th scope="col" style="color: black;">Picture</th>
            <th scope="col" style="color: black;">Requester Name</th>
            <th scope="col" style="color: black;">Picture</th>
            <th scope="col" style="color: black;">Donor Name</th>
            <th scope="col" style="color: black;">Requested Blood</th>
            <th scope="col" style="color: black;">Date And Time</th>
          </tr>
        </thead>
        <tbody>
        <?php $i=1; foreach($data as $row){?>
          <tr>
            <td><?php echo $i;?></td>
            <td scope="row">
                <div class="propic">
                  <img src="<?php echo $row['requester_pic']?>" alt="">
                </div>
            </td>
            <td><?php echo $row['requester_name'];?></td>
            <td scope="row">
                <div class="propic">
                  <img src="<?php echo $row['donor_pic']?>" alt="">
                </div>
            </td>
            <td><?php echo $row['donor_name'];?></td>
            <td><?php echo $row['req_blood'];?></td>
            <td><?php echo $row['date_time'];?></td>
          </tr>
          <?php $i++; }?>
        </tbody>
      </table>
<script  src="https://code.jquery.com/jquery-3.7.0.js"></script>
  <script  src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
  <script  src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
<script src="adminscript.js"></script>
<script>
  let table = new DataTable('#myTable');
</script>


</body>



</html>