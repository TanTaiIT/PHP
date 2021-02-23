<?php
    $filepath=realpath(dirname(__FILE__));
    require_once ($filepath.'/../lib/database.php');
    require_once ($filepath.'/../Helper/format.php');
?>
<?php
  /**
   * 
   */
  class brand
  {
  	private $db;
  	private $fm;
  	public function __construct()
  	{
  		$this->db=new Database();
  		$this->fm=new format();
  	}
  	public function insert_brand($brand_name){
  		$brand_name=$this->fm->validation($brand_name);
  		$brand_name=mysqli_real_escape_string($this->db->link,$brand_name);
  		if(empty($brand_name)){
  			$alert="must be not empty";
  			return $alert;
  		}else{
  			$query="INSERT INTO brand(brand_name) VALUES ('$brand_name')";
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
    public function show_brand(){
    $query="SELECT * FROM brand order by brand_id desc";
    $result=$this->db->select($query);
    return $result;
  }
  public function getcatbyid($id){
    $query="SELECT * FROM brand WHERE brand_id='$id' ";
    $result=$this->db->select($query);
    return $result;
  }
  public function edit_brand($brandname,$id){
    $brandname=$this->fm->validation($brandname);
    $brandname=mysqli_escape_string($this->db->link,$brandname);
    $id=mysqli_escape_string($this->db->link,$id);
    if(empty($brandname)){
      $alert="Khong duoc de trong";
      return $alert;
    }else{
      $query="UPDATE brand SET brand_name='$brandname' WHERE brand_id='$id'";
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
  public function delbrand($id){
    $query="DELETE FROM brand WHERE brand_id='$id'";
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