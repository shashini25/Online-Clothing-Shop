<?php 
include "connection.php";
  if(isset($_POST['login'])){
    $email = $_POST['email'];
    $passHashed=md5($_POST['password']);
    $sql= "SELECT * FROM users WHERE email='$email' AND password=' $passHashed'";
    $result=mysqli_query($con,$sql);
    if(mysqli_num_rows($result) ===1){
      
      header("Location: main.php");
    }else{
      ?>
        <script>
            
        swal({
            title: "Good job!",
            text: "You clicked the button!",
            icon: "success",
            button: "Aww yiss!",
          });
        </script>
    
    <?php

    }
    



  }else{
    header("Location: form-login.php?error");
    exit();
  }
?>    