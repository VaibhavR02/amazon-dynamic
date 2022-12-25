<?php
include('../includes/connect.php');

?>
<?php  
    function getIPAddress() {  
    //whether ip is from the share internet  
     if(!empty($_SERVER['HTTP_CLIENT_IP'])) {  
                $ip = $_SERVER['HTTP_CLIENT_IP'];  
        }  
    //whether ip is from the proxy  
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {  
                $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];  
     }  
//whether ip is from the remote address  
    else{  
             $ip = $_SERVER['REMOTE_ADDR'];  
     }  
     return $ip;  
}  
// $ip = getIPAddress();  
// echo 'User  IP Address - '.$ip;  
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <title>Sign Up</title> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" />
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
</head>

<body>

    <div class=" container small-container">
        <title>Sign Up</title>
        <h1 class="my-3 text-center">Sign Up</h1>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="form-group mb-3" id="name">
                <label for="name" class="form-label">Name</label>
                <input type="name" required="required" class="form-control" name="name" id="name"
                    placeholder="Enter name">
            </div>

            <div class="form-group mb-3" id="email">
                <label for="email" class="form-label">Email</label>
                <input type="email" required="required" class="form-control" name="email" id="email"
                    placeholder="Enter email">
            </div>

            <div class="form-group mb-3" id="image">
                <label for="image" class="form-label">User Image</label>
                <input type="file" required="required" class="form-control" name="image" id="image">
            </div>

            <div class="form-group mb-3" id="password">
                <label for="password" class="form-label">Password</label>
                <input type="password" required="required" class="form-control" name="password" id="password"
                    placeholder="Enter password">
            </div>

            <div class="form-group mb-3" id="cpassword">
                <label for="cpassword" class="form-label">Confirm Password</label>
                <input type="password" required="required" class="form-control" name="cpassword" id="password"
                    placeholder="Confirm password">
            </div>

            <div class="form-group mb-3" id="name">
                <label for="address" class="form-label">Address</label>
                <input type="address" required="required" class="form-control" name="address" id="name"
                    placeholder="Enter Address">
            </div>

            <div class="form-group mb-3" id="name">
                <label for="mobile" class="form-label">Mobile</label>
                <input type="mobile" required="required" class="form-control" name="mobile" id="name"
                    placeholder="Enter mobile no.">
            </div>




            <div class="my-4 ">
                <!-- <a href="" type="submit" name="signup" class="btn btn-p">Sign up</a> -->
                <input type="submit" name="signup" value="Sign Up" class="btn btn-p">
            </div>
            <div class="mb-3 fw-bold">
                Already have an account ?&nbsp; <a href="SigninScreen.php"
                    class="text-decoration-underline text-primary">Sign In</a>
            </div>
        </form>
    </div>
</body>

</html>

<?php
if(isset($_POST['signup'])){
    $user_name=$_POST['name'];
    $user_email=$_POST['email'];
    $user_password=$_POST['password'];
    $hash_password=password_hash($user_password,PASSWORD_DEFAULT);
    $user_cpassword=$_POST['cpassword'];
    $user_address=$_POST['address'];
    $user_mobile=$_POST['mobile'];

    $user_image=$_FILES['image']['name'];
    $user_image_temp=$_FILES['image']['temp_name'];
    $user_ip=getIPaddress();
    $user_mobile=$_POST['mobile'];

//select query
$select_query="Select * from `user` where email='$user_email' and mobile='$user_mobile' ";
$result=mysqli_query($connection,$select_query);
$row_count=mysqli_num_rows($result);
if($row_count>0){
    echo "<script>alert('Useremail or mobile no. already exist')</script>";
}
else if($user_password != $user_cpassword){
    echo "<script>alert('password does not match ')</script>";

}
else{
 //insert user data
 move_uploaded_file( $user_image_temp,"./user_image/$user_image");
 $insert_query="Insert into `user` (name,email,password,image,ip,address,mobile) 
 values ('$user_name','$user_email','$hash_password','$user_image',' $user_ip','$user_address','$user_mobile')";
 
 $result_execute=mysqli_query($connection,$insert_query);
 
 if($result_execute){
     echo "<script>alert('Signup successfull ')</script>";
 }else{
     die(mysqli_error($connection));
 }
}

//selecting cart items
$select_cart_items="Select * from `cart_details` where 
ip_address= '$user_ip'";
$result_cart=mysqli_query($connection,$select_cart_items);
$row_count=mysqli_num_rows($result_cart);
if($row_count>0){
    $_SESSION['name']=$user_name;
    echo "<script>alert('you have items in your cart ')</script>"; 
    echo "<script>window.open('checkout.php','_self')</script>"; 
}else{
    echo "<script>window.open('index.php','_self')</script>"; 
}

}


?>