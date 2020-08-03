<?php 
require_once '../vendor/autoload.php';
$categories = new \App\classes\Category();
$blog = new \App\classes\Blog();

if(isset($_GET['active']) && isset($_GET['cat'])){
    $id = $_GET['id'];
    $categories->active($id);
    header('Location:manage_category.php');
}

if(isset($_GET['inactive']) && isset($_GET['cat'])){
    $id = $_GET['id'];
    $categories->inActive($id);
    header('Location:manage_category.php');
}

if(isset($_GET['active']) && isset($_GET['blog'])){
    $id = $_GET['id'];
    $blog->active($id);
    header('Location:manage_blog.php');
}

if(isset($_GET['inactive']) && isset($_GET['blog'])){
    $id = $_GET['id'];
    $blog->inActive($id);
    header('Location:manage_blog.php');
}


