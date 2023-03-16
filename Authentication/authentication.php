<?php
include 'DB.php';

class Auth
{
    protected $conn;
        public function __construct() 
        {
            $this->conn = new dbclass();
        }

}

class register extends dbclass{

    public function registration($username, $password, $email , $contactno)
    {
        //Email and Phone Number has alredy taken
        $duplicate = mysqli_query($this->conn, "SELECT * FROM user WHERE email = '$email' OR contactno = '$contactno' ");
        if(mysqli_num_rows($duplicate) > 0)
        {
            return 10;
        }
        else
        {
            //Register Successfully
            $query = "INSERT INTO user(username, password, email, contactno) values('$username','$password','$email','$contactno')";
            mysqli_query($this->conn, $query);
            return 1;
        }
    }
}
class Login extends dbclass {
    public $userid;
    // public function __construct() {
    //     parent::__construct();
    // }
    public function log($email, $password) {
        $stmt = $this->conn->prepare("SELECT * FROM user WHERE email=? AND password=MD5(?)");
        $stmt->bind_param("ss", $email, $password);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $this->userid = $row["userid"];
            return true; // success
        } else {
            return false; // invalid login
        }
    }
    public function getUserId() {
        return $this->userid;
    }
}

class Select extends dbclass{
    public function selectUserbyId($userid)
    {
        $result = mysqli_query($this->conn, "SELECT * FROM user WHERE userid = $userid");
        return mysqli_fetch_assoc($result);
    }
}


?>