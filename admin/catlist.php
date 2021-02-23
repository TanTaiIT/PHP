<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/category.php';?>
<?php 
$cate=new category();
if(isset($_GET['del_id'])){
	$id=$_GET['del_id'];
	$update=$cate->delcate($id);
}

?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Category List</h2>
                <div class="block">
                <?php
                if(isset($update)){
                	echo $update;
                }
                ?>        
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>Serial No.</th>
							<th>Category Name</th>
							<th>Action</th>
						</tr>
					</thead>
					
					<tbody>
						<?php 
					$show=$cate->show_category();
					if($show){
						$i=0;
						while($result=$show->fetch_assoc()){
							$i++;
					
					?>
						<tr class="odd gradeX">
							<td><?php echo $i?></td>
							<td><?php echo $result['cate_name'] ?></td>
							<td><a href="cate_edit.php?cate_id=<?php echo $result['cate_id']?>">Edit</a> || <a onclick="return confirm('Are you sure want to delete')" href="?del_id=<?php echo $result['cate_id']?>">Delete</a></td>
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

