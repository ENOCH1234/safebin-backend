<?php
    include ("../required/connect.php");
    include ("../required/core.php");
?> 
<!DOCTYPE html>
<html>

<head>
    <link rel="icon" type="image/png" sizes="16x16" href="../images/favicon.png">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SafeBin Admin | Check Users</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="plugins/datatables/dataTables.bootstrap.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

        <?php include ("includes/header.php"); ?>
        <!-- Left side column. contains the logo and sidebar -->
        <?php include ("includes/sidebar.php"); ?>
        <!-- Left side column. contains the logo and sidebar -->
       
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    USERS
                    <small>| Check Users</small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="index"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li class="active">Check Users</li>
                </ol>
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="row">
                    <div class="col-xs-12">

                        <div class="box">
                            <div class="box-header">
                                <h1 class="box-title" style="color: red;"><strong>Total Registered: 
                                    <?php
                                        $sql2 = "SELECT * FROM users";
                                        $result2 = $connect->query($sql2);
                                        if ($result2->num_rows >= 0) {
                                            $rows1 = ($result2->num_rows);
                                            echo $rows1;
                                        }
                                    ?></strong>
                                </h1></div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Gender</th>
                                            <th>Email</th>
                                            <th>Username</th>
                                            <th>Country</th>
                                            <th>Phone</th>
                                            <th>Facebook</th>
                                            <th>Twitter</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    require_once "../required/dbconfig.php";
                                    $stmt = $DB_con->prepare("SELECT * from users");
                                    $stmt->execute();
                                    
                                    if($stmt->rowCount() > 0)
                                    {
                                        while($row=$stmt->fetch(PDO::FETCH_ASSOC))
                                        {
                                            extract($row);
                                            
                                        ?>
                                        <tr>
                                            <td><?php echo $name ?></td>
                                            <td><?php echo $gender ?></td>
                                            <td><?php echo $email ?></td>
                                            <td><?php echo $username ?></td>
                                            <td><?php echo $country ?></td>
                                            <td><?php echo $phone ?></td>
                                            <td><?php echo $facebook ?></td>
                                            <td><?php echo $twitter ?></td>
                                        </tr>
                                        <?php }} ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>Name</th>
                                            <th>Gender</th>
                                            <th>Email</th>
                                            <th>Username</th>
                                            <th>Country</th>
                                            <th>Phone</th>
                                            <th>Facebook</th>
                                            <th>Twitter</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                            <!-- /.box-body -->
                        </div>
                        <!-- /.box -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <!-- Footer -->
            <?php include ("includes/footer.php"); ?>
        <!-- /Footer -->

        <!-- Control Sidebar -->
        <?php include ("includes/right-bar.php"); ?>
        <!-- /.control-sidebar -->
        <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
        <div class="control-sidebar-bg"></div>
    </div>
    <!-- ./wrapper -->
    <!-- Accept and Reject Button -->
    <script>
    function admit(id){
		  //alert(id);
		  document.getElementById("btn_reject"+id).disabled = true;
		  $('#btn_accept'+id).load("accept.php", {
			  like_id:id 
		  }
		  )
		  document.getElementById("btn_accept"+id).disabled = true;
	  }
	  
	  function reject(id){
		  //alert(id);
		  document.getElementById("btn_accept"+id).disabled = true;
		  $('#btn_reject'+id).load("reject.php", {
			  like_id:id 
		  }
		  )
		  document.getElementById("btn_reject"+id).disabled = true;
      }
    </script>
    <!-- //End Buttons -->
    <!-- jQuery 3.1.1 -->
    <script src="plugins/jQuery/jquery-3.1.1.min.js"></script>
    <!-- Bootstrap 3.3.7 -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <!-- DataTables -->
    <script src="plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="plugins/datatables/dataTables.bootstrap.min.js"></script>
    <!-- SlimScroll -->
    <script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="plugins/fastclick/fastclick.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="dist/js/demo.js"></script>
    <!-- page script -->
    <script>
        $(function() {
            $("#example1").DataTable();
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false
            });
        });
    </script>
</body>

</html>