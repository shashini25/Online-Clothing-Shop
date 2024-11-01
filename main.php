<?php
require 'connection.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="mainStyle.css">
    <!--swiper js-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
    <!--icons-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/zuck.js/2.1.0/zuck.min.js"></script>

</head>

<body>
    <!--navigation bar-->
    <?php
    include_once('nav.php')
        ?>
    <!--header image-->
    <section id="hero">
        <h2>&nbsp&nbsp&nbsp&nbsp &nbsp &nbsp &nbsp Shape your unique suit <br>&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp with<br>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp fashion destination</h2>

        <h4>Checkout this chance</h4>
        <div class="logBtn">
            <a href="form-login.php"><button>Login</button></a>
        </div>

    </section>

    <!--features section-->
    <section id="feature" class="section-p1">
        <div class="fe-box">
            <img src="images/delivery.png">
            <h4> Island wide Delivery</h4>
        </div>
        <div class="fe-box">
            <img src="images/cashon.png">
            <h4> Cash on Delivery</h4>
        </div>
        <div class="fe-box">
            <img src="images/secure-pay.png">
            <h4> Secure Payments</h4>
        </div>
        <div class="fe-box">
            <img src="images/unique1.jpg">
            <h4> Unique Design</h4>
        </div>
        
    </section>
    <!--product-->
    <section id="product1" class="section-p1">
        <h2>Shape your </h2>
        <p>unique suit
                      with
          fashion destination</p>

        <div class="pro-container">
            <?php
            $select_pro = mysqli_query($con, "SELECT * FROM `product`ORDER BY pro_id DESC LIMIT 4");
            if (mysqli_num_rows($select_pro) > 0) {
                while ($fetch_pro = mysqli_fetch_assoc($select_pro)) {
                    ?>
                    <div class="pro">
                        <img src="admin-panel/uploaded_img/<?php echo $fetch_pro['proPic']; ?>">
                        <div class="pro1">
                            <h5>
                                <?php echo $fetch_pro['proName']; ?>
                            </h5>
                        </div>
                        <h4>Rs:
                            <?php echo $fetch_pro['sprice']; ?>
                        </h4>
                        <div class="btnQuick">
                            <a href="singleClothe.php?id=<?php echo $fetch_pro['pro_id']; ?>"><button class="btn-buy">Quick view
                                </button></a>
                        </div>

                    </div>

                    
                    <?php
                }
                ;
            }
            ;
            ?>
        </div>
    </section>

    <!--about us-->
    <section id="about" class="section-p1">
        <div class="about-container">
            <h2>about us</h2>
            <h6>Welcome to Mandi Fashion🌸</h6>

            <p class="section-p1">

                <span> M</span>andi Fashion is dedicated to providing trendy and stylish clothing options for the 
                fashion-forward women in your life. Our mission is to empower women to express their unique personalities
                 through their clothing choices. We understand that every woman is special and has her own individual style. 
                 That’s why we offer a wide range of clothing options to suit various tastes and preferences. We have everything 
                 you need to create the perfect wardrobe.<br><br>
                 Our collection is not only fashionable but also age-appropriate. We prioritize comfort and quality, using only 
                 premium fabrics that are gentle on your skin. We believe that clothing should not only look good but also feel 
                 good, allowing you to move and live freely. We also offer detailed size charts and product descriptions, ensuring 
                 that you make the right choice for your needs. <br><br>
                 Customer satisfaction is our top priority, and we go above and beyond to ensure that you are happy with your purchase.
                  Our dedicated customer service team is always ready to assist you with any questions or concerns you may have.
                   We value your feedback and continuously work towards improving our products and services.<br><br>

                   Thank you for choosing Mandi Fashion as your go-to destination for stylish clothing. We hope that our collection 
                   inspires you to embrace your unique style and feel confident in your own skin. Start exploring our website today and 
                   let your fashion journey begin!

        </div>


    </section>


    <!--reveiw section-->
    <section id="review" class="section-p1">
        <h2>Reviews</h2>
        <p id="p">what client say about us</p>
        <div class="review-container">
            <div class="swiper review-slider js-review-slider">
                <div class="swiper-wrapper">
                    <?php
                    $select_com = mysqli_query($con, "SELECT * FROM `review`");
                    if (mysqli_num_rows($select_com) > 0) {
                        while ($fetch_com = mysqli_fetch_assoc($select_com)) {
                            ?>
                            <div class="swiper-slide reveiw-content">

                                <div class="client-name">
                                    <h6>
                                        <?php echo $fetch_com['name']; ?>
                                    </h6>
                                </div>
                                <div class="client-star">
                                    <?php
                                    $count = 1;
                                    while ($count <= 5) {
                                        if ($fetch_com['star'] >= $count) {
                                            ?>
                                            <i class="fa fa-star"></i>
                                            <?php
                                        } else {
                                            ?>
                                            <i class="fa-star-o"></i>
                                            <?php
                                        }
                                        $count++;
                                    }
                                    ?>


                                </div>
                                <div class="review-para">
                                    <p>
                                        <?php echo $fetch_com['comment'] ?>
                                    </p>
                                </div>
                            </div>
                            <?php
                        }
                    }
                    ?>
                </div>
                <div class="swiper-pagination js-testimonials-pagination"></div>
            </div>
        </div>
        <a href='review.php'><I> Reveiw </I></a>

    </section>
    <section id="contact" class="section-p1">
        <h2>Contact Us</h2>
        <p>we are here to resolve your doughts</p>
        <center>
            <table>
                <tr>
                    <th><i class="fa fa-location-dot"></i></th>
                    <td>381/1,Aththidiya,Dehiwala</td>
                </tr>
                <tr>
                    <th><i class="fa fa-phone"></i></th>
                    <td>0700000000</td>
                </tr>
                <tr>
                    <th><i class="fa fa-envelope"></i></i></td>
                    <td>mandifashion@gmail.com
                    </td>
                </tr>
        </center>
        </table>
    </section>
    <!--footer-->

    <?php
    include_once('footer.php');
    include_once('chat.php');
    ?>
    <script src="main.js"></script>
    <!--review-->
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
    <script>
        const swiper = new Swiper('.js-review-slider', {
            grabCursor: true,
            spaceBetween: 50,
            pagination: {
                el: '.js-testimonials-pagination',
                clickable: true
            },
            breakpoints: {
                767: {
                    slidesPerView: 4
                }
            }
        })
    </script>
</body>

</html>