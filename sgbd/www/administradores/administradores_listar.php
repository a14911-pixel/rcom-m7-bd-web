<?php
require '../protege.php';
require '../db.php';
$pagina_ativa = 'administradores';

$consulta = "SELECT * FROM administradores ORDER BY nome";
$resultado = mysqli_query($ligacao, $consulta);

require '../cabecalho.php';
?>
<h1>Administradores</h1>
<p><a href="administradores_novo.php">+ Novo Administrador</a></p>

<table>
<tr><th>ID</th><th>Nome</th><th>Ações</th></tr>
<?php while ($linha = mysqli_fetch_assoc($resultado)): ?>
<tr>
    <td><?php echo $linha['id']; ?></td>
    <td><?php echo htmlspecialchars($linha['nome']); ?></td>
    <td>
        <a href="administradores_editar.php?id=<?php echo $linha['id']; ?>">Editar</a>
        <a href="administradores_eliminar.php?id=<?php echo $linha['id']; ?>"
           onclick="return confirm('Eliminar este administrador?');">Eliminar</a>
    </td>
</tr>
<?php endwhile; ?>
</table>
<?php require '../rodape.php'; ?>