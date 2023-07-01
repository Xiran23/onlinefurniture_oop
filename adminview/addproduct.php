
        <form  onsubmit="Viewproduct();" method="POST" enctype="multipart/form-data">

            <h1>ADD A NEW PRODUCT</h1>

            <div>
                <label for="">Product-Name</label>
                <input type="text" id="" class="" name="pname">
            </div>
            <div>
                <label for="">Description</label>
                <input type="text" id="" class="" name="pdescription">
            </div>
            <div>
                <label for="">Price</label>
                <input type="text" id="" class="" name="price">
            </div>
            <div>
                <label for="">Product-img</label>
                <input type="file"  id="" class="" name="uploadedimg">
            </div>

            <input type="submit" class="submit" name="submit" value="submit">

        </form>

        <?php 
include('../config/db.php');

//for images
// print_r)



if(isset($_POST['submit'])){
    $_filename = $_FILES['uploadedimg']['name'];
    $tempname  = $_FILES['uploadedimg']['tmp_name'];
    $pname = $_POST['pname'];
    $pdescription = $_POST['pdescription'];
    $price       = $_POST['price'];
    $folder     = '../product/'.$_filename; 
    move_uploaded_file($tempname,$folder);
    
    
    $query = "INSERT INTO product(pname,pdescription,price,image) VALUES ('$pname','$pdescription','$price','$folder')";
  
    $data = mysqli_query($conn,$query);
    if($data){
        // echo "<script> alert`product added succesfull`;</script>";
        echo "<script> Viewproduct();</script>";
    }
   
    
}
?>