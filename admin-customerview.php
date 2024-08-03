<?php
session_start();
if (isset($_SESSION['admin'])) {
  $con = mysqli_connect("localhost", "root", "", "optical");
} else {
  echo '<script>location.href = "login.php";</script>';
}
?>

<?php

if (isset($_POST['delete_name'])) {

    $name_to_delete = $_POST['delete_name'];

    $sql = "DELETE FROM tbl_customer_details WHERE name = '$name_to_delete'";
    $sql1 = "DELETE FROM tbl_register WHERE username = '$name_to_delete'";

    if (mysqli_query($con, $sql)) {
        if (mysqli_query($con, $sql1)) {
            echo '<script>alert("delete success");</script>';
        } else {
            echo '<script>alert("delete error in register table");</script>';
        }
    } else {
        echo '<script>alert("error");</script>';
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <title>customer view</title>
    <style>
        th,
        td {
            padding: 10px;
            text-align: left;
        }

        table,
        tr,
        td,
        th {
            border-collapse: collapse;
            border: 2px solid black;
            text-align: center;
        }

        td{
            padding: 20px;
        }

        .row.content {
            height: 550px;
        }

        .sidenav {
            background-color: #f1f1f1;
            height: 100%;
            position: fixed;
            width: 22%;
            z-index: 1;
        }

        .col-sm-9 {
            margin: 0;
            margin-left: 23%; 
            width: 76%; /* Reduce width to fit alongside sidenav */
            padding: 0;
        }

        @media screen and (max-width: 767px) {
            .row.content {
                height: auto;
            }
        }

        .admin-logo {
            width: 150px;
            margin-left: 80px;
            padding: 40px 40px;
        }

        #dash-details a {
            margin-top: 10px;
        }

        #dash-details a:hover {
            background-color: black;
            color: white;
        }

        .row.content {
            height: 100vh;
        }

        #dash-details {
            text-transform: uppercase;
            font-family: Georgia, 'Times New Roman', Times, serif;
            font-size: 14px;
            font-weight: 700px;
        }

        form{
            background-color: white;
            position: relative;
            width: auto;
            box-shadow: 0 0 2px rgba(128, 128, 128, 10),
                0 0 9px rgba(128, 128, 128, 10),
                0 0 15px rgba(128, 128, 128, 10);
            margin-top: 10px;
            padding: 20px;
        }

        form table{
            width: 100%;
        }

        th{
            text-transform: uppercase;
        }

        .container-fluid{
      background-color: rgb(205, 212, 215);
    }

    </style>
</head>

<body>
    <div class="container-fluid">
        <div class="row content">
            <div class="col-sm-3 sidenav">
                <img src="images/admin.png" alt="" class="admin-logo">
                <ul class="nav nav-pills nav-stacked" id="dash-details">
                    <li><a href="admin-panel.php">Dashboard</a></li>
                    <li class="active"><a href="admin-customerview.php">customer details</a></li>
                    <li><a href="admin_add_brand_category_product.php">Add product</a></li>
                    <li><a href="admin_update_product.php">update product</a></li>
                    <li><a href="admin-add-brand.php">Manage brand</a></li>
                    <li><a href="admin-add-category.php">Manage category</a></li>
                    <li><a href="admin-view-order.php">View Order</a></li>
                    <li><a href="admin-view-feedback.php">View Feedback</a></li>
                    <li><a href="admin-view-payment.php">View Payment</a></li>
                    <li><a href="login.php">logout</a></li>
                </ul>
                <br>
            </div>
            <br>
            <div class="col-sm-9">
                <?php
                $con = mysqli_connect("localhost", "root", "", "optical");
                $query = "SELECT * FROM tbl_customer_details";
                $result = mysqli_query($con, $query);

                echo '<form class="box" method="post">';
                echo '<table>';
                echo '<tr>';
                echo '<th>name</th>';
                echo '<th>email</th>';
                echo '<th>contact no</th>';
                echo '<th>address</th>';
                echo '<th>city</th>';
                echo '<th>action</th>';
                echo '</tr>';
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $row['name'] . "</td>";
                    echo "<td>" . $row['email'] . "</td>";
                    echo "<td>" . $row['contactno'] . "</td>";
                    echo "<td>" . $row['address'] . "</td>";
                    echo "<td>" . $row['city'] . "</td>";
                    echo '<form class="box" method="post">';
                    echo '<td>
                        <input type="hidden" name="delete_name" value="' . $row['name'] . '">
                        <input type="submit" value="Delete">
                    </td>';
                    echo "</form>";
                    echo "</tr>";
                }

                echo "</table>";
                echo "</form>";
                ?>
            </div>
        </div>
    </div>
</body>

</html>