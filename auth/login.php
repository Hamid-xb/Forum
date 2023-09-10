<?php require "../includes/header.php";?>
<?php require "../config/config.php";?>
<?php



  if(isset($_SESSION['username'])) {
    header("Location: ".APPURL."");
  }

  if(isset($_POST['login'])){
    if (empty($_POST['email'])
    OR empty($_POST['password'])) {
      echo "<script> alert('One or more fields are empty');</script>";
    } else {

      //get the data
      $email = $_POST['email'];
			$password = $_POST['password'];

      //write the query
      $login = $conn->query("SELECT * FROM users WHERE email = '$email'");
      $login -> execute();

      $fetch = $login->fetch(PDO::FETCH_ASSOC);

      if($login->rowcount() > 0) {
        
        if(password_verify($password, $fetch['password'])){
          $_SESSION['username'] = $fetch['username'];
          $_SESSION['user_id'] = $fetch['id'];
          $_SESSION['email'] = $fetch['email'];

          header("Location: " .APPURL."");
        } else {
          echo "<script>alert('email or password is wrong');</script>";
        }
      } else {
        echo "<script>alert('email or password is wrong');</script>";
      }
    }
  }


?>

    <div class="container">
		<div class="row">
			<div class="col-md-8">
				<div class="main-col">
					<div class="block">
						<h1 class="pull-left">Login</h1>
						<h4 class="pull-right">A Simple Forum</h4>
						<div class="clearfix"></div>
						<hr>
						<form role="form" enctype="multipart/form-data" method="post" action="login.php">
							
							<div class="form-group">
							<label>Email Address*</label> <input type="email" class="form-control"
							name="email" placeholder="Enter Your Email Address">
							</div>
					
					<div class="form-group">
                        <label>Password*</label> <input type="password" class="form-control"
                    name="password" placeholder="Enter A Password">
                    </div>
	
			        <input name="login" type="submit" class="color btn btn-default" value="Submit" />
        </form>
					</div>
				</div>
			</div>
      <?php include "../includes/footer.php";?>
