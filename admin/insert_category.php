<?php
if(isset($_POST['insert_category'])){
    $cat_title=$_POST['cat_name'];

//selct data from database
$select_query="Select * from `categories` where cat_name='$cat_title'";
$result_select=mysqli_query($connection,$select_query);
$number=mysqli_num_rows($result_select);
if($number>0){
echo "<script>alert('category is already presnt')</script>";
}else{
    $insert_query="insert into `categories` (cat_name) values('$cat_title')";
    $result=mysqli_query($connection,$insert_query);
    if($result){
        echo "<script>alert('category inserted successfully')</script>";
    }
}}
?>

<!DOCTYPE html>


<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Category</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" />
    <link rel="stylesheet" href="style.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body class="bg=light">
    <div class="container mt-3">
        <h1 class="text-center ">Insert Category</h1>
        <form action="" method="post">
            <div class="form-outline mb-4 w-50 m-auto mt-3">

                <label for="cat_name" class="form-label"> Category Name</label>

                <input type="text" name="cat_name" id="cat_name" class="form-control " placeholder="Enter Category name"
                    autocomplete="off" required>

                <div class="form-outline mb-4 w-50  mt-3">
                    <input type="submit" name="insert_category" class="btn btn-warning btn-sm m-auto"
                        value="Insert Category">
                </div>
            </div>
</body>

</html>