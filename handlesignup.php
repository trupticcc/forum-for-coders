<?php
    $showalert=false;
    $showerror="false";

if($_SERVER['REQUEST_METHOD']=="POST")
{
    include"_dbconnect.php";
    $username=$_POST['email'];
    $password=$_POST['password'];
    $cpassword=$_POST['cpassword'];

    //check whether username already exist or not
 $existsql="select  * from `users` where user_email='$username'";
 $result=mysqli_query($conn,$existsql);
 $num_r=mysqli_num_rows($result);
 if($num_r>0)
 {
      $showerror="Email is already in use";
      header("location:/forum/index.php?signupsuccess=fail&error=$showerror");

 }
 else{
          if($password==$cpassword)
          {
             $hash=password_hash($password,PASSWORD_DEFAULT) ;
            $sql="insert into `users` values('','$username','$hash','')";
            $result=mysqli_query($conn,$sql);
            if($result)
            {
                         $showalert=true;
                         header("location:/forum/index.php?signupsuccess=true");
                         exit();
            }
          }
          else{
            $showerror="password do not match";
           header("location:/forum/index.php?signupsuccess=failpass");

          }
 }
// header("location:/forum/index.php?signupsuccess=false&error=$showerror");

 
}
?>