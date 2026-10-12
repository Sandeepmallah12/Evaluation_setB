<?php

include "db.php";
session_start();

$result = $conn->query("select * from property");

if($_SERVER["REQUEST_METHOD"]==="POST"){
 
  $propertyname = $_POST["propertyname"];
  $location = $_POST["location"];
  $price = $_POST["price"];
   $propertytype = $_POST["propertytype"]; 
 $userid=$_POST["userid"];
  $image_name = basename($_FILES["image"]["name"]);

if (move_uploaded_file(
    $_FILES["image"]["tmp_name"],
    "uploads/" . $image_name
)) {
    
} else {
    die("Image upload failed");
}


   $sql = $conn->prepare("insert into property(propertyname, location, price, propertytype, userid, image ) values (?,?,?,?,?,?)");
   $sql->bind_param("ssdsis", $propertyname, $location, $price, $propertytype,$userid, $image_name);
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
       <h3 class = "text-center">ADD PROPERTY</h3>
    </header>
    <main>

<div
  class="container"
>
 <form method = "POST" enctype="multipart/form-data">


  <div class="form-floating mb-3">
  <input
    type="text"
    class="form-control"
    name="propertyname"
    id="formId1"
    placeholder=""
  />
  <label for="formId1"> PropertyName</label>
 </div>


 <div class="form-floating mb-3">
  <input
    type="text"
    class="form-control"
    name="location"
    id="formId1"
    placeholder=""
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
  <label for="formId1">Property Type</label>
 </div>

  <div class="form-floating mb-3">
  <input
    type="text"
    class="form-control"
    name="userid"
    id="formId1"
    placeholder=""
  />
  <label for="formId1">Userid</label>
 </div>
 
 <div class="mb-3">
  <label for="" class="form-label">Choose file</label>
  <input
    type="file"
    class="form-control"
    name=""
    id=""
    placeholder=""
    aria-describedby="fileHelpId"
  />

 </div>

 <button
  type="submit"
  class="btn btn-primary"
 >
  Submit
 </button>
 
</form>
</div>


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
