<?php

use App\Libraries\Database;

class Blog
{
    private $db;

    public function __construct()
    {
        $this->db=new Database;
    }
    public function showAllBlogs()
    {
        $this->db->query("SELECT * FROM blogs");
        $result = $this->db->resultSet();
        return $result;
    }
    public function getSingleBlog($id)
    {
        $this->db->query("SELECT * FROM blogs WHERE blog_id=$id");
        $result = $this->db->resultSet();
        return $result;
    }
}
