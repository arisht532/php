<?php
  // Include database file
  include 'database.php';
  $customerObj = new database();
  // Delete record from table
  if(isset($_GET['deleteId']) && !empty($_GET['deleteId'])) {
    $deleteId = $_GET['deleteId'];
    $customerObj->deleteRecord($deleteId);
  }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Profile Viewer</title>
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

  <body class="body">
  
  <header bg-info>
    <h1>Hey User, We Are Happy To See You Again!</h1>
  </header>
  <main class="container col-lg-10">
    <?php
      if (isset($_GET['msg1']) == "insert") {
      echo "<div class='alert alert-success alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert'>×</button>
              Your Registration added successfully
            </div>";
      }
      if (isset($_GET['msg2']) == "update") {
        echo "<div class='alert alert-success alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert'>×</button>
              Your Registration updated successfully
            </div>";
      }
      if (isset($_GET['msg3']) == "delete") {
       echo "<div class='alert alert-success alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert'>×</button>
              Record deleted successfully
            </div>";
      }
    ?>
    <section>
        <?php
        $customers = $customerObj->displayData();
        foreach ($customers as $customer) {
          ?>
<section class="vh-100" style = "background-color : #395B64;">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col col-lg-12 mb-4 mb-lg-0">
        <div class="card mb-3" style="border-radius: .5rem;">
          <div class="row g-0">
            <div class="col-md-4 gradient-custom text-center text-white"
              style="border-top-left-radius: .5rem; border-bottom-left-radius: .5rem;">
              <img src="https://th.bing.com/th/id/OIP.rk8YJO4cSIapQvG1WeH6gQHaHa?pid=ImgDet&w=200&h=200&c=7&dpr=1.5"
                alt="Avatar" class="img-fluid my-5" style="width: 80px;" />
              <h5 style="color: black"><?php echo $customer['name'] ?></h5>
              <p style="color: black"><?php echo $customer['profession'] ?></p>
            </div>
            
            <div class="col-md-8">
              <div class="card-body p-4">
                <h6>Profile</h6>
                <hr class="mt-0 mb-4">
                <div class="row pt-1">
                  <div class="col-6 mb-3">
                    <h6>Email</h6>
                    <p class="text-muted"><?php echo $customer['email'] ?></p>
                  </div>
                  <div class="col-6 mb-3">
                    <h6>Phone</h6>
                    <p class="text-muted"><?php echo $customer['phone'] ?></p>
                  </div>
                </div>
                <h6>Bio</h6>
                <hr class="mt-0 mb-4">
                <div class="row pt-1">
                  <div class="col-6 mb-3">
                    <h6>Pronouns</h6>
                    <p class="text-muted"><?php echo $customer['pronoun'] ?></p>
                  </div>
                  <div class="col-6 mb-3">
                    <h6>About</h6>
                    <p class="text-muted"><?php echo $customer['about'] ?></p>
                  </div>
                </div>
                <div class="d-flex justify-content-start">
                  <a href="#!"><i class="fab fa-facebook-f fa-lg me-3"></i></a>
                  <a href="#!"><i class="fab fa-twitter fa-lg me-3"></i></a>
                  <a href="#!"><i class="fab fa-instagram fa-lg"></i></a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
<div class="space"></div>
</section>
<button class="btn btn-primary mr-2 lawda"><a href="edit.php?editId=<?php echo $customer['id'] ?>">
<i class="fa fa-pencil text-white" aria-hidden="true">Update Profile</i></a></button>
<button class="btn btn-danger lawda"><a href="index.php?deleteId=<?php echo $customer['id'] ?>" onclick="confirm('Are you sure want to delete this record')"><i class="fa fa-trash text-white" aria-hidden="true">Delete Profile</i></a></button>
<?php } ?>
</section>
<div class="space"></div>
</main>
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