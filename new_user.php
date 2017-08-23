<?php
session_start();
?><!DOCTYPE html>
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
    <h2>Register Yourself</h2><br><br>
<form action="register.php" method="post" class="form-inline w3-content">
<?php
if (isset($_POST['plan1'])) {
    $plan="Monthly";
} else if (isset($_POST['plan2'])) {
    $plan="Quarterly";
} else if (isset($_POST['plan3'])) {
     $plan="Yearly";
 }
 ?>

  <div class="form-group col-sm-12">
    <label for="fname" class="col-sm-6">First Name</label>
    <input type="text" class="form-control col-sm-6" name="fname">
  </div>
  <br><br>
  <div class="form-group col-sm-12">
    <label for="lname" class="col-sm-6">Last Name</label>
    <input type="text" class="form-control col-sm-6" name="lname">
  </div>
  <br><br>
  <div class="form-group col-sm-12">
    <label for="number" class="col-sm-6">Contact Number</label>
    <input type="number" class="form-control col-sm-6" name="number">
  </div>
  <br><br>
  <div class="form-group col-sm-12">
    <label for="email" class="col-sm-6">Email</label>
    <input type="email" class="form-control col-sm-6" name="email">
  </div>
 <br><br>
<div class="form-group col-sm-12">
    <label for="pwd" class="col-sm-6">Password</label>
    <input type="password" class="form-control col-sm-6" name="pwd">
  </div>
 <br><br>
  <div class="form-group col-sm-12" >
    <label for="plan" class="col-sm-6">Plan:</label>
    <input type="text" readonly name="plans" value="<?php echo $plan?>">

  </div>
<br><br><div class="col-sm-10">
  <button type="submit" class="btn btn-default" style="right:5vmax">Submit</button></div>
</form><br><br><br>
  </div>
</div>

<?php include 'contact.php';?>

<footer class="container-fluid text-center">
  <a href="#myPage" title="To Top">
    <span class="glyphicon glyphicon-chevron-up"></span>
  </a>
  <p> &copy; Copyright</p>
</footer>

<script>
$(document).ready(function(){
  // Add smooth scrolling to all links in navbar + footer link
  $(".navbar a, footer a[href='#myPage']").on('click', function(event) {
    // Make sure this.hash has a value before overriding default behavior
    if (this.hash !== "") {
      // Prevent default anchor click behavior
      event.preventDefault();

      // Store hash
      var hash = this.hash;

      // Using jQuery's animate() method to add smooth page scroll
      // The optional number (900) specifies the number of milliseconds it takes to scroll to the specified area
      $('html, body').animate({
        scrollTop: $(hash).offset().top
      }, 900, function(){
   
        // Add hash (#) to URL when done scrolling (default click behavior)
        window.location.hash = hash;
      });
    } // End if
  });
  
  $(window).scroll(function() {
    $(".slideanim").each(function(){
      var pos = $(this).offset().top;

      var winTop = $(window).scrollTop();
        if (pos < winTop + 600) {
          $(this).addClass("slide");
        }
    });
  });
})
</script>

</body>
</html>