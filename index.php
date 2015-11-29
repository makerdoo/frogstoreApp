<?php 
$pageTitle = "Full Cata-Log of Cool Shits";
$section = "home";
include('incl/header.php'); ?>

		<div class="section banner">

			<div class="wrapper">

				<img class="hero" src="img/mike-the-frog.png" alt="Mike the Frog says:">
				<div class="button">
					<a href="shirts.php">
						<h2>Hey, I&rsquo;m a frog!</h2>
						<p>Check Out My Shits</p>
					</a>
				</div>
			</div>

		</div>

		<div class="section shirts latest">

			<div class="wrapper">

				<h2>Mike&rsquo;s Latest Shits</h2>

				<?php include("incl/products.php"); ?>
				<ul class="products">
				<?php 
					//this block will display the last four items (most recent) of our $products array
					$total_products = count($products);
					$position = 0;
					$list_view_html = "";
					foreach($products as $product_id => $product) {
						$position = $position + 1;
						if ($total_products - $position < 4) {
							$list_view_html = get_list_view_html($product_id, $product) . $list_view_html;
							  
						}
					}
					echo $list_view_html;
					
                ?>							
				</ul>

			</div>



		</div>

	<?php include('incl/footer.php'); ?>