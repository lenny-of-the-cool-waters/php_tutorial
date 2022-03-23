<?php

include_once '../../functions.php';
$pdo = require_once '../../database.php';

$title = '';
$image = '';
$price = '';
$description = '';
$errors = [];

// echo $_SERVER['REQUEST_METHOD'];
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    require_once('../../validate_product.php');    

    if(empty($errors)) {   
        $statement = $pdo->prepare("INSERT INTO products (title, image, description, price, create_date) VALUES (:title, :image, :description, :price, :date)");
        $statement->bindValue(':title', $title);
        $statement->bindValue(':image', $imagePath);
        $statement->bindValue(':description', $description);
        $statement->bindValue(':price', $price);
        $statement->bindValue(':date', date('Y-m-d H:i:s'));
        $statement->execute();

        // Redirect to home page once added to DB
        header('Location: index.php');
    }
}

?>

<?php require_once '../../views/partials/header.php'; ?>
    <h1>Create New Product</h1>

    <?php if(!empty($errors)): ?>
        <div class="alert alert-danger">
            <?php foreach($errors as $error): ?>
                <div><?php echo $error; ?></div>
            <?php endforeach; ?>
        </div>
    <?php endif?>

    <form action="" method="post" enctype="multipart/form-data" >
        <div class="mb-3">
            <label for="image" class="form-label">Image</label>    
            <input type="file" class="form-control" name="image" />
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
            <label for="price" class="form-label" >Price</label>
            <input type="number" class="form-control" step="0.01" name="price" value="<?php echo $price; ?>" required />
        </div>
        
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

    <?php require_once '../../views/partials/footer.php'; ?>
