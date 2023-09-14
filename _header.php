<?php
include"_dbconnect.php";
include"loginmodal.php";
include"signupmodal.php";
session_start();


echo '    <nav class="navbar navbar-expand-lg bg-body-tertiary bg-primary" data-bs-theme="dark">
<div class="container-fluid">
  <a class="navbar-brand" href="index.php"><i>Forum for coders</i></a>
  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
      <li class="nav-item">
        <a class="nav-link active" aria-current="page" href="index.php">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="about.php">About Me</a>
      </li>
      <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
      categories
      </a>
      <ul class="dropdown-menu">
';
      ?>
      <?php
       $sql="SELECT * FROM `forcoders` limit 10";
       $result = mysqli_query($conn,$sql);
       while($row=mysqli_fetch_assoc($result))
       {     $id=$row['category_id'];
            $cat=$row['category_name'];
            // $id=$row['category_id'];
          echo '<li>
          <a class="dropdown-item" href="threadlist.php?catid='.$id.'">'.$cat.'</a></li>';
       }
      
    ?>
      <?php
      echo'
      </ul>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="contact.php">contact us</a>
      </li>

      </ul>
      <div class="row mx-2">

    </div>';
    if(isset($_SESSION['login']) && $_SESSION['login']==true){

     echo ' <form class="d-flex" role="search" action="search.php?search" method="get">
      <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search">
  <button class="btn  btn-success" type="submit">Search</button>
      <p class="text-light my-0 mx-2"> welcome '.$_SESSION['username'].'</p>
      <a href="partials/_logout.php" type="button" class="btn btn-success ml-2">
 logout</a>

 </form>';

      
    }
    else{
     echo '
     <form class="d-flex" role="search" >
     <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
     <button class="btn btn-outline-success mx-2" type="submit">Search</button>
   </form>


  <button type="button" class="btn btn-success ml-2" data-bs-toggle="modal" data-bs-target="#loginmodal">
  login</button>
  <button type="button" class="btn btn-success mx-2" data-bs-toggle="modal" data-bs-target="#signupmodal">
  sign up</button>';

}
    echo '
  </div>
</div>
</nav>';


if(isset($_GET['user']))
{
  $n=$_GET['user'];


if($n=="notexist")
{
  echo '<div class="alert alert-warning alert-dismissible fade show my-0" role="alert ">
  <strong>failed!</strong> Invalid credintials.
   <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';  
}
}

if(isset($_GET['signupsuccess']) && $_GET['signupsuccess']=="true")
{
  echo '<div class="alert alert-success alert-dismissible fade show my-0" role="alert ">
  <strong>success!</strong> now you can login.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
}

elseif(isset($_GET['signupsuccess']) && $_GET['signupsuccess']=="fail")
{
  echo '<div class="alert alert-success alert-dismissible fade show my-0" role="alert ">
  <strong>failed!</strong> the username is already exist in signup.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';  
}
elseif($_GET['signupsuccess']="failpass" && isset($_GET['signupsuccess']) )
{
  echo '<div class="alert alert-success alert-dismissible fade show my-0" role="alert ">
  <strong>failed!</strong> the password and confirm password doesn`t match in signup,again try to sign with both same.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>'; 
}
elseif(isset($_GET['signupsuccess']) && $_GET['signupsuccess']=="false")
{
  echo'<div class="alert alert-success alert-dismissible fade show my-0" role="alert ">
  <strong>failed!</strong> you cannot login until you sign up.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
}


?>
