<?php
include('../includes/connect.php');
//include('../includes/footer.php');

    ?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Products</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
        rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65"
        crossorigin="anonymous" />
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <div class="container my-5">
        <h2>Products List</h2>

        <br />
        <br />
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th class="">Product Name</th>
                    <th class="me-3">Product Brand</th>
                    <th class=""> Product Price</th>
                    <th class="">Action</th>
                </tr>
            </thead>
            <tbody>


                <!-- ------------------------------------------------------------ -->
                <?php 
            $servername="localhost";
            $username="root";
            $password="Root@123";
            $database="ecommerse";

$connection= new mysqli($servername, $username , $password , $database);
if($connection -> connect_error){
    die("Connection failed : ".$connection->connect_error);
}
 $sql="Select * from `products`";
$result=$connection->query($sql);

if(!$result){
    die("Invalid query: ".$connection->error);
}

$product_id='';
$product_name='';
$product_brand='';
$product_price='';


while($row=$result->fetch_assoc()){
    echo "
    <tr>
    <td class=''>$row[product_id]</td>
    <td class=''>$row[product_name]</td>
    <td class=''>$row[product_brand]</td>
    <td class=''>$row[product_price]</td>
  
  
    <td>
<a href='/crud/editproduct.php?id=$row[product_id]' class='btn btn-primary btn-sm'>Edit</a>
<a href='/crud/deleteproduct.php?id=$row[product_id]' class='btn btn-danger btn-sm'>Delete</a>
    </td>
</tr>
    ";
}

            ?>

                <!-- ------------------------php------------------------------------ -->



            </tbody>
        </table>
    </div>


    <!-- -----------------------footer------------------------------------- -->
    <footer id="#footer" class="bg-light w-100  lg text-center text-white  ">
        <hr style="font-weight:bold">
        <!-- Grid container -->
        <div class="container p-4 pb-0">

            <!-- Section: Social media -->
            <section class="mb-4">
                <!-- Facebook -->
                <a class="btn text-white btn-floating m-1" style="background-color: #3b5998" href="#!" role="button"><i
                        class="fab fa-facebook-f"></i></a>

                <!-- Twitter -->
                <a class="btn text-white btn-floating m-1" style="background-color: #55acee" href="#!" role="button"><i
                        class="fab fa-twitter"></i></a>

                <!-- Google -->
                <a class="btn text-white btn-floating m-1" style="background-color: #dd4b39" href="#!" role="button"><i
                        class="fab fa-google"></i></a>

                <!-- Instagram -->
                <a class="btn text-white btn-floating m-1" style="background-color: #ac2bac" href="#!" role="button"><i
                        class="fab fa-instagram"></i></a>

                <!-- Linkedin -->
                <a class="btn text-white btn-floating m-1" style="background-color: #0082ca" href="#!" role="button"><i
                        class="fab fa-linkedin-in"></i></a>

                <!-- Section: Social media -->
        </div>
        <!-- Grid container -->


        <div class="text-center p-3" style="background-color: black ">
            © 2022 Copyright:
            <a class="text-white" style="text-decoration:none">vaibhavrandale.com
        </div>
    </footer>
    <!-- ------------------------footer end------------------------------------------------------------------------------ -->




</body>

</html>