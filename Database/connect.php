<?php

$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "library";


// Create connection
$conn = new mysqli($servername, $username, $password);

// Only display error message when connection fails
// if ($conn->connect_error) {
//   die("Connection failed: " . $conn->connect_error);
// }else{
//     echo "connected m8 ";
// }

















// if (!mysqli_select_db($conn,$dbname)){
//     $sql = 'CREATE DATABASE'.' '.$dbname;
//     echo $sql;
//     if ($conn->query($sql) === TRUE) {
//         echo "Database created successfully";
//     }else {
//         echo "Error creating database: " . $conn->error;
//     }
// }

// $sql = "CREATE TABLE IF NOT EXISTS Members (
//     id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
//     userName VARCHAR(30) NOT NULL,
//      email VARCHAR(30) NOT NULL,
//      passwrd VARCHAR(50),
//     reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
//     )";
    
//     if ($conn->query($sql) === TRUE) {
//       echo "Table Members created successfully";
//     } else {
//       echo "Error creating table: " . $conn->error;
//     };



