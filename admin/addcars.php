<?php 

 require('../config/autoload.php'); 
include("header.php");

$file=new FileUpload();
$elements=array(
        "carname"=>"","carimage"=>"","cseat"=>"","fuel"=>"","ctype"=>"","cid"=>"","price"=>"");


$form=new FormAssist($elements,$_POST);



$dao=new DataAccess();

$labels=array('carname'=>"carname",'carimage'=>"carimage",'cseat'=>"cseat",'fuel'=>"fuel",'ctype'=>"ctype",'cid'=>"cid",'price'=>"price",);

$rules=array(
    "carname"=>array("required"=>true,"minlength"=>3,"maxlength"=>30),
    'carimage'=>array('filerequired'=>true),
    "cseat"=>array("required"=>true,"integeronly"=>true),
    "fuel"=>array("required"=>true,"minlength"=>2,"maxlength"=>10,"alphaonly"=>true),
    "ctype"=>array("required"=>true,"minlength"=>2,"maxlength"=>20,"alphaonly"=>true),
    "cid"=>array("required"=>true),
    "price"=>array("required"=>true,"minlength"=>2,"maxlength"=>10),
   
    
);
    
    
$validator = new FormValidator($rules,$labels);

if(isset($_POST["insert"]))
{

if($validator->validate($_POST))
{
	
    if($fileName=$file->doUploadRandom($_FILES['carimage'],array('.jpg','.png','.jpeg','.jfif','.webp','.pdf'),100000,1,'../upload'))
    {

$data=array(

       
        'carname'=>$_POST['carname'],
        'carimage'=>$fileName,
        'cseat'=>$_POST['cseat'],
        'fuel'=>$_POST['fuel'],
        'ctype'=>$_POST['ctype'],
        'cid'=>$_POST['cid'],
        'price'=>$_POST['price'],
         
    );

    print_r($data);
  
    if($dao->insert($data,"car"))
    {
        echo "<script> alert('New record created successfully');</script> ";

    }
    else
        {$msg="Registration failed";} ?>

<span style="color:red;"><?php echo $msg; ?></span>

<?php
    }
    
}
else
echo $file->errors();
}




?>
<html>
<head>
</head>
<body>

 <form action="" method="POST" enctype="multipart/form-data">

<div class="row">
                    <div class="col-md-6">
CAR NAME:

<?= $form->textBox('carname',array('class'=>'form-control')); ?>
<?= $validator->error('carname'); ?>

</div>
</div>
<div class="row">
                    <div class="col-md-6">
CAR IMAGE:

<?= $form->fileField('carimage',array('class'=>'form-control')); ?>
<span style="color:red;"><?= $validator->error('carimage'); ?></span>

</div>
</div>
<div class="row">
                    <div class="col-md-6">

NO OF SEATS:

<?= $form->textBox('cseat',array('class'=>'form-control')); ?>
<?= $validator->error('cseat'); ?>

</div>
</div>

<div class="row">
                    <div class="col-md-6">



FUEL TYPE:

<?= $form->textBox('fuel',array('class'=>'form-control')); ?>
<?= $validator->error('fuel'); ?>

</div>
</div>
<div class="row">
                    <div class="col-md-6">



TYPE:

<?= $form->textBox('ctype',array('class'=>'form-control')); ?>
<?= $validator->error('ctype'); ?>

</div>
</div>
<div class="row">
                    <div class="col-md-6">
CATEGORY:

<?php
     $options = $dao->createOptions('cname','cid',"category");
     echo $form->dropDownList('cid',array('class'=>'form-control'),$options); ?>
<?= $validator->error('cid'); ?>
</div>
</div>

<div class="row">
                    <div class="col-md-6">

PRICE PER HOUR:

<?= $form->textBox('price',array('class'=>'form-control')); ?>
<?= $validator->error('price'); ?>

</div>
</div>
<div class="row">
                    <div class="col-md-6">



</div>
</div>

<button type="submit" name="insert">Submit</button>
</form>


</body>

</html>


