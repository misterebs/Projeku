<?php 
include_once('config.php');
include_once('cek-login.php');
include_once('partial/header.php');
include_once('partial/head.php');
include_once('partial/main.php');
?>

	<div class="col-sm-9">
      	
      <!-- column 2 -->	
       <h3><i class="glyphicon glyphicon-user"></i> Users</h3>  
            
       <hr>
	
	<?php
	$username = $_SESSION['username'];
	$query_user_login = mysql_query("select * from users where username='$username'");
	
	$user_login = mysql_fetch_array($query_user_login);
	?>
	<h3>Selamat datang, Anda login sebagai <?php echo $user_login['fullname']; ?></h3>
    <br>
	
	<?php 
	$message = $_GET['msg'];
	
	if ($message == 'success') {
	?>
	<div class="info">Success</div>
	<?php } else if ($message == 'failed') {?>
	<div class="error">Error</div>
	<?php } ?>
	
	
   

    
	<table class="table table-striped">
		<thead>
			<tr>
				<th>No.</th>
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

<?php
include_once('partial/footer.php');
?>