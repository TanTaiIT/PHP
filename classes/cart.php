<?php
    $filepath=realpath(dirname(__FILE__));
    require_once ($filepath.'/../lib/database.php');
    require_once ($filepath.'/../Helper/format.php');
?>
<?php
  /**
   * 
   */
  class cart
  {
  	private $db;
  	private $fm;
  	public function __construct()
  	{
  		$this->db=new Database();
  		$this->fm=new format();
  	}
    public function add_to_cart($quantity,$id){
      $quantity=$this->fm->validation($quantity); 
       $quantity=mysqli_real_escape_string($this->db->link,$quantity);
       $id=mysqli_real_escape_string($this->db->link,$id);
       $sec_id=session_id();
       $query="SELECT * FROM product WHERE product_id='$id'";
       $result=$this->db->select($query)->fetch_assoc();
       $image=$result['image'];
       $price=$result['price'];
       $proname=$result['product_name'];
       // $check_cart="SELECT * FROM cart WHERE sec_id='$sec_id' AND product_id='$id'";
       // if($check_cart){
       //  $mes="khong them vao dc";
       //  return $mes;
       // }else{
        $query1="INSERT INTO cart(product_id,sec_id,product_name,price,quantity,image) VALUES ('$id','$sec_id','$proname','$price','$quantity','$price')";
         $insert_cart=$this->db->insert($query1);
         if($insert_cart){
           header('Location:cart.php');
         }else{
           header('Location:404.php');
         }
       }

         
    }
  	
  


?>