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

// product all
$query = mysqli_query($conn, "SELECT * FROM products");
$rows = mysqli_num_rows($query);

// product select edit
if (!empty($_GET['id'])) {
    $query_product = mysqli_query($conn, "SELECT * FROM products WHERE id = '{$_GET['id']}'");
    $row_product = mysqli_num_rows($query_product);

    if ($row_product == 0) {
        header('location: ' . $base_url . '/index.php');
    }

    $result = mysqli_fetch_assoc($query_product);

    // var_dump($result);
}

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product</title>

    <link href="<?php echo $base_url; ?>/assets/css/bootstrap.min.css" rel="stylesheet">
    <!-- integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" -->
    <link href="<?php echo $base_url; ?>/assets/fontawesome/css/fontawesome.min.css" rel="stylesheet">
    <link href="<?php echo $base_url; ?>/assets/fontawesome/css/brands.min.css" rel="stylesheet">
    <link href="<?php echo $base_url; ?>/assets/fontawesome/css/solid.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
</head>



<body class="bg-transparent">
    <h1 class="text-black">Add Bootstrap in HTML</h1>
    <?php include 'include/menu.php'; ?>
    <header>
        <div class="container" style="margin: 50px">
            <?php if (!empty($_SESSION['message'])): ?>
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <?php echo $_SESSION['message']; ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-lebel="Close"></button>
                </div>
                <?php unset($_SESSION['message']); ?>
            <?php endif; ?>

            <div class="row justify-content-center">
                <h1 class="text1 text-dark">Product List</h1>
            </div>

        </div>
    </header>

    <section>
        <div class="container pt-4 pb-4">
            <div class="row justify-content-center">
                <div class="card-container row g-4">
                    <?php if ($rows > 0): ?>
                        <?php while ($product = mysqli_fetch_assoc($query)): ?>
                            <div class="card-wrapper col-12 col-sm-6 col-md-4 col-lg-4">
                                <div class="card">
                                    <?php if (!empty($product['profile_image'])): ?>
                                        <img src="<?php echo $base_url; ?>/upload_image/<?php echo $product['profile_image']; ?>" class="card-img-top" alt="Product Image">
                                    <?php else: ?>
                                        <img src="<?php echo $base_url; ?>/assets/images/image-not-found.png" class="card-img-top" alt="Product Image">
                                    <?php endif; ?>

                                    <div class="card-body">
                                        <div class="card-title">
                                            <h5 class="card-title"><?php echo $product['product_name']; ?></h5>
                                        </div>

                                        <!-- Text Content hidden -->
                                        <div class="container-price">
                                            <p class="card-text text-black fw-bold"><?php echo number_format($product['price']); ?> Baht</p>
                                        </div>

                                        <div class="container-detail">
                                            <p id="container-detail" class="card-text text-black fw-lighter"><?php echo nl2br($product['detail']); ?></p>
                                        </div>

                                        <!-- Button See More -->
                                        <div class="container-btn">
                                            <button class="btn btn-dark" id="see-more-btn">See More</button>
                                            <a href="<?php echo $base_url; ?>/cart-add.php?id=<?php echo $product['id']; ?>" class="btn btn-light"><i class="fa-solid fa-cart-plus me-2"></i>Add Cart</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endwhile; ?>
                    <?php else: ?>
                        <div class="col-12">
                            <h4 class="text-danger">ไม่มีรายการสินค้า</h4>
                        </div>
                    <?php endif; ?>
                </div>
                <!-- style="width: 100%; height: 100%;" -->
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