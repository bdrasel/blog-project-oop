<?php 

    namespace App\classes;
    use App\classes\Database;


class Category
{
    public function addCategory($data){
        $category_name = $data['category_name'];
        $status = $data['status'];
        $sql = "INSERT INTO  category(category_name,status)VALUES('$category_name', '$status')";
        $query = mysqli_query(Database::dbCon(), $sql);

        if($query){
            $insert_msg = "<div class='alert alert-success'>Category Insert <b>Successfully</b>!</div>";
            return $insert_msg;
        }else{
            $error_msg = "<div class='alert alert-danger'>Something Wrong!</div>";
            return $error_msg;
        }
    }

    public function allCategory(){
        $result = mysqli_query(Database::dbCon(),"SELECT * FROM category");
        return $result;
    }

    public function allActiveCategory(){
        $result = mysqli_query(Database::dbCon(),"SELECT * FROM category WHERE status='1'");
        return $result;
    }

    public function allActivePost(){
        $result = mysqli_query(Database::dbCon(),"SELECT * FROM blog WHERE status='1'");
        return $result;
    }

    public function categoryPost($id){
        $result = mysqli_query(Database::dbCon(),"SELECT * FROM blog WHERE status='1' AND id='$id'");
        return $result;
    }

    public function active($id){
        mysqli_query(Database::dbCon(), "UPDATE category SET status = 1 WHERE id ='$id'");
    }

    public function inActive($id){
        mysqli_query(Database::dbCon(), "UPDATE category SET status = 0 WHERE id ='$id'");
    }

    public function delete($id){
        mysqli_query(Database::dbCon(), "DELETE FROM category WHERE id ='$id'");
    }

    public function selectRow($id = ''){
        return mysqli_query(Database::dbCon(),"SELECT * FROM category WHERE id='$id'");
        
    }

    public function updateCategory($data){
        $category_name = $data['category_name'];
        $status = $data['status'];
        $id = $data['id'];
        $sql = "UPDATE category SET category_name ='$category_name', status='$status' WHERE id='$id'";
        $query = mysqli_query(Database::dbCon(), $sql);

        if($query){
            header('Location: edit_category.php?id='.$id);
        }else{
            header('Location: edit_category.php?id='.$id);
            
        }
    }

    public function singlePost($id){
        return mysqli_query(Database::dbCon(),"SELECT * FROM blog WHERE id='$id'");
    }

}



