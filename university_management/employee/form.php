<?php
include "header.html";
?>
<form method="POST" action="add.php">
  <div class="mb-3">
    <label for="first_name" class="form-label">first_name</label>
    <input type="text" name="first_name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>
  <div class="mb-3">
    <label for="last_name" class="form-label">last_name</label>
    <input type="text" name="last_name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>
  <div class="mb-3">
    <label for="position" class="form-label">position</label>
    <input type="text" name="position" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>