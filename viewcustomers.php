<?php include('config/db.php'); ?>

<?php
$query = "SELECT *FROM users  ";
$result = mysqli_query($conn, $query);
// echo "hey";
$customer = mysqli_fetch_all($result, MYSQLI_ASSOC);


// var_dump($customer);


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
    <?php include('adminheader.php'); ?>
    <?php include('navbar.php'); ?>

    <div class="right-div">

        <div id="table">
            <h1>Customer Details</h1>

            <table border="1" width="70%" cellspacing="0" cellpadding="10px">
                <tr>
                    <th>customer_id</th>
                    <th>first Name</th>
                    <th>last name</th>
                    <th>userame</th>
                    <th>email</th>

                    <th>role</th>
                    <th>phonenumber</th>
                    <th colspan="2">Action</th>


                </tr>
                <?php foreach ($customer as $data) : ?>
                    <tr>
                        <td><?php echo $data['id']; ?></td>
                        <td><?php echo $data['firstname']; ?></td>
                        <td><?php echo $data['lastname']; ?></td>
                        <td><?php echo $data['username']; ?></td>
                        <td><?php echo $data['email']; ?></td>
                        <td><?php echo $data['role']; ?></td>
                        <td><?php echo $data['phonenumber']; ?></td>

                        <td>
                            <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?> ">
                                <input type="hidden" name="delete_id" value="<?php echo $data['id']; ?>">
                                
                                <input type="submit" name="delete" value="delete">
                             
                            </form>
                        </td>



                    </tr>
                <?php endforeach; ?>










            </table>

        </div>









        <div class="Section">

            <!-- The product list will be populated here through Ajax -->
        </div>

    </div>


</body>

</html>
<script src="ajax/ajax.js"></script>



<?php
if (isset($_POST["delete"]))
    $delete_id = $_POST["delete_id"];
    echo $delete_id;
// $query = "DELETE FROM posts WHERE id = {$delete_id}";



// if (mysqli_query($conn, $query)) {
//     echo "sucess";
// } else {
//     echo 'error' . mysqli_error($conn);
// }

?>