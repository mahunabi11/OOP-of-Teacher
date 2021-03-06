<?php require_once "vendor/autoload.php"; ?>
<?php  
	
	// Class use
	use App\Controller\Teacher;



	// class instance 
  $teacher = new Teacher;
  


?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Development Area</title>
	<!-- ALL CSS FILES  -->
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/style.css">
	<link rel="stylesheet" href="assets/css/responsive.css">
</head>
<body>
	
	<?php
	 /**
	  * Student data manage
	  */
       
        if(isset($_POST['submit'])){
        	$name = $_POST['name'];
        	$email = $_POST['email'];
        	$cell = $_POST ['cell'];
        	$dept = $_POST ['dept'];
        	// Photo manage
        	$img = $_FILES['photo'];

        	 if(empty($name) || empty($email) || empty($cell) || empty($dept)){
        	 	$mess = "<p class='alert alert-danger'>Empty Fields Requierd !<button class='close' data-dismiss='alert'>&times;</button></p>";
        	 }elseif(filter_var($email, FILTER_VALIDATE_EMAIL)==false){
        	 	$mess = "<p class='alert alert-warning'>Valid Email Requierd !<button class='close' data-dismiss='alert'>&times;</button></p>";
        	 }else{
        	   $mess =	$teacher -> addTeacher($name, $email, $cell, $dept, $img );
        	 }
        }

	?>

	<div class="wrap ">
		<a class="btn btn-primary" href="data.php">All Teachers</a>
		<div class="card">
			<div class="card-body shadow">
				<h2>Sign Up</h2>
				  <?php
                     if(isset($mess)){
                     	echo $mess;
                     }
				  ?>
				<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST" enctype="multipart/form-data">
					<div class="form-group">
						<label for="">Name</label>
						<input name="name" class="form-control" type="text">
					</div>
					<div class="form-group">
						<label for="">Email</label>
						<input name="email" class="form-control" type="text">
					</div>
					<div class="form-group">
						<label for="">Cell</label>
						<input name="cell" class="form-control" type="text">
					</div>
					<div class="form-group">
						<label for="">Dept</label>
						<input name="dept" class="form-control" type="text">
					</div>
					<div class="form-group">
						<label for="">Photo</label>
						<input name="photo" class="form-control" type="file">
					</div>
					<div class="form-group">
						<input name="submit" class="btn btn-primary" type="submit" value="Sign Up">
					</div>
				</form>
			</div>
		</div>
	</div>
	







	<!-- JS FILES  -->
	<script src="assets/js/jquery-3.4.1.min.js"></script>
	<script src="assets/js/popper.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
	<script src="assets/js/custom.js"></script>
</body>
</html>