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
    <title>Payment Screen</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" />
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <style>
    .form-check .form-check-input {

        margin-left: 450px;
    }

    .col-md-6 {

        margin-left: 480px;
    }

    body {
        overflow-x: hidden;
    }

    .pay {
        margin-left: 600px;
    }
    </style>
</head>

<body>

    <?php
$user_ip=getIPAddress();

$get_user="Select * from `user` where ip='$user_ip'"; 
$result=mysqli_query($connection,$get_user);
$run_query=mysqli_fetch_assoc($result);
$user_id=$run_query['user_id'];

//echo "<script>alert( 'user id is ',$user_id)</script>";
echo $user_id;
?>
    <div class='container'>
        <h2 class='text-center my-4 text-dark text-decoration-underline'>Payment method</h2>

        <div class='col-md-6'>
            <a class='btn btn-p btn-sm my-3 text-center continue' href='https://www.paytm.com'
                target='_blank'><strong>1. Paytm</strong></a>
        </div>

        <div class='col-md-6'>
            <a class='btn btn-p btn-sm my-3 text-center continue' href="order.php?user_id=1" target="_blank"><strong>2.
                    Cash on
                    Delievery</strong></a>
        </div>


    </div>



    </div>

    <!-- <a href='' type='button' class='my-3 pay btn btn-sm btn-warning'>Continue to
        Pay</a> -->
    <!-- <a href='order.php?user_id=< cho user_id ?> ' type='button' name='signin' value='Continue to pay'
    class='btn btn-p btn-sm my-3 text-center continue'></a> -->
</body>

</html>