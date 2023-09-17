
<header class="header">

   <div class="flex">

      <a href="#" class="logo"> Baby's Cake</a>

      <nav class="navbar" style="display:block;">
    <a href="search.php"><i class="fa fa-search"></i>&nbsp Search</a>
         <a href="products.php"><i class="fa fa-birthday-cake"></i>&nbsp view Cakes</a>
         <a href="prev.php"><i class="fa fa-list-alt"></i>&nbsp view Reservation</a>
          <a href="settings.php"><i class="fa fa-cog"></i>&nbsp Account Settings</a>
          <a href="logout.php"><i class="fa fa-sign-out"></i>&nbsp Logout</a>
      </nav>

      <?php
      
      $select_rows = mysqli_query($conn, "SELECT * FROM `cart` where username= '{$_SESSION['username']}'") or die('query failed');
      $row_count = mysqli_num_rows($select_rows);

      ?>

      <a href="cart.php" class="cart"><i class="fa fa-shopping-cart"></i>&nbsp cart <span><?php echo $row_count; ?></span> </a>

      <div id="menu-btn" class="fas fa-bars"></div>

   </div>

</header>