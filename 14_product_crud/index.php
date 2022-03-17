<?php 

$pdo = new PDO("mysql:host=localhost;port=3306;dbname=products_crud;", "root", "Wekaweka94()");
// Throw an exception in the event of an error
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Preparing the statement to avoid SQL injection
$statement = $pdo->prepare('SELECT * FROM products ORDER BY create_date DESC');
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
                        <form action="update.php" method="get" style="display: inline-clock;">
                            <input type="hidden" name="product" value="<?php echo $product?>" />
                            <button type="button" class="btn btn-small btn-outline-primary">Edit</button>
                        </form>
                        <form action="delete.php" method="post" style="display: inline-block;">
                            <input type="hidden" name='id' value="<?php echo $product['id']?>" />    
                            <button type="submit" class="btn btn-small btn-outline-danger">Delete</button>
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