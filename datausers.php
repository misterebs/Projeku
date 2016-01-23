<?php 
include_once('config.php');
include('cek-login.php');
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<meta charset="utf-8">
		<title>Bootstrap 3 Control Panel</title>
		<meta name="generator" content="Bootply" />
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>

		<!--[if lt IE 9]>
			<script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		<link href="css/styles.css" rel="stylesheet">
	</head>
	<body>
<!-- Header -->
<div id="top-nav" class="navbar navbar-inverse navbar-static-top">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
          <span class="icon-toggle"></span>
      </button>
      <a class="navbar-brand" href="dashboard.php">Control Panel</a>
    </div>
    <div class="navbar-collapse collapse">
      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <li><a href="logout.php"><i class="glyphicon glyphicon-lock"></i> Logout</a></li>
          
        </li>
      </ul>
    </div>
  </div><!-- /container -->
</div>
<!-- /Header -->

<!-- Main -->
<div class="container">
  
  <!-- upper section -->
  <div class="row">
	<div class="col-sm-3">
      <!-- left -->
      <h3><i class="glyphicon glyphicon-briefcase"></i> Main Menu</h3>
      <hr>
      
      <ul class="nav nav-stacked">
        <li><a href="http://www.bootply.com/85861" target="ext"><i class="glyphicon glyphicon-flash"></i> Alerts</a></li>
        <li><a href="http://www.bootply.com/85861" target="ext"><i class="glyphicon glyphicon-link"></i> Links</a></li>
        <li><a href="http://www.bootply.com/85861" target="ext"><i class="glyphicon glyphicon-list-alt"></i> Reports</a></li>
        <li><a href="http://www.bootply.com/85861" target="ext"><i class="glyphicon glyphicon-book"></i> Books</a></li>
        <li><a href="http://www.bootply.com/85861" target="ext"><i class="glyphicon glyphicon-briefcase"></i> Tools</a></li>
        <li><a href="http://www.bootply.com/85861" target="ext"><i class="glyphicon glyphicon-time"></i> Real-time</a></li>
        <li><a href="http://www.bootply.com/85861" target="ext"><i class="glyphicon glyphicon-plus"></i> Advanced..</a></li>
      </ul>


      <ul class="nav nav-pills nav-stacked">
        <li class="nav-header"></li>
        <li><a href="#"><i class="glyphicon glyphicon-list"></i> Layouts &amp; Templates</a></li>
        <li class="divider"></li>
        <li><a href="#"><i class="glyphicon glyphicon-briefcase"></i> Toolbox</a></li>
        <li><a href="#"><i class="glyphicon glyphicon-link"></i> Widgets</a></li>
        <li><a href="#"><i class="glyphicon glyphicon-list-alt"></i> Users</a></li>
        <li><a href="#"><i class="glyphicon glyphicon-book"></i> Pages</a></li>
        <li class="divider"></li>
        <li><a href="#"><i class="glyphicon glyphicon-star"></i> Social Media</a></li>
      </ul>
      
      <hr>
      
  	</div><!-- /span-3 -->
    <div class="col-sm-9">
      	
      <!-- column 2 -->	
       <h3><i class="glyphicon glyphicon-dashboard"></i> Users</h3>  
            
       <hr>
      
	<div class="row">
  <div class="col-md-9">
    <div class="content">
      <?php
    $username = $_SESSION['username'];
    $query_user_login = mysql_query("select * from users where username='$username'");
    
    $user_login = mysql_fetch_array($query_user_login);
    ?>
        
    <?php 
    $message = $_GET['msg'];
    
    if ($message == 'success') {
    ?>
    <div class="info">Success</div>
    <?php } else if ($message == 'failed') {?>
    <div class="error">Error</div>
    <?php } ?>
    
    <a href="index.php" class="left">Tambah User</a> <a href="logout.php" class="right">Logout</a>
    <br />
    <table class="table table-striped">
        <thead>
            <tr>
                <th width="20">No.</th>
                <th>Username</th>
                <th>Fullname</th>
                <th>Email</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $query = mysql_query("select * from users");
            
            $i = 1;
            
            while ($data = mysql_fetch_array($query)) {
            ?>
            <tr class="<?php if ($i % 2 == 0) { echo "odd"; } else { echo "even"; } ?>">
                <td><?php echo $i; ?></td>
                <td>
                    <?php 
                    echo $data['username']; 
                    
                    // jika user yang login memiliki role sebagai admin, maka tampilkan menu untuk edit dan delete user
                    if ($_SESSION['role'] == 'admin') {
                    ?>
                    <div class="row-actions">
                        <a href="edit.php?uid=<?php echo $data['id_user'];?>">Edit</a>
                        <?php if ($data['username'] != 'admin') {?>
                         | <a href="delete.php?uid=<?php echo $data['id_user'];?>" class="delete">Delete</a>
                        <?php } ?>
                    </div>
                    <?php } ?>
                </td>
                <td><?php echo $data['fullname']; ?></td>
                <td><?php echo $data['email']; ?></td>
            </tr>
            <?php 
                $i++;
            } 
            ?>
        </tbody>
    </table>
    </div>
</div>
</div>

              
      
    
      
  </div><!--/row-->
  
</div><!--/container-->
<!-- /Main -->


<footer class="text-center">This Bootstrap 3 dashboard layout is compliments of <a href="http://www.bootply.com/85861"><strong>Bootply.com</strong></a></footer>


<div class="modal" id="addWidgetModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 class="modal-title">Add Widget</h4>
      </div>
      <div class="modal-body">
        <p>Add a widget stuff here..</p>
      </div>
      <div class="modal-footer">
        <a href="#" class="btn">Close</a>
        <a href="#" class="btn btn-primary">Save changes</a>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dalog -->
</div><!-- /.modal -->



  
	<!-- script references -->
		<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
	</body>
</html>