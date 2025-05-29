<?php
session_start();
if (!isset($_SESSION['logueado'])) {
    header('Location: index.php');
    exit;
}

$dataPath = __DIR__ . '/novedades/novedades.json';
$data = file_exists($dataPath) ? json_decode(file_get_contents($dataPath), true) : [];
$editando = null;
if (isset($_GET['editar'])) {
    foreach ($data as $n) {
        if ($n['id'] === $_GET['editar']) {
            $editando = $n;
            break;
        }
    }
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // ✅ Agregar o actualizar
    $id = $_POST['id'] ?? uniqid();
    $nueva = [
        'id' => $id,
        'titulo' => $_POST['titulo'],
        'bajada' => $_POST['bajada'],
        'imagen' => ''
    ];

    // Imagen
    if (!empty($_FILES['imagen']['tmp_name'])) {
    $ext = strtolower(pathinfo($_FILES['imagen']['name'], PATHINFO_EXTENSION));
    $permitidas = ['jpg', 'jpeg', 'png', 'webp'];

    if (in_array($ext, $permitidas)) {
        $nombreImg = uniqid() . '.' . $ext;
        move_uploaded_file($_FILES['imagen']['tmp_name'], __DIR__ . "/novedades/imagenes/$nombreImg");
        $nueva['imagen'] = "novedades/imagenes/$nombreImg";
    }
    
}
if (empty($nueva['imagen']) && $editando) {
    $nueva['imagen'] = $editando['imagen'];
}

    // ✨ NUEVO - Si existe, reemplazamos. Si no, agregamos.
$encontrado = false;
foreach ($data as &$item) {
    if ($item['id'] === $id) {
        $item = array_merge($item, $nueva);
        $encontrado = true;
        break;
    }
}
unset($item); // Limpia referencia

if (!$encontrado) {
    $data[] = $nueva;
}

    file_put_contents($dataPath, json_encode($data, JSON_PRETTY_PRINT));
    header('Location: dashboard.php');
    exit;
}

// ✅ Eliminar
if (isset($_GET['eliminar'])) {
    foreach ($data as $n) {
    if ($n['id'] === $_GET['eliminar'] && file_exists(__DIR__ . '/' . $n['imagen'])) {
        unlink(__DIR__ . '/' . $n['imagen']);
    }
}

    $data = array_filter($data, fn($n) => $n['id'] !== $_GET['eliminar']);
    file_put_contents($dataPath, json_encode(array_values($data), JSON_PRETTY_PRINT));
    header('Location: dashboard.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="es">
<head><meta charset="UTF-8"><title>Panel Novedades</title>
<link rel="stylesheet" href="./css/admin.css">

</head>
<body>

<header>
  <img src="novedades/imagenes/logoBlancoUsina.png" alt="Logo Usina Creativa" />
  <a href="logout.php" class="logout">Cerrar sesión</a>
</header>


  <h1>Administrar Novedades</h1>

  <form method="POST" enctype="multipart/form-data">
  <input type="hidden" name="id" value="<?= $editando['id'] ?? '' ?>">

  <input type="text" name="titulo" placeholder="Título" required
         value="<?= $editando['titulo'] ?? '' ?>"><br>

  <textarea name="bajada" placeholder="Bajada" required><?= $editando['bajada'] ?? '' ?></textarea><br>

  <input type="file" name="imagen" accept="image/*"><br>

  <button type="submit"><?= $editando ? 'Actualizar' : 'Agregar' ?></button>
</form>


 <h2>Listado</h2>
<div class="novedades-grid">
  <?php foreach ($data as $n): ?>
    <div class="card">
      <img src="<?= $n['imagen'] ?>" alt="<?= htmlspecialchars($n['titulo']) ?>">
      <h3><?= htmlspecialchars($n['titulo']) ?></h3>
      <p><?= htmlspecialchars($n['bajada']) ?></p>
      <div class="actions">
        <a href="?eliminar=<?= $n['id'] ?>">🗑 Eliminar</a>
        <a href="?editar=<?= $n['id'] ?>">✏️ Editar</a>
      </div>
    </div>
  <?php endforeach; ?>
</div>

  <footer>
  &copy; <?= date('Y') ?> Usina Creativa - Panel de Novedades
</footer>

</body>
</html>
