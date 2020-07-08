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
     /**
      * File upload management system method
      */
     public function fileUpload($file, $location = '', array $file_type = ['jpg, png'])
     {      
     	    // File info
            $file_name = $file['name'];
            $file_tmp  = $file['tmp_name'];
            $file_size = $file['size'];

            // File name extension

           $file_array = $file_array = explode('.' , $file_name);
           $file_extension_name = strtolower(end($file_array));

           // Unique file name 
           $unique_file_name = md5(time() . rand(1, 10000)) . '.' . $file_extension_name;

            // File upload
           move_uploaded_file($file_tmp, $location . $unique_file_name);

            return $unique_file_name;
     }

     /**
      * Data insert to table
      */
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