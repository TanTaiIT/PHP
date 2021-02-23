<?php
    $filepath=realpath(dirname(__FILE__));
    require_once ($filepath.'/../lib/database.php');
    require_once ($filepath.'/../Helper/format.php');
?>
<?php
  /**
   * 
   */
  class category 
  {
  	private $db;
  	private $fm;
  	public function __construct()
  	{
  		$this->db=new Database();
  		$this->fm=new format();
  	}
  	public function insert_category($cate_name){
  		$cate_name=$this->fm->validation($cate_name);
  		$cate_name=mysqli_real_escape_string($this->db->link,$cate_name);
  		if(empty($cate_name)){
  			$alert="must be not empty";
  			return $alert;
  		}else{
  			$query="INSERT INTO category(cate_name) VALUES ('$cate_name')";
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
    public function show_category(){
    $query="SELECT * FROM category order by cate_id desc";
    $result=$this->db->select($query);
    return $result;
  }
  public function getcatbyid($id){
    $query="SELECT * FROM category WHERE cate_id='$id' ";
    $result=$this->db->select($query);
    return $result;
  }
  public function edit_category($catename,$id){
    $catename=$this->fm->validation($catename);
    $catename=mysqli_escape_string($this->db->link,$catename);
    $id=mysqli_escape_string($this->db->link,$id);
    if(empty($catename)){
      $alert="Khong duoc de trong";
      return $alert;
    }else{
      $query="UPDATE category SET cate_name='$catename' WHERE cate_id='$id'";
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
  public function delcate($id){
    $query="DELETE FROM category WHERE cate_id='$id'";
    $result=$this->db->delete($query);
    if($result){
      $alert="Xoa thanh cong";
      return $alert;
    }else{
      $alert="Xoa khong thanh cong";
      return $alert;
    }
  }
  }


?>