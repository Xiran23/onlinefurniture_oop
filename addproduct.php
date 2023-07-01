<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="dashboardcss.css">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>
   

</head>

<body>
    <?php include('adminheader.php');?>
    <?php include('navbar.php'); ?>
   
  
    <div class="right-div">


    
        



  <div class="Section">
    
  <div id="forms">

        <form method="POST" enctype="multipart/form-data">
            
            <h1>ADD A NEW PRODUCT</h1>
            <hr>
            
            <div class="form_group">
                <label for="">Product-Name</label>
                <input type="text" id="" class="" name="pname">
            </div>
            <div>
                <label for=""  class="form_group">Description</label>
                <input type="text" id="" class="" name="pdescription">
            </div>
            <div>
                <label for=""  class="form_group">Price</label>
                <input type="text" id="" class="" name="price">
            </div>
            <div>
                <label for="" class="form_group">  Product-img</label>
                <input type="file"  id="" class="" name="uploadedimg">
            </div>
            <br>
            
            <input type="submit" class="submit" name="submit" value="submit">
            <br>

       
            
           <span>

 
   </span>
        </form>
    </div>
  

</div>

    </div>


</body>

</html>
<script src="ajax/ajax.js"></script>

<?php 
include('config/db.php');

//for images
// print_r)



if(isset($_POST['submit'])){
    // echo "hey";
    $_filename = $_FILES['uploadedimg']['name'];
    $tempname  = $_FILES['uploadedimg']['tmp_name'];
    $pname = $_POST['pname'];
    $pdescription = $_POST['pdescription'];
    $price       = $_POST['price'];
    $folder     = 'product/'.$_filename; 
    move_uploaded_file($tempname,$folder);
    
    
    $query = "INSERT INTO product(pname,pdescription,price,image) VALUES ('$pname','$pdescription','$price','$folder')";
  
    $data = mysqli_query($conn,$query);
    if($data){
        echo "<script> alert('Product added  sucessfull '); </script>";
       
    }


}
// alert();
?>