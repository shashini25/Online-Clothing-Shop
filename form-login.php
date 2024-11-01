
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="formstyle.css">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    
</head>
<body>
  
    <!--create login form-->
    <div class="container">
        <div class="form-box">
            <form action="" method="POST" enctype="multipart/form-data"onsubmit="return loginValidation()">
                <h2> Login</h2>
                
                <div class="input-box">
                    <i class='bx bxs-envelope'></i>
                    <input type="email" name="email"placeholder="Email" >
                    <div class="error">
                        <p id="result6"> </p>
                    </div>
                </div>

                <div class="input-box">
                    <i class='bx bxs-lock'></i>
                    <input type="password" name="password" placeholder="Password" >
                    <div class="error">
                        <p id="result7"> </p>
                    </div>
                </div>
                <!--
                <div class="group">
                    <span><div class="check-box">
                        <input type="hidden" name="re-check"> 
                    </div></span>
                    <span><a href="forget-password.php" forget_password>Forget Password</a></span>
                    
                </div>-->
                <div class="button">
                    <input type="submit" class="btn" name="login" value="Login"onclick="loginValidation()">
                </div>
                <div class="link">
                    <p> Do not have an account</p>
                    <span> <center>
                    <a href="form-registration.php " Register>Register</a></span></center>
                </div>
            </form>
        </div>
    </div>
    <script src="form.js"></script> 
</body>
</html>          
<?php 
    session_start();
    include "connection.php";
    if(isset($_POST['login'])){
        $email = $_POST['email'];
       $passHashed=md5($_POST['password']);
        $sql= "SELECT * FROM users WHERE email='$email' AND password=' $passHashed'";
       $result=mysqli_query($con,$sql);
        if(mysqli_num_rows($result) ===1){
            $_SESSION['email']=$email;
           
            header("Location: main.php");
        }else{
?>
        <script>
            sweetAlert("INVALID", "Check your email or password", "error");
            
        </script>
    
    <?php

    }
}
?>    
        
