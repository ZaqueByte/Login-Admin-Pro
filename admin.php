<?php
// Inicia a sessão para verificar o status de login
session_start();

// Verifica se o usuário NÃO está logado. Se não estiver, redireciona para o login.
if (!isset($_SESSION['logado']) || $_SESSION['logado'] !== true) {
    header('Location: index.php');
    exit;
}

// O usuário está logado
$usuario_logado = htmlspecialchars($_SESSION['usuario'] ?? 'Usuário'); 
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu Administrativo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="alert alert-success">
            <h1>Painel de Controle</h1>
            <p>Bem-vindo(a) à Área Administrativa, **<?php echo $usuario_logado; ?>**!</p>
        </div>
        
        <div class="card p-4">
            <h4>Funcionalidades:</h4>
            <ul>
                <li>Gestão de Conteúdo</li>
                <li>Configurações do Sistema</li>
            </ul>
        </div>

        <a href="logout.php" class="btn btn-danger mt-4">Sair do Sistema (Logout)</a>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>