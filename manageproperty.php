<?php

include "db.php";
session_start();

$result = $conn->query("select * from property");

if($_SERVER["REQUEST_METHOD"]==="POST"){
  $propertyname = $_POST["propertyname"];
  $location = $_POST["location"];
  $price = $_POST["price"];
   $propertytype = $_POST["propertytype"]; 
  
  $image_name = basename($_FILES["image"]["name"]);

if (move_uploaded_file(
    $_FILES["image"]["tmp_name"],
    "uploads/" . $image_name
)) {
  
} else {
    die("Image upload failed");
}

   $_user_id = $_POST["user_id"]; 


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

    <style>

     .gradient-header th {
    background: linear-gradient(90deg, #6a11cb, #2575fc);
    color: white;
    padding: 16px;
    border: none;
}


    </style>
  </head>

  <body>
    <header>
      <h3 class = "text-center">ADD property</h3>
    </header>
    <main>

    <div
      class="container"
    >
    <form method="POST" enctype="multipart/form-data">

   <div class="form-floating mb-3">
    <input
      type="text"
      class="form-control"
      name="propertyname"
      id="formId1"
      placeholder=""
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




<div
  class="container"
>
  <form method = "POST">
  
<div class="container mt-5">

    

    <div class="row">

        <?php while ($row = $result->fetch_assoc()) { ?>

        <div class="col-md-4 mb-4">

            <div class="card h-100 shadow">

                <img src="uploads/<?php echo $row['image']; ?>"
                     class="card-img-top"
                     height="200">

                <div class="card-body">
                      <p> propertyname:  <?php echo $row['propertyname']; ?></p>
            
                    <p>location: <?php echo $row['location']; ?></p>

                    <p>Price: ₹<?php echo $row['price']; ?></p>

                    <p>propetyType: <?php echo $row['propertytype']; ?></p>

                    <p>User ID: <?php echo $row['userid']; ?></p>

                </div>

                <div class="card-footer">

                  <a
                    name=""
                    id=""
                    class="btn btn-primary"
                    href="Edit.php?id=<?php echo $row["id"] ?>"
                    role="button"
                    >Edit</a
                  >
                  

                 <a
                    name=""
                    id=""
                    class="btn btn-primary"
                    href="delete.php?id=<?php echo $row["id"] ?>"
                    role="button"
                    >Delete</a
                  >

                </div>

            </div>

        </div>

        <?php } ?>

    </div>

</div>


</form>
</div>


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
