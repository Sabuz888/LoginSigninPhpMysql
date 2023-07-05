<?php
$login=0;
$invalid=0;
// if the super global var $_SERVER 's request method == post then connect to connect.php
if($_SERVER['REQUEST_METHOD']=='POST'){
    include "connect.php";

    $username=$_POST['username'];
    $password=$_POST['password'];

    $sql = "select * from `registration` where username = '$username'and
    password='$password'";
    $result = mysqli_query($con,$sql);
    if($result){
        $num = mysqli_num_rows($result);
        if($num>0){
            $login=1;
            session_start();
            $_SESSION['username']=$username;
            header('location:home.php');
        }else{
            $invalid=1;
            
        }
    }
}

?>


<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
     rel="stylesheet">
   
     </style>
</head>

<body>
<?php
    if($login){
        echo '<div class="alert alert-success" role="alert">
        Log In successful!
      </div>';
    }
    ?>
     <?php
    if($invalid){
        echo '<div class="alert alert-danger" role="alert">
        invalid info ! 
      </div>';
    }
    ?>
  
    <div class="container w-50 my-5">
        <h1 class='text-center'>Login to Naeem's Classroom</h1>
        <form action="login.php" method="post">
            <div class="mb-3"><label>User Name</label>
                <input type="text" name="username" class="form-control">
                <div class="form-text">Enter your user name</div>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input name="password" type="password" class="form-control">
                <div class="form-text">Enter your password</div>
            </div>
            <button type="submit" class="btn btn-primary">Login</button>
        </form>
    </div>
</body>

</html>