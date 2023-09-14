<?php
//script to connect to database.
$server="localhost";
$user="root";
$password="";
$database="forum";
$conn=mysqli_connect($server,$user,$password,$database);
if($conn)
{
//echo "connected";
}
else
{
    die("not connecting server issue");
}
?>