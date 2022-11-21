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


  <title>Document</title>
</head>

<body class='bg-secondary'>
  <header class='bg-info pb-2 mb-1 text-center '>

    <h1>Welcome! </h1>
    <p>“A reader lives a thousand lives before he dies . . . The man who never reads lives only one.” </p>

    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" class="h-100 d-flex align-items-center justify-content-center" >
      <div class="input-group mb-3 m-2 w-25 ">
        <div class="input-group-prepend">
          <button class="btn btn-outline-secondary bg-secondary text-dark " id="txtHint" type="submit">Search</button>
          <!-- <p>Suggestions: <span id="txtHint"></span></p> -->
        </div>
        <input type="text" class="form-control" placeholder="" name="search" aria-label="" aria-describedby="basic-addon1">
      </div>
    </form>

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" class="h-100 d-flex align-items-center justify-content-center ">
<div class="input-group mb-3 w-25 ">
  <button class="btn btn-outline-secondary bg-secondary text-dark" type="submit">Sort By :</button>
  <select class="form-select" name="sortBy" id="inputGroupSelect03" aria-label="Example select with button addon">
    <option value="null"> Choose</option>
    <option value="book"> Book Name</option>
    <option value="author">Author Name</option>
    <option value="genre">Genre</option>
  </select>
</div>
</form>

  </header>




  <?php



  // ini_set('display_errors', 1);
  // ini_set('display_startup_errors', 1);
  // error_reporting(E_ALL);

  include('Class/books.php');

  session_start();
  $search = $_POST['search'];
  $sortBy = $_POST['sortBy'];

  $_SESSION["search"] = $search;
  $_SESSION["sortBy"] = $sortBy;




  if ($search !== null){
  Book::searchBooks();
}

  if ($sortBy !== null){
    Book::sortBooks();
  }


  ?>


  <?php




  include('Class/users.php');



  $firstName = $_POST['firstName'];
  $lastName = $_POST['lastName'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $userRole = $_POST['userRole'];

  if (isset($firstName)) {
    $user = new Users($firstName, $lastName, $email, $password, $userRole);

    $user->addUserToDb();
  }




  if ($userRole === 'member') {
    Book::DisplayBooksMem();
  } else {

    Book::DisplayBooksLib();
  }



  ?>

<script>
function showHint(str) {
  if (str.length == 0) {
    document.getElementById("txtHint").innerHTML = "";
    return;
  } else {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("txtHint").innerHTML = this.responseText;
      }
    };
    xmlhttp.open("GET", "gethint.php?q=" + str, true);
    xmlhttp.send();
  }
}
</script>
</body>

</html>