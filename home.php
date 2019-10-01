<?php require('includes/config.php');  

//if not logged in redirect to login page
if(!$user->is_logged_in()){ header('Location: login.php'); exit(); }

//define page title
$title = 'Beermate - Home';

//include header
require('layout/header.php'); 

//include menu
require('layout/menu.php');
?>

<div class="container text-center h-100">
    <div class="row h-100 justify-content-center align-items-center">
        <div class="col-10 col-md-8 col-lg-6">
            <h1>Beermate</h1>
            <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776;</span>
            <!-- <h3 class="text-center"><?php echo htmlspecialchars($_SESSION['username'], ENT_QUOTES); ?>, search your mates in your area!</h3> -->
        </div>
    </div>
    <div class="row justify-content-center align-items-center">

            <div class="icon text-center">
                <span class="fa-stack fa-2x" aria-hidden="true">
                    <a onclick="getLocation()" class=""><img class="mask flex-center"><i
                            class="fa fa-map-pin fa-stack-1x fa-inverse"></i></a>
                </span>
            </div>

            <br>

  
    </div>
    <!-- <div id="buddys" class="w-75 mx-auto"></div> -->
    <div class="row justify-content-center align-items-center">
    <div class="col-10 col-md-8 col-lg-6">
        <table class="table table-hover w-100 mx-auto table-dark">
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
</div>
<?php 
//include header template
require('layout/footer.php'); 
?>