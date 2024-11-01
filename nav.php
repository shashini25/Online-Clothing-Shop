<?php
include 'connection.php';
session_start();

if (isset($_SESSION['email'])) {
    $emailAddres = $_SESSION['email'];

    $query = "SELECT * FROM users WHERE email='$emailAddres'";
    $result = mysqli_query($con, $query);
    $row = mysqli_fetch_assoc($result);
    $userId = $row['user_id'];

}

if (isset($_POST['btnRemove'])) {
    $cart_id = $_POST['cart_id'];
    $delete_query = mysqli_query($con, "DELETE FROM `cart` WHERE id = $cart_id ") or die('query failed');
    echo "
    <script>
        alert('item deleted');
        window.location.href='main.php';
    </script>";
}
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body>
    <!--navigation bar-->
    <header>
        <div class="navbar">
            <div class="logo">

                <a href="main.php" class="header_logo"><img src="./images/logo 1.jpg" alt=""></a>
            </div>
            <ul class="links">
                <li><a href="clothes.php">Clothes</a></li>
                <li><a href="main.php">About Us</a></li>
                <li><a href="main.php">Reviews</a></li>
                <li><a href="main.php"#contact>Contact Us</a></li>
            </ul>

            <div class="icons">
                <?php
                if (isset($_SESSION['email'])) {
                    ?>
                    <i class="fas fa-shopping-cart" id="cart-btn">
                   
                    </i>
                <?php } ?>
                <?php
                if (isset($_SESSION['email'])) {
                    ?>
                    <a href="logout.php"><i class="fa fa-sign-out" id="login-btn"></i></a>
                <?php } ?>
            </div>
            <div class="toggle-btn">
                <i class="fas fa-bars" id="menu-btn"></i>
            </div>
            <div class="drop-down ">
                <li><a href="##">Clothes</a></li>
                <li><a href="##">Delivery Status</a></li>
                <li><a href="##">Contact Us</a></li>
            </div>
        </div>
    </header>

    <!--shopping cart-->

    <div class="cart">

        <h2 class="cart-title"> MY CART</h2>
        <hr class="hr-cart">
        <div class="cart-content">

            <table width="100%" >
                <thead width="100%">
                    <tr style="background-color:rgb(241, 171, 238)">
                        <th>item name</th>
                        <th>item code</th>
                        <th>size</th>
                        <th>quantity</th>
                        <th>price</th>

                    </tr>
                </thead>
                <tbody>
                    <?php
                    @include 'connection.php';
                    $total = 0;
                    $select = "SELECT * FROM cart WHERE user_id='$userId'";
                    $result = mysqli_query($con, $select);
                    if (!$result) {
                        die("invalid query:" . mysqli_connect_error());
                    }
                    while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                        <tr style="background-color: rgb(252, 203, 249);">

                            <td align='center'>
                                <?php echo $row['proName']; ?>
                            </td>
                            <td align='center'>
                                <?php echo $row['proCode']; ?>
                            </td>
                            <td align='center'>
                                <?php echo $row['size']; ?>
                            </td>
                            <td align='center'>
                                <?php echo $row['quantity']; ?>
                            </td>
                            <td align='center'>
                                <?php $price = $row['price'];
                                echo $price; ?>
                            </td>



                            <td>
                                <form action='' method='POST'>
                                    <input type="hidden" name="cart_id" value="<?php echo $row['id']; ?>">
                                    <button class='fa fa-trash' name='btnRemove' style="border:none;"></button>


                                </form>
                        </tr>
                        <?php
                        $total += $price;
                    } ?>


                </tbody>
            </table>


        </div>
        <!--sub total-->
        <div class="total">
            <div class="total-title">Total</div>
            <div class="total-price" id='total' class='total'>Rs.
                <?php echo $total ?>
            </div>


        </div>
        <div class="cart-note">
            <br>
            <p>Shipping, taxes, and discount codes calculated at checkout.</p>

        </div>
        <!--checkout btn-->

        <?php
        if ($total > 1) { ?>
            <a href="checkout.php"><button type="button" class="check-btn"> Checkout</button></a>
        <?php }
        ?>
        <!--			
        <script>
          var gt=0;
            var iprice=document.getElementsByClassName('iprice');
            var iquantity=document.getElementsByClassName('iquantity');
            var itotal=document.getElementsByClassName('itotal');
            var gTotal=document.getElementById('total');

            function subTotal(){
                gt=0;
                for(i=0;i<iprice.length;i++){

                    itotal[i]=(iprice[i].value)*(iquantity[i].value);
                    gt=gt+(iprice[i].value)*(iquantity[i].value);
                }
                total.innerText=gt;
            }
        subTotal();
        </script>-->

        <!--cart close-->
        <div class="cart-close">
            <i class="fa fa-times" aria-hidden="true" id="cart-close"></i>
        </div>
    </div>

    <script src="main.js"></script>
</body>

</html>