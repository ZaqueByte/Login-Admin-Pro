<?php
session_start();
// Conecta ao banco de dados para inserção
require_once 'conexao.php';

// Redireciona se o acesso não for via POST (form)
if ($_SERVER['REQUEST_METHOD'] !== 'POST' || !isset($_POST['login']) || !isset($_POST['senha'])) {
    header('Location: cadastro.php');
    exit();
}

// 1. RECEBIMENTO E SANEAMENTO DE DADOS
$login_novo = trim(htmlspecialchars($_POST['login']));
$senha_nova = $_POST['senha']; 

if (empty($login_novo) || empty($senha_nova)) {
    $_SESSION['erro_cadastro'] = 'Por favor, preencha todos os campos.';
    header('Location: cadastro.php');
    exit();
}

// 2. CRIPTOGRAFIA DA SENHA (ESSENCIAL para segurança)
$senha_hash = password_hash($senha_nova, PASSWORD_DEFAULT);

// 3. INSERÇÃO NO BANCO DE DADOS
try {
    // Verifica se o login já existe
    $stmt_check = $pdo->prepare("SELECT COUNT(*) FROM usuarios WHERE login = ?");
    $stmt_check->execute([$login_novo]);
    if ($stmt_check->fetchColumn() > 0) {
        $_SESSION['erro_login'] = 'Este login já está em uso. Escolha outro.';
        header('Location: cadastro.php');
        exit();
    }

    // Insere o novo usuário com o hash da senha
    $stmt = $pdo->prepare("INSERT INTO usuarios (login, senha) VALUES (?, ?)");
    $stmt->execute([$login_novo, $senha_hash]);

    // Sucesso: Define mensagem de sucesso e redireciona
    $_SESSION['mensagem_sucesso'] = "Usuário **{$login_novo}** cadastrado com sucesso! Agora, faça o login.";
    header('Location: index.php');
    exit;

} catch (\PDOException $e) {
    // Trata erros de conexão ou SQL
    $_SESSION['erro_login'] = 'Erro ao cadastrar usuário: ' . $e->getMessage();
    header('Location: cadastro.php');
    exit;
}
?>