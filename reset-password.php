
<?php
require('connection.php');
if(isset($_GET['email']) && isset($_GET['resetToken'])){
    date_default_timezone_set('Asia/Colombo');
    $date=date("y-m-d");
    $query="SELECT * FROM `users` WHERE `email`='$_GET[email]' AND `resetToken`='$_GET[resetToken]' AND `tokenExpire`='$date'";
    $result=mysqli_query($con,$query);
    if ($result) {
       if (mysqli_num_rows($result)==1) {
            require_once('update-password.php');
       }else{
        echo"
        <script>
        alert('invalid or expired link');
        </script>
        ";
       }
    }else{
        echo"
        <script>
        alert('Sever Down try again later');
        </script>
        ";
    }
}
#update

if (isset($_POST['updatePas'])) {
    $password=$_POST['password'];
    $cpassword = $_POST['cpassword'];
    if($password===$cpassword){
       // $hashedPass=md5($password);
        $update="UPDATE `users` SET `password`='$password',`resetToken`=NULL,`tokenExpire`=NULL WHERE email='$_GET[email]'";
       if (mysqli_query($con,$update)){
            echo"
            <script>
                alert('your password sucessfully updated');
                window.location.href='form-login.php';
            </script>
            ";
        }else{
            echo"
                <script>
                    alert('query werdi');
                </script>
            ";
        }

    }else{
        echo"
        <script>
        alert('werdi');
        </script>
        ";
    }
}
?>
