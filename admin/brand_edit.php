<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/brand.php';?>
<?php
  $brand=new brand();
  if(!isset($_GET['brand_id']) || $_GET['brand_id']==NULL){
    echo "<script>window.location='brandlist.php'</script>";
  }else{
    $id=$_GET['brand_id'];
  }
  if($_SERVER['REQUEST_METHOD']=='POST'){
    $brandname=$_POST['brand_name'];
    $editbrand=$brand->edit_brand($brandname,$id);

  }
  
?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Edit New Category</h2>
                <?php
                if(isset($editbrand)){
                    echo $editbrand;
                }
                ?>
              
               <div class="block copyblock"> 
                  <?php
                $get_cate_name=$brand->getcatbyid($id);
                if($get_cate_name){
                    while($result=$get_cate_name->fetch_assoc()){
 
                ?>
                 <form action="" method="POST">
                    <table class="form">					
                        <tr>
                            <td>
                                <input type="text" value="<?php echo $result['brand_name']?>" name=brand_name placeholder="Sua thuong hieu san pham..." class="medium" />
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