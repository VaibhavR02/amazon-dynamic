<?php
include('../includes/connect.php');

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" />
    <link rel="stylesheet" href="../includes/style.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>


</head>

<body>
    <div>


        <header>

            <nav class="navbar navbar-expand-lg variant-dark bg-dark">
                <div class="container-fluid">

                    <!-- <a class="navbar-brand" href="/ecommerse/admin/index.php">amazon</a> -->
                    <li><button class="openbtn bg-dark" onclick="openNav()">☰</button>
                        <a class="navbar-brand ms-3 bg-dark" href="/ecommerse/admin/index.php"> amazon</a>
                    </li>

                    <div class="collapse navbar-collapse  mt-1 " id="navbarNavDropdown">
                        <ul class="navbar-nav">

                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle justify-content-end text-white" href="#"
                                    role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Admin
                                </a>
                                <ul class="dropdown-menu me-3">
                                    <li><a class="dropdown-item " href="index.php?insert_product">New Products</a></li>
                                    <li><a class="dropdown-item " href="index.php?productlist">List of Products</a></li>
                                    <li><a class="dropdown-item" href="index.php?insert_category">Category</a></li>
                                    <li><a class="dropdown-item" href="#">Orders</a></li>

                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>

        </header>

        <div id="mySidepanel" class="sidepanel">
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
            <h3 style="font-weight:bold;">Categories</h3>

            <?php

$select_cat= "Select * from `categories`";
$result_cat=mysqli_query($connection,$select_cat);
// $row_data=mysqli_fetch_assoc($result_cat);
// echo $row_data['cat_name'];

while($row_data=mysqli_fetch_assoc($result_cat)){
  $cat_name=$row_data['cat_name'];
  $cat_id=$row_data['cat_id'];
  echo " <a href='#'>$cat_name</a>";
}
?>

        </div>


        <div class="heading ms-3 m-auto" style="justify-content:center">
            <h1>Dashborad</h1>

        </div>


        <div class="container">
            <?php
if(isset($_GET['insert_category'])){
  include('insert_category.php');
}
if(isset($_GET['insert_product'])){
  include('insert_product.php');
}
if(isset($_GET['productlist'])){
  include('productlist.php');
}
  ?>
        </div>



        <script>
        function openNav() {
            document.getElementById("mySidepanel").style.width = "250px";
        }

        /* Set the width of the sidebar to 0 (hide it) */
        function closeNav() {
            document.getElementById("mySidepanel").style.width = "0";
        }
        </script>


</body>

</html>