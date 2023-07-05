<?php
$success=0;
$user=0;
// if the super global var $_SERVER 's request method == post then connect to connect.php
if($_SERVER['REQUEST_METHOD']=='POST'){
    include "connect.php";

    $username=$_POST['username'];
    $password=$_POST['password'];
    $sql = "select * from `registration` where username = '$username'";
    $result = mysqli_query($con,$sql);

    if($result){
        $num = mysqli_num_rows($result);
        if($num > 0){
            // echo "user already exist";
            $user=1;
        }else{
            $sql = "insert into `registration`(username,password)
            values ('$username','$password')";
            $result = mysqli_query($con,$sql);
            if($result){
                // echo "Signup successful";
                $success=1;
                header('Location:login.php');
            }else{
                die(mysqli_error($con));
            }
        }
    }
      //our colum name is username and password
    // $sql = "insert into `registration`(username,password)
    // values ('$username','$password')";
    // $result = mysqli_query($con,$sql);

    // if($result){
    //     echo " Data is inserted";
    // }else{
    //     die(mysqli_error($con));
    // }
}

?>


<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Signup page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <?php
    if($user){
        echo '<div class="alert alert-danger" role="alert">
        User already exist!
      </div>';
    }
    ?>
     <?php
    if($success){
        echo '<div class="alert alert-success" role="alert">
        Welcom to Naeem Classroom ! 
      </div>';
    }
    ?>
    <div class="container w-50 my-5">
        <h1 class='text-center'>Naeem's Classroom</h1>
        <form action="sign.php" method="post">
            <div class="mb-3"><label>User Name</label>
                <input type="text" name="username" class="form-control">
                <div class="form-text">Enter your user name</div>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input name="password" type="password" class="form-control">
                <div class="form-text">Enter your password</div>
            </div>
            <button type="submit" class="btn btn-primary">Signup</button>
        </form>
    </div>
</body>

</html>