<?php 
@include 'connection.php'; 
session_start();
  if(isset($_SESSION['email'])){
         $emailAddres=$_SESSION['email']; 

         $query="SELECT * FROM users WHERE email='$emailAddres'";
         $result=mysqli_query($con,$query);
         $row=mysqli_fetch_assoc($result); 
         $userId=$row['user_id'];

if(isset($_POST['addCart'])){

    $pid = $_POST['proId'];
    $pid = filter_var($pid, FILTER_SANITIZE_STRING);
    $name = $_POST['proName'];
    $name = filter_var($name, FILTER_SANITIZE_STRING);
    $code = $_POST['proCode'];
    $code = filter_var($code, FILTER_SANITIZE_STRING);
    $eachprice = $_POST['sprice'];
    $eachprice = filter_var($eachprice, FILTER_SANITIZE_STRING); 
    $size = $_POST['size'];
    $size = filter_var($size, FILTER_SANITIZE_STRING);  
    $qty = $_POST['qty'];
    $price=$eachprice*$qty;
    
   
    

    $select="SELECT *FROM cart WHERE pro_id='$pid' && size='$size' && user_id='$userId'";
   $result=mysqli_query($con, $select); 
   if(mysqli_num_rows($result)>0){
    echo"
    <script>
        alert('item already exists');
        window.location.href='main.php';
    </script>";
   } 
   else{
    $insert = "INSERT INTO `cart`(`user_id`, `pro_id`, `proName`, `proCode`, `size`, `quantity`, `price`) VALUES ('$userId','$pid','$name','$code','$size','$qty','$price')";
    mysqli_query($con, $insert);
    echo"
    <script>
        alert('added to cart!');
        window.location.href='main.php';
    </script>";
   }
    
} 
  } 
  else{ 
    echo"
    <script>
        alert('login first!');
        window.location.href='form-login.php';
    </script>";

  }
?>