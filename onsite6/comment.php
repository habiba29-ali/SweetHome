<?php
include "config/database.php";
include "includs/sidedar.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $comment = $_POST['comment'];

    $stmt = $pdo->prepare("INSERT INTO comments (name, comment) VALUES (?, ?)");
    $stmt->execute([$name, $comment]);

    header("Location: comment.php");
    exit;
}

$stmt = $pdo->query("SELECT * FROM comments ORDER BY id DESC");
$comments = $stmt->fetchAll();
?>

<div class="container mt-5">
    <div class="card p-4 mb-5 shadow-sm">
        <h3 class="mb-4 text-center text-danger">Add Your Comment</h3>
        <form method="POST">
            <div class="mb-3">
                <input type="text" name="name" class="form-control" placeholder="Your Name" required>
            </div>
            <div class="mb-3">
                <textarea name="comment" class="form-control" rows="4" placeholder="Your Comment" required></textarea>
            </div>
            <button type="submit" class="btn btn-success w-100">Submit Comment</button>
        </form>
    </div>

    <h3 class="mb-4 text-center text-danger">All Comments</h3>
    <div class="row">
        <?php foreach ($comments as $c) { ?>
            <div class="col-md-6 mb-3">
                <div class="card p-3 shadow-sm">
                    <h5 class="fw-bold"><?= $c['name'] ?></h5>
                    <p><?= $c['comment'] ?></p>
                </div>
            </div>
        <?php } ?>
    </div>
</div>

<?php include "includs/footer.php"; ?>