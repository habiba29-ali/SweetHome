<?php
include "config/database.php";
include "includs/sidedar.php";

$stmt = $pdo->query("SELECT * FROM comments ORDER BY id DESC");
$comments = $stmt->fetchAll();
if (!$comments) {
    $comments = [];
}
?>

<div class="bg-hero">
    <div class="container">
        <h2 class="display-6 fw-bold">Bite Into</h2>
        <h1 class="display-6 fw-bold mb-4">Happiness</h1>
        <a href="product.php" class="btn btn-light p-3 rounded-pill text-danger">Browse Menu</a>
    </div>
</div>

<section class="mt-5">
    <div class="container text-center">
        <h1 class="text-danger" style="font-size: 44px;">The Perfect <span>gift for Your</span></h1>
        <h1 class="text-danger mb-3" style="font-size: 44px;">Friends and Loved Ones</h1>
        <p class="mx-auto mb-5 lead" style="max-width: 600px; font-size:20px;">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusantium asperiores fuga aspernatur rerum maxime optio aut recusandae suscipit, assumenda quod at qui quia, eius, incidunt laboriosam similique. Id, maiores cumque? Lorem ipsum dolor sit amet consectetur adipisicing elit. Perferendis voluptates adipisci suscipit amet. Maiores deserunt optio voluptatibus natus nam fuga.
        </p>
        <a href="product.php" class="btn btn-danger px-5 py-3 rounded-pill text-light mb-2">Order Online</a>
    </div>
</section>

<section class="category mt-5">
    <div class="container mt-5">
        <div class="row mt-5 d-flex justify-content-center align-items-center">

            <div class="col-md-3 p-3 mt-5">
                <img src="asset/c578450404815a3daf5513884ce28774.jpg" class="w-75 rounded-pill border border-danger p-1">
                <div class="d-flex justify-content-center align-items-center">
                    <a href="product.php?category_id=1" class="btn fs-4 text-danger">shop cakes <i class="fa-solid fa-arrow-right mx-1"></i></a>
                </div>
            </div>

            <div class="col-md-3 p-3 mt-5">
                <img src="asset/dount.jpg" class="w-75 rounded-pill border border-danger p-1">
                <div class="d-flex justify-content-center align-items-center">
                    <a href="product.php?category_id=3" class="btn fs-4 text-danger">shop Dounts <i class="fa-solid fa-arrow-right mx-1"></i></a>
                </div>
            </div>

            <div class="col-md-3 p-3 mt-5">
                <img src="asset/caramel cookie.jpg" class="w-75 rounded-pill border border-danger p-1">
                <div class="d-flex justify-content-center align-items-center">
                    <a href="product.php?category_id=2" class="btn fs-4 text-danger">shop Cookie <i class="fa-solid fa-arrow-right mx-1"></i></a>
                </div>
            </div>

            <div class="col-md-3 p-3 mt-5">
                <img src="asset/redmacaroins.jpg" class="w-75 rounded-pill border border-danger p-1">
                <div class="d-flex justify-content-center align-items-center">
                    <a href="product.php?category_id=4" class="btn fs-4 text-danger">shop Macaroins <i class="fa-solid fa-arrow-right mx-1"></i></a>
                </div>
            </div>
            

        </div>
    </div>
</section>

<section class="mt-5">
    <div class="container">
        <div class="row">
            <div class="col-md-6 mt-5">
                <h1 class="fw-bold mt-5">OUR MISSION</h1>
                <p class="lead mb-4 mt-5">Lorem ipsum dolor sit amet consectetur adipisicing elit. Exercitationem officia amet veniam. Quaerat beatae tempore, harum totam accusamus obcaecati corporis inventore animi eum odit nam sunt nihil iure quam. Reprehenderit laboriosam sunt officiis pariatur tenetur illo, nesciunt officia accusantium magni? Optio eligendi quam autem omnis minima rem labore culpa error.</p>
                <a href="about.php" class="btn btn-outline-danger rounded-pill p-3 mb-5">About US</a>
            </div>
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-6">
                        <img src="asset/indexourmission.jpg" class="w-100 rounded-pill border border-danger p-1">
                    </div>
                    <div class="col-md-6">
                        <img src="asset/indexourmission2.jpg" class="w-75 rounded-pill border border-danger p-1">
                        <img src="asset/indexourmission3.jpg" class="w-75 rounded-pill border border-danger p-1 mt-1">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="mt-5 category mb-5">
    <div class="container">
        <div class="row d-flex justify-content-center align-items-center" style="min-height: 100vh;">

            <div class="col-md-6">
                <h2 class="text-center mt-5">Feature</h2>
                <p class="text-muted lead">
                    Lorem ipsum dolor sit, amet consectetur adipisicing elit. Adipisci nihil quibusdam itaque reprehenderit magni tempore.
                </p>

                <div class="row mt-5">
                    
                    <?php
                    $top_comments = array_slice($comments, 0, 4);

                    foreach($top_comments as $c) { ?>
                        <div class="col-md-6 mb-3">
                            <div class="card p-2 h-100">
                                <div class="row align-items-center">
                                    <div class="col-4 text-center">
                                        <img src="asset/person.jpg" class="w-75 rounded-circle" alt="">
                                    </div>
                                    <div class="col-8">
                                        <h6 class="fw-bold mb-1"><?= $c['name'] ?></h6>
                                        <p class="text-muted small mb-1"><?= $c['comment'] ?></p>
                                        <div class="text-danger">
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>

                </div>
            </div>

            <div class="col-md-6 d-flex justify-content-center align-items-center">
                <img src="asset/pexels-valeriya-27304295.jpg" class="img-fluid rounded-4" style="width: 50vh;">
            </div>

        </div>
    </div>
</section>

<?php include "includs/footer.php"; ?>