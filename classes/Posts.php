<?php

class Posts extends Dbh
{
    public function getPosts()
    {
        $sql = "SELECT * FROM tbl_posts  ORDER BY id DESC";
        $stmt = $this->connect()->query($sql);
        $posts = $stmt->fetchAll();
        return $posts;
    }

    public function getRandomPost()
    {
        $sql = "SELECT * FROM tbl_posts ORDER BY RAND() LIMIT 1";
        $stmt = $this->connect()->query($sql);
        $post = $stmt->fetchAll();
        return $post;
    }

    public function getRandomPosts()
    {
        $sql = "SELECT * FROM tbl_posts ORDER BY RAND() LIMIT 4";
        $stmt = $this->connect()->query($sql);
        $post = $stmt->fetchAll();
        return $post;
    }

    public function getLatestPosts()
    {
        $sql = "SELECT * FROM tbl_posts ORDER BY id DESC LIMIT 6";
        $stmt = $this->connect()->query($sql);
        $posts = $stmt->fetchAll();
        return $posts;
    }

    public function search($title)
    {
        $searchContent = "%" . $title . "%";

        $sql = "SELECT * FROM tbl_posts WHERE title LIKE ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$searchContent]);
        $result = $stmt->fetchAll();
        return $result;
    }

    public function createPost($author, $catId, $title, $slug, $image, $body, $dateAdded)
    {
        $sql = "INSERT INTO tbl_posts(`user_id`, category_id, title, slug, `image`, body, created_at)
                VALUES(?,?,?,?,?,?,?)";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$author, $catId, $title, $slug, $image, $body, $dateAdded]);
    }

    protected function updatePost($catId, $title, $slug, $image, $body, $postId)
    {
        $sql = "UPDATE tbl_posts SET category_id = ?, title= ? ,slug = ?, `image` = ?, body= ? WHERE id = ?";
        $stmt = $this->connect()->prepare($sql);
        $result = $stmt->execute([$catId, $title, $slug, $image, $body, $postId]);
        return $result;
    }

    public function getImage($id)
    {
        $sql = "SELECT * FROM tbl_posts  WHERE id = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$id]);
        $result = $stmt->fetchAll();
        return $result[0]['image'];
    }

    public function getPostBySlug($slug)
    {
        $sql = "SELECT * FROM tbl_posts  WHERE slug = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$slug]);
        $result = $stmt->fetchAll();
        return $result;
    }

    public function getPostByCategory($catId)
    {
        $sql = "SELECT * FROM tbl_posts  WHERE category_id = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$catId]);
        $result = $stmt->fetchAll();
        return $result;
    }

    public function delete($id)
    {
        $sql = "DELETE FROM tbl_posts WHERE id = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$id]);
    }
}