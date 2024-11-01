<?php
    require 'connection.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>clothes</title>
    <link rel="stylesheet" href="mainStyle.css">
    <link rel = "stylesheet" href = "https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    
</head>
<body>
    
<!--navigation bar-->
    <?php 
        include_once('nav.php')
    ?>
    <!--product-->
    <section id="product1"class="section-p1">
        <h2>Feature Product</h2>
        <p>Shape your unique suit with fashion destination</p>
       
        <div class="pro-container">
        <?php
      
      $select_pro = mysqli_query($con, "SELECT * FROM `product`");
      if(mysqli_num_rows($select_pro) > 0){
         while($fetch_pro = mysqli_fetch_assoc( $select_pro)){
      ?>
            <div class="pro">
                <img src="admin-panel/uploaded_img/<?php echo $fetch_pro['proPic']; ?>" >
                    <div class="pro1">
                        <h5><?php echo $fetch_pro['proName']; ?></h5>
                    </div>  
                <h4>Rs: <?php echo $fetch_pro['sprice']; ?></h4>
                <a href="singleClothe.php?id=<?php echo $fetch_pro['pro_id']; ?>"><button class="btn-buy">Quick view </button></a>
            </div>
            <!--<div class="pro">
                <img src="images/pro1.jpg" >
                <div class="pro1">
                    <h5>Off-Shoulder Frock</h5>
                </div>  
            <h4>Rs: 1000 <I>onwards</I></h4>
            </div>
            <div class="pro">
                <img src="images/pro1.jpg" >
                <div class="pro1">
                    <h5>Off-Shoulder Frock</h5>
                </div>  
            <h4>Rs: 1000 <I>onwards</I></h4>
            </div><div class="pro">
                <img src="images/pro1.jpg" >
                <div class="pro1">
                    <h5>Off-Shoulder Frock</h5>
                </div>  
            <h4>Rs: 1000 <I>onwards</I></h4>
            </div>
            <div class="pro">
                <img src="images/pro1.jpg" >
                <div class="pro1">
                    <h5>Off-Shoulder Frock</h5>
                </div>  
            <h4>Rs: 1000 <I>onwards</I></h4>
            </div>
            <div class="pro">
                <img src="images/pro1.jpg" >
                <div class="pro1">
                    <h5>Off-Shoulder Frock</h5>
                </div>  
            <h4>Rs: 1000 <I>onwards</I></h4>
            </div>
            <div class="pro">
                <img src="images/pro1.jpg" >
                <div class="pro1">
                    <h5>Off-Shoulder Frock</h5>
                </div>  
            <h4>Rs: 1000 <I>onwards</I></h4>
            </div><div class="pro">
                <img src="images/pro1.jpg" >
                <div class="pro1">
                    <h5>Off-Shoulder Frock</h5>
                </div>  
            <h4>Rs: 1000 <I>onwards</I></h4>
            </div>-->
            <?php
				 };
			  };
			?>
        </div>
    </section>
    
      <!--footer-->
      <?php 
        include_once('footer.php');
        include_once('chat.php');
    ?>
    <script src="main.js"></script> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
</body>
</html>