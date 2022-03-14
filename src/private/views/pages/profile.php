<?php
$email=$data["email"];
$password=$data["password"];
$fname=$data["firstName"];
$lname=$data["lastname"];
$uid=$data["id"];
$username=$data["username"];
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.88.1">
    <title>Dashboard Template · Bootstrap v5.1</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/dashboard/">

    

    <!-- Bootstrap core CSS -->
    <link href="../../../public/node_modules/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" 
    crossorigin="anonymous">


    <style>
      #sidebarMenu li a:hover {
         color: #1abc9c !important;
  }
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

    
    <!-- Custom styles for this template -->
    <link href="<?php echo URLROOT?>assets/css/dashboard.css" rel="stylesheet">
  </head>
  <body>
    
<header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
  <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="#">Company name</a>
  <button class="navbar-toggler position-absolute d-md-none collapsed" 
  type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" 
  aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">
  <div class="navbar-nav">
    <div class="nav-item text-nowrap">
      <a class="nav-link px-3" href="<?php echo URLROOT?>pages/login">Sign out</a>
    </div>
  </div>
</header>
<div class="container-fluid">
    <div class="row">
      <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
        <div class="position-sticky pt-3">
          <ul class="nav flex-column">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="userdash.php">
                <span data-feather="home"></span>
                My Profile
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" aria-current="page" href="<?php echo URLROOT?>'pages/userdash">
                Go To Home
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" aria-current="page" href="<?php echo URLROOT?>'pages/myblog">
                My blogs
              </a>
            </li>
            <hr>
            </ul>
            </div>
            </nav>
            </div>
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center 
                pt-3 pb-2 mb-3 border-bottom">
                  <h1 class="h2">My Profile</h1>
                  <div class="btn-toolbar mb-2 mb-md-0">
                    <div class="btn-group me-2">
                      <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
                      <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
                    </div>
                    <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
                      <span data-feather="calendar"></span>
                      This week
                    </button>

                  </div>
                </div>
              <div class="details">
                <form action="" method="POST">
                <label for="username">Username:
                  <input type="text" name="username" value="<?php echo $username; ?>" id="username">
                </label><br><br>
                <label for="uid">User ID:
                  <input type="text" name="uid" value="<?php echo $uid; ?>" id="uid">
                </label><br><br>
                <label for="fname">First Name:
                  <input type="text" name="fname" value="<?php echo $fname; ?>" id="fname">
                </label><br><br>
                <label for="lname">Last Name:
                  <input type="text" name="lname" value="<?php echo $lname; ?>" id="lname">
                </label><br><br>
                <label for="email">email:
                  <input type="text" name="email" value="<?php echo $email; ?>" id="email">
                </label><br><br>
                <label for="password">Password:
                  <input type="text" name="password" value="<?php echo $password; ?>" id="password">
                </label><br><br>
                <input type="hidden" name="emailid" value="<?php echo $email; ?>">
                <button type="button" class="btn btn-primary" id="Edit">Edit Profile</button>
                <button type="submit" class="btn btn-primary" id="Update" 
                style="display:none" name="submit">Update Profile</button>
                </form>

              </div>
            </main>
          </div>
          <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
          <script src="<?php echo URLROOT?>assets/js/script1.js"> </script>
          </body>
</html>
                