<?php
include "../database/connection.php";
$first_name=$_POST['first_name'];
$last_name=$_POST['last_name'];
$position=$_POST['position'];
$sql="INSERT INTO employees(first_name,last_name,position)
VALUES('$first_name','$last_name','$position')";$result=$conn->query($sql);
if($result){
  echo "data inserted successfully";
}
else{
  echo "not inserted";
}
?>
