<?php
include('config/db.php');
  $invalidpassword = '' ;
  $invaliduser     = ''  ;


if (isset($_POST['submit'])) 
{
  $username = $_POST['username'];
  $password = $_POST['password'];


  $query = "SELECT * FROM users WHERE username = '$username'";  

  $result = mysqli_query($conn, $query);
  $user = mysqli_fetch_array($result, MYSQLI_ASSOC);
 
 
  
  
  
  if ($user) {
    if ($password == $user['password']) {
      //getting user role 
      $role = $user['role'];
      if ($role == 1) {
      
        
           header("Location:dashboard.php");
        
      } else if ($role == 2) {
        echo "staff";
      } else {
        echo "Manager";
      }
    }
    // echo 'password doesnot match';
    $invalidpassword = 'invalid password' ;
 
    // echo $wrong_passowrd;
  } else {
    // echo "user doesnot match";
    $invaliduser     = 'invalid user'  ;

  }
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="style.css" />
  <title>Login | PAGE</title>
</head>

<body>


  <div class="align">
  <nav>
            <!-- for left side of page navbar  -->

            <!-- for middle side of page navbar  -->

            <div class="menu">
                <ul>
                    <li class="nav-items"><a href="#">Home</a></li>

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

                    <li class="nav-items"><a href="register.php">sign up</a></li>
                </ul>

            </div>



        </nav>
  

    <section class="first">
      <div class="main">
        <div class="main-left">
          <img src="images/ofc.png" alt="" />
        </div>

        <div class="main-right">

<div id="forms">

  <form method="POST" >
    <h2>LOGIN</h2>
    <div class="form-group">
      <label for="username">User_Id:</label>
      <input type="text" id="username" name="username" required placeholder="Username" />
      <!-- if username is wrong  -->
      <span><?php echo $invaliduser; ?></span>
      <span class="p-viewer">
        <i class="fa fa-eye" aria-hidden="true"></i>
      </span>
    </div>
    <div class="form-group">
      <label for="password">User_Password:</label>
      <input type="password" id="password" name="password" required placeholder="Password" />
      <span><?php echo  $invalidpassword; ?></span>
    </div>
    <div class="form-group">
      <input type="submit" name="submit" class="submit" value="login">
    </div>
  </form>
</div>







        </div>
      </div>
    </section>
  </div>
</body>

</html>