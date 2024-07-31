<?php
// Ensure session is started only once
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Include the database configuration file
include('config.php');

$userName = '';

// Check if the user is logged in
if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
    
    // Prepare the SQL query to fetch the user's details
    $query = "SELECT name FROM users WHERE id = :user_id";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
    $stmt->execute();
    
    // Fetch the result
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    
    if ($user) {
        // Store the user's name
        $userName = htmlspecialchars($user['name']);
    } else {
        echo 'User not found.';
    }
} else {
    echo 'User is not logged in.';
}
?>
<header class="header">

<div class="flex">

   <a href="admin_page.php" class="logo">Groco<span>.</span></a>

   <nav class="navbar">
      <a href="home.php">home</a>
      <a href="shop.php">shop</a>
      <a href="orders.php">orders</a>
      <a href="about.php">about</a>
      <a href="contact.php">contact</a>
   </nav>

   <div class="icons">
      <div id="menu-btn"class="fas fa-bars"></div>
      <div id="user-btn" class="fas fa-user"></div>
      <a href="search_page.php" class="fas fa-search"></a>
      <?php
         $count_cart_items = $conn->prepare("SELECT * FROM cart WHERE user_id = ?");
         $count_cart_items->execute([$user_id]);
         $count_wishlist_items = $conn->prepare("SELECT * FROM wishlist WHERE user_id = ?");
         $count_wishlist_items->execute([$user_id]);
      ?>
      <a href="wishlist.php"><i class="fas fa-heart"></i><span>(<?= $count_wishlist_items->rowCount(); ?>)</span></a>
      <a href="cart.php"><i class="fas fa-shopping-cart"></i><span>(<?= $count_cart_items->rowCount(); ?>)</span></a>
   </div>

   <div class="profile">
      <?php
         $select_profile = $conn->prepare("SELECT * FROM users WHERE id = ?");
         $select_profile->execute([$user_id]);
         $fetch_profile = $select_profile->fetch(PDO::FETCH_ASSOC);
      ?>
      <img src="uploaded_img/<?= $fetch_profile['image']; ?>" alt="">
      <p><?= $fetch_profile['name']; ?></p>
      <a href="user_profile_update.php" class="btn">update profile</a>
      <a href="logout.php" class="delete-btn">logout</a>
      <div class="flex-btn">
         <a href="login.php" class="option-btn">login</a>
         <a href="register.php" class="option-btn">register</a>
      </div>
   </div>

</div>

            <div class="user-info">
                <?php if (!empty($userName)): ?>
                    <p id="welcome">Welcome, <?= $userName; ?>!</p>
                  
                <?php else: ?>
                    <a href="login.php">Login</a>
                <?php endif; ?>
            </div>
        
    </header>
</body>
</html>




