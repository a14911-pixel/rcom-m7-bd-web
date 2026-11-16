<?php
require '../protege.php';
require '../db.php';
$pagina_ativa = 'administradores';

$id = (int) ($_GET['id'] ?? 0);
$stmt = mysqli_prepare($ligacao, "SELECT * FROM administradores WHERE id = ?");
mysqli_stmt_bind_param($stmt, 'i', $id);
mysqli_stmt_execute($stmt);
$administradores = mysqli_fetch_assoc(mysqli_stmt_get_result($stmt));

if (!$administradores) { header('Location: administradores_listar.php'); exit; }

require '../cabecalho.php';
?>
<h1>Editar administradores</h1>
<form method="post" action="administradores_actualizar.php">
    <input type="hidden" name="id" value="<?php echo $administradores['id']; ?>">
    <label>Nome do administradores</label>
    <input type="text" name="nome"
           value="<?php echo htmlspecialchars($administradores['nome']); ?>" required>
    <button type="submit">Atualizar</button>
</form>
<?php require '../rodape.php'; ?>   