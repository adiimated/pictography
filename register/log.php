<?php
	session_start();
	require'C:\xampp\htdocs\login\dbconfig\config.php';

?>
<!DOCTYPE html>
<head>
<link href="log.css" type="text/css" rel="stylesheet"/>
</head>
<div class="body"></div>
		<div class="grad"></div>
		<div class="header">
			<div>Picto<span>Graphy</span></div>
		</div>
	
		<form action="log.php" method="post">
			<div class="register">
				
				<input type="fullname" placeholder="Full Name" name="fullname" required><br>
				<input type="username" placeholder="Username" name="username" required><br>
				<input type="password" placeholder="Password" name="password" required><br>
				<input type="password" placeholder="Confirm Password" name="cpassword" required><br>
				<input type="email" placeholder="Email" name="email" required><br>
				<p>Gender: 
					<label>Male<input type="radio" name="gender" value="male" required></label>
					<label>Female<input type="radio" name="gender" value="female" required></label>
					<label>Other<input type="radio" name="gender" value="other" required></label>
				</p>
				<!-- <p>Use As: 
					<label>Buyer<input type="radio" name="useas" value="buyer"></label>
					<label>Seller<input type="radio" name="useas" value="seller"></label>
				</p>
				-->
				<input name="submitb" type="submit" value="Register">
				<a href="login.php"> <input type="button" value="Login" /></a>
				<a href="index.php"> <input type="button" value="Go to homepage" /></a>

			</div>
		</form>
		
		<?php
			
			if(isset($_POST['submitb']))
			{
				//echo '<script type="text/javascript"> alert("Sign up button clicked") </script>';
				
				@$username=$_POST['username'];
				@$password=$_POST['password'];
				@$cpassword=$_POST['cpassword'];
				
				
				@$fullname=$_POST['fullname'];
				@$gender=$_POST['gender'];
				@$email=$_POST['email'];
				
				if($password==$cpassword)
				{
					$query = "select * from user where username='$username'";
					//echo $query;
					$query_run = mysqli_query($con,$query);
					//echo mysql_num_rows($query_run);
					if($query_run)
						{
							if(mysqli_num_rows($query_run)>0)
							{
								// there is already a user with the same username
								echo '<script type="text/javascript"> alert("User already exists.. try another username") </script>';
							}
	
							else
							{
								$query = "insert into user values('$fullname','$username','$password','$email','$gender')";
								$query_run = mysqli_query($con,$query);
								if($query_run)
								{
									echo '<script type="text/javascript">alert("User Registered.. Welcome")</script>
									<a href="index.php"> GO TO HOMEPAGE </a>';
								
								}
								else
								{
									echo '<p class="bg-danger msg-block">Registration Unsuccessful due to server error. Please try later</p>';
								}
							}
						}
						else
						{
							echo '<script type="text/javascript">alert("DB error")</script>';
						}
					}
					else
					{
						echo '<script type="text/javascript">alert("Password and Confirm Password do not match")</script>';
					}
					
				}
				else
				{
				}
			
				
				
				
		?>
</html>		

