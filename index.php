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

$result = [
    'id' => '',
    'product_name' => '',
    'price' => '',
    'detail' => '',
    'product_image' => '',
];


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
    <title>List Product</title>

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
    <h1 class="text-light">Add Bootstrap in HTML</h1>
    <?php include 'include/menu.php'; ?>
    <header>
        <div class="container" style="margin-top: 40px">
            <?php if (!empty($_SESSION['message'])): ?>
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <?php echo $_SESSION['message']; ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-lebel="Close"></button>
                </div>
                <?php unset($_SESSION['message']); ?>
            <?php endif; ?>

            <h4 class="text1 text-dark">Home - Manage Product</h4>
            <div class="header-form row g-5">
                <div class="header-btn col-md-8 col-sm-12">
                    <form action="<?php echo $base_url; ?>/product-form.php" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="<?php echo $result['id']; ?>">
                        <div class="text-style-form row g-3 mb-3">
                            <div class="col-sm-6">
                                <label class="form label mt-2">Product Name</label>
                                <input type="text" name="product_name" class="form-control" value="<?php echo $result['product_name']; ?>">
                            </div>

                            <div class="col-sm-6">
                                <label class="form label mt-2">Price</label>
                                <input type="text" name="price" class="form-control" value="<?php echo $result['price']; ?>">
                            </div>

                            <div class="col-sm-6">
                                <label for="formFile" class="form-label">Image</label>
                                <br>
                                <?php if (!empty($result['profile_image'])): ?>
                                    <img src="<?php echo $base_url; ?>/upload_image/<?php echo $result['profile_image']; ?>" width="100" alt="Product Image"><br><br>
                                <?php else: ?>
                                    <!-- echo $base_url; -->
                                    <!-- <img src="/assets/images/image-not-found.png" width="100" alt="Product Image"><br><br> -->
                                <?php endif; ?>

                                <input type="file" name="profile_image" class="form-control" accept="image/png, image/jpg, image/jpeg, image/jfif">
                            </div>

                            <div class="col-sm-12">
                                <label class="form-label">Detail</label>
                                <textarea name="detail" class="form-control" rows="3"><?php echo $result['detail']; ?></textarea>
                            </div>
                        </div>
                        <?php if (empty($result['id'])): ?>
                            <button class="btn btn-light" type="submit"><?php echo $icon[0]; ?> Create</button>
                        <?php else: ?>
                            <button class="btn btn-info" type="submit"><?php echo $icon[5]; ?> Update</button>
                        <?php endif; ?>
                        <a role="button" class="btn btn-outline-dark" href="<?php echo $base_url; ?>/index.php"><?php echo $icon[1]; ?> Cancel</a>
                        <hr class="my-4">
                    </form>
                </div>
            </div>
        </div>
    </header>

    <section>
        <div class="container pt-4">
            <div class="row">
                <div class="col-12">
                    <table class="table table-hover" style="border-collapse: separate;">
                        <thead>
                            <tr>
                                <th style="width: 100px;">Image</th>
                                <th>Product Name</th>
                                <th style="width: 200px;">Price</th>
                                <th style="width: 200px;">Action</th>
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
                                        <td>
                                            <a role="button" href="<?php echo $base_url; ?>/index.php?id=<?php echo $product['id']; ?>" class="btn btn-outline-dark"><?php echo $icon[2]; ?> Edit</a>
                                            <a onclick="return confirm('Are you sure you want to delete?')" role="button" href="<?php echo $base_url; ?>/product-delete.php?id=<?php echo $product['id']; ?>" class="btn"><?php echo $icon[3]; ?> Delete</a>
                                        </td>
                                    </tr>
                                <?php endwhile; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan=" 4">
                                        <h4 class="text-center text-danger">ไม่มีรายการสินค้า</h4>
                                    </td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>



    <script src="<?php echo $base_url; ?>/assets/js/bootstrap.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>




<!--  ************** compare patiphan **************  -->
<!-- <div class="header-btn col-sm-6">
    <form action="" method="post">
        <label class="text-light form label mt-2">Product Name</label>
        <input type="text" name="product_name" class="form3 form-control" value="">
    </form>
</div> -->







<!--  ************** compare 2b **************  -->
<!-- <nav>
    <a href="index.php" class="logo">
        <img src="logo.png" alt="">
    </a>

    <ul class="ul-menu">
        <li><a href="#">About</a></li>
        <li><a href="#">Developer</a></li>
        <li><a href="#">Contact</a></li>
    </ul>

    <div class="btn-signin">
        Sign in
    </div>
</nav>

<section class="containerC">
    <div class="card">
        card-top
        <div class="card-top">
            card-top-title
            <div class="card-top-title">
                card-top-title-profile
                <div class="card-top-title-profile">
                    <img src="logo.png">
                </div>

                card-top-title-name
                <div class="card-top-title-name">
                    <p>Lorem ipsum dolor sit.</p>
                    <span>example@gmail.com</span>
                </div>
            </div>

            card-top-detail
            <div class="card-top-detail">
                <h4>Event Photos</h4>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolore doloribus unde consectetur neque ullam suscipit eveniet cumque nam? Sapiente repudiandae alias veritatis pariatur commodi distinctio velit molestias architecto consequuntur eaque.</p>
            </div>
        </div>

        card-bottom
        <div class="card-bottom">
            clip
            <div class="clip">
                <i class="fa-solid fa-clipboard"></i>
            </div>

            time ago
            <div class="time">
                <span>15</span>
                <span>m ago</span>
            </div>

            report
            <div class="report">
                <i class="fa-solid fa-flag"></i>
            </div>

        </div>
    </div>
</section> -->