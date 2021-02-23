<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/category.php';?>
<?php
  $cat=new category();
  if(!isset($_GET['cate_id']) || $_GET['cate_id']==NULL){
    echo "<script>window.location='catlist.php'</script>";
  }else{
    $id=$_GET['cate_id'];
  }
  if($_SERVER['REQUEST_METHOD']=='POST'){
    $catename=$_POST['cat_name'];
    $editcate=$cat->edit_category($catename,$id);

  }
  
?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Edit New Category</h2>
                <?php
                if(isset($editcate)){
                    echo $editcate;
                }
                ?>
              
               <div class="block copyblock"> 
                  <?php
                $get_cate_name=$cat->getcatbyid($id);
                if($get_cate_name){
                    while($result=$get_cate_name->fetch_assoc()){
 
                ?>
                 <form action="" method="POST">
                    <table class="form">					
                        <tr>
                            <td>
                                <input type="text" value="<?php echo $result['cate_name']?>" name=cat_name placeholder="Sua danh muc san pham..." class="medium" />
                            </td>
                        </tr>
						<tr> 
                            <td>
                                <input type="submit" name="submit" Value="Edit" />
                            </td>
                        </tr>
                    </table>
                    </form>
                      <?php
                     }
                }
                ?>
                </div>
              
            </div>
        </div>
<?php include 'inc/footer.php';?>