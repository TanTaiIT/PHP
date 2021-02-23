<?php
     include 'inc/header.php';
      include 'inc/slider.php';
?>

 <div class="main">
 
    <div class="content">
    	<div class="content_top">
    		<div class="heading">
    		<h3>Feature Products</h3>
    		</div>
    		<div class="clear"></div>
    	</div>
	      <div class="section group">
	      	<?php
	      	$getpro=$pro->getproduct_featured();
	      	if($getpro){
	      		while($result=$getpro->fetch_assoc()){
	      	
	      	?>
				<div class="grid_1_of_4 images_1_of_4">
					 <a  href="details.php"><img class="size" src="admin/uploads/<?php echo $result['image']?>" alt="" /></a>
					 <h2><?php echo $result['product_name']?> </h2>
					 <p><?php echo $fm->textshorten ($result['product_desc'],40)?></p>
					 <p><span class="price">$<?php echo $result['price']." "."VND"?></span></p>
				     <div class="button"><span><a href="details.php?pro_id=<?php echo $result['product_id']?>" class="details">Details</a></span></div>
				</div>
			<?php
		}
	}
	?>
			</div>
			<div class="content_bottom">
    		<div class="heading">
    		<h3>New Products</h3>
    		</div>
    		<div class="clear"></div>
    	</div>
			<div class="section group">
				<?php
				$new=$pro->newpro();
				if($new){
					while($result=$new->fetch_assoc()){
				?>
				<div class="grid_1_of_4 images_1_of_4">
					 <a href="details.php"><img class="size" src="admin/uploads/<?php echo $result['image']?>" alt="" /></a>
					 <h2><?php echo $result['product_name']?> </h2>
					 <p><span class="price">$<?php echo $result['price']?></span></p>
				     <div class="button"><span><a href="details.php?pro_id=<?php echo $result['product_id']?>" class="details">Details</a></span></div>
				</div>
				<?php
			}
		}
		?>
			</div>
    </div>
 </div>
 <?php
  include 'inc/footer.php';
 ?>

