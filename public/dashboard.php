<?php
require_once dirname(__DIR__) . '/config/database.php';
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/custom.css" rel="stylesheet">
  </head>
  <body>
    <div class="d-flex" id="wrapper">
      <!-- Sidebar -->
      <div class="bg-light border-end" id="sidebar-wrapper">
        <div class="sidebar-heading border-bottom bg-light">GPTest3</div>
        <div class="list-group list-group-flush">
          <a href="#" class="list-group-item list-group-item-action list-group-item-light p-3">Dashboard</a>
          <a href="#" class="list-group-item list-group-item-action list-group-item-light p-3">Profile</a>
          <a href="#" class="list-group-item list-group-item-action list-group-item-light p-3">Settings</a>
        </div>
      </div>
      <!-- Page content -->
      <div id="page-content-wrapper">
        <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
          <div class="container-fluid">
            <button class="btn btn-primary" id="sidebarToggle">Toggle Menu</button>
          </div>
        </nav>
        <div class="container-fluid mt-4">
          <h1 class="mt-4">Dashboard</h1>
          <p>Bienvenido al panel principal.</p>
        </div>
      </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/custom.js"></script>
  </body>
</html>
