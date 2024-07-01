

<?php include("userheader1.php");	?>



<?php require('../config/autoload.php'); ?>

<?php
session_destroy();
$dao=new DataAccess();
header('location:viewcategory.php');


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
echo $info[$i]["sid"];
echo"   ";
echo $info[$i]["sname"];

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

	
