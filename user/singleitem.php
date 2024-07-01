<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport">
    <meta http-equiv="X-UA-Compatible">
    <title>Document</title>
    <link rel="stylesheet" href="ui.css">
    
    <script>
function showtotal() {
//alert(str);
	  var price=document.getElementById("price").value;  
	   var qty=document.getElementById("qty").value; 
	   var total=price*qty; 
	   //alert(total);
	   document.getElementById("total").value = total;
}
</script>
    
</head>

<body>

<?php include("userheader1.php");	
include("dbcon.php");

?>

<?php require('../config/autoload.php'); 


$name="";
$dao=new DataAccess();
?>



<?php
if(isset($_POST["btn_insert"]))
{
if(!isset($_SESSION['email']))
   {
	   header('location:login.php');
  }
  else
  {
$email=$_SESSION['email'];
$q11="select * from registration where email='".$email."'";
$info11=$dao->query($q11);
$name= $info11[0]["name"];
echo $name;

$carid = $_GET['id'];
$q10="select * from car where carid=".$carid ;
$info121=$dao->query($q10);
$carname = $info121[0]["carname"];
$price = $info121[0]["price"];
$cseat = $info121[0]["cseat"];
$ctype = $info121[0]["ctype"];
$fuel = $info121[0]["fuel"];
$cdate=date('Y-m-d',time());
$status=1;
$_SESSION['amount']=$price;
$sql = "INSERT INTO booking(carname,price,cseat,ctype,cdate,status) VALUES
                          ('$carname','$price','$cseat','$ctype','$cdate','$status')";

$conn->query($sql);
echo $sql;
header('location:payment.php');
}


}
?>


<?php
$dao=new DataAccess();
?>

<?php	$carid=$_GET['id']; 
$q="select * from car where carid=".$carid;
$info=$dao->query($q);
?>
 
   

<form action="" method="POST" enctype="multipart/form-data">

 <div class="upper">
        <div class="upper-left">
<?php 
if(isset($_SESSION['email']))
{ 
   $name=$_SESSION['email'];
?>

 <h7 class="title-w3-agileits title-black-wthree"><?php  echo $name ?></h7>

<?php } ?>
            <h3>CAR DETAILS</h3>
            <img style="width:300; height:300" src=<?php echo BASE_URL."upload/".$info[0]["carimage"]; ?> alt="#" class="img-responsive" />
        </div>
        <div class="content">
            <h3>Details</h3>
            <div style="display: block;">
                <label for="name">Car Name:</label><br>
                <label for="name"><?php echo $info[0]["carname"]; ?></label><br>
                 <label for="price">Price per day:</label><br>
                <input id="rate" name="rate" type="text" value="<?php echo $info[0]["price"];  ?>" readonly style="margin-top: 8px;"><br>
                <label for="name">No of Seats:</label><br>
                <label for="name"><?php echo $info[0]["cseat"]; ?></label><br>
                <label for="name">Car Type:</label><br>
                <label for="name"><?php echo $info[0]["ctype"]; ?></label><br>
                <label for="">booking date</label><br>
                <input id="cdate" name="cdate" type="date"style="margin-top: 8px;"><br>
            </div>
        </div>
    </div>
    <div class="lower">
        <div class="btn-grp">
                <button class="buttons" name="btn_insert" id="btn-1">BOOK NOW</button>
                  
        </div>
    </div>
    </form>
</body>

</html>