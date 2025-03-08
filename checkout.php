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

$ids = 0;
if (count($productIds) > 0) {
    $ids = implode(', ', $productIds);
}

$query = mysqli_query($conn, "SELECT * FROM products WHERE id IN ($ids)");
$rows = mysqli_num_rows($query);

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <title>Checkout</title>

    <!-- list link -->
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3"> -->
    <!-- <link href="/docs/5.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"> -->
    <!-- list link -->

    <link href="<?php echo $base_url; ?>/assets/css/bootstrap.min.css" rel="stylesheet">
    <!-- integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" -->
    <link href="<?php echo $base_url; ?>/assets/fontawesome/css/fontawesome.min.css" rel="stylesheet">
    <link href="<?php echo $base_url; ?>/assets/fontawesome/css/brands.min.css" rel="stylesheet">
    <link href="<?php echo $base_url; ?>/assets/fontawesome/css/solid.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
</head>



<body class="bg-dark">
    <!-- <h1 class="text-black">Add Bootstrap in HTML</h1> -->
    <?php include 'include/menu.php'; ?>
    <header>
        <div class="container" style="margin: 50px">
            <?php if (!empty($_SESSION['message'])): ?>
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <?php echo ($_SESSION['message']); ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-lebel="Close"></button>
                </div>
                <?php unset($_SESSION['message']); ?>
            <?php endif; ?>

            <div class="row justify-content-center">
                <h1 class="text1 text-dark">Check Out</h1>
            </div>

        </div>
    </header>

    <section>
        <!-- <div class="row justify-content-center"> -->
        <div class="container pt-4 pb-4">
            <form class="pt-4" action="<?php echo $base_url; ?>/checkout-form.php" method="post">
                <div class="row g-5 pt-4">
                    <div class="col-md-6 col-lg-7">
                        <div class="row g-3">

                            <div class="container-form-fullname col-sm-12">
                                <label class="form-label">Fullname</label>
                                <input type="text" name="fullname" class="form-control" placeholder="" value="">
                            </div>

                            <div class="container-form-tel pt-2 col-sm-6">
                                <label class="form-label">Tel</label>
                                <input type="text" name="fullname" class="form-control" placeholder="" value="">
                            </div>

                            <div class="container-form-email pt-2 col-sm-6">
                                <label class="form-label">Email</label>
                                <input type="text" name="fullname" class="form-control" placeholder="" value="">
                            </div>

                            <!-- g2 -->

                        </div>

                        <hr class="my-4">
                        <div class="text-end">
                            <a href="<?php echo $base_url; ?>/product-list.php" class="btn btn-secondary btn-lg" role="">Back to product</a>
                            <button class="btn btn-primary btn-light" type="submit">Continue to checkout</button>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-5 order-md-last">
                        <h4 class="d-flex justify-content-between align-items-center mb-3">
                            <span class="text-dark">Your cart</span>
                            <span class="badge bg-dark rounded-pill"><?php echo $rows; ?></span>
                        </h4>

                        <!-- product id -->
                        <?php if ($rows > 0): ?>
                            <ul class="list-group mb-3">
                                <?php $grand_total = 0; ?>
                                <?php while ($product = mysqli_fetch_assoc($query)): ?>
                                    <li class="list-group-item d-flex justify-content-between lh-sm">
                                        <div>
                                            <h6 class="my-0"><?php echo $product['product_name']; ?> (<?php echo $_SESSION['cart'][$product['id']] . " item" ?>)</h6>
                                            <small class="text-body-secondary"><?php echo nl2br($product['detail']); ?></small>
                                            <input type="hidden" name="product[<?php echo $product['id']; ?>][price]" value="<?php echo $product['price']; ?>">
                                            <input type="hidden" name="product[<?php echo $product['id']; ?>][name]" value="<?php echo $product['product_name']; ?>">
                                        </div>
                                        <span class="text-body-secondary"><?php echo number_format($_SESSION['cart'][$product['id']] * $product['price'], 2) . "₿" ?></span>
                                    </li>

                                    <?php $grand_total += $_SESSION['cart'][$product['id']] * $product['price']; ?>
                                <?php endwhile; ?>
                                <li class="list-group-item d-flex justify-content-between bg-body-tertiary">
                                    <div class="text-success">
                                        <h6 class="my-0">Grand total</h6>
                                        <small>amount</small>
                                    </div>
                                    <span class="text-success"><strong><?php echo number_format($grand_total, 2) ?></strong></span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between bg-body-tertiary">
                                    <div class="text-success">
                                        <h6 class="my-0">Promo code</h6>
                                        <small>EXAMPLECODE</small>
                                        <input type="text">
                                        <button class="btn btn-promode-code">use</button>
                                    </div>
                                    <span class="text-success"></span>
                                </li>
                            </ul>
                            <input type="hidden" name="grand_total" value="<?php echo $grand_total; ?>">
                        <?php else: ?>
                            ไม่มีรายการสินค้า
                        <?php endif; ?>
                    </div>
                    <!-- <div class="col-md-6 col-lg-5 order-md-last">
                        <h4 class="d-flex justify-content-between align-items-center mb-3">
                            <span class="text-primary">Your cart</span>
                            <span class="badge bg-primary rounded-pill">< echo $rows; ?></span>
                        </h4>
                    </div> -->
                </div>
            </form>
        </div>
    </section>
    <div class="footer"></div>

    <script src="/assets/js/jquery.js"></script>
    <script src="/assets/js/script.js"></script>
    <!-- <script src="https://jqwidgets.com/public/jqwidgets/jqxscrollbar.js"></script> -->
    <!--        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous" /> -->
    <script script src="<?php echo $base_url; ?>/assets/js/bootstrap.min.js">
    </script>

</body>

</html>