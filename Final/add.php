<?php

// Include database file
include 'database.php';

$customerObj = new database();

// Insert Record in customer table
if(isset($_POST['submit'])) {
  $customerObj->insertData($_POST);
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Profile Viewer | Add</title>
  <meta name="description" content="This week we will be building a CREATE and READ CRUD system with PDO">
  <meta name="robots" content="noindex, nofollow">
  <!--  Add our Google fonts  -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;700&family=Roboto:ital,wght@0,400;0,500;0,700;1,400&display=swap" rel="stylesheet">
  <!--  Add our Bootstrap  -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" >
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <!--  Add our custom CSS  -->
  <link rel="stylesheet" href="./css/style.css">
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"/>
</head>
<section>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand glyphicon glyphicon-user" href="#">Profile Viewer</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item active">
      <a href="add.php" style="float:right;"><button class="btn btn-success">Add Profile<i class="fas"></i></button></a>
      </li>
      <li class="nav-item">
      <a href="" style="float:right;"><button class="btn btn-success">Contact Us<i class="fas"></i></button></a>
      </li>
      <li class="nav-item">
      <a href="" style="float:right;"><button class="btn btn-success">About Us<i class="fas"></i></button></a>
      </li>
    </ul>
  </div>
</nav>
</section>
<body>
  <header>
    <h1> Let's Add your profile into the database !</h1>
  </header>
  <section class="container">
    <div class="row">
      <div class="col-md-5 mx-auto">
        <div class="card">
          <div class="card-header bg-info text-white">
            <h2>Insert Data</h2>
          </div>
          <div class="card-body bg-light">
            <form action="add.php" method="POST">
              <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" name="name" placeholder="Enter name" required="">
              </div>
              <div class="form-group">
                <label for="profession">profession:</label>
                <input type="text" class="form-control" name="profession" placeholder="Enter profession" required="">
              </div>
              <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" name="email" placeholder="Enter email" required="">
              </div>
              <div class="form-group">
                <label for="phone">Phone:</label>
                <input type="number" class="form-control" name="phone" placeholder="Enter phone" required="">
              </div>
              <div class="form-group">
                <label for="pronoun">Pronouns:</label>
                <input type="text" class="form-control" name="pronoun" placeholder="Enter pronoun" required="">
              </div>
              <div class="form-group">
                <label for="about">About:</label>
                <input type="text" class="form-control" name="about" placeholder="Enter about you" required="">
              </div>
              <input type="submit" name="submit" class="btn btn-success" style="float:right;" value="Submit">
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
  <div class="card text-center">
  <div class="card-header">
    Copyrights reserved.
  </div>
  <div class="card-body">
    <h5 class="card-title">here</h5>
    <a href="index.php" class="btn btn-primary">check out your profile!</a>
  </div>
</div>
</body>
</html>