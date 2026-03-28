<?php
include "../config/database.php";
include "../includs/sidedar.php";

$stmt = $pdo->query("SELECT * FROM categories");
$categories = $stmt->fetchAll();

$error = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $category = $_POST['category'];
    $price = $_POST['price'];

    if (empty($category)) {
        $error = "Please select a category";
    } else {
        $image = null;
        if(isset($_FILES['image']) && $_FILES['image']['error'] == 0){
            $image_name = time() . '_' . $_FILES['image']['name'];
            move_uploaded_file($_FILES['image']['tmp_name'], '../asset/' . $image_name);
            $image = $image_name;
        }

        $stmt = $pdo->prepare("INSERT INTO products (name, description, category, price, image) VALUES (?, ?, ?, ?, ?)");
        $stmt->execute([$name, $description, $category, $price, $image]);

        header("Location:../product.php");
        exit;
    }
}

if (isset($_GET['category_id'])) {
    $category_id = $_GET['category_id'];
    $stmt = $pdo->prepare("
        SELECT products.*, categories.name AS category_name 
        FROM products 
        JOIN categories ON products.category = categories.id
        WHERE products.category = ?
    ");
    $stmt->execute([$category_id]);
} else {
    $stmt = $pdo->query("
        SELECT products.*, categories.name AS category_name 
        FROM products 
        JOIN categories ON products.category = categories.id
    ");
}

$products = $stmt->fetchAll();
?>


<div class="container mt-5">

    <?php if(!empty($error)) { ?>
        <div class="alert alert-danger text-center">
            <?= $error ?>
        </div>
    <?php } ?>

    <div class="card mb-4 p-3 shadow-sm">
        <h4 class="mb-3">Add New Product</h4>
        <form method="POST" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-3 mb-3">
                    <input type="text" name="name" class="form-control" placeholder="Product Name" required>
                </div>

                <div class="col-md-3 mb-3">
                    <input type="text" name="description" class="form-control" placeholder="Description" required>
                </div>

                <div class="col-md-2 mb-3">
                    <select name="category" class="form-select" required>
                        <option value="" disabled selected>Select Category</option>
                        <?php foreach($categories as $cat) { ?>
                            <option value="<?= $cat['id'] ?>"><?= $cat['name'] ?></option>
                        <?php } ?>
                    </select>
                </div>

                <div class="col-md-2 mb-3">
                    <input type="number" name="price" class="form-control" placeholder="Price" required>
                </div>

                <div class="col-md-2 mb-3">
                    <input type="file" name="image" class="form-control">
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Add Product</button>
        </form>
    </div>

    <div class="card shadow-sm p-3">
        <h3 class="mb-4 text-center">All Products</h3>

        <table class="table table-hover text-center align-middle">
            <thead class="table-secondary">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Category</th>
                    <th>Price</th>
                    <th>Image</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>
                <?php if($products) { 
                    foreach($products as $i => $product) { ?>
                        <tr>
                            <td><?= $i + 1 ?></td>
                            <td><?= $product['name'] ?></td>
                            <td><?= $product['description'] ?></td>
                            <td><?= $product['category_name'] ?></td>
                            <td><?= $product['price'] ?> EGP</td>
                            <td>
                                <?php if($product['image']) { ?>
                                    <img src="../asset/<?= $product['image'] ?>" width="80" class="img-thumbnail">
                                <?php } ?>
                            </td>
                            <td>
                                <a href="includs/delete.php?id=<?= $product['id'] ?>" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                <?php } } ?>
            </tbody>

        </table>
    </div>

</div>

<script src="js/bootstrap.bundle.min.js"></script>
<script src="js/all.min.js"></script>
</body>
</html>