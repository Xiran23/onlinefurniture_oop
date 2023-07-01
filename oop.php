<?php 

class furniture{
    private $host;
    private $username;
    private $password;
    private $database;
    private $conn;

    public function __construct($host, $username, $password, $database) {
        $this->host = $host;
        $this->username = $username;
        $this->password = $password;
        $this->database = $database;
    }

    public function connect() {
        $this->conn = new mysqli($this->host, $this->username, $this->password, $this->database);
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }

    public function updateProduct($update_id, $pname,$pdescription,$price,$folder) {
        // $sql = "UPDATE products SET name = '$pname' WHERE id = $productId";
        $sql = "UPDATE product 
        set 
        pname = '$pname',
        pdescription = '$pdescription',
        price = '$price',
        image = '$folder'
        where product_id = $update_id";
        if ($this->conn->query($sql) === TRUE) {
            echo "Product updated successfully.";
            header("location:viewproduct.php");
        } else {
            echo "Error updating product: " . $this->conn->error;
        }
    }

    public function deleteProduct($productId) {
        $sql = "DELETE FROM product WHERE product_id = $productId";
        if ($this->conn->query($sql) === TRUE) {
            echo "Product deleted successfully.";
            header("location:viewproduct.php");
        } else {
            echo "Error deleting product: " . $this->conn->error;
        }
    }

    public function closeConnection() {
        $this->conn->close();
    }
}

?>


<?php


// Create a new Connection object
//calling a class too 
$connection = new furniture("localhost", "root", "1234", "furniture_db");

// Establish the database connection
$connection->connect();

// Check if the form is submitted for updating a product

if(($_POST['submit'])=="update"){
    echo "WIll this update";
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

    $connection->updateProduct($update_id, $pname, $pdescription,$price,$folder);

}
// if (isset($_POST['product_id'], $_POST['new_name'])) {
//     $productId = $_POST['product_id'];
//     $newName = $_POST['new_name'];

//     // Update the product
//     $connection->updateProduct($productId, $newName);
// }

// Check if the form is submitted for deleting a product
if (($_POST['submit']=="delete")) {
    $product_id = $_POST['delete_id'];
    // echo "another test";
    // $productId = $_POST['product_id'];

    // Delete the product
    $connection->deleteProduct($product_id);
}

// Close the database connection
$connection->closeConnection();
?>


