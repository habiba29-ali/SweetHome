<?php
include "config/database.php";

$stmt = $pdo->query("
    SELECT 
        orders.*,
        products.name AS product_name,
        products.image AS product_image,
        products.price AS product_price
    FROM orders
    LEFT JOIN products ON orders.product_id = products.id
    ORDER BY orders.id ASC
");

$orders = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>All Orders</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>

<div class="container mt-5">
    <h2 class="text-center mb-4">All Orders</h2>

    <div class="row">
        <?php if(!empty($orders)) { ?>
            <?php foreach($orders as $order) { ?>
                <div class="col-md-6 mb-4">
                    <div class="card shadow p-3" style="border-radius:20px;">
                        <h5 class="text-success mb-3">
                            Order #<?= $order['id'] ?> | <?= $order['created_at'] ?>
                        </h5>

                        <div class="row">
                            <div class="col-md-6">
                                <h6 class="text-danger">Customer Info</h6>
                                <p class="fw-bold">Name: <?= $order['name'] ?></p>
                                <p class="fw-bold">Email: <?= $order['email'] ?></p>
                                <p class="fw-bold">Phone: <?= $order['phone'] ?></p>
                                <p class="fw-bold">Address: <?= $order['address'] ?></p>
                            </div>

                            <div class="col-md-6 text-center">
                                <h6 class="text-danger">Product Info</h6>

                                <?php if($order['product_name']) { ?>
                                    <?php if($order['product_image']) { ?>
                                        <img src="asset/<?= $order['product_image'] ?>" width="120" class="img-thumbnail mb-2">
                                    <?php } ?>
                                    <p class="fw-bold">
                                        <?= $order['product_name'] ?>
                                    </p>
                                    <p class="fw-bold">
                                        <?= $order['product_price'] ?> EGP
                                    </p>
                                <?php } else { ?>
                                    <p>No product data available</p>
                                <?php } ?>

                            </div>
                        </div>

                    </div>
                </div>
            <?php } ?>
        <?php } else { ?>
            <div class="col-12">
                <div class="alert alert-warning text-center">
                    No orders found
                </div>
            </div>
        <?php } ?>
    </div>
</div>

</body>
</html>