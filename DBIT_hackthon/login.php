<?php
   session_start();
 include 'dbconnection.php';
 include 'checkexists-fun.php';
 if(isset($_POST['user_login_btn']))
 {
    $uname=$_POST['username'];
    $upass=$_POST['password'];
      $sql="select user_name,user_password from useraccount where user_name='$uname' and user_password='$upass'";
       $result=mysqli_query($conn,$sql) or die("Failed to run ").mysqli_error($conn);
       $row=mysqli_num_rows($result);

     if($row==1)
     {
		 echo "<script>alert('success')</script>";
         header('location:index.html');
         $_SESSION['uname']=$uname;
     }
     else
     {
		 echo"<script>alert('Username Or password Not found')</script>";
     }
 }

?>
<html>
<head>
  <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <link href="css/bootstrap.min.css" type="text/css" rel="stylesheet"/>
	    <link href="css/font-awesome.min.css" type="text/css"rel="stylesheet"/>
		<link href="css/mystyle.css" rel="stylesheet" type="text/css">
		<style type="text/css">
          body{
            background-image:url(images/admin1.jpeg);
            background-size: cover;
            background-repeat: no-repeat;
        }
		.iconbg{
            width:100px;
            height:100px;
            border-radius: 50%;
            background-color:#1E90D9;
            top:2px;
        }
    </style>
</head>
<body>
<div class="container" style="margin-top:150px;">
		<div class="row">
			<div class="col-md-4 col-md-offset-4">
				<center>  
					<div class="iconbg">
						<span class="fa fa-user" style="font-size:80px; color:blue;margin-left:px;margin-top:5px;">
						</span>
					</div>
				   <h5 style="">User</h5>
				</center>
			</div>
		</div>
		<div class="row">
			<div class="col-md-4 col-md-offset-4"><center>
				<form class="form-horizontal" method="post">
					<input type="text" class="form-control txtbox" placeholder="Username" title="Username"  name="username"required autofocus/><br>
					<input type="password" class="form-control txtbox" placeholder="Password" title="Password" name="password"required/><br>
				    <input type="submit"  class="logbtn btn btn-success" title="Login" name="user_login_btn"value="Login"
					 style="width:82px;"
					/>
						<br><span style="color:white;font-weight:500;">Or</span><br>
					  <input type="button" class="logbtn btn btn-success" onclick="window.location.href='register.php'"value="Register" title="New register"/>
						
				</form>
				</center>
			</div>
		</div>
</div>
</body>
</html>