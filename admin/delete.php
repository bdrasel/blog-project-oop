<?php 
require_once '../vendor/autoload.php';
$categories = new \App\classes\Category();
$blog = new \App\classes\Blog();

if(isset($_GET['cat'])){
    $id = $_GET['id'];
    $categories->delete($id);
    header('Location:manage_category.php');
}

if(isset($_GET['blog'])){
    $id = $_GET['id'];
    $blog->delete($id);
    header('Location:manage_blog.php');
}