<?php
include "config/database.php";
include "includs/sidedar.php";

$product_id = $_GET['product_id'] ?? null;

$stmt = $pdo->prepare("SELECT products.*, categories.name AS category_name FROM products JOIN categories ON products.category = categories.id WHERE products.id = ?");
$stmt->execute([$product_id]);
$product = $stmt->fetch();


?>

<div class="container mt-5">
    <div class="card shadow-lg p-4 rounded-4">
        <div class="row g-4">
            <div class="col-md-5 text-center">
                <?php if ($product['image']) { ?>
                    <img src="asset/<?= $product['image'] ?>" class="img-fluid rounded-4 shadow-sm" style="max-height:350px;">
                <?php } else { ?>
                    <img src="asset/default.jpg" class="img-fluid rounded-4 shadow-sm" style="max-height:350px;">
                <?php } ?>
            </div>
            <div class="col-md-7 d-flex flex-column justify-content-center">
                <h2 class="text-danger fw-bold mb-3"><?= $product['name'] ?></h2>
                <p class="mb-2"><strong>Category:</strong> <?= $product['category_name'] ?></p>
                <p class="mb-2"><strong>Price:</strong> <?= $product['price'] ?> EGP</p>
                <p class="mb-4"><strong>Description:</strong> <?= $product['description'] ?></p>

                <div class="d-flex gap-3">
                    <a href="chart.php?product_id=<?= $product['id'] ?>" class="btn btn-danger px-4 py-2 rounded-5">Add to Cart</a>
                    <a href="product.php" class="btn btn-outline-secondary px-4 py-2 rounded-5">Back</a>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include "includs/footer.php"; ?>