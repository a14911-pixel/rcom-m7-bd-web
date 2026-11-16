<?php
require 'protege.php';
require 'db.php';

$nome       = trim($_POST['nome'] ?? '');
$utilizador = trim($_POST['utilizador'] ?? '');
$password   = $_POST['password'] ?? '';

if ($nome === '' || $utilizador === '' || strlen($password) < 4) {
    header('Location: administradores_novo.php');
    exit;
}

// NUNCA guardar a password em texto simples: usa-se password_hash()
$password_hash = password_hash($password, PASSWORD_BCRYPT);

$consulta = "INSERT INTO administradores (utilizador, password, nome) VALUES (?, ?, ?)";
$stmt = mysqli_prepare($ligacao, $consulta);
mysqli_stmt_bind_param($stmt, 'sss', $utilizador, $password_hash, $nome);
mysqli_stmt_execute($stmt);

header('Location: administradores_listar.php');
exit;