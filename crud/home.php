<?php
session_start();
if(!isset($_SESSION['username'])){
    header('Location:login.php');
}
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
   
    </head>

<body>

        <h1 class='text-center text-warning mt-5'>Welcom ! to the home page</br>
            <?php
        echo $_SESSION['username'];
        ?>
        </h1>
        <div class="container">
            <a href="logout.php" class="btn btn-primary mt-5">
                logout
            </a>
        </div>



</body>

</html>