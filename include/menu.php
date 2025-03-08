<header class="container-fluid d-flex justify-content-start py-2 sticky-top bg-light border-bottom shadow-sm">
    <ul class="nav nav-pills">
        <li class="nav-item"><a href="<?php echo $base_url; ?>/index.php" class="nav-link" style="color: black">Home</a></li>
        <li class="nav-item"><a href="<?php echo $base_url; ?>/product-list.php" class="nav-link" style="color: black">Product List</a></li>
        <li class="nav-item"><a href="<?php echo $base_url; ?>/cart.php" class="nav-link" style="color: black">Cart (<?php echo count($_SESSION['cart'] ?? []); ?>)</a></li>
    </ul>
</header>