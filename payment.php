<?php 
session_start();
   require 'connection.php'; 

   if(isset($_SESSION['email'])){
	$emailAddres=$_SESSION['email']; 

	$query="SELECT * FROM users WHERE email='$emailAddres'";
	$result=mysqli_query($con,$query);
	$row=mysqli_fetch_assoc($result); 
	$userId=$row['user_id'];
  
}

 
   $code=$_SESSION['sessioncode']; 

   $query="SELECT * FROM orders WHERE code='$code'";
   $result=mysqli_query($con,$query);
   $row=mysqli_fetch_assoc($result); 
   $orderId=$row['orderId'];
   $total=$row['total'];
   $date=$row['orderDate']; 


   if(isset($_POST['pay'])){
       $totalBill = $_POST['totalBill'];
		$cardName = $_POST["cardName"];
        $cardNumber = md5($_POST["cardNumber"]);
        $month=$_POST["months"];
        $year=$_POST["year"];
        $date=$month.$year;
        $exDate = md5($date);
		$cvv = md5($_POST["cvv"]); 

        $insert = "INSERT INTO `payment`(`orderId`, `user_id`, `totalBill`, `cardName`, `cardNumber`, `exDate`, `cvv`) VALUES ('$orderId','$userId','$totalBill','$cardName','$cardNumber','$exDate','$cvv')";
        mysqli_query($con, $insert); 

        echo"
          <script>
        alert('payment successfully!');
        window.location.href='invoice-paid.php?id=$orderId';
        </script>";
   }
 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>payment</title>
    <link rel="stylesheet" href="payment.css">
    <link rel = "stylesheet" href = "https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <div class="payment-container">
        <form action="" method="POST" name="payForm" onsubmit="return payValidation()">
        <h1>Confirm Your Order</h1>
        <hr>
        <h3>Transaction Details</h3>
        <div class="detail-row">
            <div class="date">
                <h4>Date: <?php  echo  $date;?></h4>
            </div>
            <div class="total">
                <h2>Rs.<?php  echo  $total;?><input type = "hidden" name="totalBill"  value="<?php  echo  $total;?>"></h2>
            </div>
        </div>
       
        <div class="first-row">
            <div class="name">
                <p>Name on Card</p>
                <div class="input-name">
                    <input type="text" name="cardName">
                    <div class="error">
                        <p id="result1"></p>
                    </div>
                </div>
                
            </div>
        </div>
        <div class="second-row">
            <div class="card-number">
                <p>Card Number</p>
                <div class="input-number">
                    <input type="text" name="cardNumber">
                    <div class="error">
                        <p id="result2"></p>
                    </div>
                </div>
            </div>
            <div class="cvv">
                <p>CVV</p>
                    <div class="input-cvv">
                        <input type="text" name="cvv">
                        <div class="error">
                            <p id="result3"></p>
                        </div>
                    </div>
                
            </div>
        </div>
        <div class="third-row">
            <p>Expire Date</p><br>
                <div class="selection">
                   <div class="exdate">
                    <select name="months" id="months">
                        <option value="">Months</option>
                        <option value="jan">Jan</option>
                        <option value="feb">Feb</option>
                        <option value="Mar">Mar</option>
                        <option value="Apr">Apr</option>
                        <option value="May">May</option>
                        <option value="Jun">Jun</option>
                        <option value="Jul">Jul</option>
                        <option value="Aug">Aug</option>
                        <option value="Sep">Sep</option>
                        <option value="Oct">Oct</option>
                        <option value="Nov">Nov</option>
                        <option value="Dec">Dec</option>
                    </select>
                    <select name="year" id="years">
                        <option value="">Years</option>
                        <option value="2023">2023</option>
                        <option value="2024">2024</option>
                        <option value="2025">2025</option>
                        <option value="2026">2026</option>
                        <option value="2027">2027</option>
                    </select>
                   </div>
                </div>
                <div class="error">
                    <p id="result4"></p>
                </div>
            </div>
            <div class="button">
                <input type="submit" class="btn" value="Pay" onclick="payValidation()" name="pay">
            
               
            </div>
</form>
    <!--create popup message-->
    
    
    
<?php
    include_once('chat.php');
?>
    
    <script>
        function payValidation(){
    if(document.payForm.cardName.value==""){
        document.getElementById("result1").innerHTML="please enter name on the card";
        return false;
    }
    else if(!document.payForm.cardName.value.match(/^[A-Za-z" "]+$/)){
         document.getElementById("result1").innerHTML="Enter the correct name";
        return false;
            }
    else if((document.payForm.cardNumber.value=="")){
        document.getElementById("result2").innerHTML="card number can't be empty";
        return false;
    }
    else if(isNaN(document.payForm.cardNumber.value)){
        document.getElementById("result2").innerHTML="Enter the correct card number";
        return false;
    }
    else if(document.payForm.cardNumber.value.length<12){
        document.getElementById("result2").innerHTML="Enter the correct card number";
        return false;
    }
    else if(isNaN(document.payForm.cvv.value)){
        document.getElementById("result3").innerHTML="Enter the correct cvv";
        return false;
    }
    else if(document.payForm.cvv.value.length<3){
        document.getElementById("result3").innerHTML="Enter the correct cvv";
        return false;
    }
    else if(document.payForm.months.value==""){
        document.getElementById("result4").innerHTML="select expire month";
        return false;
    }
    else if(document.payForm.year.value==""){
        document.getElementById("result4").innerHTML="select expire year";
        return false;
    }
    else{
        popup.classList.add("open-popup");
        return false;
    }

}
var popup=document.getElementById("popup");

    </script>

    </script>
</body>
</html>