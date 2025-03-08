<?php
session_start();
include 'config.php';

$icon = [
    '<i class="fa-solid fa-plus"></i>',
    '<i class="fa-solid fa-xmark"></i>',
    '<i class="fa-solid fa-edit"></i>',
    '<i class="fa-solid fa-trash"></i>',
    '<i class="fa-solid fa-check"></i>',
    '<i class="fa-solid fa-square-pen"></i>',
    '<i class="fa-solid fa-update"></i>',
];

$productIds = [];
foreach (($_SESSION['cart'] ?? []) as $cartId => $cartQty) {
    // array_push($productIds, $cartId);
    $productIds[] = $cartId;
}

// $ids = implode(', ', $productIds);
// if (!empty($productIds)) {
//     $ids = implode(', ', $productIds);
//     $query = mysqli_query($conn, "SELECT * FROM products WHERE id IN ($ids)");
// } else {
//     $query = false;
// }


$ids = 0;
if (count($productIds) > 0) {
    $ids = implode(', ', $productIds);
}

var_dump($ids);
var_dump($_SESSION['cart']);


// product all
// "SELECT * FROM products WHERE id IN ($ids) ORDER BY id ASC"
// $query = mysqli_query($conn, "SELECT * FROM products WHERE id IN ($ids)");
$query = mysqli_query($conn, "SELECT * FROM products WHERE id IN ($ids)");
// $query = mysqli_query($conn, "SELECT * FROM products WHERE id = ?");
$rows = mysqli_num_rows($query);

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>

    <link href="<?php echo $base_url; ?>/assets/css/bootstrap.min.css" rel="stylesheet">
    <!-- <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bulma@1.0.2/css/bulma.min.css"> -->
    <!-- integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" -->
    <link href="<?php echo $base_url; ?>/assets/fontawesome/css/fontawesome.min.css" rel="stylesheet">
    <link href="<?php echo $base_url; ?>/assets/fontawesome/css/brands.min.css" rel="stylesheet">
    <link href="<?php echo $base_url; ?>/assets/fontawesome/css/solid.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
</head>



<body class="bg-transparent">
    <h1 class="text-black">Add Bootstrap in HTML</h1>
    <?php include 'include/menu.php'; ?>
    <header-cart>
        <div class="container" style="margin: 50px">
            <?php if (!empty($_SESSION['message'])): ?>
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <?php echo ($_SESSION['message']); ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-lebel="Close"></button>
                </div>
                <?php unset($_SESSION['message']); ?>
            <?php endif; ?>

            <div class="cart-container">
                <h1 class="text1 text-dark justify-content-center">Cart</h1>
                <img src="assets/images/basket.png" id="basket" alt="">
            </div>

        </div>
    </header-cart>

    <section>
        <div class="container pt-4 pb-4">
            <!-- justify-content-center -->
            <div class="row">
                <div class="col-12">
                    <form action="<?php echo $base_url; ?>/cart-update.php" method="post">
                        <table class="table table-hover" style="border-collapse: separate;">
                            <thead>
                                <tr>
                                    <th style="width: 100px;">Image</th>
                                    <th>Product Name</th>
                                    <th style="width: 200px;">Price</th>
                                    <th style="width: 120px;">Quantity</th>
                                    <th style="width: 200px;">Total</th>
                                    <th style="width: 120px;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if ($rows > 0): ?>
                                    <?php while ($product = mysqli_fetch_assoc($query)): ?>
                                        <tr>
                                            <td>
                                                <?php if (!empty($product['profile_image'])): ?>
                                                    <img src="<?php echo $base_url; ?>/upload_image/<?php echo $product['profile_image']; ?>" width="100" alt="Product Image">
                                                <?php else: ?>
                                                    <img src="<?php echo $base_url; ?>/assets/images/image-not-found.png" width="100" alt="Product Image">
                                                <?php endif; ?>
                                            </td>
                                            <td>
                                                <?php echo $product['product_name']; ?>
                                                <div>
                                                    <small class="text-muted"><?php echo nl2br($product['detail']); ?></small>
                                                </div>
                                            </td>
                                            <td><?php echo number_format($product['price'], 2); ?></td>
                                            <td><input type="number" name="product[<?php echo $product['id']; ?>][quantity]" value="<?php echo $_SESSION['cart'][$product['id']]; ?>" class="form-control"></td>
                                            <!-- <td>
                                            <label for="customerRange< echo $product['id']; ?>" class="form-label">Count number in range</label>
                                            <input type="range" class="form-range" min="1" max="100" value="1" id="customRange< echo $product['id']; ?>" data-product-id="< echo $product['id']; ?>">
                                            <span id="rangeValue< echo $product['id']; ?>">1</span>
                                            </td> -->
                                            <td>
                                                <?php echo number_format($product['price'] * $_SESSION['cart'][$product['id']], 2); ?>
                                            </td>
                                            <td>
                                                <a onclick="return confirm('Are you sure you want to delete?')" role="button" href="<?php echo $base_url; ?>/cart-delete.php?id=<?php echo $product['id']; ?>" class="btn"><?php echo $icon[3]; ?> Delete</a>
                                            </td>
                                        </tr>
                                    <?php endwhile; ?>
                                    <tr>
                                        <td colspan="6" class="text-end">
                                            <button type="submit" class="btn btn-lg btn-info">Update Cart</button>
                                            <a href="<?php echo $base_url; ?>/checkout.php" class="btn btn-lg btn-light">Checkout Order</a>
                                        </td>
                                    </tr>
                                <?php else: ?>
                                    <tr>
                                        <td colspan="6">
                                            <h4 class="text-center text-danger">ไม่มีรายการสินค้า</h4>
                                        </td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <script src="/assets/js/jquery.js"></script>
    <script src="/assets/js/script.js"></script>
    <!-- <script src="https://jqwidgets.com/public/jqwidgets/jqxscrollbar.js"></script> -->
    <script src="assets/js/button.js"></script>
    <script script src="<?php echo $base_url; ?>/assets/js/bootstrap.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous" />
</body>


</html>