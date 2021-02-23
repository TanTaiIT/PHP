﻿<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/product.php';?>
<?php include '../classes/category.php';?>
<?php include '../classes/brand.php';?>
<?php
    $pro=new product();

    if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['submit'])){
        $insertpro=$pro->insert_product($_POST,$_FILES);
    }
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Add New Product</h2>
        <?php
        if(isset($insertpro)){
            echo $insertpro;
        }
        ?>
        <div class="block">               
         <form action="productadd.php" method="post" enctype="multipart/form-data">
            <table class="form">
               
                <tr>
                    <td>
                        <label>Name</label>
                    </td>
                    <td>
                        <input type="text" name=product_name placeholder="Enter Product Name..." class="medium" />
                    </td>
                </tr>
				<tr>
                    <td>
                        <label>Category</label>
                    </td>
                    <td>
                        <select id="select" name="category">
                            <option>--------Select Category------------</option>
                            <?php
                                $cate=new category();
                                $catelist=$cate->show_category();
                                if($catelist){
                                    while($result=$catelist->fetch_assoc()){

                                        ?>
                                        <option value="<?php echo  $result['cate_id']?>"><?php echo $result['cate_name']?></option>
                                        <?php
                                    }
                                }
                            ?>
                         
                        </select>
                    </td>
                </tr>
				<tr>
                    <td>
                        <label>Brand</label>
                    </td>
                    <td>
                        <select id="select" name="brand">
                            <option>---------Select Brand----------</option>
                            <?php
                            $brand=new brand();
                            $brandlist=$brand->show_brand();
                            if($brandlist){
                                while($result=$brandlist->fetch_assoc()){
                            ?>
                           
                           <option value="<?php echo $result['brand_id']?>"><?php echo $result['brand_name']?></option>
                          <?php
                      }
                  }
                          ?>
                           
                        </select>
                    </td>
                </tr>
				
				 <tr>
                    <td style="vertical-align: top; padding-top: 9px;">
                        <label>Description</label>
                    </td>
                    <td>
                        <textarea name=product_desc class="tinymce"></textarea>
                    </td>
                </tr>
				<tr>
                    <td>
                        <label>Price</label>
                    </td>
                    <td>
                        <input type="text" name=price placeholder="Enter Price..." class="medium" />
                    </td>
                </tr>
            
                <tr>
                    <td>
                        <label>Upload Image</label>
                    </td>
                    <td>
                        <input type="file" name=image />
                    </td>
                </tr>
				
				<tr>
                    <td>
                        <label>Product Type</label>
                    </td>
                    <td>
                        <select id="select" name="type">
                            <option>Select Type</option>
                            <option value="1">Featured</option>
                            <option value="2">Non-Featured</option>
                        </select>
                    </td>
                </tr>

				<tr>
                    <td></td>
                    <td>
                        <input type="submit" name="submit" Value="Save" />
                    </td>
                </tr>
            </table>
            </form>
        </div>
    </div>
</div>
<!-- Load TinyMCE -->
<script src="js/tiny-mce/jquery.tinymce.js" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function () {
        setupTinyMCE();
        setDatePicker('date-picker');
        $('input[type="checkbox"]').fancybutton();
        $('input[type="radio"]').fancybutton();
    });
</script>
<!-- Load TinyMCE -->
<?php include 'inc/footer.php';?>


