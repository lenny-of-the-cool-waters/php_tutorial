<?php

include_once '../../functions.php';
$pdo = require_once '../../database.php';

$id = $_GET['id'];

$statement = $pdo->prepare("SELECT * FROM products WHERE id=:id");
$statement->bindValue(':id', $id);
$statement->execute();
$product = $statement->fetch(PDO::FETCH_ASSOC);

$title = $product['title'];
$description = $product['description'];
$price = $product['price'];
// $imagePath = $product['image'];

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST['remove-image'])) {
        $image = null;
        $imagePath = null;
    } else {
        require_once '../../validate_product.php';

        if (empty($errors)) {
            $statement = $pdo->prepare("UPDATE products SET title = :title, 
                                        image = :image, 
                                        description = :description, 
                                        price = :price WHERE id = :id");
            $statement->bindValue(':title', $title);
            $statement->bindValue(':image', $imagePath);
            $statement->bindValue(':description', $description);
            $statement->bindValue(':price', $price);
            $statement->bindValue(':id', $id);

            $statement->execute();
            header('Location: index.php');
        }
    }
}

?>

<?php require_once '../../views/partials/header.php'; ?>
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

    <a href="/products/index.php" class="btn btn-success">Back</a>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>


<?php require_once '../../views/partials/footer.php'; ?>