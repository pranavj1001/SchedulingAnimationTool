<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sat";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT email, password FROM login_table";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "email ID: " . $row["email"]. " - Name: " . $row["password"]."<br>";
    }
} else {
    echo "0 results";
}
$conn->close();
?>