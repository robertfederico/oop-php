<?php

class Categories extends Dbh
{
    public function getCategories()
    {
        $sql = "SELECT * FROM tbl_categories ORDER BY id DESC";
        $stmt = $this->connect()->query($sql);
        $categories = $stmt->fetchAll();
        return $categories;
    }

    public function navCategories()
    {
        $sql = "SELECT * FROM tbl_categories ORDER BY id DESC LIMIT 6";
        $stmt = $this->connect()->query($sql);
        $categories = $stmt->fetchAll();
        return $categories;
    }

    public function createCategory($title, $slug, $dateAdded)
    {
        $sql = "INSERT INTO tbl_categories(`name`, slug, created_at)VALUES(?,?,?)";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$title, $slug, $dateAdded]);
    }

    public function getCategory($categoryTitle)
    {
        $sql = "SELECT * FROM tbl_categories WHERE `name` = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$categoryTitle]);
        $category = $stmt->fetch();
        return $category;
    }

    public function getName($id)
    {
        $sql = "SELECT * FROM tbl_categories WHERE id = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$id]);
        $category = $stmt->fetchAll();
        return $category;
    }

    public function search($searchTitle)
    {
        $searchContent = "%" . $searchTitle . "%";
        $sql = "SELECT * FROM tbl_categories WHERE `name` LIKE ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$searchContent]);
        $result = $stmt->fetchAll();
        return $result;
    }

    protected function delete($id)
    {
        $sql = "DELETE FROM tbl_categories WHERE id = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$id]);
    }

    // check for duplicate category title
    public function checkCategory($title, $id)
    {
        $sql = "SELECT * FROM tbl_categories WHERE `name` = ? AND id != ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$title, $id]);
        $result = $stmt->fetchAll();
        return $result;
    }

    protected function updateCategory($title, $slug, $categoryId)
    {
        $sql = "UPDATE tbl_categories SET `name` = ? ,slug = ? WHERE id = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$title, $slug, $categoryId]);
    }

    public function getCategoryBySlug($slug)
    {
        $sql = "SELECT * FROM tbl_categories  WHERE slug = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$slug]);
        $result = $stmt->fetchAll();
        return $result;
    }

    protected function hasPost($id)
    {
        $sql = "SELECT * FROM tbl_categories INNER JOIN 
                tbl_posts ON tbl_categories.id = tbl_posts.category_id 
                WHERE tbl_categories.id = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$id]);
        $results = $stmt->fetchAll();
        return $results;
    }
}