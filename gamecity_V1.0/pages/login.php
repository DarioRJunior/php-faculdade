<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gamecity | Login</title>
    <link rel="stylesheet" href="../assets/css/login.css">
    <link rel="shortcut icon" href="../assets/img/logo.png" type="image/x-icon">
</head>

<body>
    <header id="header">
        <div>
            <img src="../assets/img/logo.png" alt="">
        </div>
        <nav id="menu">
            <ul class="submenu">
                <li> <a href="../index.php">Página Inicial</a></li>
                <li> <a href="../pages/cadastro.php">Cadastro</a></li>
            </ul>
        </nav>

    </header>

    <main>
        <section class="login">
            <div class="login-container">
                <h2>Faça seu login na GameCity</h2>

                <div class="box-login">
                    <form action="../verifications/testLogin.php" method="POST">
                        <p>Usuário:</p>
                        <input type="text" name="usuario" id="usuario" placeholder="Usuário" required>
                        <p>Senha:</p>
                        <input type="password" name="senha" id="senha" placeholder="Senha" required>
                        <br>
                        <input type="submit" id="submit" name="submit" value="Login">
                    </form>
                </div>
            </div>
        </section>
    </main>

    <footer id="footer">
        <div id="footer-content">
            <img src="../assets/img/logo.png" alt="">
            <p>O melhor site de vendas de jogos e acessórios usados do Brasil!</p>
        </div>
    </footer>
</body>

<script src="../assets/js/ano.js"></script>

</html>