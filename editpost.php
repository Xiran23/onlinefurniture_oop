
<?php 
include('config/db.php');

if(isset($_POST['submit'])){
    $update_id = $_POST['update_id'];
    // echo $update_id;
    // echo "hey";
    $_filename = $_FILES['uploadedimg']['name'];
    $tempname  = $_FILES['uploadedimg']['tmp_name'];
    $pname = $_POST['pname'];
    $pdescription = $_POST['pdescription'];
    $price       = $_POST['price'];
    $folder     = 'product/'.$_filename; 
    move_uploaded_file($tempname,$folder);

    
    $query = "UPDATE product 
    set 
    pname = '$pname',
    pdescription = '$pdescription',
    price = '$price',
    image = '$folder'
    where product_id = $update_id ";

    $data = mysqli_query($conn,$query);
    if($data){
        echo "<script> alert(productupdated);</script>";
   
    }




}
   
    

$id = ($_GET['product_id']);

//create a query 
$query = 'SELECT *FROM product WHERE product_id= '.$id ; 

//get result
$result = mysqli_query($conn,$query); 
// var_dump($result);

//fetch data 
$prod= mysqli_fetch_assoc($result);
// var_dump($posts);

//free result

mysqli_free_result($result);

//clode the connection 
// mysqli_close($conn);

?>


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
  <form method="POST" action="oop.php" enctype="multipart/form-data">

<h1>ADD A NEW PRODUCTs</h1>

<div>
    <label for="">Product-Name</label>
    <input type="text" id="" class="" name="pname" value="<?php echo $prod['pname']; ;?>">
</div>
<div>
    <label for="">Description</label>
    <input type="text" id="" class="" name="pdescription" value="<?php echo $prod['pdescription']; ?>">
</div>
<div>
    <label for="">Price</label>
    <input type="text" id="" class="" name="price" value="<?php echo $prod['price']; ?>">
</div>
<div>
    <label for="">Product-img</label>
    <input type="file"  id="" class="" name="uploadedimg">
    <img src="<?php echo $prod['image']; ?>" style="width:200px; height:100px">
</div>
<input type="hidden" name="update_id" value="<?php echo $prod['product_id'];?>">

<input type="submit" class="submit" name="submit" value="update">

</form>
  

</div>

    </div>


</body>

</html>
<script src="ajax/ajax.js"></script>

