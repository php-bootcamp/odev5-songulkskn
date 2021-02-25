<?php
require  "database.php";

$categories = $pdo->query("SELECT * FROM categories", PDO::FETCH_OBJ);
?>

<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

    <title>Hello, world!</title>
</head>
<body>
<form method="POST" action="add_products.php">
    <div class="form-group">
        <label for="exampleFormControlInput1">Name</label>
        <input  class="form-control" name="product_name" >
    </div>

    <div class="form-group">
        <label for="exampleFormControlTextarea1">Price</label>
        <textarea class="form-control"  rows="3"  name="product_price"></textarea>
    </div>
    <div class="form-group">
        <label for="exampleFormControlTextarea1">Content</label>
        <textarea class="form-control"  rows="3"  name="product_content"></textarea>
    </div>
    <div class="form-group">
        <label for="exampleFormControlTextarea1">Description</label>
        <textarea class="form-control"  rows="3"  name="product_description"></textarea>
    </div>
    <div class="form-group">
        <label for="exampleFormControlSelect1">Categories</label>
        <select class="form-control"  name="product_category">
            <?php while($category = $categories->fetch()):?>
                <option value="<?=$category->uniqid?>"><?=$category->c_name?></option>
            <?php endwhile; ?>
        </select>

    </div>
    <button type="submit">Kaydet</button>
</form>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>


</body>
</html>
