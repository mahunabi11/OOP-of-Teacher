<?php
  
  namespace App\Controller;

  use App\Support\Database;
 /**
  * Database
  */
 class Teacher extends Database
 {
    public $host = 'localhost';
    public $user = 'root';
    public $pass = '';
    public $dbname = 'teacher';

    private $connection;

    private function Connection()
    {
    	
    }
 }

?> 