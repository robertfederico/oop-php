<?php

class CategoryController extends Categories
{
    public static function createSlug($str, $delimiter = '-')
    {
        $slug = strtolower(trim(preg_replace('/[\s-]+/', $delimiter, preg_replace('/[^A-Za-z0-9-]+/', $delimiter, preg_replace('/[&]/', 'and', preg_replace('/[\']/', '', iconv('UTF-8', 'ASCII//TRANSLIT', $str))))), $delimiter));
        return $slug;
    }

    public function categories()
    {
        $categories = $this->getCategories();
        return $categories;
    }

    public function showCategories()
    {
        $categories = $this->navCategories();
        return $categories;
    }

    public function saveCategory($title, $slug, $dateAdded)
    {
        $this->createCategory($title, $slug, $dateAdded);
    }

    public function getDuplicateCategory($categoryTitle)
    {
        $results = $this->getCategory($categoryTitle);
        return $results['name'];
    }

    public function getCategoryName($id)
    {
        $results = $this->getName($id);
        $catName = "";
        foreach ($results as $result) {
            $catName = $result['name'];
        }
        return $catName;
    }

    public function searchCategory($categoryTitle)
    {
        $result = $this->search($categoryTitle);
        return $result;
    }

    public function checkCategoryTitle($title, $id)
    {
        $result = $this->checkCategory($title, $id);
        return $result;
    }

    public function update($title, $slug, $categoryId)
    {
        $this->updateCategory($title, $slug, $categoryId);
    }

    public function deleteCategory($id)
    {
        $this->delete($id);
    }

    public function showCategoryBySlug($slug)
    {
        $category = $this->getCategoryBySlug($slug);
        return $category;
    }

    public function categoryHasPost($id)
    {
        $results = $this->hasPost($id);
        return $results;
    }
}