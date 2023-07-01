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
  
  <!-- The product list will be populated here through Ajax -->

  <div class="right-div">
        <?php include('config/db.php');
        $query = "SELECT *FROM product";
        $result = mysqli_query($conn,$query); 
        $products = mysqli_fetch_all($result,MYSQLI_ASSOC);
        mysqli_free_result($result);
        // mysqli_close($conn);
         

        // print_r($products);
        
        
        ?>
       <div class="viewtable">
        <table border="1" width="70%" cellspacing="0" cellpadding="10px">
            <tr >
                <th>producd_id</th>
                <th>Name</th>
                <th>description</th>
                <th>price</th>
                <th>img</th>
                <th colspan="3">Action</th>

            </tr>
            <?php  foreach($products as $prod):?>
            <tr>
                <td><?php echo $prod['product_id']; ?></td>
                <td><?php echo $prod['pname']; ?></td>
                <td><?php echo $prod['pdescription']; ?></td>
                <td><?php echo $prod['price']; ?></td>
                <td> <img src="<?php echo $prod['image']; ?>" style="width:200px; height:100px"> </td>
                <td> <?php echo $prod['image']; ?></td>


                <form action="oop.php" method="post">
                    <input type="hidden" name="delete_id" value="<?php echo $prod['product_id'];?>">

                    <td> <input type="submit" value="delete" name="submit"></td>
                    <!-- <td> <button>update</button></td> -->
                </form>


                <td> 
                    
                    <a href="editpost.php?product_id=<?php echo $prod['product_id'];?>">update</a>
               </td>
            </tr>
            <?php endforeach; ?>
            
        </table>
        
        



    </div>
</div>

    </div>


</body>

</html>
<script src="ajax/ajax.js"></script>
<?php 
if(isset($_POST['delete_id'])){
    $delete_id = $_POST['delete_id'];
    // echo $delete_id;
    $query = "DELETE FROM product where product_id = {$delete_id}";

    if(mysqli_query($conn,$query)){
        // echo "<script> alert('Product deleted sucessfull '); </script>";
    
    }
    else { 
        echo 'error'.mysqli_error($conn);
    }
}
    

?>

