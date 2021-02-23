<?php
    $filepath=realpath(dirname(__FILE__));
    include ($filepath.'/../lib/session.php');
    session::checkLogin();
    include ($filepath.'/../lib/database.php');
    include ($filepath.'/../Helper/format.php');
?>
<?php
  /**
   * 
   */
  class admin_login 
  {
  	private $db;
  	private $fm;
  	public function __construct()
  	{
  		$this->db=new Database();
  		$this->fm=new format();
  	}
  	public function login_admin($admin_user,$admin_pass){
  		$admin_user=$this->fm->validation($admin_user);
  		$admin_pass=$this->fm->validation($admin_pass);
  		$admin_user=mysqli_real_escape_string($this->db->link,$admin_user);
  		$admin_pass=mysqli_real_escape_string($this->db->link,$admin_pass);
  		if(empty($admin_user) || empty($admin_pass)){
  			$alert="User and password must be not empty";
  			return $alert;
  		}else{
  			$query="SELECT * FROM admin WHERE admin_user='$admin_user' AND admin_pass='$admin_pass' LIMIT 1";
  			 $result=$this->db->select($query);
  			 if($result!=false){
  			 	$value=$result->fetch_assoc();
  			 	Session::set('login',true);
  			 	Session::set('adminid',$value['admin_id']);
  			 	Session::set('adminuser',$value['admin_user']);
  			 	Session::set('adminname',$value['admin_name']);
  			 	header('Location:index.php');
  			 }else{
  			 	$alert="Your user and Password no match";
  			 	return $alert;
  			 }

  		}
  	}
  }

?>