<?php
session_start();
if (isset($_SESSION['admin'])) {
  $con = mysqli_connect("localhost", "root", "", "optical");
  error_reporting(E_ALL);
} else {
  echo '<script>location.href = "login.php";</script>';
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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>out of stock page</title>
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

        td {
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
            width: 76%;
            /* Reduce width to fit alongside sidenav */
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

        form {
            background-color: white;
            position: relative;
            width: auto;
            box-shadow: 0 0 2px rgba(128, 128, 128, 10),
                0 0 9px rgba(128, 128, 128, 10),
                0 0 15px rgba(128, 128, 128, 10);
            margin-top: 10px;
            padding: 20px;
        }

        form table {
            width: 100%;
        }

        th {
            text-transform: uppercase;
            font-family: 'Times New Roman', Times, serif;
        }

        .container-fluid {
            background-color: rgb(205, 212, 215);
        }

        img{
            width: 150px;
        }

        .usid {
            border: none;
            text-align: center;
            margin: -50px;
            width: 80%;
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
                    <li><a href="admin-customerview.php">customer details</a></li>
                    <li><a href="admin_add_brand_category_product.php">Add product</a></li>
                    <li><a href="admin_update_product.php">update product</a></li>
                    <li><a href="admin-add-brand.php">Manage brand</a></li>
                    <li><a href="admin-add-category.php">Manage category</a></li>
                    <li><a href="admin-view-order.php">View Order</a></li>
                    <li><a href="admin-view-feedback.php">View Feedback</a></li>
                    <li><a href="admin-view-payment.php">View Payment</a></li>
                    <li><a href="logout.php">logout</a></li>
                </ul>
                <br>
            </div>
            <br>
            <div class="col-sm-9">
                <?php
                $query = "SELECT * FROM `tbl_category_product` where `quantity` <= 0";
                $result = mysqli_query($con, $query);

                if (mysqli_num_rows($result) <= 0) { ?>
                    <script>
                        Swal.fire(
                            'no item!',
                            'Item not found',
                            'info'
                        ).then(function() {
                            window.location.href = '/PHP_PROJECT_SEM-5/admin-panel.php';
                        });
                    </script>
                <?php
                } else {
                }
                echo '<form class="box" method="post">';
                echo '<table>';
                echo '<tr>';
                echo '<th>Image</th>';
                echo '<th>Name</th>';
                echo '<th>Price</th>';
                echo '<th>Brand</th>';
                echo '<th>Quantity</th>';
                echo '<th>Action</th>';
                echo '<th>Action</th>';
                echo '</tr>';
                while ($row = mysqli_fetch_assoc($result)) {
                    echo '<form class="" method="post">';
                    echo "<tr>";
                    echo '<td><img src="uploads_img/' .$row['photo']. '" alt="" class="image"></td>';
                    echo "<td>" . $row['product_name'] . "</td>";
                    echo "<td>" . $row['prize'] . "</td>";
                    echo "<td>" . $row['company'] . "</td>";
                    // echo "<td>" . $row['quantity'] . "</td>";
                    echo '<td><input type="number" name="new_quantity" class="usid" value="' . $row['quantity'] . '"></td>';
                    echo '<form class="box" method="post">';
                    echo '<td>
                        <input type="hidden" name="update_name" value="' . $row['product_id'] . '">
                        <input type="submit" value="Update" name="update">
                        </td>';
                    echo "</form>";
                    echo '<form class="box" method="post">';
                    echo '<td>
                        <input type="hidden" name="delete_name" value="' . $row['product_id'] . '">
                        <input type="submit" value="Delete" name="delete">
                        </td>';
                    echo "</form>";
                    echo "</tr>";
                    echo "</form>";
                }
                echo "</table>";
                echo "</form>";
                ?>
            </div>
        </div>
    </div>
</body>

<?php
if (isset($_POST['delete'])) {

    $name_to_delete = $_POST['delete_name'];

    $sql = "DELETE FROM tbl_category_product WHERE product_id = '$name_to_delete'";

    if (mysqli_query($con, $sql)) { ?>
        <script>
            Swal.fire(
                'delete!',
                'product delete ',
                'error'
            ).then(function() {
                window.location.href = 'admin-out-of-stock-product.php';
            });
        </script> <?php
                } else {
                    echo '<script>alert("error");</script>';
                }
            }
?>

<?php 
    if (isset($_POST['update'])) {
        $update_quantity = $_POST['new_quantity'];
        $update_id = $_POST['update_name'];

        $updateQuery = "UPDATE `tbl_category_product` SET `quantity` = '$update_quantity' WHERE `product_id` = '$update_id'";

        if (mysqli_query($con, $updateQuery)) { ?>
            <script>
                Swal.fire(
                    'success!',
                    'Update Success',
                    'success'
                ).then(function() {
                window.location.href = '/PHP_PROJECT_SEM-5/admin-out-of-stock-product.php';
            });
            </script>
        <?php
            exit();
        } else {
            echo '<script>alert("Update failed");</script>';
        }
    }
?>

</html>