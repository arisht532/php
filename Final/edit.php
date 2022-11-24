<?php

// Include database file
include 'database.php';

$customerObj = new database();

// Edit customer record
if(isset($_GET['editId']) && !empty($_GET['editId'])) {
  $editId = $_GET['editId'];
  $customer = $customerObj->displyaRecordById($editId);
}

// Update Record in customer table
if(isset($_POST['update'])) {
  $customerObj->updateRecord($_POST);
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Profile Viewer | Update</title>
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
    <h1>Want to Edit Your Profile ? Go Ahead !</h1>
  </header>
  <section class="container">
    <div class="row">
      <div class="col-md-5 mx-auto">
        <div class="card">
          <div class="card-header" style= "background-color: #E7F6F2;">
          <h4 class="text-dark">Update Your Information</h4>
          </div>
          <div class="card-body bg-light">
            <form action="edit.php" method="POST">
              <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" name="uname" value="<?php echo $customer['name']; ?>" required="">
              </div>
              <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" name="uemail" value="<?php echo $customer['email']; ?>" required="">
              </div>
              <div class="form-group">
                <label for="phone">Phone:</label>
                <input type="text" class="form-control" name="uphone" value="<?php echo $customer['phone']; ?>" required="">
              </div>
              <div class="form-group">
                <label for="profession">Profession:</label>
                <input type="text" class="form-control" name="uprofession" value="<?php echo $customer['profession']; ?>" required="">
              </div>
              <div class="form-group">
                <label for="pronoun">Pronoun:</label>
                <input type="text" class="form-control" name="upronoun" value="<?php echo $customer['pronoun']; ?>" required="">
              </div>
              <div class="form-group">
                <label for="about">About:</label>
                <input type="text" class="form-control" name="uabout" value="<?php echo $customer['about']; ?>" required="">
              </div>
              <div class="form-group">
                <input type="hidden" name="id" value="<?php echo $customer['id']; ?>">
                <input type="submit" name="update" class="btn btn-success" style="float:right;" value="Update">
              </div>
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