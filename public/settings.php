<?php
require_once dirname(__DIR__) . '/config/database.php';
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

$err = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'] ?? '';
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';
    if ($name && $email && $password) {
        $stmt = $pdo->prepare('INSERT INTO users (name, email, password) VALUES (?, ?, ?)');
        $stmt->execute([$name, $email, $password]);
    } else {
        $err = 'Todos los campos son obligatorios';
    }
}
$users = $pdo->query('SELECT id, name, email FROM users')->fetchAll(PDO::FETCH_ASSOC);
?>
<!doctype html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Ajustes</title>
  <link href="https://cdn.jsdelivr.net/npm/bootswatch@5.3.2/dist/litera/bootstrap.min.css" rel="stylesheet">
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
          <span class="navbar-brand mb-0 h1">Ajustes</span>
        </div>
      </nav>
      <div class="container-fluid mt-4">
        <h1 class="mt-4">Ajustes</h1>
        <?php if($err): ?>
          <div class="alert alert-danger"><?= $err ?></div>
        <?php endif; ?>
        <h3>Usuarios</h3>
        <table class="table table-striped">
          <thead><tr><th>ID</th><th>Nombre</th><th>Email</th></tr></thead>
          <tbody>
          <?php foreach($users as $u): ?>
            <tr><td><?= $u['id'] ?></td><td><?= htmlspecialchars($u['name']) ?></td><td><?= htmlspecialchars($u['email']) ?></td></tr>
          <?php endforeach; ?>
          </tbody>
        </table>
        <h4 class="mt-4">Nuevo usuario</h4>
        <form method="POST">
          <div class="mb-3">
            <label class="form-label">Nombre</label>
            <input type="text" class="form-control" name="name" required>
          </div>
          <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" class="form-control" name="email" required>
          </div>
          <div class="mb-3">
            <label class="form-label">Contraseña</label>
            <input type="text" class="form-control" name="password" required>
          </div>
          <button type="submit" class="btn btn-primary">Agregar</button>
        </form>
      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/custom.js"></script>
</body>
</html>
