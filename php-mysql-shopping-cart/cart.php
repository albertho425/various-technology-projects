<?php

//In the code above we make use of the PHP session variables. We can use PHP sessions to remember the shopping cart products, for example, when a customer navigates to another page etc, the shopping cart will still contain the products previously added until the session expires.
//The code above will check if a product was added to cart. If you go back to the product.php file you can see that we created an HTML form. We are checking for those form values, if the product exists, proceed to verify the product by selecting it from our products table in our database. We wouldn't want customers manipulating the system and adding non-existent products.
//The session variable cart will be an associated array of products, and with this array, we can add multiple products to the shopping cart. The array key will be the product ID and the value will be the quantity. If a product already exists in the shopping cart all we have to do is update the quantity.

// If the user clicked the add to cart button on the product page we can check for the form data
if (isset($_POST['product_id'], $_POST['quantity']) && is_numeric($_POST['product_id']) && is_numeric($_POST['quantity'])) {
    // Set the post variables so we easily identify them, also make sure they are integer
    $product_id = (int)$_POST['product_id'];
    $quantity = (int)$_POST['quantity'];
    // Prepare the SQL statement, we basically are checking if the product exists in our databaser
    $stmt = $pdo->prepare('SELECT * FROM products WHERE id = ?');
    $stmt->execute([$_POST['product_id']]);
    // Fetch the product from the database and return the result as an Array
    $product = $stmt->fetch(PDO::FETCH_ASSOC);
    // Check if the product exists (array is not empty)
    if ($product && $quantity > 0) {
        // Product exists in database, now we can create/update the session variable for the cart
        if (isset($_SESSION['cart']) && is_array($_SESSION['cart'])) {
            if (array_key_exists($product_id, $_SESSION['cart'])) {
                // Product exists in cart so just update the quanity
                $_SESSION['cart'][$product_id] += $quantity;
            } else {
                // Product is not in cart so add it
                $_SESSION['cart'][$product_id] = $quantity;
            }
        } else {
            // There are no products in cart, this will add the first product to cart
            $_SESSION['cart'] = array($product_id => $quantity);
        }
    }
    // Prevent form resubmission...
    header('location: index.php?page=cart');
    exit;
}

// Remove product from cart, check for the URL param "remove", this is the product id, make sure it's a number and check if it's in the cart
if (isset($_GET['remove']) && is_numeric($_GET['remove']) && isset($_SESSION['cart']) && isset($_SESSION['cart'][$_GET['remove']])) {
    // Remove the product from the shopping cart
    unset($_SESSION['cart'][$_GET['remove']]);
}

// Update product quantities in cart if the user clicks the "Update" button on the shopping cart page
if (isset($_POST['update']) && isset($_SESSION['cart'])) {
    // Loop through the post data so we can update the quantities for every product in cart
    foreach ($_POST as $k => $v) {
        if (strpos($k, 'quantity') !== false && is_numeric($v)) {
            $id = str_replace('quantity-', '', $k);
            $quantity = (int)$v;
            // Always do checks and validation
            if (is_numeric($id) && isset($_SESSION['cart'][$id]) && $quantity > 0) {
                // Update new quantity
                $_SESSION['cart'][$id] = $quantity;
            }
        }
    }
    // Prevent form resubmission...
    header('location: index.php?page=cart');
    exit;
    
    //The code above will iterate the products in the shopping cart and update the quantities. The customer will have the ability to change the quantities on the shopping cart page. The Update button has a name of update, as this is how the code will know when to update the quantities using a POST request.
    
    
}

// Send the user to the place order page if they click the Place Order button, also the cart should not be empty
if (isset($_POST['placeorder']) && isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
    header('Location: index.php?page=placeorder');
    exit;
}

// Check the session variable for products in cart
$products_in_cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : array();
$products = array();
$subtotal = 0.00;
// If there are products in cart
if ($products_in_cart) {
    // There are products in the cart so we need to select those products from the database
    // Products in cart array to question mark string array, we need the SQL statement to include IN (?,?,?,...etc)
    $array_to_question_marks = implode(',', array_fill(0, count($products_in_cart), '?'));
    $stmt = $pdo->prepare('SELECT * FROM products WHERE id IN (' . $array_to_question_marks . ')');
    // We only need the array keys, not the values, the keys are the id's of the products
    $stmt->execute(array_keys($products_in_cart));
    // Fetch the products from the database and return the result as an Array
    $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
    // Calculate the subtotal
    foreach ($products as $product) {
        $subtotal += (float)$product['price'] * (int)$products_in_cart[$product['id']];
    }
}

//If there are products in the shopping cart, retrieve those products from our products table, along with the following column name: product name, description, image, and price, as before we didn't store this information in our session variable.
//We also calculate the subtotal by iterating the products and multiplying the price by the quantity.

?>

<?=template_header('Cart')?>

<div class="container mt-5 mb-5">
    <h2 class="mt-2 mb-2">Shopping Cart</h1>
    <form action="index.php?page=cart" method="post">
        <div class="table-responsive">
        <table class="table table-striped table-bordered table-hover 
                      table-dark table-sm mt-5 mb-5">
            <thead="thead-light">
                <tr>
                    <th scope="col"> Image</th>
                    <th scope="col"> Info</th>
                    <th scope="col"> Price</th>
                    <th scope="col"> Quantity</th>
                    <th scope="col"> Total</th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($products)): ?>
                <tr>
                    <td  style="text-align:center;">Your shopping cart is empty</td>
                </tr>
                <?php else: ?>
                <?php foreach ($products as $product): ?>
                <tr>
                    <td><!-- Image of product and link to the product page -->
                        <a href="index.php?page=product&id=<?=$product['id']?>">
                        <img src="imgs/<?=$product['img']?>" width="50" height="50" alt="<?=$product['name']?>">
                        </a>
                    </td>
                    <td>
                        <!-- Name of product and link to the product page -->
                        <a href="index.php?page=product&id=<?=$product['id']?>"><?=$product['name']?></a>
                        <br>
                        <a href="index.php?page=cart&remove=<?=$product['id']?>" class="btn btn-danger">Remove</a>
                    </td>
                    <td class="">&dollar;<?=$product['price']?></td>
                    <td class="col-md-3">
                        <!-- Qunaity of product -->
                        <div class="form-group">
                        <input type="number" class="form-control" name="quantity-<?=$product['id']?>" 
                              value="<?=$products_in_cart[$product['id']]?>" 
                              min="1" max="<?=$product['quantity']?>" placeholder="Quantity" required>
                        </div>
                    </td>
                    <td class="col-md-3">&dollar;<?=$product['price'] * $products_in_cart[$product['id']]?></td>
                </tr>
                <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
        </div> <!--table-responsive -->
        <div class="subtotal">
            <span class="text">Subtotal</span>
            <span class="price">&dollar;<?=$subtotal?></span>
        </div> <!-- subtotal -->
        <div class="buttons mt-5 mb-5">
            <input type="submit" class="btn btn-danger" value="Update" name="update">
            <input type="submit" class="btn btn-primary" value="Place Order" name="placeorder">
            <a class="btn btn-primary" href="index.php" role="button">Home</a>

        </div> <!-- buttons -->
    </form>
</div> <!-- container -->

<?=template_footer()?>

