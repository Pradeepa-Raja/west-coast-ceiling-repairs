<?php
$cart_items = WC()->cart->get_cart_contents_count();
$cart_summa = strip_tags(WC()->cart->get_cart_subtotal());
?>
<div class="top_panel_cart_button">
	<div class="contact_cart-totals">
		<span>Call Us:</span> <a href="tel:0401856208">0401 856 208</a>
	</div>
	<div class="contact_cart_totals">
		<span class="cart_items">Email: </span><a href="mailto:wc.ceilings@gmail.com" style="color: #000 !important;">wc.ceilings@gmail.com</a>
	</div>
</div>
