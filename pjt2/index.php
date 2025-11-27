<?php session_start();?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Gestão de Notas</title>
    <link rel="stylesheet" href="styles.css"> <!-- Arquivo CSS externo -->
    <style>
        /* Estilos globais */
body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    background: linear-gradient(135deg, #4e73df, #1cc88a);
    color: #333;
}

/* Container principal */
.container {
    width: 100%;
    max-width: 400px;
    margin: 0 auto;
    padding: 20px;
}

/* Caixa de login */
.login-box {
    background: #fff;
    border-radius: 8px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    padding: 20px;
    text-align: center;
}

/* Título */
.login-box h1 {
    margin-bottom: 20px;
    font-size: 24px;
    color: #4e73df;
}

/* Grupo de inputs */
.input-group {
    margin-bottom: 15px;
    text-align: left;
}

/* Labels */
.input-group label {
    display: block;
    font-size: 14px;
    margin-bottom: 5px;
}

/* Inputs */
.input-group input {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    font-size: 14px;
    outline: none;
    transition: border-color 0.3s;
}

/* Foco nos inputs */
.input-group input:focus {
    border-color: #4e73df;
}

/* Botão de login */
.btn {
    width: 100%;
    padding: 10px;
    background: #4e73df;
    color: #fff;
    border: none;
    border-radius: 5px;
    font-size: 16px;
    cursor: pointer;
    transition: background 0.3s;
}

/* Hover no botão */
.btn:hover {
    background: #375a7f;
}

    </style>
</head>
<body>
    <div class="container">
        <div class="login-box">
            <h1>Login</h1>
            <form action="verificar_login.php" method="POST">
            <?php
            if(isset($_SESSION['error'])) {
                echo '<span style="color:red">'.$_SESSION['error'].'</span>';
            }
            ?>
                <div class="input-group">
                    <label for="nome_usuario">Usuário</label>
                    <input type="text" id="nome" name="nome" required>
                </div>
                <div class="input-group">
                    <label for="senha_usuario">Senha</label>
                    <input type="password" id="senha" name="senha" required>
                </div>
                <button type="submit" class="btn">Entrar</button>
            </form>
        </div>
    </div>
</body>
</html>
