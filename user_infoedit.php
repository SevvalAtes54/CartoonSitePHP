<?php
include "common_pages/conn.php";
session_start();

if (!isset($_SESSION["login"]) || $_SESSION["login"] !== true) {
  $fullName = "Guest User";
  $email = "guest@gmail.com";
  $yetki = "0";
} else {
  $fullName = $_SESSION["fullName"];
  $email = $_SESSION["email"];
  $yetki = $_SESSION["yetki"];
  $login = $_SESSION["login"];
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (isset($_POST["message"])) {
    $message = $_POST["message"];
    $stmt = $conn->prepare("INSERT INTO direct_messages (sender, receiver, message) VALUES (?, ?, ?)");
    $receiver = "Alıcı"; // Alıcının kim olacağını belirtin
    $stmt->bind_param("sss", $fullName, $receiver, $message);
    $stmt->execute();
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Sevval Ates(admin)</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
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
          <div class="direct-chat-messages">
            <?php
            $result = $conn->query("SELECT * FROM direct_messages ORDER BY created_at DESC");
            while ($row = $result->fetch_assoc()) {
              echo "<div class='direct-chat-msg'>";
              echo "<div class='direct-chat-infos clearfix'>";
              echo "<span class='direct-chat-name float-left'>" . htmlspecialchars($row['sender']) . "</span>";
              echo "<span class='direct-chat-timestamp float-right'>" . $row['created_at'] . "</span>";
              echo "</div>";
              echo "<img class='direct-chat-img' src='dist/img/user1-128x128.jpg' alt='Message User Image'>";
              echo "<div class='direct-chat-text'>" . htmlspecialchars($row['message']) . "</div>";
              echo "</div>";
            }
            ?>
          </div>
          <div class="card-footer">
            <form action="#" method="post">
              <div class="input-group">
                <input type="text" name="message" placeholder="Type Message ..." class="form-control">
                <span class="input-group-append">
                  <button type="submit" class="btn btn-warning">Send</button>
                </span>
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
  <aside class="control-sidebar control-sidebar-dark">
  </aside>
</div>
<script src="plugins/jquery/jquery.min.js"></script>
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="dist/js/adminlte.min.js"></script>
<script src="dist/js/demo.js"></script>
</body>
</html>
