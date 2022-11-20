<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Link Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

    <title>User Authentication</title>
</head>

<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Bibliotheca Library</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="Index.php">Sign Up</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Forgot Password?</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Contact us</a>
                </li>
            </ul>
        </div>
    </nav>


    <?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include('Class/users.php');

Users::findUserLogin();
?>

<!-- login Form -->
    <div class="d-flex justify-content-center align-items-center   bg-info " style="height: 100vh ;">

        <form class=" bg-secondary w-25 h-75 p-25 " method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>">
            <h1>Log In</h1>
            
            <div class="form-check">
                <input class="form-check-input" type="radio" name="userRole" id="flexRadioDefault1">
                <label class="form-check-label" for="userRole">
                    Librarian
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="userRole" id="flexRadioDefault2" checked>
                <label class="form-check-label" for="userRole">
                    Member
                </label>
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label" >First Name:</label>
                <input type="text" class="form-control"  name="firstName">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label" >Last Name:</label>
                <input type="text" class="form-control" name="lastName">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label" >Password</label>
                <input type="password" class="form-control" id="exampleInputPassword1" name="password">
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

    </div>
</body>

</html>

