<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <title>Home · Bootstrap v5.1</title>
    

    <!-- Bootstrap core CSS -->
    <link href="../node_modules/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

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

    
  </head>
  <body>
    
<header>
  <div class="collapse bg-dark" id="navbarHeader">
    <div class="container">
      <div class="row">

        <div class="col-sm-4 offset-md-1 py-4">
          <h4 class="text-white">Contact</h4>
          <ul class="list-unstyled">
            <li><a href="#" class="text-white">Follow on Twitter</a></li>
            <li><a href="#" class="text-white">Like on Facebook</a></li>
            <li><a href="<?php echo URLROOT?>pages/profile" 
            class="text-white">View Profile</a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <div class="navbar navbar-dark bg-dark shadow-sm">
    <div class="container">
      <a href="#" class="navbar-brand d-flex align-items-center">
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" stroke="currentColor" 
        stroke-linecap="round" stroke-linejoin="round" stroke-width="2" aria-hidden="true" class="me-2" 
        viewBox="0 0 24 24">
        <path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z"/>
        <circle cx="12" cy="13" r="4"/></svg>
        <strong>Wiz</strong>
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarHeader" 
      aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
    </div>
  </div>
</header>

<main>

  <section class="py-5 text-center container">
    <div class="row py-lg-5">
      <div class="col-lg-6 col-md-8 mx-auto">
        <h1 class="fw-light">My Blogs</h1>
    
      </div>
    </div>
  </section>

  <div class="album py-5 bg-light">


              <div class="container">
              <div class="col-2">
          <a href="<?php echo URLROOT ?>pages/userdash" class="btn btn-success">Go to Home</a>
        </div>
        <br>
              <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                  
                            <?php
                                            $str="";
                                            $html="";
                            foreach ($data as $k => $v) {
                                $str="".$v["blog_description"];
                                $html.='
                    <div class="col">
                    <div class="card shadow-sm">
                    <img src="../images/'.$v["blog_image"].'" alt="" height="240px">
        
                    <div class="card-body">
                    <h5>'.$v["blog_name"].'</h5>
                    <p class="card-text">'.substr($str, 0, 150).'<pre>      ..read more</pre>'.'</p>
                    <div class="d-flex justify-content-between align-items-center">
                      <form action="'.URLROOT.'pages/viewProduct" method="POST">
                      <input type="hidden" name="id" value="'.$v["blog_id"].'">
                      <input class="btn btn-success" type="submit" name="submit" value="View Full Blog"></form>
                      <form action="'.URLROOT.'pages/editBlog" method="POST">
                      <input type="hidden" name="id" value="'.$v["blog_id"].'">
                      <input type="hidden" name="name" value="'.$v["blog_name"].'">
                      <input type="hidden" name="image" value="'.$v["blog_image"].'">
                      <input type="hidden" name="description" value="'.$v["blog_description"].'">
                      <input class="btn btn-info" type="submit" name="edit" value="Edit">
                      </form>
                      <form action="" method="POST">
                      <input type="hidden" name="id" value="'.$v["blog_id"].'">
                      <input class="btn btn-danger" type="submit" name="delete" value="Delete">
                      </form>
                      </div>
                  </div>
                </div>
              </div>';
                            }
                            echo $html;
                  
                            ?>
          </div>
            
          <br>
          <div class="row">
            <div class="col-2">
            <a href="<?php echo URLROOT?>pages/addNewBlogByUser" class="btn btn-info">Add New Blog</a>
            </div>
          <!-- <div class="col-2">
          <a href="<?php echo URLROOT?>pages/userdash" class="btn btn-info">My Blogs</a>
          </div> -->
          

          </div>


          </div>
</div>

</div>

</main>

<footer class="text-muted py-5">
  <div class="container">
    <p class="float-end mb-1">
      <a href="#">Back to top</a>
    </p>
    <p class="mb-1">&copy; CEDCOSS Technologies</p>
  </div>
</footer>


    <script src="../node_modules/bootstrap/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" 
    crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="script1.js"></script>
      
  </body>
</html>