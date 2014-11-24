<!DOCTYPE html>
<html>
<head>
	<?php include "includes/head.php";
	include "functions/input_text_function.php";
	include "functions/login_inputcheck.php";
	// include "function.php";
?>
	
</head>
<body>
<center><h1>LiveConcert</h1></center>

<?php 
$username = "";
if(isset($_SESSION['username']) && $_SESSION['loggedin']){
	head("Location: home.php");
}

if($_SERVER["REQUEST_METHOD"]=='POST'){
	if ($username = username_entered($_POST['username']) && $password = password_valid($_POST['password']){
		if($userinfo = validate_user($username,$password)){
			$_SESSION['username'] = $username;
			$_SESSION['loggedin'] = true;
			$_SESSION['score'] = $userinfo['score'];
			if($loginrecord = $mysqli->query("call loginrecord($username)")){
				$loginrecord->close();
				$mysqli->close();
			}

			header("Location:home.php");

		}
	}
}

?>

<div>
<form id="login-register" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
<span class="error"><?php echo $msg; ?></span>	
<span class="error"><?php echo $usernameERR; ?></span><input type="text" name="username" value="<?php echo htmlentities($username) ?>" placeholder="Username"/><br> 
<span class="error"><?php echo $passwordERR; ?></span><input type="password" name="password" value='' placeholder="Password"/><br> 

<input class="login_button" type='submit' name='submit' value="Log in"/>
<a href="registration.php">or SIGN UP</a>
</form>
</div>
</body>
</html>


