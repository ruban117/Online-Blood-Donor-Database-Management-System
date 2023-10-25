<?php
    session_start();
    require_once '../Admin Login/Admindb.php';
    $db=new AdminDb();
    if (!isset($_SESSION['loggedin']) || ($_SESSION['loggedin'] != true)) {
        header("location: ../Admin Login/Admin_login.php");
        exit;
    }

    if(isset($_POST['sub'])){
      $mail=$_POST['rby'];
      echo $mail;
    }

?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin Pannel</title>
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
              <button type="submit" name="sub" id="fsub" class="btn btn-danger btn-block">Send</button>
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
<table id="myTable" class="table table-striped">
    <thead class="thead-dark">
      <tr>
        <th scope="col" style="color: black;">SL No</th>
        <th scope="col" style="color: black;">Reported By</th>
        <th scope="col" style="color: black;">Report To</th>
        <th scope="col" style="color: black;">Report Description</th>
        <th scope="col" style="color: black;">Send Warning</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <th scope="row">1</th>
        <td>rubanpathak706@gmail.com</td>
        <td>johndoe@gmail.com</td>
        <td>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolorem praesentium quam eaque reprehenderit tenetur ex ab quo itaque id, expedita est placeat nihil sit eos obcaecati sapiente exercitationem temporibus velit laborum totam consectetur non possimus quisquam. Ut illum aut blanditiis?</td>
        <td><button type="button" class="btn btn-warning warn">Send</button></td>
      </tr>
      <tr>
        <th scope="row">2</th>
        <td>soumitad991@gmail.com</td>
        <td>harry@gmail.com</td>
        <td>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Soluta architecto saepe velit quaerat, suscipit harum autem atque modi, nostrum quos magnam. At unde iusto, dolor dolorem quod modi voluptates consequatur alias mollitia cum. Eaque, similique expedita. Sed voluptatibus vel laboriosam nisi in, cum illo quasi obcaecati unde earum amet tenetur!</td>
        <td><button type="button" class="btn btn-warning warn">Send</button></td>
      </tr>
      <tr>
        <th scope="row">2</th>
        <td>souvikbanerjee241@gmail.com</td>
        <td>harry@gmail.com</td>
        <td>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Soluta architecto saepe velit quaerat, suscipit harum autem atque modi, nostrum quos magnam. At unde iusto, dolor dolorem quod modi voluptates consequatur alias mollitia cum. Eaque, similique expedita. Sed voluptatibus vel laboriosam nisi in, cum illo quasi obcaecati unde earum amet tenetur!</td>
        <td><button type="button" class="btn btn-warning warn">Send</button></td>
      </tr>
      <tr>
        <th scope="row">2</th>
        <td>sinhasusmita@gmail.com</td>
        <td>harry@gmail.com</td>
        <td>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Soluta architecto saepe velit quaerat, suscipit harum autem atque modi, nostrum quos magnam. At unde iusto, dolor dolorem quod modi voluptates consequatur alias mollitia cum. Eaque, similique expedita. Sed voluptatibus vel laboriosam nisi in, cum illo quasi obcaecati unde earum amet tenetur!</td>
        <td><button type="button" class="btn btn-warning warn">Send</button></td>
      </tr>
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
</script>


</body>



</html>