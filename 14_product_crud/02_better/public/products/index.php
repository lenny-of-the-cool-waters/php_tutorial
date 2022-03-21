<?php

$pdo = require_once '../../database.php';

$search = $_GET['search'];
if ($search) {
    $statement = $pdo->prepare('SELECT * FROM products WHERE title LIKE :title ORDER BY create_date DESC');
    $statement->bindValue(':title', "%$search%");
} else {
    $statement = $pdo->prepare('SELECT * FROM products ORDER BY create_date DESC');
}

$statement->execute();
$products = $statement->fetchAll(PDO::FETCH_ASSOC);

?>

<?php require_once '../../views/partials/header.php'; ?>
<h1>Products CRUD</h1>

<p>
    <a href="/create.php" class="btn btn-success">Create Product</a>
</p>


<form>
    <div class="input-group mb-3">
        <input type="text" class="form-control" placeholder="Search Product" name="search" value="<?php echo $search; ?>" />
        <button class="btn btn-outline-secondary" type="submit">Search</button>
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
        <?php foreach ($products as $i => $product) : ?>
            <tr>
                <th><?php echo $i + 1 ?></th>
                <td>
                    <?php if ($product['image']) : ?>
                        <img src="/<?php echo $product['image'] ?>" alt="<?php echo $product['title'] ?>" class="product-img">
                    <?php endif; ?>
                </td>
                <td><?php echo $product["title"] ?></td>
                <td><?php echo $product["price"] ?></td>
                <td><?php echo $product["create_date"] ?></td>
                <td>
                    <a href="update.php?id=<?php echo $product['id'] ?>" class="btn btn-sm btn-outline-primary">Edit</a>
                    <form action="/products/delete.php" method="post" style="display: inline-block;">
                        <input type="hidden" name='id' value="<?php echo $product['id'] ?>" />
                        <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?php require_once '../../views/partials/footer.php'; ?>