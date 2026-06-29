<?php
include "../database/connection.php";
$sql = "SELECT * FROM employees";
$result = $conn->query($sql);

if ($result->num_rows > 0) {

    while ($row = $result->fetch_assoc()) {

        echo $row["id"] . " " . 
             $row["first_name"] . " " . 
             $row["last_name"] . " " . 
             $row["position"] . "<br>";

    }

} else {
    echo "No any record is fetched";
}
?>