 <?php
	require('db.inc.php');
	$msg="";
	if(isset($_POST['email']) && isset($_POST['password']))
	{
		$email=mysqli_real_escape_string($con,$_POST['email']);
		$password=mysqli_real_escape_string($con,$_POST['password']);
		$res=mysqli_query($con,"select * from employee where email='$email' and password='$password'");
		$count=mysqli_num_rows($res);
		if($count>0)
			{
				$row=mysqli_fetch_assoc($res);
				$_SESSION['ROLE']=$row['role'];
				$_SESSION['USER_ID']=$row['id'];
				$_SESSION['USER_NAME']=$row['name'];
				header('location:index.php');
				die();
			}
		else
			{
				$msg="Please enter correct login details";
			}
	}
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Human resourse managment system</title>
	<link rel="stylesheet" type="text/css" href="./assets/css/style1.css">
	<link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
	<script src="https://kit.fontawesome.com/a81368914c.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="assets/css/normalize.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
     <link rel="stylesheet" href="assets/css/font-awesome.min.css">
      <link rel="stylesheet" href="assets/css/themify-icons.css">
      <link rel="stylesheet" href="assets/css/pe-icon-7-filled.css">
      <link rel="stylesheet" href="assets/css/flag-icon.min.css">
      <link rel="stylesheet" href="assets/css/cs-skin-elastic.css">
      <link rel="stylesheet" href="assets/css/style.css">
      <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
</head>
<body class="bg">
	<img class="wave" src="./images/wave.png">
	<div class="container">
		<div class="img">
			<img src="./images/bg.svg">
		</div>
		<div class="login-content">
			<form method="post">
				<img src="./images/avatar.svg">
				<h2 class="title">Welcome</h2>
           		<div class="input-div one">
           		   <div class="i">
           		   		<i class="fas fa-user"></i>
           		   </div>
           		   <div class="div">
           		   		<h5>Username</h5>
           		   		<input type="text" name="email" class="input" required>
           		   </div>
           		</div>
           		<div class="input-div pass">
           		   <div class="i"> 
           		    	<i class="fas fa-lock"></i>
           		   </div>
           		   <div class="div">
           		    	<h5>Password</h5>
           		    	<input type="password" name="password"class="input" required>
            	   </div>
            	</div>
            	<br>
            	<input type="submit" class="btn" value="Login">
				<div class="result_msg"><?php echo $msg?></div>
            </form>
        </div>
    </div>
    <script type="text/javascript" src="./assets/js/login.js"></script>
	 <script src="assets/js/vendor/jquery-2.1.4.min.js" type="text/javascript"></script>
      <script src="assets/js/popper.min.js" type="text/javascript"></script>
      <script src="assets/js/plugins.js" type="text/javascript"></script>
      <script src="assets/js/main.js" type="text/javascript"></script>
</body>
</html>