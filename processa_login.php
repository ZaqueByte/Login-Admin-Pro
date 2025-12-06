<?php
session_start();
// Conecta ao banco de dados para a busca de credenciais
require_once 'conexao.php';

// Redireciona se o acesso não for via POST (form)
if ($_SERVER['REQUEST_METHOD'] !== 'POST' || !isset($_POST['login']) || !isset($_POST['senha'])) {
    header('Location: index.php');
    exit();
}

// 1. RECEBIMENTO E SANEAMENTO DE DADOS
$login_digitado = trim(htmlspecialchars($_POST['login']));
$senha_digitada = $_POST['senha']; 

// 2. BUSCA E VERIFICAÇÃO NO BANCO DE DADOS
try {
    // Busca o usuário pelo login (Prepared Statement para segurança SQL Injection)
    $stmt = $pdo->prepare("SELECT id, login, senha FROM usuarios WHERE login = ?");
    $stmt->execute([$login_digitado]);
    $usuario = $stmt->fetch();

    // Verifica se o usuário existe E se a senha digitada corresponde ao hash no BD
    if ($usuario && password_verify($senha_digitada, $usuario['senha'])) {
        // Sucesso: Define as variáveis de sessão e redireciona
        $_SESSION['logado'] = true;
        $_SESSION['usuario'] = $usuario['login']; 
        $_SESSION['id_usuario'] = $usuario['id'];

        header('Location: admin.php');
        exit;
    } else {
        // Falha: Define mensagem de erro e redireciona
        $_SESSION['erro_login'] = 'Login ou senha incorretos.';
        header('Location: index.php');
        exit;
    }

} catch (\PDOException $e) {
    // Trata erros de conexão ou SQL
    $_SESSION['erro_login'] = 'Erro no servidor: ' . $e->getMessage();
    header('Location: index.php');
    exit;
}
?>