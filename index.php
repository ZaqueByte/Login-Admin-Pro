<?php 
// Inicia a sessão para acessar as variáveis de feedback
session_start(); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Painel Admin Pro</title> 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .login-container {
            height: 100vh; 
            display: flex;
            justify-content: center;
            align-items: center;
        }
    </style>
</head>
<body>
    
    <?php
    if (isset($_SESSION['mensagem_sucesso'])) {
        echo '<div class="alert alert-success alert-dismissible fade show fixed-top m-3" role="alert">';
        echo '<strong>Sucesso!</strong> ' . $_SESSION['mensagem_sucesso'];
        echo '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
        unset($_SESSION['mensagem_sucesso']); 
    }
    
    if (isset($_SESSION['erro_login'])) {
        echo '<div class="alert alert-danger alert-dismissible fade show fixed-top m-3" role="alert">';
        echo '<strong>Erro!</strong> ' . $_SESSION['erro_login'];
        echo '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
        unset($_SESSION['erro_login']); 
    }
    ?>

    <div class="login-container"> 
        <div class="card shadow-lg" style="width: 100%; max-width: 400px;">
            <div class="card-header bg-primary text-white text-center">
                <h3>Acesso ao Painel Admin Pro</h3>
            </div>
            
            <div class="card-body">
                <form action="processa_login.php" method="POST">
                    <div class="mb-3">
                        <label for="login" class="form-label">Login</label>
                        <input type="text" class="form-control" id="login" name="login" required>
                    </div>
                    <div class="mb-3">
                        <label for="senha" class="form-label">Senha</label>
                        <input type="password" class="form-control" id="senha" name="senha" required>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Entrar</button>
                </form>
            </div>
            
            <div class="card-footer text-center">
                <p class="mb-0">Não possui uma conta? <a href="cadastro.php">Cadastre-se aqui</a></p>
            </div>
            
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>