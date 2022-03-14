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
    public function updateBlog(
        $id,
        $name,
        $description,
        $image
    ) {
        try {
            $this->db->query("UPDATE blogs SET blog_name=:name,
             blog_image=:image,
             blog_description = :description
             WHERE blog_id=$id");
            $this->db->bind(':name', $name);
            $this->db->bind(':image', $image);
            $this->db->bind(':description', $description);
            $this->db->execute();
            return "done";
        } catch (\PDOException $e) {
            return "not";
        }
    }
}
