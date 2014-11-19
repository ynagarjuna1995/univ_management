<?php
	session_start();
	
	require("conection/connect.php");
	
	$msg="";
	if(isset($_POST['btn_log'])){
		$uname=$_POST['unametxt'];
		$pwd=$_POST['pwdtxt'];
		
		$sql=mysql_query("SELECT * FROM users_tbl
								WHERE username='$uname' AND password='$pwd' 
								
							");
						
		$cout=mysql_num_rows($sql);
			if($cout>0){
				$row=mysql_fetch_array($sql);
					if($row['type']=='admin')
						$msg="Login Fail!.....";	
					else
						header("location: everyone.php?tag=home");
					
			}
			
			else
					$msg="Login Fail!......";
}

?>

<!doctype html>
<html lang="en">
<head>
	
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Admin</title>
	<link href="css/bootstrap.min.css" rel="stylesheet"></link>
	<link rel="stylesheet" href="css/signin.css">



	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <style>

   		body {
  			padding-top: 50px;
		}
	.admin_template {
  		padding: 40px 15px;
  		text-align: center;
		}
	.admin_signin{
		padding:0px 420px 15px 420px; 
	}
	.btn-container{
		padding:0px 420px 100px 420px; 
	}	
    </style>

</head>


<body>

    <div class="container">

      <div class="admin_template">
        <h1>Welcome to Adminisration Portal</h1>
        <p class="lead">Manage everything from here </p>
      </div>

    </div><!-- /Starteter container -->
	
     <div class="container">
	<div class="admin_signin">
      <form class="form-signin" role="form" method="POST">   
        <h2 class="form-signin-heading">Please sign in</h2>
        <label for="inputEmail" class="sr-only">Email address</label>
        <input type="text" id="inputEmail" name="unametxt" class="form-control" placeholder="Email address" required autofocus>
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" id="inputPassword" name="pwdtxt" class="form-control" placeholder="Password" required>
     </div>   
     <div class="signin_btn">
     <div class="btn-container">
        <button class="btn btn-primary btn-block btn-lg btn-modify" name ="btn_log" type="submit">Sign in</button>
    </form>
    </div>
	 </div>
	 </div>

   <h2><?php echo $msg; ?></h2>

    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>

</html>