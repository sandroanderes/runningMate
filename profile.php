<?php require('includes/config.php');  

//if not logged in redirect to login page
if(!$user->is_logged_in()){ header('Location: index.php'); exit(); }

//define page title
$title = 'runningMate - Profile';

//include header template
require('layout/header.php');

//include menu and tables
require('layout/menu.php');
?>

 <script type="text/javascript">
	getProfile();
</script>

<div class="container text-center h-100">
	<div class="row h-100 justify-content-center">
		<div class="col-10 col-md-8 col-lg-6 align-self-end">
			<h3><?php echo htmlspecialchars($_SESSION['username'], ENT_QUOTES); ?>'s Profile</h3>
			<br>
				<form name="profileForm">
				<div class="form-group">
					<label for="favDistance">Enter your favourite training distance:</label>
					<input type="text" class="form-control" name="favDistanceInput" aria-describedby="favDistance"
						placeholder="E.g. 10 km" required>
				</div>
				<hr>
				<div class="form-group">
					<label for="fitLevel">Select your approximate fitness level:</label>
					<div class="form-group">
						<select class="form-control" name="fitSelection">
							<option value="0" selected>Select fitness level...</option>
							<option value="1">1. Rookie (&gt 5.45)</option>
							<option value="2">2. Advanced (&lt; 5.45)</option>
							<option value="3">3. Pro (&lt; 5.15)</option>
							<option value="4">4. Elite (&lt; 4.45)</option>
							<option value="5">5. Master (&lt; 4.15)</option>
						</select>
					</div>
				</div>
				<hr>
				<div class="form-group">
					<label for="goal">Enter your next goal:</label>
					<input type="text" class="form-control" name="goal" aria-describedby="goal"
						placeholder="E.g. Zürcher Silvesterlauf 2019" required>
				</div>
			</form>
			<button onclick="saveProfile()" class="btn btn-blue">Save</button>
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