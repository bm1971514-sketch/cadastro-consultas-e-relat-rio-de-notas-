<?php
session_start();
require 'conn.php'; 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'];
    $senha = $_POST['senha'];


    $stmt = $pdo->prepare("SELECT * FROM usuarios WHERE nome = :nome");
    $stmt->bindParam(':nome', $nome);
    $stmt->execute();
    $usuarios = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($usuarios && $senha == $usuarios['senha']) {
        $_SESSION['usuarios_id'] = $usuarios['id'];
        $_SESSION['nome'] = $usuarios['nome'];
        header("Location: gestão.php"); 
        exit;
    } else {
        $_SESSION['error'] = 'Usuario ou senha estão incorretos';
        header("Location: index.php"); 
        exit;
    }
}
?>
