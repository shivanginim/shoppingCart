<?php
//Select all the productes from database
$stmt = $pdo->prepare('SELECT * FROM products');
$stmt->execute();
$all_products = $stmt->fetchAll(PDO::FETCH_ASSOC);
$total_products = $pdo->query('SELECT * FROM products')->rowCount();

//Products Page Template starts from here
templateHeader('Products');
?>
<div class="products content-wrapper">
  <h1>Products</h1>
  <p><?=$total_products?> Products</p>
  <div class="products-wrapper">
    <?php foreach ($all_products as $product): ?>
    <a href="index.php?page=product&id=<?=$product['id']?>" class="product">
      <span class="name"><?=$product['name']?></span>
      <span class="price">
          &dollar;<?=$product['price']?>
      </span>
    </a>
		<form action="index.php?page=cart" method="post">
      <input type="hidden" name="quantity" value="1">
      <input type="hidden" name="product_id" value="<?=$product['id']?>">
      <input type="submit" value="Add To Cart">
    </form>
    <?php endforeach; ?>
  </div>
</div>

<?=templateFooter()?>