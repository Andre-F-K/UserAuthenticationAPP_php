<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- link bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

    <title>Edit Books</title>
</head>

<body class="d-flex">

<form class="w-50" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
    <h1>Add Book</h1>
  <div class="row mb-3">
    <label for="inputEmail3" class="col-sm-2 col-form-label">Book Name</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="inputEmail3" name="book" required>
    </div>
  </div>
  <div class="row mb-3">
    <label for="inputPassword3" class="col-sm-2 col-form-label">Author</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="inputPassword3" name="author" required>
    </div>
  </div>
  <div class="row mb-3">
    <label for="inputEmail3" class="col-sm-2 col-form-label">Author Age</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="inputEmail3" name="age" required>
    </div>
  </div>
  <fieldset class="row mb-3">
    <legend class="col-form-label col-sm-2 pt-0">Genre</legend>
    <div class="col-sm-10">
      <div class="form-check">
        <input class="form-check-input" type="radio" name="genre" id="gridRadios1" value="Poetry" checked>
        <label class="form-check-label" for="gridRadios1">
          Poetry
        </label>
      </div>
      <div class="form-check">
        <input class="form-check-input" type="radio" name="genre" id="gridRadios2" value="Novel">
        <label class="form-check-label" for="gridRadios2">
          Novel
        </label>
      </div>
      <div class="form-check disabled">
        <input class="form-check-input" type="radio" name="genre" id="gridRadios3" value="Psychology" >
        <label class="form-check-label" for="gridRadios3">
        Psychology
        </label>
      </div>
    </div>
  </fieldset>
  <div class="row mb-3">
  <div class="row mb-3">
    <label for="inputEmail3" class="col-sm-2 col-form-label">Release Date</label>
    <div class="col-sm-10">
      <input type="number" class="form-control" id="inputEmail3" name="releaseDate" required>
    </div>
  </div>
  </div>
  <button type="submit" class="btn btn-primary">Add Book</button>
</form>



</body>

</html>


<?php

  // ini_set('display_errors', 1);
  // ini_set('display_startup_errors', 1);
  // error_reporting(E_ALL);

session_start();

$bookName = $_POST['book'];
$author = $_POST['author'];
$age = $_POST['age'];
$genre = $_POST['genre'];
$releaseDate = $_POST['releaseDate'];

$_SESSION["bookName"] = $bookName;

// echo $_SESSION["age"];
// echo $_SESSION["bookName"];
require('Class/books.php');
// echo $bookName;
// $author,$age, $genre, $book, $releaseDate
if(isset($_SESSION["bookName"])){
$AddBook = new Book($author,$age, $genre, $bookName,$releaseDate);
$AddBook->addBooks();
}

unset($_SESSION["bookName"]);

// echo $_SESSION["bookName"];


Book::editBooks();




    





























?>