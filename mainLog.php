<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="mainStyle.css">
     
      <!--icons-->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>
<body>
    <!--navigation bar-->
    <header>
        <div class="navbar">
            <div class="logo"> 
                
                <a href="main.php" class="header_logo"><img src="./images/logo.jpg" alt=""></a>
            </div>
            <ul class="links">
                <li><a href="clothes.php">Clothes</a></li>
                <li><a href="##">Dilivery Status</a></li>
                <li><a href="#review">Reviews</a></li>
                <li><a href="#">Contact Us</a></li>
            </ul>
            <?php
				$count=0;
				if(isset($_SESSION['cart']))
				{
					$count=count($_SESSION['cart']);
				}
			?>
            <div class="icons">
                <i class="fas fa-shopping-cart" id ="cart-btn">- <?php echo $count ?></i>
                <a href="form-registration.php"><i class="fa fa-sign-out" id ="login-btn"></i></a>
                </div>
                <div class="toggle-btn">
                    <i class="fas fa-bars" id ="menu-btn"></i>
                </div>
            <div class="drop-down ">
                    <li><a href="##">Clothes<a href=""></a></li>
                    <li><a href="##">Dilivery Status<a href=""></a></li>
                    <li><a href="##">Contact Us<a href=""></a></li>
            </div>
        </div>
    </header>

    <!--shopping cart-->
       
		<div class="cart">
     
            <h2 class="cart-title"> MY CART</h2><hr class="hr-cart">
            <div class="cart-content">
                <div class="cart-box">
                    <table width="100%">
                        <thead width="100%">
                            <tr>
                                
                                <th>item code</th>
                                <th>price</th>
                            
                                <th>quantity</th>
                            </tr>
                        </thead>
                        <tbody>
					<?php
						$total=0;
						if(isset($_SESSION['cart'])){
							foreach($_SESSION['cart']as $key=> $value)
							{
                                
								$total+=$value['sprice']*$value['Quantity'];
							
								
							
								echo"
									<tr>
										
										<td>$value[proCode]</td>
										<td>$value[sprice]<input type='hidden' value='$value[sprice]'></td>
                                        <td> <input type='number' value='$value[Quantity]' min='1' class='cart-quantity'></td>
                                        <input type='hidden' value='$value[proName]'>
										<td>
										<form action='manageCart.php' method='POST'>
											<button class='fa fa-trash' name='btnRemove'></button>
											
											<input type='hidden' name='proCode' value='$value[proCode]'>
										</form>
									</tr>
								";
								
							}
						}
					?>
						
					</tbody>
				</table>
                </div>
                
            </div>
                <!--sub total-->
                <div class="total">
                    <div class="total-title">Total</div>
                    <div class="total-price">Rs.<?php echo $total ?></div>
                </div>
                <div class="cart-note">
                    <br>
                    <p> you can select size & Shipping, taxes, and discount codes calculated at checkout.</p>
                   
                </div>
                <!--checkout btn-->
                <?php 
						if($total>0){
					?>		
						<button type="button" class="check-btn"><a href="checkout.php"> Checkout</button></a>
						
					<?php 
						}
					?>
					
                
                <!--cart close-->
                <div class="cart-close">
                    <i class="fa fa-times" aria-hidden="true" id="cart-close"></i>
                </div>
        </div>
            
        <script src="main.js"></script> 
    </body>
</html>