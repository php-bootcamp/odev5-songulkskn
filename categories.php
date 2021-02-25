<?php
require "database.php";
$categories=$pdo->query("SELECT * FROM categories ", PDO::FETCH_OBJ);

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

<div class="conteiner" style="margin-left: 200px">
    <div class="col">
        <div class="row">
            <h1>KATEGORİLER</h1>
            <a href="categories_page.php" class="btn btn-success" style="margin-left: 50px;height: 40px"> Yeni Kategori Ekle</a>
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">UniqId</th>
                    <th scope="col">Name</th>
                    <th>işlemler</th>
                </tr>
                </thead>
                <tbody>
                <?php
                while($category = $categories->fetch()):
                ?>
                <tr>
                    <th scope="row"><?= $category->uniqid; ?></th>
                    <td><?= $category->c_name; ?></td>
                    <td>
                        <a href="delete_categories.php?uniqid=<?= $category->uniqid; ?>"  class="btn btn-button btn-danger">Sil</a>
                    </td>
                    <td>
                        <a href="update_categories.php?uniqid=<?= $category->uniqid; ?>" class="btn btn-button btn-warning">Güncelle</a>
                    </td>
                </tr>
                <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>































<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js"
        integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js"
        integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
</body>
</html>
