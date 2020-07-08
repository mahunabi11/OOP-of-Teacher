<?php
  
  namespace App\Controller;

  use App\Support\Database;
 /**
  * Database
  */
 class Teacher extends Database
 {
 	/**
 	 * add new teacher
 	 */
   public function addTeacher($name, $email, $cell, $img)
   {

  
   	
       // Data send
      $data = $this ->insert('teacher', [
        
        'name' => $name,
        'email' => $email,
        'cell'  => $cell,
        'photo'  => $this -> fileUpload($img,'media/img/teachers/'),

       ]);
      if($data){
      	return  "<p class='alert alert-success'>Data added successful !<button class='close' data-dismiss='alert'>&times;</button></p>";
      }
   }


 }

?> 