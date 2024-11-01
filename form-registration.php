
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>register</title>
    <link rel="stylesheet" href="formstyle.css">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    
</head>
<body>
    
    <!--create registration form-->
    <div class="container">
        <div class="form-box">
            <form action="" name="formfill" method="POST" enctype="multipart/form-data" onsubmit="return validation()">
                <h2> Register</h2>
                <!--<p id="result"> </p>-->
                <div class="input-box">
                    <i class='bx bxs-user'></i>
                    <input type="text" name="userName"placeholder="User Name" >
                    <div class="error">
                        <p id="result1"> </p>
                    </div>
                </div>
                
               <div class="input-box">
                    <i class='bx bxs-envelope'></i>
                    <input type="text" name="email"placeholder="Email" >
                    <div class="error">
                        <p id="result2"> </p>
                    </div>
                </div>
                
                <div class="input-box">
                    <i class='bx bxs-phone'></i>
                    <input type="text" name="phoneNum"placeholder="Phone number" >
                    <div class="error">
                        <p id="result3"> </p>
                    </div>
                </div>
                <div class="input-box">
                    <i class='bx bxs-lock'></i>
                    <input type="password" name="password"placeholder="Password" >
                    <div class="error">
                        <p id="result4"> </p>
                    </div>
                </div>
                <div class="input-box">
                    <i class='bx bxs-lock'></i>
                    <input type="password" name="cpassword"placeholder="Confirm Password" >
                    <div class="error">
                        <p id="result5"> </p>
                    </div>
                </div>
                
               <!-- <div id="message">
                    <h3>Password must contain the following:</h3>
                    <p id="letter" class="invalid">A lowercase letter</p>
                    <p id="capital" class="invalid">A capital (uppercase)letter</p>
                    <p id="number" class="invalid">A number</p>
                    <p id="length" class="invalid">Minimum 8 characters</p>
                  </div>-->
                <div class="button">
                    <input type="submit" class="btn" onclick="validation()"value="Register" name="register">
                </div>
                
                <div class="link">
                    <p> Already Have an Account</p>
                    <center>
                    <span><a href="form-login.php">Login</a></span></center>
                    
                </div>
            </form>
        </div>
        <!--create popup message-->
        <div class="popup" id="popup">
            <img src="images/correct2.png">
            <h2> Thank you!</h2>
            <p> Sucessfully Registerd.<br> Thank You for been our valued customer.<br>Keep shopping With Us.</p>
            <a href="form-login.php"> 
                <button onclick="closePopup()">OK</button>
            </a>
        </div>
    </div>
    <script src="form.js"></script> 
</body>
</html>
<?php
    require ('connection.php');
    
    
	if(isset($_POST['register']))
	{
		$userName=$_POST['userName'];
		$email=$_POST['email'];
		$phoneNum=$_POST['phoneNum'];
		$password=$_POST['password'];
       $passHashed=md5($password);

       $select="SELECT *FROM users WHERE email='$email'";
	   $result=mysqli_query($con, $select);

	   if(mysqli_num_rows($result)>0){
		echo"
		<script>
			alert('user already exists');
			window.location.href='form-registration.php';
		</script>";
       }else{
        $sql ="INSERT INTO `users`(`userName`, `email`, `phoneNum`, `password`) 
        VALUES ('$userName','$email','$phoneNum',' $passHashed')";
        $insertQuery=mysqli_query( $con,$sql);
	 
         if($insertQuery){
        ?>
        <script>
            document.getElementById("popup").classList.add("open-popup");
        /*swal({
            title: "Good job!",
            text: "You clicked the button!",
            icon: "success",
            button: "Aww yiss!",
          });*/
        </script>
    
    <?php
    }
}
}
?>