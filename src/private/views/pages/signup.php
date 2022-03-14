<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.88.1">
    <title>Signup Template · Bootstrap v5.1</title>    

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="<?php echo URLROOT?>node_modules/bootstrap/dist/css/bootstrap.min.css" >


    <style>
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
    <link href="<?php echo URLROOT?>assets/css/signin.css" rel="stylesheet">
  </head>
  <body class="text-center">
    
<main class="form-signin">
  <form action="" method="post">
    <h1 class="h3 mb-3 fw-normal">Sign Up</h1>

    <div class="form-floating">
      <input type="email" required class="form-control" id="floatingInput" name="email" placeholder="name@example.com">
      <label for="floatingInput">Email address</label>
    </div>

    <div class="form-floating">
        <input type="text" required class="form-control" id="floatingInput" 
        name="username" placeholder="Enter username">
        <label for="floatingInput">Username</label>
    </div>

    <div class="form-floating">
        <input type="text" required class="form-control" id="floatingInput" 
        name="firstname" placeholder="Enter first name">
        <label for="floatingInput">First name</label>
      </div>

    <div class="form-floating">
        <input type="text" required class="form-control" id="floatingInput" 
        name="lastname" placeholder="Enter last name">
        <label for="floatingInput">Last name</label>
    </div>

    <div class="form-floating">
      <input type="password" required class="form-control" id="floatingPassword" name="password" placeholder="Password">
      <label for="floatingPassword">Password</label>
    </div>

    <div class="checkbox mb-3">
      <label>
        <input type="checkbox" value="remember-me"> Remember me
      </label>
    </div>
    <button class="w-100 btn btn-lg btn-primary" type="submit" name="submit">Sign Up</button>
    <div class="text-danger">
    <?php if (!empty($data)) {
         echo $data;
} ?>
    </div>
    <p>OR</p>
    <a href="<?php echo URLROOT?>pages/login">Sign in</a>
    <p class="mt-5 mb-3 text-muted">&copy; CEDCOSS Technologies</p>
  </form>
</main>
   
  </body>
</html>