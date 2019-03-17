<?php
session_start();
 include 'dbconnection.php';
if(isset($_POST['submit']))
{
	if($_SESSION['uname']=='')
	{
		echo"<script>alert('First Login')</script>";
	}
	else
	{
	$createTB1="create table if not exists ethicsfeed(username varchar(200),category varchar(200),description varchar(300))";
     $result4=mysqli_query($conn,$createTB1) or die("Failed to create ethicsfeed table");
	$uname=$_SESSION['uname'];
    $category=$_POST['category'];
    $description=$_POST['description'];	
	$sql="insert into ethicsfeed value('$uname','$category','$description')";
	$result5=mysqli_query($conn,$sql);
	if($result5)
	{
		echo"<script>alert('Thank You for Providing Feedback')</script>";
	}
	else
	{
		echo"<script>alert('Failed to send Feedback')</script>";
	}
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
		<style>
		.accountinfo li{
				list-style:none;
				text-decoration:none;
				color:white;
				padding:0px;
				}
		.accountinfo li a{
		color:white;}
		</style>
</head>
<body>
  <div class="container-fluid" style="background-color:#EBECE9;"> 
 
    <div class="row">
	    <div class="col-md-6 col-xs-5" >
		    <div class="help-block">
				<h1><b>SocialEthics</b><span style="color:#22CA11">.com</span></h1> 
		   </div>
		</div>
		<div class="col-md-6 col-xs-7 col-sm-12 hidden-xs">
		    <div class="pull-right">
		      <a href="#"><span class="fa fa-facebook sicon" style="font-size:20px;	background-color:#768CEF;"></span></a>
		      <a href="#"><span class="fa fa-instagram sicon" style="font-size:20px;	background-color:#768CEF;"></span></a>
		      <a href="#"><span class="fa fa-google-plus sicon" style="font-size:20px;	background-color:#768CEF;"></span></a>
			</div>
		</div>
	 </div> 
</div> <!-- end of header container--><!-- end of container-->
<div class="container-fluid" style="background-color:#EBECE9;">
   <div class="row">
	   <div class="col-xs-12 col-sm-8">
			
	        <nav class="nav navbar-default">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#mybar">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				</button>
		    <div class="collapse navbar-collapse" id="mybar">
		    <ul class="nav navbar-nav">
			<li><a href="index.html">HOME</a></li>
			<li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">ETHICS<span class="caret"></span></a>
			    <ul class="dropdown-menu">
					       <li><a href="#">SOCIAL ETHICS</a></li>
						   <li class="divider"></li>
						   <li><a href="#">BUSINESS ETHICS</a></li>
						   <li class="divider"></li>
						   <li><a href="#">TECHNOLOGY ETHICS</a></li>
				</ul>
			</li>
			<li><a href="#issue">ISSUES</a></li>
			<li><a href="#what">What We DO</a></li>
			<li><a href="#contact">CONTACT US</a></li>
			<li><a href="login.php">LOGIN</a></li>
            </ul>
			</div>
				
		 </nav>
	
		   
	   </div>
  </div>
</div><!-- end of menu bar-->
<div class="container">
		<div class="row">
				<div class="col-md-6">
						<img src="images/books.jpg" alt="social ethics" class="img-responsive"/>
				</div>
				<div class="col-md-6">
				   <h1>What is SocialEthics ?</h1>
				   <p style="padding:20px;font-size:19px;">
						The ethics, moral values those are related to society and peple who live in that society is called spcial
						The peple is important stakeholder to make justify or make wise either ethical or unethical decision.
						It includes:
						<ul type="circle">
						<li>Currption</li>
						<li>Addiction</li>
						<li>Food Waste</li>
						</ul>
				   </p>
				</div>
		</div>
</div>
<div class="container">
		<div class="row">
				<div class="col-md-12">
					<center><h1>Kindly fill this form</h1>
					<form class="form-horizontal" method="post">
						<label>Full Name</label>
						<input type="text"name="username" class="form-control" required/>
						<label>Choose category</label>
						<select name="category" class="form-control">
							<option>Currption</option>
							<option>Addiction</option>
							<option>Food Waste</option>
						</select>
						<label>Descibe Issue</label>
						<textarea class="form-control" name="description">
						</textarea><br>
						<input type="submit" name="submit" value="submit" class="btn btn-success btn-lg"/> 
					</form>
					</center>
				</div>
		</div>
</div>
<script src="js/jquery.js" type="text/javascript"></script>
<script src="js/bootstrap.min.js" type="text/javascript"></script>
</body>
</html>