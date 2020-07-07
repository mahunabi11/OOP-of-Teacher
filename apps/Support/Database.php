<?php
 namespace App\Support;

 use mysqli;

 /**
  * Database
  */

  abstract class Database
  {
      /**
       * Form related setup
       */
      public $host = 'localhost';
      public $user = 'root';
      public $pass = '';
      public $dbname = 'teacher';

      private $connection;

      /**
    	 * Database connection setup
    	 */

      private function connection()
    {   
    	
    	return $this ->connection = new mysqli($this ->name, $this ->user, $this ->pass, $this ->dbname); 
    }

  }

?>