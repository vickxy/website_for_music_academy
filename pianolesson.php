<?php
session_start();
if ((!isset($_SESSION['uname'])==true) || ($_SESSION['uname']==''))
header('Location: login.php');
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

<div class="container-fluid bg-grey">
<?php
$mysql_hostname = "localhost";
$mysql_username = "root";
$mysql_password = "NDA";
$mysql_database = "db_project";
  

$db = mysqli_connect($mysql_hostname,$mysql_username, $mysql_password,$mysql_database)
or die("Something is broken");

$query = mysqli_query($db,"SELECT * FROM `video_tbl` WHERE `instrument`='Piano' and `plan`='paid' ") or die('Not working');
              while($query_row = mysqli_fetch_assoc($query))
              {
  echo '<div class="row">
    <div class="col-sm-6">
      <video width="100%" style="height:40vmin;" controls>
    <source src="uploads/'.$query_row['filename'].'" type="video/mp4">
    Your browser does not support HTML5 video.
  </video>
    </div>
    <div class="col-sm-6">
      <h2>'.$query_row['name'].'</h2><br>
      <h4><strong>Artist: </strong>'.$query_row['artist'].'<br>'.$query_row['comments'].'</h4><br>
    </div>
  </div>
</div>';
}
?>

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
<?php
}
?>