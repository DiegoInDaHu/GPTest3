<?php
require_once dirname(__DIR__) . '/config/database.php';
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard</title>
    <link href="../packages/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/custom.css" rel="stylesheet">
  </head>
  <body>
    <div class="d-flex" id="wrapper">
      <!-- Sidebar -->
      <div class="bg-light border-end" id="sidebar-wrapper">
        <div class="sidebar-heading border-bottom bg-light">GPTest3</div>
        <div class="list-group list-group-flush">
          <a href="dashboard.php" class="list-group-item list-group-item-action list-group-item-light p-3">Dashboard</a>
          <a href="settings.php" class="list-group-item list-group-item-action list-group-item-light p-3">Ajustes</a>
        </div>
      </div>
      <!-- Page content -->
      <div id="page-content-wrapper">
        <nav class="navbar navbar-light bg-light border-bottom">
          <div class="container-fluid d-flex align-items-center">
            <button class="navbar-toggler me-2" type="button" id="sidebarToggle">
              <span class="navbar-toggler-icon"></span>
            </button>
            <span class="navbar-brand mb-0 h1">Dashboard</span>
          </div>
        </nav>
        <div class="container-fluid mt-4">
          <h1 class="mt-4">Dashboard</h1>
          <p>Bienvenido al panel principal.</p>
        </div>
      </div>
    </div>
    <script src="../packages/bootstrap.bundle.min.js"></script>
    <script src="../assets/custom.js"></script>
  </body>
</html>
