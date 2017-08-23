<?php
session_start();
if ((isset($_SESSION['uname'])==true) && ($_SESSION['uname']!=''))
header('Location: index.php');
else{
  ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Learn Guitar, Piano &amp; Bass guitar - Online video Lessons</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.min.css">

  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <style>
 
  </style>
  <link rel="stylesheet" href="css/style.css">
</head>
<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="60">


        <?php 
        include("nav.php");
        if ((isset($_SESSION['uname'])==false) || ($_SESSION['uname']=='')){
       echo '<a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a>';}
        else{
          echo '<li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Hi, '.$_SESSION['fname'].'
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="logout.php">Logout</a></li>
        </ul>
      </li> ';
        }?>
        </li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>
<div id="about" class="container-fluid">
  <div class="row">
    <div class="col-sm-8">
<form action="login_success.php" method="post" class="form-inline w3-content w3-display-container" >
<h2>Login</h2><br>
  <div class="form-group col-sm-12">
    <label for="email" class="col-sm-6">Email</label>
    <input type="email" class="form-control col-sm-6" name="uname">
  </div>
 <br><br>
  <div class="form-group col-sm-12" >
    <label for="pwd" class="col-sm-6">Password:</label>
    <input type="password" class="form-control col-sm-6" name="pwd">

  </div>
<br><br>
<div class="col-sm-10">
  <button type="submit" class="btn btn-default ">Submit</button></div>
</form>
<br><br><br>
</div>
<div class="col-sm-4">
<br><br><br>
<a href="admin/index.php"><button class="btn btn-default ">Admin Login</button></div></a>

  </div>
</div>


<?php include "contact.php"; ?>



<footer class="container-fluid text-center">
  <a href="#myPage" title="To Top">
    <span class="glyphicon glyphicon-chevron-up"></span>
  </a>
  <p> &copy; Copyright</p>
</footer>

</body>
</html>
<?php
}
?>