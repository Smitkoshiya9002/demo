<?php
// if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
//   echo '<script>alert("You are already logged in");</script>';
//   exit;
// }else{
//   echo '<script>alert("no found");</script>';
// }
?>
<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<head>
  <style>
    @import url(https://fonts.googleapis.com/css?family=Open+Sans);

    html {
      scroll-behavior: smooth;
      margin: 0;
      padding: 0;
    }

    body {
      margin: 0 auto;
      font-family: 'tahoma';
      height: 100vh;
      width: 100%;
      position: relative;
    }

    #nav {
      margin: 0 auto;
      width: 100%;
      height: auto;
      box-shadow: 0 0 25px rgba(0, 0, 0, 0.9), inset 0 0 1px rgba(255, 255, 255, 0.6);
      background-color: white;
    }

    #nav ul {
      margin: 0;
      padding: 0;
      list-style-type: none;
      display: flex;
      width: auto;
    }

    #nav ul li {
      position: relative;
      display: inline-block;
      align-items: center;
      text-align: center;
    }


    #nav ul li a {
      padding: 20px;
      display: inline-block;
      color: black;
      text-decoration: none;
      text-align: left;
      opacity: 1;
      margin: 0px 15px 0px 15px;
    }

    #nav ul li a:hover {
      opacity: 0.5;
    }

    #nav ul li ul {
      display: none;
      position: absolute;
      width: 100%;
      z-index: 1;
    }

    #nav ul li ul li {
      border-bottom: 2px solid rgba(255, 255, 255, .3);
      width: 100%;
    }

    #nav ul li ul li a {
      margin: 0px;
      display: block;
    }

    #nav ul li:hover ul {
      display: block;
      background: white;
      opacity: 0.8;
      color: white;
      width: auto;
      border: none;
      margin: 0;
      padding: 0;
    }

    #nav img {
      width: 60px;
      position: relative;
      padding: 15px;
      cursor: pointer;
    }

    .right-align {
      margin-left: auto;
      display: block;
      float: right;
      /* background-color: yellow; */
      margin-right: 45px;
    }

    .cart-icon {
      position: relative;
      font-size: 22px;
      color: black;
      left: 33%;
      top: 20px;
    }

    .cart-icon span {
      position: absolute;
      height: 20px;
      width: 20px;
      background-color: #000;
      line-height: 22px;
      text-align: center;
      top: -20%;
      font-size: 15px;
      font-weight: 600;
      border-radius: 50%;
      color: #fff;
    }

    .myprofile {
      position: relative;
      left: 380%;
    }

    .order {
      position: relative;
      left: 450%;
      color: #000;
    }

    .order:hover {
      opacity: 0.8;
      color: #000;
      border: none;
    }
  </style>
</head>

<body>
  <div class="nav">
    <nav id="nav">
      <ul>
        <!-- <li class="menu-icon">&#9776;</li> -->
        <li><a href="/PHP_PROJECT_SEM-5/home.php">Home</a></li>
        <li><a href="/PHP_PROJECT_SEM-5/home.php/#brandsection">Brand</a>
          <ul>
            <?php
            $con = mysqli_connect("localhost", "root", "", "optical");
            $brand = "select * from `tbl_brand`";
            $result = mysqli_query($con, $brand);
            while ($row = mysqli_fetch_assoc($result)) {
              echo '<li><a href="/PHP_PROJECT_SEM-5/brand/' . $row['brand_name'] . '.php">' . $row['brand_name'] . '</a></li>';
            }
            ?>
          </ul>
        </li>
        <li><a href="/PHP_PROJECT_SEM-5/home.php#categorysection">Category</a>
          <ul>
            <?php
            $con = mysqli_connect("localhost", "root", "", "optical");
            $category = "select * from `tbl_category`";
            $result = mysqli_query($con, $category);
            while ($row = mysqli_fetch_assoc($result)) {
              echo '<li><a href="/PHP_PROJECT_SEM-5/category.php?category=' . $row['category_name'] . '">' . $row['category_name'] . '</a></li>';
            }
            ?>
          </ul>
        </li>
        <li><a href="/PHP_PROJECT_SEM-5/home.php#shapesection">Shape</a>
          <ul>
            <li><a href="/PHP_PROJECT_SEM-5/frame.php?product_frame=square">Square</a></li>
            <li><a href="/PHP_PROJECT_SEM-5/frame.php?product_frame=circle">Circle</a></li>
            <li><a href="/PHP_PROJECT_SEM-5/frame.php?product_frame=aviator">Aviator</a></li>
            <li><a href="/PHP_PROJECT_SEM-5/frame.php?product_frame=oval">Oval</a></li>
          </ul>
        </li>
        <li><a href="/PHP_PROJECT_SEM-5/home.php#lensesection">Lense</a>
          <ul>
            <li><a href="#">SingleVision</a></li>
            <li><a href="#">Bifocals</a></li>
            <li><a href="#">Trifocals</a></li>
            <li><a href="#">Progressive</a></li>
          </ul>
        </li>
        <li><a href="/PHP_PROJECT_SEM-5/home.php#contact-form">Contact us</a></li>
        <?php
        if (isset($_SESSION['username'])) {
          $con = mysqli_connect("localhost", "root", "", "optical");
          $select_rows = mysqli_query($con, "select * from tbl_add_to_cart");
          $row_count = mysqli_num_rows($select_rows);
          echo '<li><a href="/PHP_PROJECT_SEM-5/my_order.php" class="order">Order</a></li>
                <a href="/PHP_PROJECT_SEM-5/add_to_cart.php" class="cart-icon"><i class="glyphicon glyphicon-shopping-cart"></i><span>' . $row_count . '</span></a>';
          echo '<li><a href="/PHP_PROJECT_SEM-5/customer_panel.php" id="login-space" class="myprofile">My Profile</a></li>';
        } else {
          echo '<li class="right-align">
                <img src="/PHP_PROJECT_SEM-5/images/admin.png" alt="signup">
                <ul>
                    <li><a href="/PHP_PROJECT_SEM-5/login.php">Login</a></li>
                    <li><a href="/PHP_PROJECT_SEM-5/registration.php">Registration</a></li>
                </ul>
              </li>';
        }
        ?>
      </ul>
    </nav>
  </div>
</body>

</html>