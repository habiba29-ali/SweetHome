<?php
include "config/database.php";

$product_id = $_GET['product_id'] ?? null;

if (!$product_id) {
    echo "<h3 style='text-align:center; color:red;'>Product not found</h3>";
    exit;
}

// جلب المنتج
$stmt = $pdo->prepare("SELECT * FROM products WHERE id = ?");
$stmt->execute([$product_id]);
$item = $stmt->fetch();

if (!$item) {
    echo "<h3 style='text-align:center; color:red;'>Product not found</h3>";
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];

    $stmt = $pdo->prepare("
        INSERT INTO orders (name, email, phone, address, product_id) 
        VALUES (?, ?, ?, ?, ?)
    ");
    $stmt->execute([
        $name,
        $email,
        $phone,
        $address,
        $item['id']
    ]);

    header("Location: user.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Complete Your Order</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>

<div class="container mt-5">

    <h2 class="mb-4 text-center">Complete Your Order</h2>

    <div class="card shadow p-3 mb-4" style="border-radius:20px;">
        <h5 class="text-danger mb-3">Selected Product</h5>

        <p class="fw-bold">Name: <?= htmlspecialchars($item['name']) ?></p>
        <p class="fw-bold">Price: <?= $item['price'] ?> EGP</p>

        <?php if(!empty($item['image'])) { ?>
            <img src="asset/<?= $item['image'] ?>" width="120" class="img-thumbnail mb-2">
        <?php } ?>

        <form method="POST" class="mt-3">
            <input type="text" name="name" class="form-control mb-2" placeholder="Your Name" required>
            <input type="email" name="email" class="form-control mb-2" placeholder="Your Email" required>
            <input type="text" name="phone" class="form-control mb-2" placeholder="Your Phone" required>
            <textarea name="address" class="form-control mb-2" placeholder="Your Address" required></textarea>
            <button class="btn btn-success w-100">Confirm Order</button>
        </form>
    </div>
</div>

</body>
</html>