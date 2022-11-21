<?php




class Book
{

    private $author;
    private $age;
    private $genre;
    private $book;
    private $releaseDate;

    public function __construct($author,$age, $genre, $book, $releaseDate){

        $this->author = $author;
        $this->age = $age;
        $this->genre = $genre;
        $this->book = $book ;
        $this->releaseDate = $releaseDate;

    }

    public static function DisplayBooksMem()
    {
        $servername = "localhost";
        $username = "root";
        $password = "root";
        $dbname = "library";


        // Create connection
        $conn = new mysqli($servername, $username, $password);

        $sql = "SELECT * FROM library.books ";

        $conn->query($sql);
        $result = $conn->query($sql);
        $numRows = mysqli_num_rows($result);
        $rowUsers = mysqli_fetch_assoc($conn->query($sql));
    
        echo '<div class="row " style="margin-right: 15px; margin-left: 15px;">';
        while ($rowUsers = mysqli_fetch_array($result)) {
    
          echo ' <div class="card text-center p-2 w-15 col-4 pb-2">
        <div class="card-header">
        ' . $rowUsers['author'] . ' - ' . $rowUsers['age'] . '
      </div>
      <div class="card-body">
        <h5 class="card-title">' . $rowUsers['book'] . '</h5>
    
        <p class="card-text"> ' . $rowUsers['genre'] . '</p>
        <a href="#" class="btn btn-primary bg-secondary text-dark">Read Book</a>
      </div>
      <div class="card-footer text-muted">
      Release date : ' . $rowUsers['releaseDate'] . '
      </div>
    </div>
    ';
        }
        echo '</div>';
        





    }



    public static function DisplayBooksLib(){

        $servername = "localhost";
        $username = "root";
        $password = "root";
        $dbname = "library";


        // Create connection
        $conn = new mysqli($servername, $username, $password);

        $sql = "SELECT * FROM library.books ";

        $conn->query($sql);
        $result = $conn->query($sql);
        $numRows = mysqli_num_rows($result);
        $rowUsers = mysqli_fetch_assoc($conn->query($sql));
    
        echo '<div class="row " style="margin-right: 15px; margin-left: 15px;">';
        while ($rowUsers = mysqli_fetch_array($result)) {
    
          echo ' <div class="card text-center  w-25 col-sm-4 pb-2">
        <div class="card-header">
        ' . $rowUsers['author'] . ' - ' . $rowUsers['age'] . '
      </div>
      <div class="card-body">
        <h5 class="card-title">' . $rowUsers['book'] . '</h5>
    
        <p class="card-text"> ' . $rowUsers['genre'] . '</p>
        <a href="#" class="btn btn-primary bg-secondary text-dark">Read Book</a>
        <a href="editBooks.php" class="btn btn-primary bg-secondary text-dark">Edit Book</a>
      </div>
      <div class="card-footer text-muted">
      Release date : ' . $rowUsers['releaseDate'] . '
      </div>
    </div>
    ';
        }
        echo '</div>';
        return;

    }




    public static function searchBooks(){

  // ini_set('display_errors', 1);
  // ini_set('display_startup_errors', 1);
  // error_reporting(E_ALL);


        $servername = "localhost";
        $username = "root";
        $password = "root";
        $dbname = "library";


        // Create connection
        $conn = new mysqli($servername, $username, $password);

        $userSearch = $_SESSION["search"];


        $sql = "SELECT *
                FROM library.books
                WHERE  (book = '$userSearch') ";

        $conn->query($sql);
        
        $result = mysqli_fetch_assoc( $conn->query($sql));




        if(isset($result)){
          echo '<div class="h-100 d-flex align-items-center justify-content-center pb-1" >
          <div class="card text-center w-75 ">
                  <div class="card-header">
                  ' . $result['author'] . '
                  </div>
                      <div class="card-body">
                          <h5 class="card-title">' . $result['book'] . '</h5>
                          <p class="card-text">' . $result['genre'] . '</p>
                          <a href="#" class="btn bg-secondary text-dark">Read Book</a>
                      </div>
                  <div class="card-footer text-muted">' . $result['releaseDate'] . '</div>
          </div>
          </div>';

        }
        else{
          echo "<h1 class='text-center bg-white border border-info rounded'  > Book Not Found :(</h1>";
  
        }




    }




    public static function sortBooks(){

        // ini_set('display_errors', 1);
        // ini_set('display_startup_errors', 1);
        // error_reporting(E_ALL);


        $servername = "localhost";
        $username = "root";
        $password = "root";
        $dbname = "library";


        // Create connection
        $conn = new mysqli($servername, $username, $password);

        $sortBy = $sortBy = $_POST['sortBy'];

        $sql = "SELECT * FROM library.books
                ORDER BY '$sortBy' DESC";
        
        $conn->query($sql);
        
        $result = mysqli_fetch_assoc( $conn->query($sql));

        // print_r( $result);
    } 



    public static function editBooks(){

        $servername = "localhost";
        $username = "root";
        $password = "root";
        $dbname = "library";


        // Create connection
        $conn = new mysqli($servername, $username, $password);



        $searchBook = $_SESSION["searchBook"];
        $newBookName = $_SESSION["newBookName"];
        $newAuthor = $_SESSION["newAuthor"] ;
        $newAge = $_SESSION["newAge"] ;
        $newGenre = $_SESSION["newGenre"] ;
        $newReleaseDate =  $_SESSION["newReleaseDate"] ;
        $newReleaseDateInt = (int)$newReleaseDate;



        $sql = "SELECT *
        FROM library.books
        WHERE  (book = '$searchBook') ";

        $conn->query($sql);

        $result = mysqli_fetch_assoc( $conn->query($sql));



        echo '<div class="h-100 d-flex align-items-center justify-content-center pb-1" >
        <div class="card text-center w-75 ">
                <div class="card-header">
                ' . $result['author'] . '
                </div>
                    <div class="card-body">
                        <h5 class="card-title">' . $result['book'] . '</h5>
                        <p class="card-text">' . $result['genre'] . '</p>
                        <a href="#" class="btn bg-secondary text-dark">Read Book</a>
                    </div>
                <div class="card-footer text-muted">' . $result['releaseDate'] . '</div>
        </div>
        </div>';

      
      $sqlChange = "UPDATE library.books
                    SET author = '$newAuthor', age = '$newAge', genre = '$newGenre' , book = '$newBookName', releaseDate = '$newReleaseDateInt'
                    WHERE book = '$searchBook'";

      $conn->query($sqlChange);

    }






    public function addBooks(){



        $servername = "localhost";
        $username = "root";
        $password = "root";
        $dbname = "library";



  

        // Create connection
        $conn = new mysqli($servername, $username, $password);

        
        $sql = "INSERT INTO library.books (author, age , genre, book, releaseDate  ) 
                VALUES  ( '$this->author','$this->age', '$this->genre', '$this->book', '$this->releaseDate')";




        $conn->query($sql);





    }


}
