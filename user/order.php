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
//  echo 'User  IP Address - '.$ip; 

?>

<?php
if(isset($_GET['user_id'])){
    $user_id=$_GET['user_id'];
  
}

//getting total item and total price of all item
$get_ip=getIPAddress();
$total_price=0;
$cart_query_price="Select * from `cart_details` where ip_address='$get_ip'";
$result_cart_price=mysqli_query($connection,$cart_query_price);
$invoice_number=mt_rand();
// echo "$invoice_number";
$status='pending';
$count_product=mysqli_num_rows($result_cart_price);
while($row_price=mysqli_fetch_assoc($result_cart_price)){
    $product_id=$row_price['product_id'];
    $select_product="Select * from `products` where
     product_id=$product_id";
$run_price=mysqli_query($connection,$select_product);
while($row_product_price=mysqli_fetch_array($run_price)){
    $product_price=array($row_product_price['product_price']);
    $product_total_value=array_sum($product_price);
$total_price +=$product_total_value;
}
}

//getting quantity from  cart
$get_cart="Select * from `cart_details`";
$run_query=mysqli_query($connection,$get_cart);
$get_item_quantity=mysqli_fetch_array($run_query);
$quantity=$get_item_quantity['quantity'];
if($quantity==0){
    $quantity=1;
    $subtotal=$total_price;
}else{
    $quantity=$quantity;
    $subtotal=$total_price*$quantity;
}

$insert_orders="Insert into `order`
 (user_id,price,invoice_number,total_products,order_status)
 values($user_id,$subtotal,$invoice_number,$count_product,'$status')";
$result_query=mysqli_query($connection,$insert_orders);
if($result_query){
   echo "<script>alert('Order placed successfully!')</script>"; 
   echo "<script>window.open('profile.php','_self')</script>"; 
}

//pending orders

$insert_pending_orders="Insert into `pending_order`
(user_id,invoice_number,product_id,quantity,order_status)
 values($user_id,$invoice_number,$product_id,$quantity,'$status')";
$result_pending_orders=mysqli_query($connection,$insert_pending_orders);






?>