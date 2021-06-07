<?php

// Get the 6 most recently added products from the products table, sorted by date
$stmt = $pdo->prepare('SELECT * FROM products ORDER BY date_added DESC LIMIT 6');
// execute the query
$stmt->execute();

$recently_added_products = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<?=template_header('Home')?>

<div class="container mt-5"> 
    <h2 class="text-center">Most Recent Products</h2>
    <div class="row">
        <!-- ********************** -->
        <!-- Loop through database -->
        <!-- ********************** -->
        <?php foreach ($recently_added_products as $product): ?>
        <div class="col-12 col-lg-4 d-flex justify-content-center">
            <!-- Product URL link to page -->
            <a href="index.php?page=product&id=<?=$product['id']?>" class="product">
            <div class="card text-white bg-dark mt-5" style="width: 18rem;">
                  <!-- *********************************** -->
                  <!-- Product image and alternative text -->
                  <!-- *********************************** -->
                  <img class="card-img-top" src="imgs/<?=$product['img']?>" width="200" height="200" alt="<?=$product['name']?>">
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

<?=template_footer()?>