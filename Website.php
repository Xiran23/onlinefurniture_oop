<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Document</title>
  <link rel="stylesheet" href="style.css" />
</head>

<body>
  <!-- making a nav bar  -->
  <nav>
    <!-- for left side of page navbar  -->
    <div class="logo">
      <a href="#"> <img src="images/logos.png" width="200px"> </a>
    </div>

    <!-- for middle side of page navbar  -->

    <div class="menu">
      <ul>
        <li class="nav-items"><a href="#">Home</a></li>

        <li class="nav-items dropdown">
          <a href="#"> Products </a>
          <ul>
            <li><a href="#">OUR TEMS</a></li>
            <li><a href="#">OUR TEMS</a></li>
          </ul>
        </li>

        <li class="nav-items dropdown">
          <a href="#">About us </a>
          <ul>
            <li><a href="#">OUR TEMS</a></li>
            <li><a href="#">OUR TEMS</a></li>
          </ul>
        </li>




      </ul>
    </div>

    <!-- for right side of navbar  -->
    <div class="right-side">

      <div class="cart-search">
        <input style="border: solid;" type="text" placeholder="Search" />
      </div>

      <div class="cart-icon">

        <a href="#"><img src="cart.png" alt="cart icon" /></a>
        <span class="cart-count">0</span>

      </div>


      <div class="menu">
        <ul>
          <li class="nav-items"><a href="register.php">sign up</a></li>
          <li class="nav-items"><a href="login.php">login</a></li>

        </ul>
      </div>





    </div>
  </nav>

  <!-- auto slider -->
  <div>


    <div style="
        width: 60%;
        background: #32353b;
        height: 400px;
        margin: 10px;
        display: flex;
        box-shadow: 2px 2px 8px black;
        margin: auto;
        margin-top: 10px;
        " class="img_slider">
      <!-- <img src="slider/leftt.png" alt="" class="ar1" style="transform: rotate(180deg);"> -->
      <img src="images/photos1.jpg" style="width: 100%" alt="image not found" id="slider" />
      <!-- <img src="slider/leftt.png" alt="" class="ar2" style="transform: rotate(180deg);"> -->
    </div>
    <div style="text-align: center;">

      <h1>

        RECOMMENDED FOR YOU
      </h1>
      <h5>
        Take a look at the newest additions to our modern furniture collection
      </h5>
    </div>


  </div>

  <!-- items list -->
  
  <?php include('config/db.php');
        $query = "SELECT *FROM product";
        $result = mysqli_query($conn,$query); 
        $products = mysqli_fetch_all($result,MYSQLI_ASSOC);
        mysqli_free_result($result);
        // print_r($products);
         ?>



<div class="items-list">
    <?php foreach($products as $prod):?>
    <!-- ***************************************************************************************************************** -->

    <div class="cart-items" >
     
      <a href="product-page.html">
        <img src="<?php echo $prod['image']; ?>" alt="Product Name"  /></a>
      <!-- product name -->
      <h3 style="font-size: 18px; font-weight: bold"><?php echo $prod['pname']; ?></h3>
      <!-- product descripton -->
      <p style="font-size: 16px"><?php echo $prod['pdescription']; ?></p>
      <!-- product prices -->
      <p style="font-size: 16px; color: green; font-weight: bold">$<?php echo $prod['price']; ?></p>
      <!-- add  to carts -->
      <a href="#" style="
            background-color: blue;
            color: white;
            padding: 8px 16px;
            border: none;
            border-radius: 4px;
            font-size: 16px;
          ">Add to Cart</a>
    </div>
    <!-- ***************************************************************************************************************** -->
    <?php endforeach; ?>





   
   
  

  </div>

</body>

</html>

<script>
  let cart = document.querySelectorAll(".add_cart");
  var j = 1;
  cart.forEach((i) => {
    var x = document.getElementById("count").innerHTML;
    i.addEventListener("click", function() {
      document.getElementById("count").innerHTML = j;
      console.log(j);
      j++;
    });
  });

  var imgId = document.getElementById("slider");
  var imgList = [
    "../images/photos1.jpg",
    "../images/photoes2.jpg",
    "../images/photoes3.jpg",
  ];
  let imgNo = 0;

  let carouseId = setInterval(sliderOne, 1000);

  function sliderOne() {
    if (imgNo < imgList.length) {
      imgId.setAttribute("src", "slider/" + imgList[imgNo]);
      imgNo++;
    } else {
      imgNo = 0;
    }
  }
</script>