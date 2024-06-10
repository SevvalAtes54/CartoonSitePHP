<?php

session_start();
include "common_pages/conn.php";

$query = "SELECT * FROM cartoons";
$result = mysqli_query($conn, $query);
?>



<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <?php include "common_pages/title.php";?>
  
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <style>
    table {
      width: 50%;
      border-collapse: collapse;
    }
    th, td {
      padding: 8px;
      text-align: left;
      border-bottom: 1px solid #ddd;
    }
    th {
      background-color: #f2f2f2;
    }
  </style>
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
          <div class="col-md-12">
            <div class="card card-primary">
              <div class="card-header" style="text-align: end;">
               
              <div class="col-md-6"> <h3 class="card-title">Cartoon Information</h3></div>

                <?php if ($_SESSION["yetki"] == 1): ?>
                            
                                <a href="insert_cartoon_form.php" class="text-warning">
                                    <i class="fas fa-plus"></i> New Series 
                                </a>
            
                <?php endif; ?>
              </div>
              <div class="card-body">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th>Title</th>
                      <th>Description</th>
                      <th>Release Date</th>
                      <th>IMDb Rating</th>

                      <?php if ($_SESSION["yetki"] == 1): ?>
                            <th>Process</th>
                        <?php endif; ?>
                    </tr>
                  </thead>
                  <tbody>
                    <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                      <tr>
                        <td><?php echo $row['name']; ?></td>
                        <td><?php echo $row['description']; ?></td>
                        <td><?php echo $row['release_date']; ?></td>
                        <td><?php echo $row['imdb']; ?></td>
                           
                        <?php if ($_SESSION["yetki"] == 1): ?>
                            <td>
                                <a href="edit_cartoon_form.php?id=<?php echo $row['id']; ?>" class="text-success">
                                    <i class="fas fa-edit"></i> 
                                </a>
                                <br>
                                <a href="delete_cartoon.php?id=<?php echo $row['id']; ?>" class="text-danger">
                                    <i class="fas fa-trash-alt"></i> 
                                </a>
                            </td>
                        <?php endif; ?>
                      </tr>
                    <?php } ?>
                  </tbody>
                </table>
              </div>
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
