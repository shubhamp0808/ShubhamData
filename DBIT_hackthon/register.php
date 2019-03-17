<?php
include"dbconnection.php";
include"checkexists-fun.php";
session_start();
#----------------------below for customer registraion action------------------ 
if(isset($_POST['register']))
{
       
     $createTB1="create table if not exists useraccount(user_name varchar(200) primary key,user_contact varchar(10)not null,user_email varchar(100) unique key,user_address text not null,user_password varchar(100))";
     $result4=mysqli_query($conn,$createTB1) or die("Failed to create customer table");
        $uname=$_POST['username'];
        $len=strlen($_POST['contact']);//gets the contact length
        $email=$_POST['email'];
        $add=$_POST['address'];
        $count_user=checkexists('user_name','useraccount',$uname);// function called to check existing customer
        $count_email=checkexists('user_email','useraccount',$email);// function called to check email exists
       // echo"<script>alert('$count_user')</script>";
        //echo"<script>alert('$count_email')</script>";
       if($count_user==0&&$count_email==0)
       {
           if($_POST['password']==$_POST['confirmpassword'])
	       {
	         $pword=$_POST['password'];
             if($len==10)
             {
                 $contact=$_POST['contact'];
                 $sql3="insert into useraccount value('$uname','$contact','$email','$add','$pword')";
                 $result5=mysqli_query($conn,$sql3);
                 if($result5)
                 {
                    
					  echo "<script>alert('User Sucessfully Registered')</script>";
                     
                     
              
                 }
                 else
                 {
                   
				    echo "<script>alert('Failed to Registered')</script>";
                      
                 }
             }
               else
               {
               
				    echo "<script>alert('Provide correct mobile Number')</script>";
                   echo"<script>document.customerform.mobile.focus()</script>";
                   echo "<script>return false</script>";
                     
               }
           }//end of password if
           else
           {
              
			 echo "<script>alert('Password not matched')</script>";
               
           }
           
       }//end of count if
       else
       {
          
		   echo "<script>alert('User or Email exists')</script>";
             
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
    </style>
</head>
<body>
<div class="container" style="margin-top:100px;">
   <div class="row">
			<div class="col-md-4 col-md-offset-4">
			  <center>
				<form class="form-horizontal"  method="post">
				    <h1 style="color:white;">User Registration</h1>
			<input type="text" placeholder="Username" name="username" class="txtbox form-control" required autofocus/><br><!-- txtbox css writtent in logincss.css file-->
            <input type="text" placeholder="Contact" name="contact" class="txtbox form-control" required/><br>
            <input type="email" placeholder="Email" name="email" class="txtbox form-control" id="transp"required/><br>
            <input type="text" placeholder="Your Address" name="address" class="txtbox form-control" required/><br>
            <input type="password" placeholder="Password" name="password" class="txtbox form-control" required/><br>
            <input type="password" placeholder="Confirm Password" name="confirmpassword" id="transp"class="txtbox form-control"required/><br>
            <input type="submit" name="register" value="Register" class="btn btn-success"/>
			
				</form>
			  </center>
			</div>
		</div>
</div>
</body>
</html>