<?php
require 'connection.php'; 

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>single product</title>
    <link rel="stylesheet" href="mainStyle.css">
    <link rel = "stylesheet" href = "https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    
</head>
<body>
   <!--navigation bar-->
   <?php 
        include_once('nav.php');

    ?>
    
     <!--single product section-->     
     <form action="manageCart.php" method="POST">  
     <section id="proDetails" class="section-p1">
        <?php
            if(isset($_GET['id'])){
                $pro_id = $_GET['id'];
                $query = mysqli_query($con, "SELECT * FROM `product` WHERE pro_id = $pro_id");
                if(mysqli_num_rows($query) > 0){
                   while($fetch = mysqli_fetch_assoc($query)){
        ?>
      
        <div class="single-pro-image">
            <img src="admin-panel/uploaded_img/<?php echo $fetch['proPic']; ?>"height="50%">
        </div>
        <div class="single-pro-details">

        <input type="hidden" name="proId" value="<?php echo $fetch['pro_id']; ?>">
            
            <h2><input type="hidden" name="proName" value="<?php echo $fetch['proName']; ?>"><?php echo $fetch['proName']; ?></h2>
            
            <h4><input type="hidden" name="proCode" value="<?php echo $fetch['proCode']; ?>"><?php echo $fetch['proCode']; ?></h4>
            <a href='#size'>Size chart</a>
            <br><p><b>please select the size with size chart before select the size</b></p>
            
                <SELECT name="size" required>
                    <option value="">Select size</option>
                    <option value="XS">XS</option>
                    <option value="S">S</option>
                    <option value="M">M</option>
                    <option value="L">L</option>
                    <option value="XL">XL</option>
                    <option value="XXL">XXL</option>
                    <option value="XXXL">XXXL</option>
                    
                    
                </SELECT>
                
              <h4>Quantity : <input type="number" name="qty" class="input-name" min="1" max="99"  required></h4>
            <h3><input type="hidden" name="sprice" value="<?php echo $fetch['sprice']; ?>">Rs.<?php echo $fetch['sprice']; ?></h3>
            
            <button type="submit" class="singel-product-btn" name="addCart">Add to cart</button>
            <h4>Details:</h4>
            <span>
                
                Please bear in mind that the photo may be slightly different from the actual item in terms of colour due to lighting conditions or the display used to view 
                <br><br><b>
                Wash And Care :</b> Hand wash with cold water, Wash inside out dark colors separately, Dry in a shade</span>
            <h4>Note:</h4>
            <span>for more details: <a href="privacy.php"><b></b>privacy and policy</a></span>
        </div>
   
    </section>
    </form>
    <!--*************************size chart*********************************-->
<section id="size">
        
        <div class="size-chart">
          <center>  <h2>Size chart</h2>
            <table border="1">
                <thead>
                    
                    <th>chest</th>
                    <th>Waist</th>
                    <th>shoulder</th>
                    <th>shoulder to waist</th>
                    <th>frock full length</th>
                    <th>Blouse full length</th>
                    <th>trouser full length</th>
                    <th>short full length</th>
                    <th>Skirt full length</th>
                </thead>
                <tbody align="center">
                    <tr>
                        
                        <td>31</td>
                        <td>24</td>
                        <td>13.5</td>
                        <td>5</td>
                        <td>15</td>
                        <td>7</td>
                        <td>11</td>
                        <td>7</td>
                        <td>8</td> 
                    </tr> 
                    <tr>
                        
                        <td>32</td>
                        <td>25</td>
                        <td>14</td>
                        <td>6</td>
                        <td>17</td>
                        <td>8</td>
                        <td>14</td>
                        <td>8</td>
                        <td>9</td> 
                    </tr>
                    <tr>
                    
                        <td>33</td>
                        <td>26</td>
                        <td>14.5</td>
                        <td>7</td>
                        <td>18</td>
                        <td>9</td>
                        <td>15</td>
                        <td>9</td>
                        <td>10</td> 
                    </tr>   
                    <tr>
                        
                        <td>34</td>
                        <td>27</td>
                        <td>15</td>
                        <td>8</td>
                        <td>20</td>
                        <td>10</td>
                        <td>16</td>
                        <td>10</td>
                        <td>11</td> 
                    </tr>   
                    <tr>
                        
                        <td>35</td>
                        <td>28</td>
                        <td>15.5</td>
                        <td>9</td>
                        <td>22</td>
                        <td>11</td>
                        <td>18</td>
                        <td>10.5</td>
                        <td>11.5</td> 
                    </tr>   
                    <tr>
                        
                        <td>36</td>
                        <td>29</td>
                        <td>16</td>
                        <td>10</td>
                        <td>24</td>
                        <td>12</td>
                        <td>20</td>
                        <td>11</td>
                        <td>12</td> 
                    </tr>   
                    <tr>
                        
                        <td>37</td>
                        <td>30</td>
                        <td>16.5</td>
                        <td>11</td>
                        <td>26</td>
                        <td>13</td>
                        <td>22</td>
                        <td>11.5</td>
                        <td>13</td> 
                    </tr>   
                    <tr>
                        
                        <td>38</td>
                        <td>31</td>
                        <td>17</td>
                        <td>11.5</td>
                        <td>27</td>
                        <td>14</td>
                        <td>24</td>
                        <td>12</td>
                        <td>14</td> 
                    </tr>   
                    <tr>
                        
                        <td>39</td>
                        <td>32</td>
                        <td>18</td>
                        <td>12</td>
                        <td>28</td>
                        <td>15</td>
                        <td>26</td>
                        <td>13</td>
                        <td>15</td> 
                    </tr>   
                    <tr>
                    
                        <td>40</td>
                        <td>33</td>
                        <td>18.5</td>
                        <td>12.5</td>
                        <td>30</td>
                        <td>16</td>
                        <td>28</td>
                        <td>14</td>
                        <td>16</td> 
                    </tr>      
                </tbody>
            </table>
           
            
        </div>
        <?php
            };
         };
         echo "<script>document.querySelector('.edit-form-container').style.display = 'flex';</script>";
      };
   ?>
    </section>
    
    <!--product-->
    <!--<section id="product1"class="section-p1">
        <h2>Feature Product</h2>
        <p>Dress your cutie as a Princess</p>
        <div class="pro-container">
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
            </div>
        </div>
    </section>-->
    
      <!--footer-->
      <?php 
        include_once('chat.php')
    ?>
    <script src="main.js"></script> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
</body>
</html>