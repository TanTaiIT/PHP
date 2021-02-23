<?php 
    include 'inc/header.php';
    include 'inc/slider.php';
?>
<?php 
     if(!isset($_GET['pro_id']) || $_GET['pro_id']==NULL){
     	echo "<script>window.location='404.php'</script>";
     }else{
     	$id=$_GET['pro_id'];
     }
     if(($_SERVER['REQUEST_METHOD']=='POST' && $_POST['submit'])){
     	$quantity=$_POST['quantity'];
     	$addcart=$cart->add_to_cart($quantity,$id);
     }

?>

 <div class="main">
    <div class="content">
    	<div class="section group">
    		<?php
    		$detail=$pro->get_detail($id);
    		if($detail){
    			while($result=$detail->fetch_assoc()){
    		?>
				<div class="cont-desc span_1_of_2">				
					<div class="grid images_3_of_2">
						<img src="admin/uploads/<?php echo $result['image']?>" alt="" />
					</div>
				<div class="desc span_3_of_2">
					<h2><?php echo $result['product_name']?></h2>
					<p><?php echo $result['product_desc']?></p>					
					<div class="price">
						<p>Price: <span>$<?php echo $result['price']?></span></p>
						<p>Category: <span><?php echo $result['cate_name']?></span></p>
						<p>Brand:<span><?php echo $result['brand_name']?></span></p>
					</div>
				<div class="add-cart">
					<form action="" method="post">
						<input type="number" class="buyfield" name="quantity" value="1" min="1" />
						<input type="submit" class="buysubmit" name="submit" value="Buy Now"/>
						<?php
						if(isset($addcart)){
							echo $addcart;
						}
						?>
					</form>				
				</div>
			</div>
			<div class="product-desc">
			<h2>Product Details</h2>
			<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
	        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
	    </div>
				
	</div>
	<?php 
}
}
?>
				<div class="rightsidebar span_3_of_1">
					<h2>CATEGORIES</h2>
					<ul>
				      <li><a href="productbycat.php">Mobile Phones</a></li>
				      <li><a href="productbycat.php">Desktop</a></li>
				      <li><a href="productbycat.php">Laptop</a></li>
				      <li><a href="productbycat.php">Accessories</a></li>
				      <li><a href="productbycat.php#">Software</a></li>
					   <li><a href="productbycat.php">Sports & Fitness</a></li>
					   <li><a href="productbycat.php">Footwear</a></li>
					   <li><a href="productbycat.php">Jewellery</a></li>
					   <li><a href="productbycat.php">Clothing</a></li>
					   <li><a href="productbycat.php">Home Decor & Kitchen</a></li>
					   <li><a href="productbycat.php">Beauty & Healthcare</a></li>
					   <li><a href="productbycat.php">Toys, Kids & Babies</a></li>
    				</ul>
    	
 				</div>
 		</div>
 	</div>
<?php 
    include 'inc/footer.php';
    
?>

