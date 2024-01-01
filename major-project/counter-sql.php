<?php
// init
$server='localhost';
$user='root';
$pwd='';
$db='majorprojectdb';
$conn = new mysqli($server, $user, $pwd, $db);
?>
<!DOCTYPE HTML>

<!-- render form -->
<form method="post" action="<?php $_SERVER["PHP_SELF"] ?>">
Item name: <input type="text" name="name"><br>
Quantity: <input type="text" name="quantity"><br>
<input type="submit">
</form><br>

<!-- actual php code -->
<?php 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $quantity = $_POST["quantity"];
    
    // hardened SQL query
    $query= "INSERT INTO items (`name`, quantity) 
    VALUES (?, ?);";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("si", $name, $quantity);
    
    /* execute query */
    $stmt->execute();
    
    // render other data
    $query = "SELECT * FROM items;";
    $res = $conn->query($query);
    while ($row = $res->fetch_assoc()) {
        echo htmlspecialchars($row['id']). ' | '.
            htmlspecialchars($row['name']).' | '.
            htmlspecialchars($row['quantity']).'<br>';
    }


    $conn->close();
}
?>
</html>