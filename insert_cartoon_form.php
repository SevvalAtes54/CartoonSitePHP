<?php
include "common_pages/conn.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <?php include "common_pages/title.php";?>
  
  <!----------------------------- Google Font: Source Sans Pro ----------------------------->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

  <!----------------------------- Font Awesome ----------------------------->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">

  <!----------------------------- Theme style ----------------------------->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>
<body class="hold-transition sidebar-mini">

<div class="wrapper">

  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <?php include "common_pages/left_navbar.php";?>
    <?php include "common_pages/right_navbar.php";?>
  </nav>
 <!----------------------------- Main Sidebar Container ----------------------------->
 <aside class="main-sidebar sidebar-dark-primary elevation-4">
   
   <!----------------------------- Brand Logo ----------------------------->  
    <?php include "common_pages/logo.php";?>

    <!----------------------------- Sidebar ----------------------------->
    <?php include "common_pages/sidebar.php";?> 

    <!----------------------------- /.sidebar ----------------------------->
  </aside>
  <div class="content-wrapper">
    <?php include "common_pages/content_header.php";?>

    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-6">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Edit Cartoon Information</h3>
              </div>
              <form action="insert_cartoon_conn.php" method="post">
                <div class="card-body">
                  <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" required class="form-control" name="title" id="title" placeholder="Enter title">
                  </div>
                  <div class="form-group">
                    <label for="description">Description</label>
                    <textarea class="form-control" name="description" id="description" placeholder="Enter Description"></textarea>
                  </div>
                  <div class="form-group">
                    <label for="release_date">Release Date</label>
                    <input type="date" class="form-control" name="release_date" id="release_date">
                  </div>
                  <div class="form-group">
                    <label for="imdb">IMDb</label>
                    <input type="text" class="form-control" name="imdb" id="imdb" placeholder="Enter IMDb rating">
                  </div>
                </div>
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Save</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>

    <footer class="main-footer">
      <?php include "common_pages/copyright.php";?>
    </footer>
  </div>

  <aside class="control-sidebar control-sidebar-dark"></aside>
</div>

<script src="plugins/jquery/jquery.min.js"></script>
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="dist/js/adminlte.min.js"></script>
<script src="dist/js/demo.js"></script>
</body>
</html>
