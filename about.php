<?php

@include 'config.php';

session_start();

$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:login.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>about</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<?php include 'header.php'; ?>

<section class="about">

   <div class="row">

      <div class="box">
         <img src="images/about-img-1.png" alt="">
         <h3>why choose us?</h3>
         <p>We prioritize customer satisfaction above all else. With our user-friendly interface and secure payment options, 
            shopping with us is not only convenient but also safe and reliable. Our dedicated team works tirelessly to ensure 
            that your orders are fulfilled promptly and accurately, and our responsive customer support is always available to 
            assist you with any queries or concerns you may have. Trust us to deliver fresh, top-notch groceries right to your doorstep, saving you time and hassle.</p>
         <a href="contact.php" class="btn">contact us</a>
      </div>

      <div class="box">
         <img src="images/about-img-2.png" alt="">
         <h3>what we provide?</h3>
         <p>We offer a comprehensive selection of grocery items, including fresh produce, pantry staples, household essentials, 
            and specialty products to cater to all your culinary needs. Whether you're stocking up on weekly essentials or searching 
            for unique ingredients for your next culinary adventure, you'll find everything you need at your Online Grocery Store. 
            With our commitment to quality, convenience, and exceptional customer service, we strive to make your shopping experience 
            as enjoyable and effortless as possible. Experience the convenience of online grocery shopping with us today!</p>
         <a href="shop.php" class="btn">our shop</a>
      </div>

   </div>

</section>











<?php include 'footer.php'; ?>

<script src="js/script.js"></script>

</body>
</html>