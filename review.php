<?php
    require"connection.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>payment</title>
    <link rel="stylesheet" href="review.css">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <link rel = "stylesheet" href = "https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <div class="payment-container">
        <form action="" name="payForm" method="POST">
        <h1>Reveiw US</h1>
        <hr>
        
        <div class="first-row">
            <div class="name">
                <p>Name</p>
                <div class="input-name">
                    <input type="text" name="name" required>
                    
                </div>
                
            </div>
        </div>
        <div class="second-row">
            <div class="card-number">
                <p>Give number between 1-5 </p>
                <div class="input-number">
                    <input type="number" name="star" min="1" max="5" required>
                    
                </div>
            </div>
        </div>
            <div class="comment-row">
                <p>comment</p>
                    <div class="input-cvv">
                        <textarea name="comment" rows="4" cols="70%" required>
                    </textarea>
                    </div>
                
            </div>
        
       
            <div class="button">
                <input type="submit" class="btn" name="btn-comment" value="comment">
                
        </div>
</form>
<a href="main.php"><Button class="btn">Back</Button>
<?php
    if(isset($_POST['btn-comment'])){

        $name=$_POST['name'];
        $star=$_POST['star'];
        $comment=$_POST['comment'];

        $sql="INSERT INTO `review`(`name`, `star`, `comment`) 
        VALUES ('$name','$star','$comment')";
        $query=mysqli_query($con,$sql);
       if($query){
        ?>
         <script>
            swal({ 
                title: "THANK YOU!",
            text: "your valuble review",
            icon:"success",
            type: "success"}).then(okay => {
            if (okay) {
                window.location.href = "main.php";
            }
            });
                
        </script>
        <?php
       }
    }

?>
</body>
</html>