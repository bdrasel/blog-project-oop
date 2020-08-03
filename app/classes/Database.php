<?php 

namespace App\classes;

class Database{

    public function dbCon(){

        $host = 'localhost';
        $username = 'root';
        $password = '';
        $dbname = 'blog_project';
        $link = mysqli_connect($host, $username, $password, $dbname);
        return $link;
    }



}


