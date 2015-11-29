<?php include("incl/products.php");  


if (isset($_GET["id"])) {
	$product_id = $_GET["id"];		//$_GET pulls the 'id' from the web address
	
	if (isset($products[$product_id])) {
		$product = $products[$product_id];
	} 
}
if (!isset($product)) {					// !isset = is not set
	header("Location: shirts.php");		//redirects to...
exit();
}



$section = "shirts";
$pageTitle = $product["name"];
include("incl/header.php"); ?>

	<div class="section page">
		<div class ="wrapper">
			<div class ="breadcrumb"><a href="shirts.php">Shirts</a> &gt; <?php echo $product["name"]; ?></div>

			<div class ="shirt-picture">
				<span>
						<img src="<?php echo $product["img"]; ?>" alt="<?php echo $product["name"]; ?>">
				</span>

			</div>

			<div class = "shirt-detials">

				<h1><span class = "price">$<?php echo $product["price"]; ?></span> <?php echo $product["name"]; ?> </h1>  <!--<span> is inside of <h1> because 'price' has a different text sz and color -->
				<!-- this is a modified example paypal shopping cart button. paypal will provide your own button linked to your account -->
				<!-- action=paypal web address // value=paypal item id hash // name=on0 is (option,name,index#) // os0= (option,select,index) -->
				
				<form target="paypal" action="#" method="post">  
				<input type="hidden" name="cmd" value="_s-xclick"> 			
				<input type="hidden" name="hosted-button_id" value='<?php echo $product["paypal"]; ?>'>
				<input type="hidden" name="item_name" value='<?php echo $product["name"]; ?>'>


				<table>
				<tr>
					<th>
						<input type="hidden" name="on0" value="Size">
						<label for="os0">Size</label>
					</th>
					<td><select name="os0" id="os0">
						<?php foreach($product["sizes"] as $size) { ?>
						<option value="<?php echo $size; ?>"><?php echo $size; ?> </option>
						<?php  } ?>
						</select>
					</td>
				</tr> 
				<tr>
					<th>
						<input type="hidden" name="on1" value="Style">
						<label for="os1">Style</label>
					</th>
					<td><select name="os1" id="os1">
						<?php foreach($product["style"] as $style) { ?>
						<option value="<?php echo $style; ?>"><?php echo $style; ?> </option>
						<?php  } ?>
						</select>
					</td>
				</tr>
				<tr>
					<th>
						<label for="message">Message</label>
					</th>
					<td>
						<textarea name="message" id="message"></textarea>
					</td>						
				</tr>
				</table>
				<input type="submit" value="Add to Cart" name="submit">

				<p class="note-designer">* All shirts are designed by a freakin' Frog.</p>
			</div>																			

		</div>
	</div>


<?php include("incl/footer.php"); ?>
