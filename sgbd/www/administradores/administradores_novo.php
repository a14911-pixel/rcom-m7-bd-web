<?php
require '../protege.php';
$pagina_ativa = 'administradores';
require '../cabecalho.php';
?>
<h1>Novo administrador</h1>
<form method="post" action="adminstradores_inserir.php">
    <label>Nome do Administrador</label>
    <input type="text" name="nome" required>
    <button type="submit">Guardar</button>
</form>
<?php require '../rodape.php'; ?>