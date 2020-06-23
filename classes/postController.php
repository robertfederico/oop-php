<?php

class PostController extends Posts
{
    public function savePost($author, $catId, $title, $slug, $image, $body, $dateAdded)
    {
        $this->createPost($author, $catId, $title, $slug, $image, $body, $dateAdded);
    }

    public function searchPost($title)
    {
        $result = $this->search($title);
        return $result;
    }

    public function singlePost()
    {
        $post = $this->getRandomPost();
        return $post;
    }

    public function randomPosts()
    {
        $posts = $this->getRandomPosts();
        return $posts;
    }

    public function latestPosts()
    {
        $posts = $this->getLatestPosts();
        return $posts;
    }

    public function showPost()
    {
        $posts = $this->getPosts();
        return $posts;
    }

    public function update($catId, $title, $slug, $image, $body, $postId)
    {
        $result = $this->updatePost($catId, $title, $slug, $image, $body, $postId);
        return $result;
    }

    public function postImage($id)
    {
        $image = $this->getImage($id);
        return $image;
    }

    public function showPostBySlug($slug)
    {
        $post = $this->getPostBySlug($slug);
        return $post;
    }

    public function showPostByCategory($catId)
    {
        $posts = $this->getPostByCategory($catId);
        return $posts;
    }

    public function deletePost($id)
    {
        $this->delete($id);
    }
}