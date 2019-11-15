<?php require('includes/config.php');  

//if not logged in redirect to login page
if(!$user->is_logged_in()){ header('Location: index.php'); exit(); }

//define page title
$title = 'runningMate - Finder';

//include header template
require('layout/header.php');

//include menu and table
require('layout/menu.php');
require('layout/findertable.php');
?>

<div class="container text-center h-100">
    <div class="row h-100 justify-content-center">
        <div class="col-10 col-md-8 col-lg-6 align-self-end">
            <div class="icon text-center">
                <span class="fa-stack fa-2x" aria-hidden="true">
                    <a onclick="getLocation()" class=""><img class="mask flex-center"><i
                            class="fa fa-map-pin fa-stack-1x fa-inverse"></i></a>
                </span>
            </div>
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