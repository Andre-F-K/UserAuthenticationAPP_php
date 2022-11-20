<?php



class Users
{

    private $firstName;
    private $lastName;
    private $email;
    private $password;
    private $userRole;

    public function __construct($firstName, $lastName, $email, $password, $userRole)
    {

        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->email = $email;
        $this->password = md5($password);
        $this->userRole = $userRole;
    }

    public function addUserToDb()
    {

        $servername = "localhost";
        $username = "root";
        $password = "root";
        $dbname = "library";

        // Create connection
        $conn = new mysqli($servername, $username, $password);

        // Only display error message when connection fails
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        } else {
            // echo "connected m8 ";
        }

        $sql = "INSERT INTO  library.members (first_Name, last_Name , e_mail, password, user_role) 
                VALUES ( '$this->firstName','$this->lastName', '$this->email', '$this->password', '$this->userRole')";

        if ($conn->query($sql) === TRUE) {
            // echo "Table Members created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        };


        return;
    }

    public static function findUserLogin(){

        $servername = "localhost";
        $username = "root";
        $password = "root";
        $dbname = "library";

        // Create connection
        $conn = new mysqli($servername, $username, $password);
        
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // collect value of input field
            $firstName = $_REQUEST['firstName'];
            $lastName = $_REQUEST['lastName'];
            $password = md5($_REQUEST['password']);

                $sql = "SELECT first_Name, last_Name, password
                        FROM library.members
                        WHERE (first_Name ='$firstName' AND last_Name ='$lastName' AND password ='$password')";

        
            $conn->query($sql);
        
            $result = mysqli_fetch_assoc( $conn->query($sql));
        
        
            if(isset($result)){
                echo "sucesssss";
                header("Location: main.php");
            }else{
                echo "User Not registered ";
            }

    }}

    










}
