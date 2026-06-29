<?php
include "header.html";
include "../database/connection.php";

$id = $_GET['id'] ?? '';

$sql = "SELECT * FROM employees WHERE id=$id";
$result = $conn->query($sql);

if ($result) {
    $row = $result->fetch_assoc();
}

if (isset($_POST['first_name'])) {

    $first_name = $_POST['first_name'];
    $last_name  = $_POST['last_name'];
    $position   = $_POST['position'];

    $sql = "UPDATE employees
            SET first_name='$first_name',
                last_name='$last_name',
                position='$position'
            WHERE id=$id";

    $result = $conn->query($sql);

    if ($result == TRUE) {
        echo "update data successfully";

        // updated data dobara fetch karo
        $sql = "SELECT * FROM employees WHERE id=$id";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
    } else {
        echo "not update";
    }
}
?>

<form method="POST">
  <div class="mb-3">
    <label for="first_name" class="form-label">first_name</label>
    <input type="text"
           name="first_name"
           value="<?php echo $row['first_name']; ?>"
           class="form-control">
  </div>

  <div class="mb-3">
    <label for="last_name" class="form-label">last_name</label>
    <input type="text"
           name="last_name"
           value="<?php echo $row['last_name']; ?>"
           class="form-control">
  </div>

  <div class="mb-3">
    <label for="position" class="form-label">position</label>
    <input type="text"
           name="position"
           value="<?php echo $row['position']; ?>"
           class="form-control">
  </div>

  <button type="submit" class="btn btn-primary">Submit</button>
</form>