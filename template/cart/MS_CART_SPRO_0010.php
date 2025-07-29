<?php 
	$total_cart = 0;
	if (isset($_SESSION['shopping_cart'])) {
		foreach ($_SESSION['shopping_cart'] as $v) {
			$total_cart++;
		}
	}
?>
<div class="shopping-cart">
    <i class="fa fa-shopping-basket" aria-hidden="true"></i>
    <span class="number-item badge1"><?= $total_cart ?></span>
</div>