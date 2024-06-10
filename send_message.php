<?php
session_start();
include "common_pages/conn.php";

// Eğer oturum başlatılmadıysa veya oturum başlatıldıysa ancak giriş yapılmamışsa
if (!isset($_SESSION["login"]) || $_SESSION["login"] !== true) {
  $fullName = "Guest User";
  $email = "guest@gmail.com";
  $yetki = "0";
} else {
  // Oturum başlatıldıysa ve giriş yapılmışsa
  $fullName = $_SESSION["fullName"];
  $email = $_SESSION["email"];
  $yetki = $_SESSION["yetki"];
  $login = $_SESSION["login"];
}

// Eğer form gönderildiyse
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Mesaj gönderme işlemi
  if (isset($_POST["message"])) {
    // Eğer admin ise, email 'guest@gmail.com' olarak değiştirilecek
    if ($yetki == 1) {
      $email = "guest@gmail.com";
    }
    $message = $_POST["message"];
    $type = ($yetki == 1) ? 1 : 0; // Adminse 1, değilse 0
    $insertQuery = "INSERT INTO direct_messages (sender, email, message, type) VALUES ('$fullName', '$email', '$message', '$type')";
    $sendMessage = mysqli_query($conn, $insertQuery);
    if ($sendMessage) {
      echo "Mesaj başarıyla gönderildi.";
    } else {
      echo "Mesaj gönderilirken hata oluştu.";
    }
  }
}

$query = "SELECT * FROM direct_messages where email = '$email' ORDER BY sent_at ASC";
$result = mysqli_query($conn, $query);
?>

<style>
  .border-message {
    border: 1px solid black;
    border-radius: 10px;
    display: inline;
    padding: 5px;
    background-color: white;
  }
  .direct-chat-messages {
    background-image: url("dist/img/whatsapp.png");
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
  }
  .from-admin {
    background-color: yellow !important;
  }
</style>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Sevval Ates(admin)</title> <!-- Başlık burada değiştirildi -->
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <?php include "common_pages/left_navbar.php";?>
    <?php include "common_pages/right_navbar.php";?>
  </nav>
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <?php include "common_pages/logo.php";?>
    <?php include "common_pages/sidebar.php";?> 
  </aside>
  <div class="content-wrapper">
    <?php include "common_pages/content_header.php";?>
    <div class="col-md-3">
      <div class="card card-warning direct-chat direct-chat-warning shadow">
        <div class="card-header">
          <h3 class="card-title">Sevval Ates(admin)</h3>
          <div class="card-tools">
            <span title="3 New Messages" class="badge bg-danger">3</span>
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
              <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" title="Contacts" data-widget="chat-pane-toggle">
              <i class="fas fa-comments"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove">
              <i class="fas fa-times"></i>
            </button>
          </div>
        </div>
        <div class="card-body">
          <div class="direct-chat-messages" style="background-color: green;">
            <?php while ($row = mysqli_fetch_assoc($result)) { ?>
              <div style="margin-bottom: 20px;">
                <p class="<?php echo ($row['type'] == 1) ? 'from-admin' : '' ?> border-message"><?php echo $row['message']; ?></p>
              </div>
            <?php } ?>
          </div>
          <!-- /.direct-chat-messages -->
          <div class="card-footer">
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
              <div class="input-group">
                <input type="text" name="message" placeholder="Type Message ..." class="form-control">
                <span class="input-group-append">
                  <button type="submit" class="btn btn-warning">Send</button>
                </span>
              </div>
            </form>
          </div>
          <!-- /.card-footer -->
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
    <!-- /.col -->
  </div>
  <footer class="main-footer">
    <?php include "common_pages/copyright.php";?>
  </footer>
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
</div>
<script src="plugins/jquery/jquery.min.js"></script>
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="dist/js/adminlte.min.js"></script>
<script src="dist/js/demo.js"></script>
</body>
</html>
