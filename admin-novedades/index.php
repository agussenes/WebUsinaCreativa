<?php include('auth.php'); ?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Login - Admin Novedades</title>

  <link rel="stylesheet" href="./css/admin.css">

</head>
<body>
  <header>
  <img src="novedades/imagenes/logoBlancoUsina.png" alt="Logo Usina Creativa" />
  <h1>Panel de Administración</h1>
</header>

  <h2>Ingresar al panel</h2>
  <form method="POST">
    <input type="text" name="user" placeholder="Usuario" required><br>
    <input type="password" name="pass" placeholder="Contraseña" required><br>
    <button type="submit">Entrar</button>
  </form>
  <?php if (isset($error)) echo "<p style='color:red;'>$error</p>"; ?>
  <footer>
  &copy; <?= date('Y') ?> Usina Creativa - Panel de Novedades
</footer>

</body>
</html>
