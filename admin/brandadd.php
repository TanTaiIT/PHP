<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/brand.php';?>
<?php
    $cat=new brand();
    if($_SERVER['REQUEST_METHOD']=='POST'){
        $brandname=$_POST['brand_name'];
        $insertbrand=$cat->insert_brand($brandname);
    }
?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Add New Category</h2>
                <?php
                if(isset($insertbrand)){
                    echo $insertbrand;
                }
                ?>
               <div class="block copyblock"> 
                 <form action="brandadd.php" method="POST">
                    <table class="form">					
                        <tr>
                            <td>
                                <input type="text" name=brand_name placeholder="them danh muc san pham..." class="medium" />
                            </td>
                        </tr>
						<tr> 
                            <td>
                                <input type="submit" name="submit" Value="Save" />
                            </td>
                        </tr>
                    </table>
                    </form>
                </div>
            </div>
        </div>
<?php include 'inc/footer.php';?>