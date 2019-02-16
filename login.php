<?php
	session_start();
	require'C:\xampp\htdocs\login\dbconfig\config.php';

?>

<!DOCTYPE html>
<head>

<link href="login.css" type="text/css" rel="stylesheet"/>
</head>
<body>
 
   <div class="body"></div>
		<div class="grad"></div>
		<div class="header">
			<div>Picto<span>Graphy</span></div>
   </div>
   <br>
   <form action="login.php" method="post" >	
		<div class="login">
				<input type="text" placeholder="Username" name="username"><br>
				<input type="password" placeholder="Password" name="password"><br>
				<input type="submit" name="login" id="loginb" value="Login">
				<a href="log.php"> <input type="button" id="registerb" value="Register" /></a>
		</div>
    </form>
	
	<?php
		if(isset($_POST[login]))
		{
			$username=$_POST['username'];
			$password=$_POST['password'];
			
			$query = "select * from user where username='$username' and password='$password' ";
			//echo $query;
			$query_run = mysqli_query($con,$query);
			//echo mysql_num_rows($query_run);
			
			if($query_run)
				{
					if(mysqli_num_rows($query_run)>0)
					{
					$row = mysqli_fetch_array($query_run,MYSQLI_ASSOC);
					
					$_SESSION['username'] = $username;
					
					header( "Location:index.php");
					}
					else
					{
						echo '<script type="text/javascript">alert("No such User exists. Invalid Credentials")</script>';
					}
				}
			else
				{
					echo '<script type="text/javascript">alert("Database Error")</script>';
				}
			}
		else
			{
			}
		
	?>
		
	
 
</body>