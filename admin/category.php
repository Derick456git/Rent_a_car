<?php 

 require('../config/autoload.php'); 
include("header.php");

$msg="";

$elements=array(
        "cname"=>"","cimage"=>"");

$form=new FormAssist($elements,$_POST);


$file=new FileUpload();

$dao=new DataAccess();

$labels=array('cname'=>"Category Name",'cimage'=>"Category image");

$rules=array(
    "cname"=>array("required"=>true,"minlength"=>2,"maxlength"=>30,"alphaspaceonly"=>true,"unique"=>array("field"=>"type_name","table"=>"category")),
	"cimage"=> array('filerequired'=>true),  

);
    
    
$validator = new FormValidator($rules,$labels);

if(isset($_POST["btn_insert"]))
{
if($validator->validate($_POST))
{
	
	if($fileName=$file->doUploadRandom($_FILES['cimage'],array('.jpg','.png','.jpeg','.jfif','.webp','.pdf'),100000,1,'../upload'))
		{
	
$data=array(

        'cname'=>$_POST['cname'],
	    'cimage'=>$fileName,
    );
  print_r($data);
    if($dao->insert($data,"category"))
    {
        echo "<script> alert('New record created successfully');</script> ";
	header('location:category.php');

    }
    else
        {$msg="Registration failed";} ?>

<span style="color:red;"><?php echo $msg; ?></span>

<?php
    
}
}
}



?>


<html>
<head>
</head>
<body>
	
	 
	
<form action="" method="POST"  enctype="multipart/form-data" >

	<div class="row">
                    <div class="col-md-6">
CATEGORY NAME:
<?= $form->textBox('cname',array('class'=>'form-control')); ?>
<?= $validator->error('cname'); ?>
		</div></div>					
	<div class="row">
                    <div class="col-md-6">
CATEGORY IMAGE:

<?= $form->fileField('cimage',array('class'=>'form-control')); ?>
<span style="color:red;"><?= $validator->error('cimage'); ?></span>

</div>
</div>
<br>
						
<button type="submit" name="btn_insert" >Submit</button>
</form>
</body>
</html>