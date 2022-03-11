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
                $data="Hello Abhishek";
            } elseif ($result["role"]=="user" && $result["status"]=="approved") {
                $this->userdash();
            } elseif ($result["role"]=="user" && $result["status"]=="pending") {
                $data= "Not Approved";
            } elseif ($result["role"]=="no") {
                $data= "Wrong password or email!";
            } else {
                $data="";
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
}
