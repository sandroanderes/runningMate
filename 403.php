<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, height=device-height">
    <title><?php if(isset($title)){ echo $title; }?></title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="./assets/css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/0121aadd03.js"></script>
    <script src="./assets/js/scripts.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <script type="text/javascript" src="assets/js/redirection-mobile.js"></script>
    <script>
        var memberID ="";
        memberID = '<?php echo $_SESSION['memberID']; ?>'; 
        console.log("memberID: "+memberID);
    </script>
      
</head>

<body onload="random()">

<?php require('includes/config.php');  


//define page title
$title = 'runningMate - 403';

?>

<div class="container text-center h-100">
    <div class="row h-100 justify-content-center align-items-center">
        <div class="col-10 col-md-8 col-lg-6">
            <h1 id="myRandomH1"></h1>
            <script type="text/javascript" charset="utf-8">
                var randomStrings = [
                    "Nice try ;)",
                    "Maybe next time ;)",
                    "Let me sleep, tzzzz", 
                    "Not with me ;)",
                    "Here ends your journey.",
                ];

                var randomH1 = document.getElementById("myRandomH1");

                randomIndex = Math.ceil((Math.random()*randomStrings.length-1));
                newText = randomStrings[randomIndex];
                randomH1.innerHTML = newText;
    </script>
            
            <h4>Die Web-App ist nur auf mobilen Endgeräten verfügbar!</h4>
        </div>
    </div>
</div>
<?php 
//include header template
require('layout/footer.php'); 
?>