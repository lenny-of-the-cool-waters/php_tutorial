<?php

include_once 'functions.php';

$pdo = new PDO("mysql:host=localhost;port=3306;dbname=products_crud;", "root", "Wekaweka94()");
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// _Get super-global
/* echo "<pre>";
var_dump($_GET);
echo "</pre>"; */

// _POST super-global
/* echo "<pre>";
var_dump($_GET);
echo "</pre>"; */

// _POST super_global
/* echo '<pre>';
var_dump($_SERVER);
echo '</pre>'; */

// $_FILES super-global containing all uploaded files
/* echo '<pre>';
var_dump($_FILES);
echo '</pre>'; */
// exit();

$title = '';
$image = '';
$price = '';
$description = '';

// echo $_SERVER['REQUEST_METHOD'];
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Create images folder if it doesn't exist
    if(!is_dir('images')) { mkdir('images'); }

    $image = "";
    $imagePath = "";
    $title = $_POST["title"];
    $description = $_POST["description"];
    $price = $_POST["price"];
    $date = date('Y-m-d H:i:s');

    $errors = [];

    if(!$title) { $errors[] = "Product title is required"; }
    if(!$price) { $price[] = "Product price is required"; }
    

    if(empty($errors)) {
        // moving image from temporary apache location
        $image = $_FILES['image'] ?? null;
        if($image && $image['tmp_name']) {
            $imagePath = 'images/'.randomHashString().'/'.$image['name'];
            mkdir(dirname($imagePath));
            move_uploaded_file($image['tmp_name'], $imagePath);
        }
        

        $statement = $pdo->prepare("INSERT INTO products (title, image, description, price, create_date) VALUES (:title, :image, :description, :price, :date)");
        $statement->bindValue(':title', $title);
        $statement->bindValue(':image', $imagePath);
        $statement->bindValue(':description', $description);
        $statement->bindValue(':price', $price);
        $statement->bindValue(':date', $date);
        $statement->execute();

        // Redirect to home page once added to DB
        header('Location: index.php');
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

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  </body>
</html>