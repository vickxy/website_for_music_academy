<?php
session_start();
require_once("dbcontroller.php");
$db_handle = new DBController();
if(!empty($_GET["action"])) {
switch($_GET["action"]) {
  case "remove":
    if(!empty($_SESSION["cart_item"])) {
      foreach($_SESSION["cart_item"] as $k => $v) {
          if($_GET["code"] == $k)
            unset($_SESSION["cart_item"][$k]);        
          if(empty($_SESSION["cart_item"]))
            unset($_SESSION["cart_item"]);
      }
    }
  break;
  case "empty":
    unset($_SESSION["cart_item"]);
  break;  
}
}
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


<div id="shopping-cart">
<div class="txt-heading "><span class="col-sm-6"><h3>Shopping Cart</h3></span><span class="col-sm-6" style="text-align: right;"> <a id="btnEmpty" href="cart.php?action=empty">Empty Cart</a></span></div>
<?php
if(isset($_SESSION["cart_item"])){
    $item_total = 0;

?>  
<table cellpadding="10" cellspacing="1" width="100%" class="table-bordered table-responsive">
<tbody>
<tr>
<th style="text-align:left;"><strong>Name</strong></th>
<th style="text-align:left;"><strong>Code</strong></th>
<th style="text-align:right;"><strong>Quantity</strong></th>
<th style="text-align:right;"><strong>Price</strong></th>
<th style="text-align:center;"><strong>Action</strong></th>
</tr> 
<?php   
    foreach ($_SESSION["cart_item"] as $item){
    ?>
        <tr>
        <td style="text-align:left;border-bottom:#F0F0F0 1px solid;"><strong><?php echo $item["name"]; ?></strong></td>
        <td style="text-align:left;border-bottom:#F0F0F0 1px solid;"><?php echo $item["code"]; ?></td>
        <td style="text-align:right;border-bottom:#F0F0F0 1px solid;"><?php echo $item["quantity"]; ?></td>
        <td style="text-align:right;border-bottom:#F0F0F0 1px solid;"><?php echo "$".$item["price"]; ?></td>
        <td style="text-align:center;border-bottom:#F0F0F0 1px solid;"><a href="cart.php?action=remove&code=<?php echo $item["code"]; ?>" class="btnRemoveAction">Remove Item</a></td>
        </tr>
        <?php
        $item_total += ($item["price"]*$item["quantity"]);
    }
    ?>

<tr>
<td colspan="5" align=right><strong>Total:</strong> <?php echo "$".$item_total; ?></td>
</tr>
</tbody>
</table>    
  <?php
}
else
    echo "<br><br>Your cart is empty.";
?>
</div>
</div>

</body>
</html>
<?php
}
?>