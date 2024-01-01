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
</form>

<!-- actual php code -->
<?php 
if ($_SERVER["REQUEST_METHOD"] == "POST") { // begin processing data

    // get data from form
    $name = $_POST["name"];
    $quantity = $_POST["quantity"];
    
    // vulnerable SQL queries
    $query= "INSERT INTO items (`name`, quantity) 
             VALUES ('$name', '$quantity');"; // add data to rows
    $query.="SELECT * FROM items;"; // SQL to get other rows
    $result = mysqli_multi_query($conn,$query); // execute both queries

    // get rows
    do {
        // render result
        if ($result = mysqli_store_result($conn)) {
            while ($row = mysqli_fetch_row($result)) {
                echo "<br>";

                // render each item
                foreach($row as $value){
                    echo htmlspecialchars($value).' | ';
                }
            }
        }
    } while (mysqli_next_result($conn));
    
    mysqli_close($conn);
}
?>
</html>