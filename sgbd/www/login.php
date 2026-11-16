<?php
session_start();
if (isset($_SESSION['utilizador'])) {
    header('Location: painel.php');
    exit;
}
$erro = isset($_GET['erro']) ? $_GET['erro'] : '';
?>
<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="estilo.css">
    <script>
        function validar(frm) {
            if (frm.utilizador.value === '') {
                alert('Tens de escrever o utilizador.');
                return false;
            }
            if (frm.password.value === '') {
                alert('Tens de escrever a password.');
                return false;
            }
            return true;
        }
    </script>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body class="pagina-login">
    <div class="container mt-3">
        <h2>Painel de Gestão</h2>

        <?php if ($erro === '1'): ?>
            <p class="mensagem erro">Utilizador ou password incorretos.</p>
        <?php endif; ?>


        <form action="autenticar.php" method="post" onsubmit="return validar(this);">
            <div class="mb-3 mt-3">
                <label for="utilizador" class="form-label">utilizador:</label>
                <input type="text" class="form-control" id="utilizador" placeholder="Enter utilizador" name="utilizador">
            </div>
            <div class="mb-3">
                <label for="pwd" class="form-label">Password:</label>
                <input type="password" class="form-control" id="password" placeholder="Enter password" name="password">
            </div>
            <button type="submit" class="btn btn-primary">Entrar</button>
        </form>
    </div>
</body>
</html> 