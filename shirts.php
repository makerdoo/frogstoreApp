<?php include("incl/products.php");  ?><?php
$pageTitle = "Check Out My Cool Shits";
$section = "shirts";
include('incl/header.php'); ?>
                                                            
	<div class="section shirts page">

		<div class="wrapper">

	   		<h1>Mike&rsquo;s Fresh Catalog of Shits</h1>
			<ul class="products">     
				<?php foreach($products as $product_id => $product) {

				echo get_list_view_html($product_id, $product);   
				 }

                ?>

			</ul>

		</div>

	</div>




<?php include('incl/footer.php'); ?>