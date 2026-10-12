<?php
include "db.php";
session_start();

if(isset($_GET['id'])){
  $id = $_GET['id'];
  $sql=$conn->prepare("select * from proprety where id =? ");
  $sql->bind_param("i", $id);
  $sql->execute();
  $result=$sql->get_result();
  $users = $result->fetch_assoc();
}

if($_SERVER["REQUEST_METHOD"]==="POST"){
    $propertyname=$_POST["propertyname"];
  $location = $_POST["location"];
  $price = $_POST["price"];
  $propertytype = $_POST["propertytype"];
  $image = $_POST["image"];
  $user_id = $_POST["user_id"];

  $sql=$conn->prepare("update menu set propertyname=?, location=?, price=?, propertytype=?,  image=?, user_id=? where id =? ");
  $sql->bind_param("ssdssii", $propertyname, $location, $price, $propertyname, $image, $user_id, $id);
  if($sql->execute()){
    header("location:home.php");
  }
}

?>

<!doctype html>
<html lang="en" data-bs-theme="light">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Bootstrap CSS v5.3.8 -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB"
      crossorigin="anonymous"
    />
  </head>

  <body>
    <header>
      <!-- place navbar here -->
    </header>
    <main>

    <form method="POST" >

   <div class="form-floating mb-3">
    <input
      type="text"
      class="form-control"
      name="propertyname"
      id="formId1"
      placeholder=""
      value = <?php echo $row["id"] ?>
    />
    <label for="formId1">Name</label>
   </div>


   <div class="form-floating mb-3">
    <input
      type="text"
      class="form-control"
      name="location"
      id="formId1"
      placeholder="Description"
      value = <?php echo $row["id"] ?>
    />
    <label for="formId1">Location</label>
   </div>

   <div class="form-floating mb-3">
    <input
      type="text"
      class="form-control"
      name="price"
      id="formId1"
      placeholder=""
      value = <?php echo $row["id"] ?>
    />
    <label for="formId1">Price</label>
   </div>

    <div class="form-floating mb-3">
    <input
      type="text"
      class="form-control"
      name="propertytype"
      id="formId1"
      placeholder=""
    />
    <label for="formId1">Property type</label>
   </div>


 <div class="mb-3">
    <label class="form-label">Property image</label>
    <input type="file" name="image" class="form-control"
           required>
</div>


<div class="mb-3">
    <label class="form-label">User ID</label>
    <input type="number" name="user_id"
           class="form-control" required>
</div>

<button
  type="submit"
  class="btn btn-primary"
>
  Submit
</button>

   

</form>
    </main>
    <footer>
      <!-- place footer here -->
    </footer>
    <!-- Bootstrap JavaScript Bundle (includes Popper) -->
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
