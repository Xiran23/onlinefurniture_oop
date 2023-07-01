<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <div>

        <nav>
            <!-- for left side of page navbar  -->

            <!-- for middle side of page navbar  -->

            <div class="menu">
                <ul>
                    <li class="nav-items"><a href="Website.php">Home</a></li>

                    <li class="nav-items dropdown">
                        <a href="#">About us </a>
                        <ul>
                            <li><a href="#">OUR TEMS</a></li>
                            <li><a href="#">OUR TEMS</a></li>
                        </ul>
                    </li>

                    <!-- <li class="nav-items"><a href="login.php">Sign in</a></li> -->
                </ul>
            </div>
            <div class="logo">
                <a href="#"> <img src="images/logos.png" width="200px"> </a>
            </div>

            <div class="menu">
                <ul>

                    <li class="nav-items"><a href="login.php">login</a></li>
                </ul>

            </div>



        </nav>
    </div>


    <div>
        <div id="register-form">
            <form method="post">
                
            <div form-input>

                    <label for="">First name</label>
                    <input name="fname" type="text">
                </div>
                <div form-input>

                    <label for="">Last name</label>
                    <input name="lastname" type="text">
                </div>
                <div form-input>

                    <label for="">username</label>
                    <input name="username" type="text">
                </div>
                <div form-input>

                    <label for="">email</label>
                    <input name="uemail" type="email">
                </div>
                <div form-input>

                    <label for="">Register as </label>
                    <select name="role" id="">
                        <option value="1">admin</option>
                        <option value="2">seller</option>
                        <option value="3">customer</option>
                    </select>

                </div>
                <div form-input>

                    <label for="">password</label>
                    <input name="password" type="text">
                </div>
                <div form-input>

                    <label for="">re-password</label>
                    <input name="rpassword" type="text">
                </div>
                <div form-input>

                    <label for="">phonenumber</label>
                    <input name="pnumber" type="number">
                </div>
                <div form-input>




                <input type="submit" name="submit" value="Register">

            </form>

        </div>


    </div>

</body>

</html>

<?php include('config/db.php'); ?>

<?php 


if(isset($_POST["submit"])){

    $fname = $_POST['fname'];
    $lname =$_POST['lastname']; 
    $username = $_POST['username'];
    $email = $_POST['uemail']; 
    $role = $_POST['role']; 
    $password = $_POST['password']; 
    $repassword = $_POST['rpassword'];
    $phonenumber = $_POST['pnumber'];

    $query = "INSERT INTO users(firstname, lastname, username, email, role, password, repassword , phonenumber )
                          values('$fname','$lname','$username','$email','$role','$password','$repassword','$phonenumber')";
    $data = mysqli_query($conn,$query);
    if($data){
        // echo "<script> alert`product added succesfull`;</script>";
        echo "<script> alert('user registertion  sucessfull '); </script>";
        
        // header("Location:login.php");
    }
    else{
        echo "loginfailed";
    }



   
 
 
    
   

   
}    


?>