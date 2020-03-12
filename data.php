<?php
include 'incl/header.php';
?>
  <!-- Navbar -->
<?php
include "incl/nav.php";
?>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="dist/img/AdminLTELogo.png"
           alt="AdminLTE Logo"
           class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Alexander Pierce</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <?php
        include 'incl/sidebar.php';
      ?>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>DataTables</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">DataTables</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">DataTable with minimal features & hover style</h3>
            </div>
            <!-- curl -->
            <?php


            function callAPI($method, $url, $data){
              $curl = curl_init();
              curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json', 'Content-Length: ' . strlen($data)));

              switch ($method){
                case "POST":
                  curl_setopt($curl, CURLOPT_POST, 1);
                  if ($data)
                    curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
                  break;
                case "PUT":
                  curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "PUT");
                  if ($data)
                    curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
                  break;
                default:
                  if ($data)
                    $url = sprintf("%s?%s", $url, http_build_query($data));
              }

              curl_setopt($curl, CURLOPT_URL, $url);
              curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
              curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);

              // EXECUTE:
              $result = curl_exec($curl);
              if(!$result){die("Connection Failure");}
              curl_close($curl);
              return $result;
            }

            $resp = callAPI("GET", "https://durba-admin-api.herokuapp.com/users/", false);

            //print_r($resp);

            $response = json_decode($resp, true);

            $payload =  $response['payload'];

            ?>

            <div class="card-body">
              <table id="mainDataTable" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>ID</th>
                  <th>UID</th>
                  <th>First name</th>
                  <th>Gender</th>
                  <th>age group</th>
                  <th>email</th>
                  <th>segment</th>
                </tr>
                </thead>
                <tbody>
                <!-- Fill this table with data-->

                </tbody>
                <tfoot>
                <tr>
                  <th>ID</th>
                  <th>UID</th>
                  <th>First name</th>
                  <th>Gender</th>
                  <th>age group</th>
                  <th>email</th>
                  <th>segment</th>
                </tr>
                </tfoot>

                <?php

                for($i=0;$i<count($payload);$i++){

                  echo "<tr>";

                  $id =  $payload[$i]['id'];
                  $uid =  $payload[$i]['uid'];
//                  $last_name =  $payload[$i]['last_name'];
                  $first_name =  $payload[$i]['first_name'];
//                  $second_name =  $payload[$i]['second_name'];
                  $gender =  $payload[$i]['gender'];
                  $age_group =  $payload[$i]['age_group'];
//                  $password =  $payload[$i]['password'];
                  $email =  $payload[$i]['email'];
                  $segment =  $payload[$i]['segment'];
//                  $level =  $payload[$i]['level'];
//                  $source =  $payload[$i]['source'];
//                  $phone =  $payload[$i]['phone'];
//                  $info_complete =  $payload[$i]['info_complete'];
//                  $disabled =  $payload[$i]['disabled'];

                  echo "<td>$id</td>";
                  echo "<td>$uid</td>";
//                  echo "<td>$last_name</td>";
                  echo "<td>$first_name</td>";
//                  echo "<td>$second_name</td>";
                  echo "<td>$gender</td>";
                  echo "<td>$age_group</td>";
                  echo "<td>$email</td>";
                  echo "<td>$segment</td>";
//                  echo "<td>$level</td>";
//                  echo "<td>$source</td>";
//                  echo "<td>$phone</td>";
//                  echo "<td>$info_complete</td>";
//                  echo "<td>$disabled</td>";
                  echo "</tr>";
                }


                ?>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php
include 'incl/footer.php'
?>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables -->
<script src="plugins/datatables/jquery.dataTables.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- page script -->
<script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
    });
  });
</script>
</body>
</html>
