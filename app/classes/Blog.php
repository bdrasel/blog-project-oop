<?php 

namespace App\classes;
use App\classes\Database;

class Blog{

    public function addBlog($data){
      
        $title = mysqli_real_escape_string(Database::dbCon(),$data['title']);
        $content = mysqli_real_escape_string(Database::dbCon(),$data['details']);
        $category_id = $data['category_id'];
        $status = $data['status'];
        $name = $_SESSION['name'];

        $image_name=$_FILES['image']['name'];
        $image_ext=explode('.',$image_name);
        $image_ext=end($image_ext);
        $image_name=date('Ymdhis.').$image_ext;

      
       

        $sql = "INSERT INTO `blog`(`category_id`, `title`, `content`, `photo`, `name`, `status`)
         VALUES ('$category_id','$title','$content','$image_name','$name','$status')";
        $query = mysqli_query(Database::dbCon(), $sql);

        if($query){
            move_uploaded_file($_FILES['image']['tmp_name'],'../uploads/'.$image_name);
            $insert_msg = "<div class='alert alert-success'>Blog Insert <b>Successfully</b>!</div>";
            return $insert_msg;
        }else{
            $error_msg = "<div class='alert alert-danger'>Something Wrong!</div>";
            return $error_msg;
        }
    }

    public function allBlog(){
        $result = mysqli_query(Database::dbCon(),"SELECT `blog`.*, `category`.`category_name` FROM `blog` INNER JOIN `category` ON `blog`.`category_id` = `category`.`id` ORDER BY `id` DESC
        ");
        return $result;
    }

    public function active($id){
        mysqli_query(Database::dbCon(), "UPDATE blog SET status = 1 WHERE id ='$id'");
    }
    
    public function inActive($id){
        mysqli_query(Database::dbCon(), "UPDATE blog SET status = 0 WHERE id ='$id'");
    }

    public function selectRow($id = ''){
        return mysqli_query(Database::dbCon(),"SELECT * FROM blog WHERE id='$id'");
        

    }

    public function updateBlog($data){

        $title = mysqli_real_escape_string(Database::dbCon(),$data['title']);
        $content = mysqli_real_escape_string(Database::dbCon(),$data['details']);
        $category_id = $data['category_id'];
        $status = $data['status'];
        $name = $_SESSION['name'];
        $id = $_POST['id'];

        $image_name=$_FILES['image']['name'];
        $image_ext=explode('.',$image_name);
        $image_ext=end($image_ext);
        $image_name=date('Ymdhis.').$image_ext;

        if($_FILES['image']['name'] == NULL){
            $image_name=$_FILES['image']['name'];
            $image_ext=explode('.',$image_name);
            $image_ext=end($image_ext);
            $image_name=date('Ymdhis.').$image_ext;

            $sql ="UPDATE `blog` SET `category_id` ='$category_id', `title` ='$title', `content` ='$content', `name` ='$name', `status`='$status' WHERE id='$id'";
            $query = mysqli_query(Database::dbCon(), $sql);


        }else{
            $image_name=$_FILES['image']['name'];
            $image_ext=explode('.',$image_name);
            $image_ext=end($image_ext);
            $image_name=date('Ymdhis.').$image_ext;

            $sql ="UPDATE `blog` SET `category_id` ='$category_id', `title` ='$title', `content` ='$content', `photo` ='$image_name', `name` ='$name', `status`='$status' WHERE id='$id'";
            move_uploaded_file($_FILES['image']['tmp_name'],'../uploads/'.$image_name);
            $query = mysqli_query(Database::dbCon(), $sql);

        }

        if($query){
            header('Location: edit_blog.php?id='.$id);
        }else{
            header('Location: edit_blog.php?id='.$id);
            
        }
    }

    public function delete($id){
        mysqli_query(Database::dbCon(), "DELETE FROM Blog WHERE id ='$id'");
    }

}

