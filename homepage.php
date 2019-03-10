<?php
	session_start();
	require_once('dbconfig/config.php');
	//phpinfo();
?>
<!DOCTYPE html>
<html>
<head>
<title>Profile</title>
<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<div id="main-wrapper">
		<center><h2>Profile</h2></center>
		<center><h3>Welcome <?php echo $_SESSION['username']; ?></h3></center>	
		<form action="homepage.php" method="post">
			<div class="inner_container">
				<button name="logout" class="logout_button" type="submit">Log Out</button>	
			</div>
		</form>
		
		<?php
			if(isset($_POST['logout']))
			{
				session_destroy();
				header('location:login.php');
			}
		
		?>
	</div>
</body>
</html>