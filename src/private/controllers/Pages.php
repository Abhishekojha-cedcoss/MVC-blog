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
        if (isset($_POST["submit"])) {
            $email=$_POST['email']??'';
            $password=$_POST['password']??'';
            $result=$this->userModel->checkUser($email, $password);
            
            if ($result["role"]=="admin") {
                $this->admindash();
            } elseif ($result["role"]=="user" && $result["status"]=="approved") {
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
    public function profile($id)
    {

        $this->view('pages/profile');
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
                $this->adminHome();
            } else {
                echo "There was some error. Please Try After some time!";
            }
        }
    }
}
