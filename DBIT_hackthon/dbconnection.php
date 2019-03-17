<?php
$server="localhost";
$user="root";
$password="shubhamp";
$conn=mysqli_connect($server,$user,$password);
if($conn)
{
 $createDB="create database if not exists socialethics";
 $resultq=mysqli_query($conn,$createDB) or die("failed to create database");
 mysqli_select_db($conn,'socialethics');
}
else
{
    echo"<script>alert('Failed to connect')</script>";
}

?>