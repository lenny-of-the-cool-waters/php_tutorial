<?php

require_once('functions.php');

$pdo = new PDO("mysql:host=localhost;port=3306;dbname=products_crud", "root", "Wekaweka94()");
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$id = $_GET['id'];

$statement = $pdo->prepare("SELECT * FROM products WHERE id=:id");
$statement->bindValue(':id', $id);
$statement->execute();
$product = $statement->fetch(PDO::FETCH_ASSOC);

// $imagePath = $product['image'];
$title = $product['title'];
$description = $product['description'];
$price = $product['price'];
$imagePath = $product['image'];

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST['remove-image'])) {
        $image = null;
        $imagePath = null;
    } else {
        $title = $_POST['title'];
        $description = $_POST['description'];
        $price = $_POST['price'];
        $image = $_FILES['image'] ?? null;
        $imagePath = '';

        $errors = [];

        if (!$title) {
            $errors[] = "Please provide a title!";
        }
        if (!$price) {
            $errors[] = "Please provide a price!";
        }
        if (!is_dir('images')) {
            mkdir('images');
        }

        if ($image && $image['name']) {
            if ($product['image']) {
                unlink($product['image']);
            }
            $imagePath = 'images/' . randomHashString() . '/' . $image['name'];
            mkdir(dirname($imagePath));
            move_uploaded_file($image['tmp_name'], $imagePath);
        }

        if (empty($errors)) {
            $query = $pdo->prepare('UPDATE products SET title=:title, image=:image, description=:description, price=:price WHERE id=:id');
            $query->bindValue(':title', $title);
            $query->bindValue(':image', $imagePath);
            $query->bindValue(':description', $description);
            $query->bindValue(':price', $price);
            $query->bindValue(':id', $id);

            $query->execute();
            header('Location: index.php');
        }
    }
}

?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="./styles.css">

    <title>Products CRUD!</title>
</head>

<body>
    <h1>Update Product: <b><?php echo $title; ?></b></h1>

    <?php if (!empty($errors)) : ?>
        <div class="alert alert-danger">
            <?php foreach ($errors as $error) : ?>
                <div><?php echo $error; ?></div>
            <?php endforeach; ?>
        </div>
    <?php endif ?>

    <form action="" method="post" enctype="multipart/form-data">
        <?php if ($imagePath) : ?>
            <img src="<?php echo $imagePath; ?>" class="product-img-view" />
        <?php endif; ?>
        <div class="mb-3">
            <label>Product Image</label><br>
            <input type="file" name="image">
            <!-- Remove image code is faulty -->
            <input type="submit" class="btn btn-danger" value="Remove Image" name="remove-image" />
        </div>
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" name="title" value="<?php echo $title; ?>" required />
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" name="description" value="<?php echo $description; ?>"></textarea>
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Price</label>
            <input type="number" class="form-control" step="0.01" name="price" value="<?php echo $price; ?>" required />
        </div>

        <a href="index.php" class="btn btn-success">Back</a>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>