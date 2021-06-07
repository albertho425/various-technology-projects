<?php
// The amounts of products to show on each page
// To determine which page the customer is on, 
// we can use a GET request, in the URL this will appear as 
// index.php?page=products&p=1 etc, 
// and in our PHP script the parameter p we can retrieve with the $_GET['p'] variable. 
// We're executing queries using prepared statements, whihc will better 
// protect against SQL injection. It's good practice to prepare statements with GET and POST requests.


$num_products_on_each_page = 3;
// The current page, in the URL this will appear as index.php?page=products&p=1, index.php?page=products&p=2, etc...
$current_page = isset($_GET['p']) && is_numeric($_GET['p']) ? (int)$_GET['p'] : 1;
// Select products ordered by the date added
$stmt = $pdo->prepare('SELECT * FROM products ORDER BY date_added DESC LIMIT ?,?');
// bindValue will allow us to use integer in the SQL statement, we need to use for LIMIT
$stmt->bindValue(1, ($current_page - 1) * $num_products_on_each_page, PDO::PARAM_INT);
$stmt->bindValue(2, $num_products_on_each_page, PDO::PARAM_INT);
$stmt->execute();
// Fetch the products from the database and return the result as an Array
$products = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Get the total number of products
$total_products = $pdo->query('SELECT * FROM products')->rowCount();
?>

<?=template_header('Products')?>

<div class="container mt-5"> 

    <div class="container mt-5 mb-5 text-center">
        <h2><?=$total_products?> Products Total</H2>
    </div>

    <div class="row">
        <!-- ********************** -->
        <!-- Loop through database -->
        <!-- ********************** -->
        <?php foreach ($products as $product): ?>
        <div class="col-12 col-lg-4 d-flex justify-content-center">
            <!-- Product URL link to page -->
            <a href="index.php?page=product&id=<?=$product['id']?>" class="product">
            <div class="card text-white bg-dark mt-5" style="width: 18rem;">
                  <!-- *********************************** -->
                  <!-- Product image and alternative text -->
                  <!-- *********************************** -->
                  <img class="card-img-top" src="imgs/<?=$product['img']?>" 
                  width="200" height="200" alt="<?=$product['name']?>">
                  <div class="card-body">
                    <!-- ********************** -->
                    <!-- Product name -->
                    <!-- ********************** -->
                    <p class="card-text">
                        <!-- Product name -->
                        <!-- ********************** -->
                        <span class="name"><?=$product['name']?></span>
                        <span class="price">
                        <!-- ********************** -->
                        <!-- Product Price -->    
                        &dollar;<?=$product['price']?>
                    </p>
                </a>
                    <!-- ***************************** --> 
                    <!-- Go to the page of the product -->
                    <!-- ***************************** --> 
                    <a href="index.php?page=product&id=<?=$product['id']?>" class="btn btn-primary mt-2">Deatils</a> 
                </div>
            </div>
        </div>                
        <?php endforeach; ?>
    </div> <!-- row --> 
</div> <!-- container -->
    <!-- Buttons for pagination -->
    <div class="container text-center mt-5 mb-5">
    <div class="buttons mt-5 mb-5">
        <!-- ***************************** --> 
        <!-- Previous button -->
        <!-- ***************************** --> 
        <?php if ($current_page > 1): ?>
        <a class="btn btn-primary" href="index.php?page=products&p=<?=$current_page-1?>">Prev</a>
        <?php endif; ?>
        <!-- ***************************** --> 
        <!-- Next button -->
        <!-- ***************************** --> 
        <?php if ($total_products > ($current_page * $num_products_on_each_page) - $num_products_on_each_page + count($products)): ?>
        <a class="btn btn-primary" href="index.php?page=products&p=<?=$current_page+1?>">Next</a>
        <?php endif; ?>
        <!-- ***************************** --> 
        <!-- Home button -->
        <!-- ***************************** --> 
        <a class="btn btn-primary" href="index.php" role="button">Home</a>

    </div>
    </div>

<?=template_footer()?>