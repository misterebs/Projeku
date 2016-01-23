<?php 
session_start();

include_once('config.php');
include_once('cek-login.php');
include_once('partial/header.php');
include_once('partial/head.php');
include_once('partial/main.php');
?>

<div class="col-sm-9">
      	
      <!-- column 2 -->	
       <h3><i class="glyphicon glyphicon-edit"></i> Edit Users</h3>  
            
       <hr>
      
<div class="row">
  <div class="col-md-9">
    <div class="content">
	<form class="form-horizontal" action="update.php" method="post" style="width:400px; margin:auto;">
		<fieldset>
			
			<?php 
			$message = $_GET['msg'];
			
			if ($message == 'success') {
			?>
			<div class="info">Success</div>
			<?php } else if ($message == 'failed') {?>
			<div class="error">Error</div>
			<?php } ?>
			
			
			<?php 
			// terima id_user dari halaman users
			$user_id = $_GET['uid'];
			
			$query = mysql_query("select * from users where id_user='$user_id'");
			
			$data = mysql_fetch_array($query);
			?>
			
		
			<div class="form-group">
				<label for="username" class="col-sm-4 control-label">Username</label> 
				<div class="col-sm-8">
					<input id="username" name="username" class="form-control" type="text" required="required" value="<?php echo $data['username']; ?>" disabled="disabled" />
				</div>
			</div>
			<div class="form-group">
				<label for="password" class="col-sm-4 control-label">Password</label> 
				<div class="col-sm-8">
					<input id="password" name="password" class="form-control" type="password" required="required" value="<?php echo $data['password']; ?>" <?php if ($data['username'] == 'admin') {?> disabled="disabled" <?php } ?> />
				</div>
			</div>
			<div class="form-group">
				<label for="email" class="col-sm-4 control-label">Email</label> 
				<div class="col-sm-8">
					<input id="email" name="email" class="form-control" type="email" required="required" value="<?php echo $data['email']; ?>" />
				</div>
			</div>
			<div class="form-group">
				<label for="fullname" class="col-sm-4 control-label">Fullname</label> 
				<div class="col-sm-8">
					<input id="fullname" name="fullname" class="form-control" type="text" value="<?php echo $data['fullname']; ?>" />
				</div>
			</div>
			<?php
			// jika user yang login memiliki role sebagai admin, maka tampilkan opsi ini
			if ($_SESSION['role'] == 'admin') {
				if ($data['username'] != 'admin') {
			?>
			<div class="form-group">
				<label for="role" class="col-sm-4 control-label">Role</label>
				<div class="col-sm-8">
					<select name="role">
						<option value="admin">Admin</option>
						<option value="member">Member</option>
					</select>
				</div>
			</div>
			<div class="form-group">
					<div class="col-sm-offset-4 col-sm-10">
						<button type="submit" class="btn btn-success">Update</button>
					</div>
			</div>
			<?php 
				}
			} 
			?>
			
			<input type="hidden" name="user_id" value="<?php echo $data['id_user']; ?>" />
		</fieldset>
	</form>
</div>
</body>
</html>