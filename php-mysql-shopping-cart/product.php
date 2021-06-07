<?php
// Check to make sure the id parameter is specified in the URL
if (isset($_GET['id'])) {
    // Prepare statement and execute, prevents SQL injection
    $stmt = $pdo->prepare('SELECT * FROM products WHERE id = ?');
    $stmt->execute([$_GET['id']]);
    // Fetch the product from the database and return the result as an Array
    $product = $stmt->fetch(PDO::FETCH_ASSOC);
    // Check if the product exists (array is not empty)
    if (!$product) {
        // Simple error to display if the id for the product doesn't exists (array is empty)
        exit('Product does not exist!');
    }
} else {
    // Simple error to display if the id wasn't specified
    exit('Product does not exist!');
}

//The code above will check if the requested id variable (GET request) exists. 
// If specified, the code will proceed to retrieve the product from the products table in our database.
//If the product doesn't exist in the database, the code will output a simple error, 
// the exit() function will prevent further script execution and display the error.

?>

<?=template_header('Product')?>

        <!-- ********************** -->
        <!-- Display a single product -->
        <!-- ********************** -->
<div class="container mt-5 mb-5">
    <div class="row">
        <div class="container text-center">
        <!-- ********************** -->
        <!-- Display image, price, description -->
        <!-- ********************** -->
            <img src="imgs/<?=$product['img']?>" width="300" height="300" alt="<?=$product['name']?>">
                <h1 class="name"><?=$product['name']?></h1>
                <p class="price">&dollar;<?=$product['price']?></p>
                <p class="description"><?=$product['desc']?></p>
                
        <!-- ********************** -->
        <!-- Quantity, minimum 1 -->
        <!-- ********************** -->        
                <form action="index.php?page=cart" method="post">
                <div class="form-group">
                    <input type="number" name="quantity" value="1" min="1" 
                           max="<?=$product['quantity']?>" placeholder="Quantity" required>
                </div>
                
        <!-- ********************** -->
        <!-- Product ID (hidden) -->
        <!-- ********************** -->        
                <div class="form-group">
                    <input type="hidden" name="product_id" value="<?=$product['id']?>">
                </div>
                
        <!-- ********************** -->
        <!-- Add to cart, and home buttons -->
        <!-- ********************** -->
                <div class="form-group mt-5 mb-5">
                    <input class="btn btn-primary" type="submit" value="Add To Cart">
                    <a class="btn btn-primary" href="index.php" role="button">Home</a>
                </div>
                </form>
        </div> <!--container -->
    </div> <!-- row -->
</div> <!-- container -->


<?=template_footer()?>