


    <div class="right-div">
        <?php include('../config/db.php');
        $query = "SELECT *FROM product";
        $result = mysqli_query($conn,$query); 
        $products = mysqli_fetch_all($result,MYSQLI_ASSOC);
        mysqli_free_result($result);
        // mysqli_close($conn);
         

        // print_r($products);
        
        
        ?>
       <div class="viewtable">
        <table border="2">
            <tr >
                <th>producd_id</th>
                <th>Name</th>
                <th>description</th>
                <th>price</th>
                <th>img</th>
                <th colspan="2">Action</th>

            </tr>
            <?php  foreach($products as $prod):?>
            <tr>
                <td><?php echo $prod['product_id']; ?></td>
                <td><?php echo $prod['pname']; ?></td>
                <td><?php echo $prod['pdescription']; ?></td>
                <td><?php echo $prod['price']; ?></td>
                <td> <img src="<?php echo $prod['image']; ?>" style="width:200px; height:100px"> </td>
                <form action="" method="post">
                    <input type="hidden" name="delete_id" value="<?php echo $prod['product_id'];?>">

                    <td> <input type="submit" value="delete" name="delete"></td>
                    <!-- <td> <button>update</button></td> -->
                </form>
            </tr>
            <?php endforeach; ?>
            
        </table>
        



    </div>




 <?php 
    if(isset($_POST['delete'])){
       
    $delete_id = $_POST['delete_id'];
    // echo $delete_id;
   $query = "DELETE FROM product WHERE product_id = {$delete_id}";
   $result = mysqli_query($conn,$query); 
   

   

   
}
?>

