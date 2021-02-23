<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/product.php';?>
<?php include '../classes/category.php';?>
<?php include '../classes/brand.php';?>
<?php
    $pro=new product();
    if(!isset($_GET['pro_id']) || $_GET['pro_id']==NULL){
        echo "<script>window.location='productlist.php'</script>";
    }else{
         $id=$_GET['pro_id'];
    }
    if($_SERVER['REQUEST_METHOD']=='POST'){
             
              $pro_edit=$pro->edit_product($_POST,$_FILES,$id);
    }
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Add New Product</h2>
        <?php
        if(isset($pro_edit)){
            echo $pro_edit;
        }
        ?>
        <div class="block">  
            <?php 
            $pro_get_id=$pro->getprobyid($id);
            if($pro_get_id){
                while($result=$pro_get_id->fetch_assoc()){
            
            ?>
         <form action="" method="post" enctype="multipart/form-data">
            <table class="form">
               
                <tr>
                    <td>
                        <label>Name</label>
                    </td>
                    <td>
                        <input type="text" value="<?php echo $result['product_name']?>" name=product_name placeholder="Enter Product Name..." class="medium" />
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
                        <textarea value="<?php echo $result['product_desc']?>" name=product_desc class="tinymce"></textarea>
                    </td>
                </tr>
				<tr>
                    <td>
                        <label>Price</label>
                    </td>
                    <td>
                        <input type="text" value="<?php echo $result['price']?>" name=price placeholder="Enter Price..." class="medium" />
                    </td>
                </tr>
            
                <tr>
                    <td>
                        <label>Upload Image</label>
                    </td>
                    <td>
                        <input value="<?php echo $result['image']?>" type="file" name=image />
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
            <?php
        }
    }
            ?>
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


