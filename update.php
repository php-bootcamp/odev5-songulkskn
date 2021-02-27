<?php
//Source: https://phpdelusions.net/pdo_examples/select

require  "database.php";

$id = $_GET['uniqid'];
$stmt = $pdo->prepare("SELECT * FROM products WHERE uniqid=:id");
$stmt->execute([':id' => $id]);
$product = $stmt->fetch();
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
<form method="POST" >
    <div class="form-group">
        <label for="exampleFormControlInput1">Name</label>
        <input  class="form-control" name="product_name" value="<?= $product["p_name"] ?>">
    </div>

    <div class="form-group">
        <label for="exampleFormControlTextarea1">Price</label>
        <textarea class="form-control"  rows="3"  name="product_price" ><?= $product["price"] ?></textarea>
    </div>
    <div class="form-group">
        <label for="exampleFormControlTextarea1">Content</label>
        <textarea class="form-control"  rows="3"  name="product_content" ><?= $product["content"] ?></textarea>
    </div>
    <div class="form-group">
        <label for="exampleFormControlTextarea1">Description</label>
        <textarea class="form-control"  rows="3"  name="product_description" ><?= $product["description"] ?></textarea>
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


<?php
if($_POST) {
    $p_name = $_POST["product_name"];
    $p_price = $_POST["product_price"];
    $p_description = $_POST["product_description"];
    $p_content = $_POST["product_content"];
    $p_category = $_POST["product_category"];

    $guncelle = $pdo->prepare("UPDATE products SET p_name=:adi,price=:price,description=:description,content=:content,category_uniqid=:c_uniqid WHERE uniqid=:id ");
    $guncelle->execute([":adi" => $p_name, ":price" => $p_price, ":description" => $p_description, ":content" => $p_content, ":c_uniqid" => $p_category, ":id" => $id]);


if($guncelle){
 echo " işlem basarılı";
 header("Refresh:1 ; url=index.php");
} else {
    echo "bu sefer olmadı";
}

}
?>






<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>


</body>
</html>


