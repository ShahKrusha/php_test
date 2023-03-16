<?php 
require_once('../../Model/class-user.php');
class userController extends UserDetails {
    public $user;

        public function __construct() {
            $this->db = new dbclass();
            $this->user = new UserDetails();
        }

        public function register() {
            if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
                $result = $this->user->registerUser($_POST);
                if ($result) {
                    $_SESSION['success'] = '';
                } else {
                    $_SESSION['Error'] = '';
                }
                // Redirect to category list page after update
                header("Location: LoginUser.php");
                exit;
            }
         }

         public function login() {
            if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login'])) {
                $email = trim($_POST['email']);
                $password = trim($_POST['password']);
        
                if($this->user->loginUser($email, $password)) {
                    $_SESSION['login'] = true;
                    $_SESSION['userid'] = $this->user->getUserId();
                    $_SESSION['message'] = '';
                    header("Location: ../cat/index.php");
                    exit;
                }
                else {
                    $_SESSION['error'] = '';
                }
            }
        }
        
}

?>