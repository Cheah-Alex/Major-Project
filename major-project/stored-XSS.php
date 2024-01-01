<?php
$server='localhost';
$user='root';
$pwd='';
$db='majorprojectdb';
$conn = mysqli_connect($server, $user, $pwd, $db);

//get data from webpage
$query= "SELECT * FROM items";
$result=mysqli_query($conn, $query);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {

        // php code to print result to webpage
        echo "id: " . $row["id"]. 
        "; name: " . $row["name"]. 
        "; quantity: " . $row["quantity"]. "<br>";
    }
} else {
    echo "0 results";
}

// close conn
$conn->close();

