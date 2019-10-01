<?php require('includes/config.php');  

//if not logged in redirect to login page
if(!$user->is_logged_in()){ header('Location: login.php'); exit(); }

//define page title
$title = 'Beermate';

//include header template
require('layout/header.php');

//include menu
require('layout/menu.php');
?>


<div id="finderTable" class="overlay-table">
    <a href="javascript:void(0)" class="closebtn" onclick="closeTable()">&times;</a>
    <div class="overlay-content">
        <div class="col-10 col-md-8 col-lg-6 mx-auto">
        <table class="table table-hover mx-auto">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col" class="text-center">Status</th>
                    <th scope="col" class="text-right">Distance</th>
                </tr>
            </thead>
            <tbody id="table">

            </tbody>
        </table>
    </div>
    </div>
</div>


<div class="container text-center h-100">

    <div class="row h-100 justify-content-center align-items-center">
        <div class="col-10 col-md-8 col-lg-6">
            <div class="icon text-center">
                <span class="fa-stack fa-2x" aria-hidden="true">
                    <a onclick="getLocation()" class=""><img class="mask flex-center"><i
                            class="fa fa-map-pin fa-stack-1x fa-inverse"></i></a>
                </span>
            </div>
            </div>  

</div>
</div>
<?php 
//include header template
require('layout/footer.php'); 
?>