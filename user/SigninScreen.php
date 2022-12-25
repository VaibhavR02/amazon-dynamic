<?php
include('../includes/connect.php');
@session_start();
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
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" />
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
</head>

<body>

    <div class="container small-container">
        <title>Sign In</title>
        <h1 class="my-3 text-center">Sign In</h1>
        <form action="" method="post">
            <div class="form-group mb-3" id="email">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" class="form-control" id="email" placeholder="Enter email">
            </div>

            <div class="form-group mb-3" id="password">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" class="form-control" id="password" placeholder="Enter password">
            </div>
            <div class="mb-3 "><a href="" class=" text-primary text-decoration-underline">Forgot Password?</a></div>
            <div class="mb-3">
                <!-- <a href="" name="signin" class="btn btn-p">Sign In</a> -->
                <input type="submit" name="signin" value="Sign In" class="btn btn-p">

            </div>
            <div class="mb-3 fw-bold ">
                New Customer?&nbsp; <a href="SignupScreen.php" class="text-primary text-decoration-underline"> Create
                    new account</a>
            </div>
        </form>
    </div>
</body>

</html>

<?php
if(isset($_POST['signin'])){
    $user_email=$_POST['email'];
    $user_password=$_POST['password'];


    $select_query="Select * from `user` where 
    email='$user_email'";
    $result=mysqli_query($connection,$select_query);
    $row_count=mysqli_num_rows($result);
    $row_data=mysqli_fetch_assoc($result);
    $user_ip=getIPAddress();

//cart items
$select_query_cart="Select * from `cart_details` where ip_address='$user_ip'";
$select_cart=mysqli_query($connection,$select_query_cart);
$row_count_cart=mysqli_num_rows($select_cart);

if($row_count>0){
    $_SESSION['name']=$user_name;
//verify password
if(password_verify($user_password,$row_data['password'])){
    // echo "<script>alert('SignIn Successfull!')</script>";
    if($row_count==1 and $row_count_cart==0){
        $_SESSION['name']=$user_name;
        echo "<script>alert('SignIn Successfull!')</script>";
        echo "<script>window.open('../index.php','_self')</script>";
    }else{
        $_SESSION['name']=$user_name;
        echo "<script>alert('SignIn Successfull!')</script>";
        echo "<script>window.open('payment.php',)</script>";
 
    }
}
else{
    echo "<script>alert('Invalid Credintials!')</script>";
}

    }
    else{
        echo "<script>alert('Invalid Credintials!')</script>";
    }
}

?>