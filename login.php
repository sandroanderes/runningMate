<?php
//include config
require_once('includes/config.php');

//check if already logged in move to home page
if( $user->is_logged_in() ){ header('Location: index.php'); exit(); }

//process login form if submitted
if(isset($_POST['submit'])){

	if (!isset($_POST['username'])) $error[] = "Please fill out all fields";
	if (!isset($_POST['password'])) $error[] = "Please fill out all fields";

	$username = $_POST['username'];
	if ( $user->isValidUsername($username)){
		if (!isset($_POST['password'])){
			$error[] = 'A password must be entered';
		}
		$password = $_POST['password'];

		if($user->login($username,$password)){
			$_SESSION['username'] = $username;
			header('Location: home.php');
			exit;

		} else {
			$error[] = 'Wrong username or password or your account has not been activated.';
		}
	}else{
		$error[] = 'Usernames are required to be Alphanumeric, and between 3-16 characters long';
	}



}//end if submit

//define page title
$title = 'Beermate - Login';

//include header template
require('layout/header.php'); 
?>


<div class="container text-center h-100">
	<div class="row h-100 justify-content-center align-items-center">
		<div class="col-10 col-md-8 col-lg-6">

		<form role="form" method="post" action="" autocomplete="off">
			<h2>Please Login</h2>
			<p><a class="text-blue" href='./'>Not yet registered?</a></p>
			<hr>

			<?php
				//check for any errors
				if(isset($error)){
					foreach($error as $error){
						echo '<p class="bg-danger">'.$error.'</p>';
					}
				}

				if(isset($_GET['action'])){

					//check the action
					switch ($_GET['action']) {
						case 'active':
							echo "<h2 class='bg-success'>Your account is now active you may now log in.</h2>";
							break;
						case 'reset':
							echo "<h2 class='bg-success'>Please check your inbox for a reset link.</h2>";
							break;
						case 'resetAccount':
							echo "<h2 class='bg-success'>Password changed, you may now login.</h2>";
							break;
					}

				}

				
				?>

			<div class="form-group">
				<input type="text" name="username" id="username" class="form-control input-lg" placeholder="User Name"
					value="<?php if(isset($error)){ echo htmlspecialchars($_POST['username'], ENT_QUOTES); } ?>"
					tabindex="1">
			</div>

			<div class="form-group">
				<input type="password" name="password" id="password" class="form-control input-lg"
					placeholder="Password" tabindex="3">
			</div>

			<div class="row">
				<div class="col-xs-9 col-sm-9 col-md-9">
					<a class="text-blue" href='reset.php'>Forgot your Password?</a>
				</div>
			</div>

			<hr>
			<div class="row">
				<div class="col-xs-6 col-md-6"><input type="submit" name="submit" value="Login"
						class="btn btn-blue btn-block btn-lg" tabindex="5"></div>
			</div>
		</form>
		</div>
		</div>

</div>


<?php 
//include header template
require('layout/footer.php'); 
?>