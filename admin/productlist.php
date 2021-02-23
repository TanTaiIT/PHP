<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/product.php';?>
<?php
    $pro=new product();
    
    if(isset($_GET['del_id']))	{
    	$id=$_GET['del_id'];
    	$update=$pro->delpro($id);
    }

?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Post List</h2>
        <div class="block">  
            <table class="data display datatable" id="example">
			<thead>
				<tr>
					<th>STT</th>
					<th>Product Name</th>
					<th>Category</th>
					<th>Brand</th>
					<th>Image</th>
					<th>Description</th>
					<th>price</th>
					<th>Type</th>
				</tr>
			</thead>
			<tbody>
				<?php
				$i=0;
				$prolist=$pro->show_product();
				     if($prolist){

				     	while($result=$prolist->fetch_assoc()){
				     $i++;
				?>
				<tr class="odd gradeX">
					<td><?php echo $i ?></td>
					<td><?php echo $result['product_name']?></td>
					<td><?php echo $result['cate_name']?></td>
					<td><?php echo $result['brand_name']?></td>
					<td><img width="70px" src="uploads/<?php echo $result['image']?>"></td>
					<td><?php echo $result['product_desc']?></td>
					<td><?php echo $result['price']?></td>
					<td><?php echo $result['type']?></td>
					
					<td><a href="product_edit.php?pro_id=<?php echo $result['product_id']?>">Edit</a> || <a onclick="return confirm('ban co chac muon xoa khong')" href="?del_id=<?php echo $result['product_id']?>">Delete</a></td>
				</tr>
				<?php
			}
		}
				?>
			</tbody>
		</table>

       </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function () {
        setupLeftMenu();
        $('.datatable').dataTable();
		setSidebarHeight();
    });
</script>
<?php include 'inc/footer.php';?>
