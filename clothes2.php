
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



    <!--product-->
    <section id="product1"class="section-p1">
        <h2>Feature Product</h2>
        <p>Dress your cutie as a Princess</p>

       
        <div class="pro-container">
        <?php
require 'connection.php';
$select_products = mysqli_query($con, "SELECT * FROM `product`");
if(mysqli_num_rows($select_products) > 0){
   while($row = mysqli_fetch_assoc($select_products)){
?>
       
            <div class="pro" >
                <img src="images/pro2.jpg" >
                <h3>name</h3>
                <table>
                    <tr>
                        <td>linean material</td>
                        <td>red floral</td>
                    </tr>
                </table>
                <h5>Rs.4567</h5>
                <h6>Hand wash with cold water, Wash inside out dark colors separately, Dry in a shade
                    <br><br>you can customize colors and sizes at the chechout.
                </h6>
                <button class="btn-buy"><a href="singleClothe.php?id=<?php echo $row['pro_id']; ?>">Add to cart </a></button>
            </div>
            <!--<div class="pro" >
                <img src="images/pro2.jpg" >
                <h3>name</h3>
                <table>
                    <tr>
                        <td>linean material</td>
                        <td>red floral</td>
                    </tr>
                </table>
                <h5>Rs.4567</h5>
                <h6>Hand wash with cold water, Wash inside out dark colors separately, Dry in a shade
                    <br><br>you can customize colors and sizes at the chechout.
                </h6>
                <button class="btn-buy">Add to cart</button>
            </div>
            <div class="pro" >
                <img src="images/pro2.jpg" >
                <h3>name</h3>
                <table>
                    <tr>
                        <td>linean material</td>
                        <td>red floral</td>
                    </tr>
                </table>
                <h5>Rs.4567</h5>
                <h6>Hand wash with cold water, Wash inside out dark colors separately, Dry in a shade
                    <br><br>you can customize colors and sizes at the chechout.
                </h6>
                <button class="btn-buy">Add to cart</button>
            </div>
            <div class="pro" >
                <img src="images/pro2.jpg" >
                <h3>name</h3>
                <table>
                    <tr>
                        <td>linean material</td>
                        <td>red floral</td>
                    </tr>
                </table>
                <h5>Rs.4567</h5>
                <h6>Hand wash with cold water, Wash inside out dark colors separately, Dry in a shade
                    <br><br>you can customize colors and sizes at the chechout.
                </h6>
                <button class="btn-buy">Add to cart</button>
            </div>
            <div class="pro" >
                <img src="images/pro1.jpg" >
                <h3>name</h3>
                <table>
                    <tr>
                        <td>linean material</td>
                        <td>red floral</td>
                    </tr>
                </table>
                <h5>Rs.4567</h5>
                <h6>Hand wash with cold water, Wash inside out dark colors separately, Dry in a shade
                    <br><br>you can customize colors and sizes at the chechout.
                </h6>
                <button class="btn-buy">Add to cart</button>
            </div>-->
            <?php
            };    
            
            };
         ?>
        </div>
    </section>
   
      <!--footer-->
      
    <script src="main.js"></script> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
</body>
</html>