<?php

include "db.php";

if($_SERVER["REQUEST_METHOD"]==="POST"){
  $fullname = $_POST["fullname"];
  $email = $_POST["email"];
  $password = password_hash($_POST["password"], PASSWORD_BCRYPT);

  $sql = $conn->prepare("insert into user(fullname, email, password) values (?,?,?)");
  $sql->bind_param("sss", $fullname, $email, $password);
  if($sql->execute()){
    header("location:login.php");
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
      <h3 class = "text-center">Registration</h3>
    </header>
    <main>
<div
  class="container"
>
  <form method = "POST">

  <div class="form-floating mb-3">
    <input
      type="text"
      class="form-control"
      name="fullname"
      id="formId1"
      placeholder=""
    />
    <label for="formId1">Name</label>
  </div>

  <div class="form-floating mb-3">
    <input
      type="text"
      class="form-control"
      name="email"
      id="formId1"
      placeholder=""
    />
    <label for="formId1">Email</label>
  </div>

  <div class="form-floating mb-3">
    <input
      type="text"
      class="form-control"
      name="password"
      id="formId1"
      placeholder=""
    />
    <label for="formId1">Password</label>
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
