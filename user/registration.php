



<!DOCTYPE html>


<html lang="en">



<head>
<?php //include("header.php");	?>

    <!-- Required meta tags-->
   
  

    <!-- Main CSS-->
    <link href="reg/css/main.css" rel="stylesheet" media="all">



</head>

<body>

<style type="text/css">
            .valErr{
                color:red!important;
            }
        </style>
<?php

require('../config/autoload.php'); 
$dao=new DataAccess();
$elements=array(
        "username"=>"","email"=>"","password"=>"","cpassword"=>"","phone"=>"");


$form=new FormAssist($elements,$_POST);
//$file=new FileUpload();
$labels=array("username"=>"Name","email"=>"Email","password"=>"Password","cpassword"=>"Confirm Password","phone"=>"Phone Number");

$rules=array(
    "username"=>array("required"=>true,"minlength"=>3,"maxlength"=>30,"alphaspaceonly"=>true),
    "email"=>array("required"=>true,"email"=>true,"unique"=>array("field"=>"email","table"=>"registration")),
    "password"=>array("required"=>true),
    "cpassword"=>array("required"=>true,"compare"=>array("comparewith"=>"password","operator"=>"=")),
    "phone"=>array("required"=>true,"integeronly"=>true,"minlength"=>10,"maxlength"=>10),
    
);
    
    
$validator = new FormValidator($rules,$labels);

if(isset($_POST['register']))
{
    if($validator->validate($_POST))
    {
        // code for insertion 
		
        $data=array(
				'username'=>$_POST['username'],
				'email'=>$_POST['email'],
				'password'=>$_POST['password'],
                'phone'=>$_POST['phone'],
			
			);
            
			if($dao->insert($data,'registration'))
			{
				$msg="Inserted Successfully";
			}
			else
				$msg="insertion failed";
		}
		
		
		
		
    }

if(isset($_POST['home']))
{
echo "<script> alert('Do you really wnat to leave this page');</script> ";
   echo"<script> location.replace('displaycategory.php'); </script>";

}

?>




    <div class="page-wrapper bg-blue p-t-180 p-b-100 font-poppins">
        <div class="wrapper wrapper--w780">
            <div class="card card-3">
                <div class="card-heading"></div>
                <div class="card-body">
                    <h2 class="title">Registration Info</h2>
                    <form method="POST">
                    
				
					<p><?php if(isset($msg)) echo $msg; ?></p>
                        <div class="input-group">
                             <?= $form->textBox('username',array("placeholder"=>"Enter Name")); ?>
                           <span class="valErr"><?= $validator->error('username'); ?></span>
                               
                               
                               
                        </div>
                         <div class="input-group">
                             <?= $form->textBox('email',array("placeholder"=>"Enter Email")); ?>
                           <span class="valErr"><?= $validator->error('email'); ?></span>
                               
                               
                               
                               
                        </div>
                         <div class="input-group">
                             <?= $form->passwordbox('password',array("placeholder"=>"Password")); ?>
                           <span class="valErr"><?= $validator->error('password'); ?></span>
                               
                               
                        </div>
                        
                          <div class="input-group">
                             <?= $form->passwordbox('cpassword',array("placeholder"=>"Confirm Password")); ?>
                           <span class="valErr"><?= $validator->error('cpassword'); ?></span>
                               
                        

                        </div>
                         <div class="input-group">
                             <?= $form->textBox('phone',array("placeholder"=>"Enter Phone Number")); ?>
                           <span class="valErr"><?= $validator->error('phone'); ?></span>
                        
                        
                        
                        
                        
                        
                      
                         
                        <div class="p-t-10">
                            <button class="btn btn--pill btn--green" name="register" type="submit">Register</button>
                              
                                
                              <button class="btn btn--pill btn--green" name="home" type="submit">Home</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Jquery JS-->
    <script src="reg/vendor/jquery/jquery.min.js"></script>
    <!-- Vendor JS-->
    <script src="reg/vendor/select2/select2.min.js"></script>
    <script src="reg/vendor/datepicker/moment.min.js"></script>
    <script src="reg/vendor/datepicker/daterangepicker.js"></script>

    <!-- Main JS-->
    <script src="reg/js/global.js"></script>
	
			<?php// include("footer.php");	?>

	

</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
<!-- end document-->