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

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <title>Result Order</title>

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



        </div>
    </header>

    <section>
        <div class="row justify-content-center">
            <h1 class="text1 text-dark">Check Out</h1>
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