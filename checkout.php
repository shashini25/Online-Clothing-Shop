<?php 
session_start(); 
   include 'connection.php';  

   if(isset($_SESSION['email'])){
    $emailAddres=$_SESSION['email']; 

    $query="SELECT * FROM users WHERE email='$emailAddres'";
    $result=mysqli_query($con,$query);
    $row=mysqli_fetch_assoc($result); 
    $userId=$row['user_id'];
  
}


   function unique_id() {
      $str = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
      $rand = array();
      $length = strlen($str) - 1;
      for ($i = 0; $i < 20; $i++) {
          $n = mt_rand(0, $length);
          $rand[] = $str[$n];
      }
      return implode($rand);
   }

 if(isset($_POST['Proceed'])){
    
    $code = $_POST['code'];
    $name=$_POST['cardName'];
    $address=$_POST['address'];
    $phone1=$_POST['phone_1'];
     $phone2=$_POST['phone_2'];
    $total_products = $_POST['total_products'];
   $total_price = $_POST['total_price'];

    $select="SELECT *FROM cart WHERE user_id='$userId'";
   $result=mysqli_query($con, $select);

   if(mysqli_num_rows($result)>0){ 
    $insert = "INSERT INTO `orders`(`user_id`, `code`, `name`, `address`, `phone1`, `phone2`, `orderProduct`, `total`) VALUES ('$userId','$code','$name','$address','$phone1','$phone2','$total_products','$total_price')";
    mysqli_query($con, $insert); 

    $delete_query = mysqli_query($con, "DELETE FROM `cart`  WHERE user_id='$userId' ") or die('query failed');
    echo"
    <script>
        alert('order placed successfully!');
        window.location.href='payment.php?';
    </script>";
   } 

   else{
    
   }
   

}
 
  
 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>payment</title>
    <link rel="stylesheet" href="checkout.css">
    <link rel = "stylesheet" href = "https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <div class="checkout-container">
        <form action="" method="POST" name="checkForm" onsubmit="return checkout()">
        <h1>Checkout</h1>
        <hr>
        <h5>Before you proceed, fill and check the given details are correct.<br>
            Please provide shipping address correctly
        </h5> 

        <input type="hidden" name="code" value="<?php echo uniqid();?>">
       
        <div class="first-row"> 
        
            <div class="name">
                <p>Name </p>
                <div class="input-name">
                    <input type="text" name="cardName" required>
                    <div class="error">
                        <p id="result1"></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="second-row">
            <div class="adrress">
                <p>address</p>
                <div class="input-address">
                    <input type="text" name="address" required>
                </div>
            </div>
        </div>
        <div class="third-row">
            <div class="phone">
                <p>Phone number</p>
                <div class="input-phone">
                    <input type="text" name="phone_1" class="phone1" placeholder="phone number1" required>
                   
                
                    <input type="text" name="phone_2" class="phone2" placeholder="phone number2">
                    
                </div>
                <div class="error">
                        <p id="result3"></p>
                    </div>
            </div>
        </div>
        
        <div class="fourth-row">
            <div class="orderd items">
                <p>orderd items</p>
                <table width="100%">
                        <thead>
                            <th>item</th>
                            <th>item code</th>
                            <th>size</th>
                            
                        </thead>
                        <tbody>
                        <?php
                        $total = 0;
                        $delivery=400;
                        $cart_items[] = ''; 
                        $select="SELECT *FROM cart WHERE user_id='$userId' ";
                        $result=mysqli_query($con, $select);
                         if(!$result){
                           die("invalid query:".mysqli_connect_error());
                         }
                        while($row=mysqli_fetch_assoc($result)){
         
                              $cart_items[] = $row['proCode'].'['.$row['size'].'x'.$row['quantity'].'] + ';
                              $total_products = implode($cart_items);
                              $total += ($row['price']);
      ?>
                            <tr>
                                <td align='center'><?php echo $row['proName']; ?></td>
                                <td align='center'><?php echo $row['proCode']; ?></td>
                                <td align='center'><?php echo $row['size']; ?></td>
                            </tr>
      <?php 
            }?> 

         <input type="hidden" name="total_products" value="<?php echo $total_products; ?>">
         <input type="hidden" name="total_price" value="<?php echo $total+$delivery; ?>" value="">
					</tbody>
				</table>
               
                
            
</div>
        
       
        <div class="fifth-row">
            <table>
                    <tr>
                        <th>Price</th>
                        <td>Rs. <input type="hidden" name="price" value="<?php echo $total;?>"><?php echo $total;?></td>
                    </tr>
                    <tr>
                        <th>Delivery Charges</th>
                        <td>Rs. 400</td>
                    </tr>         
                    <tr class="tot">
                        <th>Sub Total</th>
                        <td>Rs. <input type="hidden" name="total";?>
                        <?php 
                        $subtotal=$total+400;
                        echo $subtotal;
                        ?></td>
                    </tr>
               
            </table>
           
        </div>
        <!--
        <div class="sixth-row">
            <div class="pay-method">
                <p>payment method</p>
                <div class="input-pay-method">
                    <input type="radio" name="pay" id="cod"><b> COD <br>
                    <input type="radio" name="pay" id="online"> Online Payment</b>
                </div>
            </div>   
        </div>-->
            <div class="button">
                <input type="submit" class="btn" value="Proceed" name="Proceed" >
            </div>
           
            </form> 
            
            <?php 
            if(isset($_REQUEST['Proceed'])) {
		  $_SESSION['sessioncode'] =$_POST['code']; 
          $_SESSION['sessiontotal']=$_POST['total_price'];
	  }
   ?>
            
    </div>

    <?php
        include_once('chat.php');
    ?>
    <script>
        
function closePopup(){
    popup.classList.remove("open-popup");
}
 function checkout(){
    if(!document.checkForm.cardName.value.match(/^[A-Za-z" "]+$/)){
        document.getElementById("result1").innerHTML="Enter the correct name";
        return false;
    }
    else if(isNaN(document.checkForm.phone_1.value)){
        document.getElementById("result3").innerHTML="Enter only numeric values";
        return false;
    }
    else if(document.checkForm.phone_1.value.length!=10){
        document.getElementById("result3").innerHTML="Enter 10 numerical values";
        return false;
    }
    else if(isNaN(document.checkForm.phone_2.value)){
        document.getElementById("result3").innerHTML="Enter only numeric values";
        return false;
    }
    else if(document.checkForm.phone_2.value.length!=10){
        document.getElementById("result3").innerHTML="Enter correct number";
        return false;
    }
    else if(document.checkForm.phone_1.value==document.checkForm.phone_2.value){
        document.getElementById("result3").innerHTML="same phone number can,t add";
        return false;
    }
 }
    </script>
    
</body>
</html>