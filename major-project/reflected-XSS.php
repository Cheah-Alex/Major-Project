<!-- actual form -->
<!DOCTYPE HTML>
    <form method="get" action="<?php $_SERVER["PHP_SELF"] ?>">
        Item name: <input type="text" name="name"><br>
        <input type="submit">
    </form>
</html>

<!-- process data -->
<?php
//get data from webpage
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    if (isset($_GET["name"])){
        $itemname=$_GET["name"];
        echo "You have tried to find: $itemname";
    }

    /*SQL query not required as this page is to demonstrate
    effects of XSS*/
}