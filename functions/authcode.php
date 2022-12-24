<?php
include('../includes/connect.php');


?>

<?php
if(isset($_POST['signup'])){
 $name=mysqli_real_escape_string($connection,$_POST['name']);    
 $email=mysqli_real_escape_string($connection,$_POST['email']);    
 $mobile=mysqli_real_escape_string($connection,$_POST['mobile']);    
 $password=mysqli_real_escape_string($connection,$_POST['password']);    
 $confirmpassword=mysqli_real_escape_string($connection,$_POST['confirmpassword']);    

 if($password == $confirmpassword){

//inserting the data

$insert_query= "Insert into `user` (name,email,mobile,password,confirmpassword)
Values ('$name','$email','$mobile','$password','$confirmpassword')";

$result_query=mysqli_query($connection,$insert_query);

if($result_query){
    echo "<script>alert('Signup Successfull!')</script>";
    header('location: SigninScreen.php')
}else{
    echo "<script>alert('Please enter valid credientials!')</script>";
    header('location: SignupScreen.php')
}

}
 else{
   echo "<script>alert('please enter correct password in both fields')</script>";
    header('location: SignupScreen.php')
 }
}
?>