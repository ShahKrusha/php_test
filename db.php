<?php
define('DB_SERVER','localhost');
define('DB_USER','root');
define('DB_PASS' ,'root');
define('DB_NAME', 'category_db');
$con = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME);

class DB_con
{
	public $dbh;
	function __construct()
	{
		$con = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME);
		$this->dbh=$con;
		// Check connection
		if (mysqli_connect_errno())
		{
			echo "Failed to connect to MySQL: " . mysqli_connect_error();
		}
	}
	//Data read Function
	public function fetchdata()
	{
		$result=mysqli_query($this->dbh,"select * from categories");
		return $result;
	}
	//Data Insertion Function
	public function insert($parent_id,$category_name,$category_description,$status)
	{
	$ret=mysqli_query($this->dbh,"insert into categories(parent_id,category_name,category_description,status) values('$parent_id','$category_name','$category_description','Active')");
	return $ret;
	}
	//Data one record read Function
	public function fetchonerecord($catid)
	{
		$oneresult=mysqli_query($this->dbh,"select * from categories where id=$catid");
		return $oneresult;
	}
	//Data updation Function
	public function update($parent_id,$category_name,$category_description,$status,$catid)
	{
		$updaterecord=mysqli_query($this->dbh,"update categories set parent_id='$parent_id',category_name='$category_name',category_description='$category_description' where id='$catid' ");
		return $updaterecord;
	}
	//Data Deletion function Function
	public function delete($rid)
	{
        $deleterecord=mysqli_query($this->dbh,"delete from categories where id=$rid");
        return $deleterecord;
	}
	public function treeCat($parent_id = "") {
        $result = mysqli_query($this->dbh, "select * from categories");
        return $result;
    }

    //Change Status
		public function changeStatus($stid)
	    {
	    	if(isset($_GET["stid"])) 
	    	{
		        if($_GET["status"]=="Active")
		        {
		            $statuschange = mysqli_query($this->dbh, "update categories set status='Deactive' where id='".$_GET["stid"]."' ");
		            return $statuschange;
		        }
		        else
		        {
		            $statuschange = mysqli_query($this->dbh, "update categories set status='Active' where id='".$_GET["stid"]."' ");
		            return $statuschange;
		        }
		        echo "<script>window.location='index.php';</script>";
	    	} 
	    }
}
?>