<?php
include "config/database.php";
include "includs/sidedar.php";

$stmt = $pdo->query("SELECT * FROM categories");
$categories = $stmt->fetchAll();
$selected_category_id = isset($_GET['category_id']) ? $_GET['category_id'] : null;
?>

<div class="w-100">
    <div class="row mb-5">
        <div class="col-md-1">
            <nav class="navbar vh-100 d-flex flex-column p-3 category">
                <ul class="navbar-nav w-100">
                   
                    <li class="nav-item mb-2">
                        <a class="nav-link <?= !$selected_category_id ? 'active fw-bold text-danger' : '' ?>" href="product.php">All</a>
                    </li>
                    <?php foreach ($categories as $cat) { ?>
                        <li class="nav-item mb-2">
                            <a class="nav-link <?= ($selected_category_id == $cat['id']) ? 'active fw-bold text-danger' : '' ?>" href="product.php?category_id=<?= $cat['id'] ?>">
                                <?= $cat['name'] ?>
                            </a>
                        </li>
                    <?php } ?>
                </ul>
            </nav>
        </div>

       <div class="col-md-11">
    <?php
    foreach ($categories as $cat) {

        if ($selected_category_id && $selected_category_id != $cat['id']) continue;

        $stmt = $pdo->prepare("SELECT * FROM products WHERE category = ?");
        $stmt->execute([$cat['id']]);
        $products = $stmt->fetchAll();

        if ($products) {
            echo "<h3 class='text-danger mt-5'>{$cat['name']}</h3>";
            echo "<div class='row g-3'>"; 

            foreach ($products as $product) { ?>
                <div class="col-12 col-sm-6 col-md-4 col-lg-3"> 
                    <div class="card shadow-sm h-100 p-1 cards">
                        <?php if ($product['image']) { ?>
                            <img src="asset/<?= $product['image'] ?>" class="card-img-top" style="height:200px; object-fit:cover;">
                        <?php } ?>
                        <div class="card-body d-flex flex-column justify-content-between">
                            <div>
                                <h5 class="card-title fw-bold"><?= $product['name'] ?></h5>
                                <p class="text-danger lead"><?= $product['price'] ?> $</p>
                            </div>
                           <div class="d-flex justify-content-center align-items-center gap-2">
    <a href="chart.php?product_id=<?= $product['id'] ?>" class="btn btn-danger rounded-5 px-3 py-2">
        Add to Cart
    </a>
    <a href="productdetails.php?product_id=<?= $product['id'] ?>" class="btn btn-outline-danger rounded-5 px-3 py-2">
        Product Details
    </a>
</div>
                        </div>
                    </div>
                </div>
            <?php }

            echo "</div>"; 
        }
    }
    ?>
</div>
    </div>
</div>

<?php include "includs/footer.php"; ?>