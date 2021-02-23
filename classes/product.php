<?php
    $filepath=realpath(dirname(__FILE__));
    include_once ($filepath.'/../lib/database.php');
    include_once ($filepath.'/../Helper/format.php');
?>
<?php
  /**
   * 
   */
  class product
  {
  	private $db;
  	private $fm;
  	public function __construct()
  	{
  		$this->db=new Database();
  		$this->fm=new format();
  	}
  	public function insert_product($data,$files){
  	
  		$product_name=mysqli_real_escape_string($this->db->link,$data['product_name']);
      $brand=mysqli_real_escape_string($this->db->link,$data['brand']);
      $category=mysqli_real_escape_string($this->db->link,$data['category']);
      $product_desc=mysqli_real_escape_string($this->db->link,$data['product_desc']);
      $price=mysqli_real_escape_string($this->db->link,$data['price']);
      $type=mysqli_real_escape_string($this->db->link,$data['type']);
      $permited=array('jpg','jpeg','png','gif');
      $file_name=$_FILES['image']['name'];
      $file_size=$_FILES['image']['size'];
      $file_temp=$_FILES['image']['tmp_name'];
      $div=explode('.',$file_name);
      $file_ext=strtolower(end($div));
      $unique_image=substr(md5(time()),0,10).'.'.$file_ext;
      $uploaded_image="uploads/".$unique_image;
    
  		if($product_name=="" || $brand=="" || $category=="" || $price=="" || $type=="" || $file_name==""){
  			$alert="must be not empty";
  			return $alert;
  		}else{
        move_uploaded_file($file_temp, $uploaded_image);
  			$query="INSERT INTO product(product_name,brand,category,product_desc,price,type,image) VALUES ('$product_name','$brand','$category','$product_desc','$price','$type','$unique_image')";
  			 $result=$this->db->insert($query);
  			 if($result){
          $alert="<span>Insert sucessfully</span>";
          return $alert;
         }else{
           $alert="<span >Insert not sucessfully</span>";
          return $alert;
         }

  		}
  	}
    public function show_product(){
    $query="SELECT product.*,category.cate_name,brand.brand_name FROM product INNER JOIN category ON product.category=category.cate_id
    INNER JOIN brand ON product.brand=brand.brand_id
    ORDER BY product.product_id desc";
    $result=$this->db->select($query);
    return $result;
  }
  public function getprobyid($id){
    $query="SELECT * FROM product WHERE product_id='$id' ";
    $result=$this->db->select($query);
    return $result;
  }
  public function edit_product($data,$id){
      $product_name=mysqli_real_escape_string($this->db->link,$data['product_name']);
      $brand=mysqli_real_escape_string($this->db->link,$data['brand']);
      $category=mysqli_real_escape_string($this->db->link,$data['category']);
      $product_desc=mysqli_real_escape_string($this->db->link,$data['product_desc']);
      $price=mysqli_real_escape_string($this->db->link,$data['price']);
      $type=mysqli_real_escape_string($this->db->link,$data['type']);
      $permited=array('jpg','jpeg','png','gif');
      $file_name=$_FILES['image']['name'];
      $file_size=$_FILES['image']['size'];
      $file_temp=$_FILES['image']['tmp_name'];
      $div=explode('.',$file_name);
      $file_ext=strtolower(end($div));
      $unique_image=substr(md5(time()),0,10).'.'.$file_ext;
      $uploaded_image="uploads/".$unique_image;
      $id=mysqli_escape_string($this->db->link,$id);
    if(empty($catename)){
      $alert="Khong duoc de trong";
      return $alert;
    }else{
      $query="UPDATE product SET product_name='$product_name' and brand='$brand' and category='$category' and product_desc='$product_desc' and price='$price' and type='$type' and image='$unique_image' WHERE product_id='$id'";
      $result=$this->db->update($query);
      if($result){
        $alert='Cap nhat thanh cong';
        return $alert;
      }else{
        $alert="Cap nhat that bai";
        return $alert;
      }
    }
  }
  public function delpro($id){
    $query="DELETE FROM product WHERE product_id='$id'";
    $result=$this->db->delete($query);
    if($result){
      $alert="Xoa thanh cong";
      return $alert;
    }else{
      $alert="Xoa khong thanh cong";
      return $alert;
    }
  }

  //end backend
  public function getproduct_featured(){
     $query="SELECT * FROM product WHERE type='1' ";
    $result=$this->db->select($query);
    return $result;
  }
  public function newpro(){
    $query="SELECT * FROM product order by product_id desc LIMIT 4";
    $result=$this->db->select($query);
    return $result;
  }
  public function get_detail($id){
    $query="SELECT product.*,category.cate_name,brand.brand_name
    FROM product INNER JOIN category ON product.category=category.cate_id
    INNER JOIN brand ON product.brand=brand.brand_id WHERE product_id='$id'";
    $result=$this->db->select($query);
    return $result;
  }
  }


?>