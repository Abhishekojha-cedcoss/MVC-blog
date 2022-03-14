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
  <link href="<?php echo URLROOT?>node_modules/bootstrap/dist/css/bootstrap.min.css" 
  rel="stylesheet" crossorigin="anonymous">


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
    <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="#"><svg 
    xmlns="http://www.w3.org/2000/svg" width="25" height="20" 
    fill="currentColor" class="bi bi-activity" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M6 2a.5.5 0 0 1 .47.33L10 12.036l1.53-4.208A.5.5 0 0 1 12 
  7.5h3.5a.5.5 0 0 1 0 1h-3.15l-1.88 5.17a.5.5 0 0 1-.94 0L6 3.964 4.47 8.171A.5.5 0 0 1 4 
  8.5H.5a.5.5 0 0 1 0-1h3.15l1.88-5.17A.5.5 0 0 1 6 2Z"/>
</svg>Wiz</a>
    <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" 
    data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" 
    aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">
    <div class="navbar-nav">
      <div class="nav-item text-nowrap">
        <a class="nav-link px-3" href="<?php echo URLROOT?>'pages/login">Sign out</a>
      </div>
    </div>
  </header>

  <div class="container-fluid">
    <div class="row">
      <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
        <div class="position-sticky pt-3">
          <ul class="nav flex-column">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="#">
                <span data-feather="home"></span>
                Dashboard
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo URLROOT ?>pages/adminHome">
                <span data-feather="shopping-cart"></span>
                Blogs
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">
                <span data-feather="bar-chart-2"></span>
                Reports
              </a>
            </li>
          </ul>
        </div>
      </nav>

      <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center 
        pt-3 pb-2 mb-3 border-bottom">
          <h1 class="h2">Dashboard</h1>
        </div>

        <h2>All Users</h2>
        <div class="table-responsive">
            <?php
            
            $html = "";
            $html .= '<table class="table table-striped table-sm">     
        <tr>
          <th scope="col">User Id</th>
          <th scope="col">Username</th>
          <th scope="col">Firstname</th>
          <th scope="col">Lastname</th>
          <th scope="col">status</th>
          <th scope="col">Action</th>
        </tr>
      
      ';
            foreach ($data as $k => $v) {
                $html .= '<tr>
        <td>' . $v["user_id"] . '</td>
        <td>' . $v["username"] . '</td>
        <td>' . $v["firstName"] . '</td>
        <td>' . $v["lastname"] . '</td>
        <td>' . $v["Status"] . '<form method="POST"><input type="hidden"
         name="id" value="' . $v["user_id"] . '"><button type="submit" name="submit"
          class="submit" style="display:none">Change</button></form></td>
        <td><a href="#" class="userEdit">Edit </a>
        <form action="" method="POST">
        <input type="hidden" name="del" value="' . $v["user_id"] . '">
        <button type="submit" name="submit1"> Delete</button></form></td>
        </tr>';
            }
            $html .= '</table>';
            echo $html;

            ?>
 
          </div>
                <br>
                <br>

        </div>
      </main>
    </div>
  </div>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="<?php echo URLROOT?>node_modules/bootstrap/dist/js/bootstrap.bundle.js" 
  integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" 
  crossorigin="anonymous"></script>
  <script src="<?php echo URLROOT?>assets/js/script1.js"> </script>
</body>

</html>