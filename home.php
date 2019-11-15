<?php require('includes/config.php');  

//if not logged in redirect to login page
if(!$user->is_logged_in()){ header('Location: index.php'); exit(); }

//define page title
$title = 'runningMate - Home';

//include header
require('layout/header.php'); 

//include menu
require('layout/menu.php');
?>

<div class="container text-center h-100">
    <div class="row h-100 justify-content-center align-items-center">
        <div class="col-10 col-md-8 col-lg-6">
            <h1>runningMate</h1>
            <br>
            <h4 onclick="openNav()">Menu</h4>
        </div>
    </div>
</div>
</div>
<?php 
//include header template
require('layout/footer.php'); 
?>