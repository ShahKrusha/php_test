<?php 

require_once('class-db.php');

    class UserDetails extends dbclass {
        private $userid;
        private $username;
        public $password;
        private $email;
        private $contactno;


        public function registeruser($data) {
            $username = $data['username'];
            $password = MD5($data['password']);
            $email = $data['email'];
            $contactno = $data['contactno'];

            $duplicate = mysqli_query($this->conn, "SELECT * FROM user WHERE email = '$email' OR contactno = '$contactno' ");
            if(mysqli_num_rows($duplicate) > 0)
            {
                return 10;
            }
            else
            {
                //Register Successfully
                $sql = "INSERT INTO user(username, password, email, contactno) values('$username','$password','$email','$contactno')";
                $result = $this->query($sql);

                return 1;
            }

        }

        public function loginuser($email, $password) {
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

        public function getuserid() {
            return $this->userid;
        }

    }

?>