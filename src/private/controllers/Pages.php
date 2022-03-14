<?php
namespace App\Controllers;

use App\Libraries\Controller;

class Pages extends Controller
{
    public function __construct()
    {
        $this->userModel = $this->model('User');
        $this->blogModel = $this->model('Blog');
    }

    public function index()
    {
        $data= [
            "title"=>"Home Page",
            "name"=>"Abhishek"
        ];
        $this->view('pages/index', $data);
    }

    public function login()
    {
        $data="";
        if (isset($_SESSION["users"])) {
            unset($_SESSION["users"]);
            session_destroy();
        }
        if (isset($_POST["submit"])) {
            $email=$_POST['email']??'';
            $password=$_POST['password']??'';
            $result=$this->userModel->checkUser($email, $password);
            
            if ($result["role"]=="admin") {
                $_SESSION["user"]=$result;
                $this->adminHome();
            } elseif ($result["role"]=="user" && $result["status"]=="approved") {
                $_SESSION["user"]=$result;
                $this->userdash();
            } elseif ($result["role"]=="user" && $result["status"]=="pending") {
                $data= "Not Approved";
                $this->view('pages/login', $data);
            } elseif ($result["role"]=="no") {
                $data= "Wrong password or email!";
                $this->view('pages/login', $data);
            } else {
                $data="";
                $this->view('pages/login', $data);
            }
        } else {
            $this->view('pages/login', $data);
        }
        
    }
    public function userdash()
    {
        $result1=$this->blogModel->showAllBlogs();
        $this->view('pages/userdash', $result1);
    }
    public function viewProduct()
    {
        // echo "reached";
        if (isset($_POST["submit"])) {
            $id=$_POST["id"];
            $result1=$this->blogModel->getSingleBlog($id);
            $this->view('pages/viewBlog', $result1);
        }
    }
    public function profile()
    {
        if (isset($_POST["submit"])) {
            $fname=$_POST["fname"];
            $lname=$_POST["lname"];
            $password=$_POST["password"];
            $email=$_POST["emailid"];
            $this->userModel->updateUserDetails($fname, $lname, $password, $email);
            $_SESSION["user"]["firstName"]=$fname;
            $_SESSION["user"]["lastname"]=$lname;
            $_SESSION["user"]["password"]=$password;
        }
        $data=$_SESSION["user"];
        $this->view('pages/profile', $data);
    }
    public function admindash()
    {
        if (isset($_POST["submit"])) {
            $id = $_POST["id"];
            $result1=$this->userModel->updateStatus($id);
            foreach ($result1 as $k => $v) {
                if ($v["Status"] == "pending") {
                    $this->userModel->statusApproved($id);
                } elseif ($v["Status"] == "approved") {
                    $this->userModel->statusPending($id);
                }
            }
        }
        if (isset($_POST["submit1"])) {
            $id1 = $_POST["del"];
            $this->userModel->deleteUser($id1);
        }
        $result2=$this->userModel->getAllUsers();
        $this->view('pages/admin/dashboard', $result2);
    }
    public function adminHome()
    {
        if (isset($_POST["delete"])) {
            $id=$_POST["id"];
            $this->blogModel->deleteBlog($id);
        }
        $result1=$this->blogModel->showAllBlogs();
        $this->view('pages/admin/home', $result1);
    }
    public function viewProductAdmin()
    {
        // echo "reached";
        if (isset($_POST["submit"])) {
            $id=$_POST["id"];
            $result1=$this->blogModel->getSingleBlog($id);
            $this->view('pages/admin/single-product', $result1);
        }
    }
    public function editBlog()
    {
        $arr=array();
        if (isset($_POST["edit"])) {
            $pid=$_POST["id"];
            $name=$_POST["name"];
            $image=$_POST["image"];
            $description=$_POST["description"];
            $arr=array("id"=>$pid,"name"=>$name,"image"=>$image,"description"=>$description);
            $this->view('pages/admin/editblog', $arr);
        }
        if (isset($_POST["update"])) {
            $id=$_POST["prodID"];
            $bname=$_POST["bname"];
            $description=$_POST["description"];
            // die($description);
            $image=$_POST["image"];
            $result1=$this->blogModel->updateBlog($id, $bname, $description, $image);
            if ($result1=="done") {
                if ($_SESSION["user"]["role"]=="admin") {
                    $this->adminHome();
                    exit();
                } elseif ($_SESSION["user"]["role"]=="user") {
                    $this->myblog();
                    exit();
                }
            } else {
                echo "There was some error. Please Try After some time!";
            }
        }
        if (isset($_POST["delete"])) {
            $id=$_POST["id"];
            $this->blogModel->deleteBlog($id);
            if ($_SESSION["user"]["role"]=="admin") {
                $this->adminHome();
            } elseif ($_SESSION["user"]["role"]=="user") {
                $this->myblog();
            }
        }
    }
    public function addNewBlog()
    {
        if (isset($_POST["add"])) {
            $userid=$_SESSION["user"]["id"];
            $userid=$_SESSION["user"]["user_id"];
            $bname=$_POST["bname"];
            $description=$_POST["description"];
            $image=$_POST["image"];
            $res=$this->blogModel->addNewBlog($bname, $description, $image, $userid);
            if ($res=="done") {
                $this->adminhome();
            }
        }
        $this->view('pages/admin/addNewBlog');
    }
    public function signup()
    {
        if (isset($_SESSION["user"])) {
            unset($_SESSION["user"]);
        }
        $data="";
        $email=$username=$firstname=$lastname=$password="";
        if (isset($_POST['submit'])) {
            $email=$_POST["email"];
            $username=$_POST["username"];
            $firstname=$_POST["firstname"];
            $lastname=$_POST["lastname"];
            $password=$_POST["password"];
        
            $data=$this->userModel->addUser($username, $firstname, $lastname, $password, $email);
        }
        $this->view("pages/signup", $data);
    }
    public function addNewBlogbyUser()
    {
        if (isset($_POST["add"])) {
            // die($_SESSION["user"]["id"]);
            $userid=$_SESSION["user"]["id"];
            $bname=$_POST["bname"];
            $description=$_POST["description"];
            $image=$_POST["image"];
            $res=$this->blogModel->addNewBlog($bname, $description, $image, $userid);
            if ($res=="done") {
                $this->myblog();
                exit();
            }
        }
        $this->view('pages/addNewBlogByUser');
        
    }
    public function myblog()
    {
        if (isset($_POST["delete"])) {
            $id=$_POST["id"];
            $this->blogModel->deleteBlog($id);
        }
        $userid=$_SESSION["user"]["id"];
        $result1=$this->blogModel->getBlogById($userid);
        $this->view("pages/myblog", $result1);
    }
}
