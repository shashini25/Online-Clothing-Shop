
<html>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Reset Password</title>
<link rel="stylesheet" href="formstyle.css">
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

</head>
<body>

<!--create registration form-->
    <div class="container">
        <div class="resetPass-box">
            <form action="" method="POST" name="formfill" method="POST" enctype="multipart/form-data" >
                <h2> Reset Password</h2>
                <!--<p id="result"> </p>-->
                
                <div class="input-box">
                    <i class='bx bxs-lock'></i>
                    <input type="password" name="password"placeholder="New Password" required >
                    <div class="error">
                        <p id="result4"> </p>
                    </div>
                </div>
                <div class="input-box">
                    <i class='bx bxs-lock'></i>
                    <input type="password" name="cpassword"placeholder="Confirm Password" required >
                    <div class="error">
                        <p id="result5"> </p>
                    </div>
            </div> 
                <div class="button">
                    <input type="submit" class="btn" value="Reset Password" name="updatePas">
                </div>
            </form>
        
                    
        </div>
    </div>
</body>
</html>                