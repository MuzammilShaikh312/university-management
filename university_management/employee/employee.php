<?php
include "../database/connection.php";
include "header.html";


$first_name=$_GET['first_name'] ?? '';
$last_name=$_GET['last_name'] ?? '';
?>

<form method="GET">
  <input type="text" name="first_name" placeholder="search name "  value="<?php echo $first_name ;?>">
  <input type="text" name="last_name" placeholder="search last_name "  value="<?php echo $last_name ;?>">
  <button type="submit" style="background-color:red; color:white;">click the button</button>
</form>

<table class="table">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">First_name</th>
      <th scope="col">Last_name</th> 
      <th scope="col">Position</th>
      <th scope="col">Salary</th>
      <th scope="col">Skill_Name</th>
      <th scope="col">Level</th>
      <th scope="col">Departments</th>
      <th scope="col">Rating</th>
      <th scope="col">Remarks</th>
    </tr>
  </thead>
  <tbody>

<?php
$sql = "SELECT em.id,
               em.first_name,
               em.last_name,
               em.position,
               em_sl.salary,  
               em_sk.skill_name,
               em_sk.level,
               dep_name.name,
               per_rev.rating,
               per_rev.remarks
        FROM employees AS em JOIN employyes_salaries AS em_sl
        ON em.id=em_sl.id
        JOIN employee_skill AS em_sk
        ON em.id=em_sk.id
        JOIN departments AS dep_name 
        ON em.id=dep_name.id
        JOIN performance_review AS per_rev
        ON em.id=per_rev.id
        ";
        if(!empty($first_name) && !empty($last_name)){
        $sql.="WHERE em.first_name ='$first_name' && em.last_name ='$last_name'";  
        }
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
?>
    <tr>
      <td><?php echo $row["id"]; ?></td>
      <td><?php echo ucfirst($row["first_name"]); ?></td>
      <td><?php echo ucfirst($row["last_name"]); ?></td>
      <td><?php echo ucfirst($row["position"]); ?></td>
      <td><?php echo $row["salary"]; ?></td>
      <td><?php echo ucfirst($row["skill_name"]); ?></td>
      <td><?php echo ucfirst($row["level"]); ?></td>
      <td><?php echo ucfirst($row["name"]); ?></td>
      <td><?php echo $row["rating"]; ?></td>      
      <td><?php echo ucfirst($row["remarks"]); ?></td>

    </tr>
<?php
    }
}
?>

  </tbody>
</table>