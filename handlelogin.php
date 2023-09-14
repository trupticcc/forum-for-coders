<?php
include"_dbconnect.php";
if($_SERVER['REQUEST_METHOD']=="POST")
{
  $email=$_POST['loginemail'];
  $pass=$_POST['loginpassword'];
  $sql="SELECT * FROM `users` WHERE user_email='$email'";
  $result=mysqli_query($conn,$sql);
  $num_r=mysqli_num_rows($result);

  $sql12="SELECT sno FROM `users` WHERE user_email='$email'";
  $result12=mysqli_query($conn,$sql12);
  $row12=mysqli_fetch_assoc($result12);
  $sno12=$row12['sno'];

    if($num_r==1)
    {
         $row=mysqli_fetch_assoc($result);
         
         if(password_verify($pass,$row['user_pass']))
           {
             session_start();
             $_SESSION['login']=true;
             $_SESSION['username']=$email;
             $_SESSION['sno']=$sno12;
             echo"loggedin".$email;
             header("location: /forum/index.php");
            
             exit();
           }
           else{
            header("location: /forum/index.php?pass=wrong");
           }
    
}
else{
header("location: /forum/index.php?user=notexist");
}

}
?>