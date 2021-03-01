<?php

include("database.php");
?>

<?php
if(isset($_POST['submit'])){

    copy($_FILES['jsonFile']['tmp_name'], 'jsonFiles/'.$_FILES['jsonFile']['name']);

    $dataSet = file_get_contents('jsonFiles/'.$_FILES['jsonFile']['name']);

    $products = json_decode($dataSet,true);

    foreach ($products as $product) {

        $stmt = $pdo>prepare("INSERT INTO products(uniqid,p_name,price,description,content,category_uniqid) VALUES(:uniqid, :p_name, :price,:description,:content,:category_uniqid,)");
        $stmt->bindValue(':uniqid',$product['uniqid'], PDO::PARAM_STR);
        $stmt->bindValue(':p_name',$product['p_name'], PDO::PARAM_STR);
        $stmt->bindValue(':price',$product['price'], PDO::PARAM_STR);
        $stmt->bindValue(':description',$product['description'], PDO::PARAM_STR);
        $stmt->bindValue(':content',$product['content'], PDO::PARAM_STR);
        $stmt->bindValue(':category_uniqid',$product['category_uniqid'], PDO::PARAM_STR);
        //  $stmt->bindValue(':category_name',$product['category_name'], PDO::PARAM_STR);

        $stmt->execute();
    }
    //  header('Location:index.php?status=success');

}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>import</title>
</head>
<body>

<div>

    <form method="post">
        <div>
            <input type="file" name="jsonFile" class="form-control-file" id="exampleFormControlFile1"><br />
            <input type="submit" name="submit" value="Import" name="buttonImport">
        </div>
    </form>
</div>


</body>
</html>
