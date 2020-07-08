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
      public $dbname = 'rohan';

      private $connection;

      /**
    	 * Database connection setup
    	 */

      private function connection()
    {   
    	
    	return $this ->connection = new mysqli($this ->host, $this ->user, $this ->pass, $this ->dbname); 
    }

    protected function insert($table, array $data)
    {
        // echo "<pre>";
        // print_r($data);
        // echo "</pre>";

         // For mysql column
         $array_ke = array_keys($data);
         $array_col = implode(',', $array_ke);

         // For mysql VALUES

         $array_val = array_values($data);
           foreach ($array_val as $value) {
           		$form_value[] = "'" . $value . "'";
           }
         $array_valu = implode(',', $form_value);
          // Data send
          $sql = "INSERT INTO teacher($array_col)VALUES($array_valu)";
 	    $query = $this ->connection() ->query ($sql);
 	    if($query){
 	    	return true;
 	    }
    }


  }

?>