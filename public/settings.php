<?php
require_once dirname(__DIR__) . '/config/database.php';
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

$err = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'] ?? '';
    $name = trim($_POST['name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $password = trim($_POST['password'] ?? '');
    $id = intval($_POST['id'] ?? 0);

    if ($action === 'add' && $name && $email && $password) {
        $stmt = $pdo->prepare('INSERT INTO users (name, email, password) VALUES (?, ?, ?)');
        $stmt->execute([$name, $email, $password]);
    } elseif ($action === 'edit' && $id && $name && $email) {
        $params = [$name, $email];
        $sql = 'UPDATE users SET name = ?, email = ?';
        if ($password !== '') {
            $sql .= ', password = ?';
            $params[] = $password;
        }
        $sql .= ' WHERE id = ?';
        $params[] = $id;
        $stmt = $pdo->prepare($sql);
        $stmt->execute($params);
    } else {
        $err = 'Todos los campos son obligatorios';
    }
}

if (isset($_GET['delete'])) {
    $id = intval($_GET['delete']);
    $stmt = $pdo->prepare('DELETE FROM users WHERE id = ?');
    $stmt->execute([$id]);
}

$users = $pdo->query('SELECT id, name, email FROM users')->fetchAll(PDO::FETCH_ASSOC);
?>
<!doctype html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Ajustes</title>
  <link href="../packages/bootstrap.min.css" rel="stylesheet">
  <link href="../packages/dataTables.bootstrap5.min.css" rel="stylesheet">
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
        <h3 class="d-flex justify-content-between">Usuarios
          <button type="button" class="btn btn-primary btn-sm" id="addUserBtn">Nuevo</button>
        </h3>
        <table id="usersTable" class="table table-striped">
          <thead>
            <tr><th>ID</th><th>Nombre</th><th>Email</th><th>Acciones</th></tr>
          </thead>
          <tbody>
          <?php foreach($users as $u): ?>
            <tr>
              <td><?= $u['id'] ?></td>
              <td><?= htmlspecialchars($u['name']) ?></td>
              <td><?= htmlspecialchars($u['email']) ?></td>
              <td>
                <button type="button" class="btn btn-sm btn-secondary edit-btn" data-id="<?= $u['id'] ?>" data-name="<?= htmlspecialchars($u['name']) ?>" data-email="<?= htmlspecialchars($u['email']) ?>">Editar</button>
                <a href="?delete=<?= $u['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('¿Eliminar?')">Borrar</a>
              </td>
            </tr>
          <?php endforeach; ?>
          </tbody>
        </table>

        <div class="modal fade" id="userModal" tabindex="-1" aria-labelledby="userModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <form class="modal-content" method="POST">
              <div class="modal-header">
                <h5 class="modal-title" id="userModalLabel">Nuevo usuario</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <input type="hidden" name="id" id="user-id">
                <input type="hidden" name="action" id="user-action" value="add">
                <div class="mb-3">
                  <label class="form-label">Nombre</label>
                  <input type="text" class="form-control" name="name" id="user-name" required>
                </div>
                <div class="mb-3">
                  <label class="form-label">Email</label>
                  <input type="email" class="form-control" name="email" id="user-email" required>
                </div>
                <div class="mb-3">
                  <label class="form-label">Contraseña</label>
                  <input type="text" class="form-control" name="password" id="user-password">
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-primary">Guardar</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="../packages/jquery.min.js"></script>
  <script src="../packages/bootstrap.bundle.min.js"></script>
  <script src="../packages/jquery.dataTables.min.js"></script>
  <script src="../packages/dataTables.bootstrap5.min.js"></script>
  <script src="../assets/custom.js"></script>
</body>
</html>
