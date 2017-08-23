<?php
session_start();
require_once("dbcontroller.php");
$category=$_SESSION['category'];
$db_handle = new DBController();
if(!empty($_GET["sort"])) {
switch($_GET["sort"]) {
  case "Lowest":
    $product_array = $db_handle->runQuery("SELECT * FROM `products_tbl` order by `price`");
  break;
  case "Highest":
    $product_array = $db_handle->runQuery("SELECT * FROM `products_tbl` order by `price` desc");
  break;
  case "Alpha":
    $product_array = $db_handle->runQuery("SELECT * FROM `products_tbl` order by `name`");
  break;
  case "Revalpha":
    $product_array = $db_handle->runQuery("SELECT * FROM `products_tbl` order by `name` desc");
  break;
}
}
if(!empty($_GET["action"])) {
switch($_GET["action"]) {
  case "add":
    if(!empty($_POST["quantity"])) {
      $productByCode = $db_handle->runQuery("SELECT * FROM products_tbl WHERE code='" . $_GET["code"] . "'");
      $itemArray = array($productByCode[0]["code"]=>array('name'=>$productByCode[0]["name"], 'code'=>$productByCode[0]["code"], 'quantity'=>$_POST["quantity"], 'price'=>$productByCode[0]["price"]));
      
      if(!empty($_SESSION["cart_item"])) {
        if(in_array($productByCode[0]["code"],array_keys($_SESSION["cart_item"]))) {
          foreach($_SESSION["cart_item"] as $k => $v) {
              if($productByCode[0]["code"] == $k) {
                if(empty($_SESSION["cart_item"][$k]["quantity"])) {
                  $_SESSION["cart_item"][$k]["quantity"] = 0;
                }
                $_SESSION["cart_item"][$k]["quantity"] += $_POST["quantity"];
              }
          }
        } else {
          $_SESSION["cart_item"] = array_merge($_SESSION["cart_item"],$itemArray);
        }
      } else {
        $_SESSION["cart_item"] = $itemArray;
      }
    }
  break;
}
}
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


<div id="product-grid">
  <div class="txt-heading"><center><h1>Products</h1></center></div>
  <br><br><div class="row">
    <div class="col-sm-2">
    Sort By: 
    </div>
    <div class="col-sm-2">
    <form method="post" action="product.php?sort=Lowest">
    <input type="submit" value="Lowest"/> 
  </form>
  </div>
  <div class="col-sm-2">
  <form method="post" action="product.php?sort=Highest">
    <input type="submit" value="Highest"/>
  </form>
  </div>
  <div class="col-sm-2">
  <form method="post" action="product.php?sort=Alpha">
    <input type="submit" value="A - Z"/>
  </form>
  </div>
  <div class="col-sm-2">
  <form method="post" action="product.php?sort=Revalpha">
    <input type="submit" value="Z - A"/>
  </form>
  </div>
  </div>
</div>
<br><br>
<table cellpadding="20" width="100%" class="table-bordered table-responsive table-striped">
<tbody>
  <?php
  if (!empty($product_array)) { 
    foreach($product_array as $key=>$value){

    
  ?>
    
      <tr>
      <form method="post" action="product.php?sort=Lowest&action=add&code=<?php echo $product_array[$key]["code"]; ?>">
        <td colspan="3"><center><img src="products/<?php echo $product_array[$key]["image"]; ?>" style="height:200px;"></center></td>
        <td><strong><center><?php echo $product_array[$key]["name"]; ?></center></strong></td>
      <td class="product-price" colspan="2"><center><?php echo "&#8377;".$product_array[$key]["price"]; ?></center></td>
        <td><input type="text" name="quantity" value="1" size="2" hidden/><center> <input type="submit" value="Add to cart" class="btnAddAction" /></center></td>
      </tr>
      </form>
  <?php
    }
  }
  ?>
  </tbody>
  </table>
</div>

</body>
</html>