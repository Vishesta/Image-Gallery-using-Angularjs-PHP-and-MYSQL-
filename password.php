
  <?php

include('database_connection.php');

	if (isset($_POST['reset'])) {
		$name=$_POST["name"];
		$password1=$_POST["password1"];
		$password2=$_POST["password2"];
		if ($password1 == $password2) {
			$new_password=$password1;
			$update_query = "UPDATE register SET password='$new_password' WHERE name='$name'";
			if ($result = $connect->query($update_query)) {
			session_start ();
				$_SESSION['reset_success']=$new_password;
				header('Location:index.php');
			}else{
				session_start();
				$_SESSION['reset_error']=$password2;
				header('Location:index.php?page=reset');
			}
		}else{
			session_start();
			$_SESSION['password_nomatch']=$password1;
			header('Location:index.php?page=reset');
		}
	}
?>