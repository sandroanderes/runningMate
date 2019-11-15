<?php require('includes/config.php');  

//if not logged in redirect to login page
if(!$user->is_logged_in()){ header('Location: index.php'); exit(); }

//define page title
$title = 'runningMate - Clubs';

//include header template
require('layout/header.php');

//include menu and tables
require('layout/menu.php');
require('layout/clubstable.php');
?>

<script type="text/javascript">
	getClubs();
</script>

<div class="container text-center h-100">
	<div class="row h-100 justify-content-center">
		<div class="col-10 col-md-8 col-lg-6 align-self-end">
			<form>
				<div class="form-group">
					<h3>Join a Club</h3>
					<br>
					<div class="dropdown">
						<button class="btn btn-blue btn-lg dropdown-toggle" type="button" id="dropdownMenuButton"
							data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							Select and Join
						</button>
						<div class="dropdown-menu" id="drpdwn" aria-labelledby="dropdownMenuButton">
						</div>
					</div>
					<br>
					<p class="text-blue" onclick="openClubsTable()">Or create a new one</p>
				</div>
			</form>

		</div>
		<div class="col-10 col-md-8 col-lg-6 align-self-center">
			<h4 onclick="openNav()">Menu</h4>
		</div>
	</div>
</div>
<?php 
//include header template
require('layout/footer.php'); 
?>