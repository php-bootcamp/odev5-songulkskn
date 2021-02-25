<?php
require "database.php";

$products = $pdo->query("SELECT * FROM products", PDO::FETCH_OBJ);

$categories = $pdo->query("SELECT * FROM categories", PDO::FETCH_OBJ);

?>

<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Homework 5</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">Songul KESKIN</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="index.php">Ürünler</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="categories.php">Kategoriler</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="">Dışa Aktar</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="importView.php">İçe Aktar</a>
            </li>
        </ul>
    </div>
</nav>
<div class="container">
    <div class="col">
        <div class="row">
            <h1>ÜRÜNLER</h1>
            <a href="product_page.php" class="btn btn-success" style="margin-left: 50px;height: 40px"> Yeni Ürün Ekle</a>
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">UniqId</th>
                    <th scope="col">Name</th>
                    <th scope="col">Price</th>
                    <th scope="col">Content</th>
                    <th scope="col">Description</th>
                    <th scope="col">Category Name</th>
                    <th>işlemler</th>
                </tr>
                </thead>
                <tbody>
                <?php

                while($product = $products->fetch()):

                    ?>
                <tr>
                    <th scope="row"><?= $product->uniqid; ?></th>
                    <td><?= $product->p_name; ?></td>
                    <td><?= $product->price; ?></td>
                    <td><?= $product->content; ?></td>
                    <td><?= $product->description; ?></td>
                    <?php while($category = $categories->fetch()):
                        if($product->category_uniqid==$category->uniqid): ?>
                            <td> <?= $category->c_name; ?></td>
                        <?php endif; ?>
                    <?php endwhile; ?>
                    <td>
                        <a href="delete.php?uniqid=<?= $product->uniqid; ?>"  class="btn btn-button btn-danger">Sil</a>
                    </td>
                    <td>
                        <a href="update.php?uniqid=<?= $product->uniqid; ?>" class="btn btn-button btn-warning">Güncelle</a>
                    </td>
                </tr>

                <?php endwhile; ?>



                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
        crossorigin="anonymous"></script>
</body>
</html>