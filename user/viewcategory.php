

<?php include("userheaderbeforelogin.php");	?>



<?php require('../config/autoload.php'); ?>

<?php
$dao=new DataAccess();



?>
<?php /*?><?php


    $q="select * from category";

$info=$dao->query($q);

print_r($info);

 echo "<br/>";

$arrlength = count($info);
echo $arrlength;
 echo "<br/>";


$i=0;

while($i<count($info))
{
echo $info[$i]["cid"];
echo"   ";
echo $info[$i]["cname"];

echo "<br/>";
$i++;
}

foreach($info as $key=>$value)
{
    foreach($value as $key1=>$in)
    {
        echo $key1." --> ".$in;
    }
    echo "<br/>";
}

<a href="<?= BASE_URL ?>student/course.php?id=<?= $val['c_id'] ?>" class="button_outline">Details</a>

?>

<?php */?>

	
	<div class="plans-section" id="rooms">
				 <div class="container">
<?php    
if(isset($_SESSION['email']))
{ 
	//include("userheader1.php");
   $name=$_SESSION['email'];

?>

 <h7 class="title-w3-agileits title-black-wthree"><?php  echo $name ?></h7>

<?php } ?>
				 <h3 class="title-w3-agileits title-black-wthree">CATEGORY</h3>
						<div class="priceing-table-main">
            <?php
			
			 $q="select * from category";

$info=$dao->query($q);
//print_r($info);

			$i=0;          
			 while($i<count($info))
			
{ $s=$info[$i]["cimage"];
	
		?>		 <div class="col-md-3 price-grid">
					<div class="price-block agile">
						<div class="price-gd-top">
						<img style="width:300; height:300" src=<?php echo BASE_URL."upload/".$info[$i]["cimage"]; ?> alt=" " class="img-responsive" />
							<?php /*?> <h4>Deluxe Room</h4><?php */?>
                              <h4><?php echo $info[$i]["cname"]?></h4> 
							
                             
						</div>
						<div class="price-gd-bottom">
							   <div class="price-list">
									<ul>
											<li><i class="fa fa-star" aria-hidden="true"></i></li>
											<li><i class="fa fa-star" aria-hidden="true"></i></li>
											<li><i class="fa fa-star" aria-hidden="true"></i></li>
											<li><i class="fa fa-star" aria-hidden="true"></i></li>
											<li><i class="fa fa-star-o" aria-hidden="true"></i></li>

								     </ul>
							</div>
							<div class="price-selet">
                            
			<a href="viewitem.php?id=<?= $info[$i]["cid"]?>" >VIEW</a>
							</div>
						</div>
					</div>
				</div>
				<?php 
				$i++;
				} ?>
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
	

	
		<?php include("userfooter.php");	?>
	