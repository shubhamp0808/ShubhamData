<?php
 include "dbconnection.php";
// not used currently
 include "checkexists-fun.php";
/* below for subscribe */
if(isset($_POST['subscribebtn']))
{
    $CT="create table if not exists subscription(email varchar(200)primary key,DOS date)";
    $resultCT=mysqli_query($conn,$CT) or die("could not create Table").mysqli_error($conn);
    $email=$_POST['subscribeemail'];
    $DOS=date('Y-m-d');
    $insert="insert into subscription values('$email','$DOS')";
    $resultIT=mysqli_query($conn,$insert);
    if($resultIT)
    {
        echo"<script>alert('Thank For Your Subscription')</script>";
        header("refresh:0,url=index.html");
    }
    else
    {
         echo"<script>alert('User already subscribed')</script>";
        header("refresh:0,url=index.html");
       die("").mysqli_error($conn); 
     
    }
}