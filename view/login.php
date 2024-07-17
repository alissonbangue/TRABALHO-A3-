<?php
// Inicia uma nova sessão ou resume a sessão existente
session_start();

// Inclui o arquivo 'Conexao.php' que contém a definição da classe Conexao
include_once '../DAO/Conexao.php';
// Cria uma nova instância da classe Conexao
$conex = new Conexao();

// Estabelece uma conexão com o banco de dados utilizando o método fazConexao da classe Conexao
$conex->fazConexao();

// Verifica se o método de requisição é POST, ou seja, se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Obtém o nome de usuário e a senha enviados pelo formulário
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Prepara uma consulta SQL para verificar se o usuário existe no banco de dados
    $stmt = $conex->conn->prepare("SELECT * FROM users WHERE username = ?");
    // Executa a consulta com o nome de usuário fornecido
    $stmt->execute([$username]);
    // Busca a primeira linha do resultado da consulta
    $user = $stmt->fetch();

    // Verifica se o usuário foi encontrado e se a senha fornecida corresponde à senha armazenada
    if ($user && password_verify($password, $user['password'])) {
        // Se a autenticação for bem-sucedida, armazena o ID do usuário e o nome de usuário na sessão
         $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];
        // Redireciona o usuário para a página 'itens.php'
        header('Location: bloco1form.php');
        exit();
    } else {
        // Se a autenticação falhar, define uma mensagem de erro
        $error = 'Nome de usuário ou senha inválidos';
    }
}
?>
<!DOCTYPE html>
<html>
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <title>Login</title>
</head>
<body>
    <div class="container">
    <h2>Login</h2>
    <?php if (isset($error)): ?>
        <p style="color:red;"><?php echo $error; ?></p>
    <?php endif; ?>
    <form method="POST">
        <label>Nome de usuário:</label>
        <input type="text" name="username" required>
        <br>
        <label>Senha:</label>
        <input type="password" name="password" required>
        <br>
        <button type="submit">Entrar</button>
    </form>
    </div>
</body>
</html>
