<?php 

$pdo = new PDO("mysql:host=localhost;port=3306;dbname=products_crud;", "root", "Wekaweka94()");
// Throw an exception in the event of an error
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$search = $_GET['search'];
if($search) {
    $statement = $pdo->prepare('SELECT * FROM products WHERE title LIKE :title ORDER BY create_date DESC');
} else {
    $statement = $pdo->prepare('SELECT * FROM products ORDER BY create_date DESC');
}

// Executing the prepared statement
$statement->execute();
// Returning all fetched data as an associative array
$products = $statement->fetchAll(PDO::FETCH_ASSOC);

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
    <h1>Products CRUD</h1>

    <p>
        <a href="./create.php" class="btn btn-success">Create Product</a>
    </p>


    <form action="">
        <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Search Product" value="<?php echo $search; ?>"aria-label="Search Product" />
            <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Search</button>
        </div>
    </form>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Image</th>
                <th scope="col">Title</th>
                <th scope="col">Price</th>
                <th scope="col">Create Date</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php forEach($products as $i => $product): ?>
                <tr>
                    <th><?php echo $i+1 ?></th>
                    <td><img src="<?php echo $product['image'];?>" class="thumb-image" /></td>
                    <td><?php echo $product["title"]?></td>
                    <td><?php echo $product["price"]?></td>
                    <td><?php echo $product["create_date"]?></td>
                    <td>
                        <a href="update.php?id=<?php echo $product['id'] ?>" class="btn btn-sm btn-outline-primary">Edit</a>
                        <form action="delete.php" method="post" style="display: inline-block;">
                            <input type="hidden" name='id' value="<?php echo $product['id']?>" />    
                            <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
                        </form>
                    </td>
                </tr>
                <?php endforeach; ?>
        </tbody>
    </table>

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>