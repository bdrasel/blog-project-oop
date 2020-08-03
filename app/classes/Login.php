<?php 

    namespace App\classes;
    use App\classes\Database;

class Login
{

    public function loginCheck($data){
        $usrename = $data['username'];
        $password = md5($data['password']);

        $sql = "SELECT * FROM users WHERE username='$usrename' AND password='$password'";
        $query = mysqli_query(Database::dbCon(), $sql);

        if($query){
            if(mysqli_num_rows($query) == 1){
                $row = mysqli_fetch_assoc($query);
                session_start();
                $_SESSION['id'] = $row['id'];
                $_SESSION['username'] = $row['username'];
                $_SESSION['name'] = $row['name'];
                $_SESSION['email'] = $row['email'];

                header('Location: index.php');
            }else{
                return $lingError = '<div class="alert alert-danger">Username or Password did not match!</div> '; 
            }
        }else{
            die();
        }
    }


}



