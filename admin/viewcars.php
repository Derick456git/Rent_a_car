
<?php require('../config/autoload.php'); ?>

<?php
$dao=new DataAccess();



?>
<?php include('header.php'); ?>

    
    <div class="container_gray_bg" id="home_feat_1">
    <div class="container">
    	<div class="row">
            <div class="col-md-12">
                <table  border="1" class="table" style="margin-top:100px;">
                    <tr>
                        
                        <th>Car ID</th>
                        <th>Car Name</th>
                        <th>Car Image</th>
                        <th>No Of Seats</th>
                        <th>Fuel Type</th>
                        <th>Type</th>
                        <th>Category</th>
                        <th>Price per Hour</th>
                        <th>Edit/Delete</th>
                      
                    </tr>
<?php
    
    $actions=array(
    'edit'=>array('label'=>'Edit','link'=>'editstudents.php','params'=>array('id'=>'carid'),'attributes'=>array('class'=>'btn btn-success')),
    
    'delete'=>array('label'=>'Delete','link'=>'editstudents.php','params'=>array('id'=>'carid'),'attributes'=>array('class'=>'btn btn-success'))
    
    );

    $config=array(
        'srno'=>true,
        'hiddenfields'=>array('carid'),
        'actions_td'=>false,
         'images'=>array(
                        'field'=>'carimage',
                        'path'=>'../upload/',
                        'attributes'=>array('style'=>'width:100px;'))
        
        
    );

   
   $join=array('category as dt'=>array('dt.cid = s.cid','join'),

    );  $fields=array('carid','carname','carimage','cseat','fuel','ctype','dt.cname','price');

    $users=$dao->selectAsTable($fields,'car as s','s.status=1',$join,$actions,$config);
    
    echo $users;
                    
                    
                   
    
?>
             
                </table>
            </div>    

            
            
            
            
        </div><!-- End row -->
    </div><!-- End container -->
    </div><!-- End container_gray_bg -->
    
    
