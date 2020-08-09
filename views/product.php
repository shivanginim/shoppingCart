<?php
// Check to make sure the id parameter is specified in the URL
if (isset($_GET['id'])) {
 // Prepare statement and execute
 $stmt = $pdo->prepare('SELECT * FROM products WHERE id = ?');
 $stmt->execute([$_GET['id']]);
 
 // Fetch the product from the database and return the result as an Array
 $product = $stmt->fetch(PDO::FETCH_ASSOC);
 
 // Check if the product exists (array is not empty)
 if (!$product) {
  // Simple error to display if the id for the product doesn't exists (array is empty)
  die ('Product does not exist!');
 }
} else {
 die ('Product does not exist!');
}

templateHeader('Product');
?>

<div class="product content-wrapper">
  <div>
    <h1 class="name"><?=$product['name']?></h1>
    <span class="price">
      &dollar;<?=number_format($product['price'],2)?>
    </span>
    <form action="index.php?page=cart" method="post">
      <input type="number" name="quantity" value="1" min="1" max="<?=$product['quantity']?>" placeholder="Quantity" required>
      <input type="hidden" name="product_id" value="<?=$product['id']?>">
      <input type="submit" value="Add To Cart">
    </form>
  </div>
</div>

<?=templateFooter()?>