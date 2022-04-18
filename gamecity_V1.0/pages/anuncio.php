<?php
session_start();
//print_r($SESSION);
if ((!isset($_SESSION['usuario']) == true) || (!isset($_SESSION['senha']) == true)) {
    unset($_SESSION['usuario']);
    unset($_SESSION['senha']);
    header('Location: login.php');
} else {
    $logado = $_SESSION['usuario'];
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gamecity | Meus produtos</title>
    <link rel="stylesheet" href="../assets/css/anuncio.css">
    <link rel="shortcut icon" href="../assets/img/logo.png" type="image/x-icon">
</head>

<body>
    <header id="header">
        <div>
            <img src="../assets/img/logo.png" alt="">
        </div>
        <div class="usuario">
            <?php
            echo "<h1>Aqui estão seus produtos, $logado</h1>";
            ?>
        </div>
        <nav id="menu">
            <ul class="submenu">
                <li><a href="produtos.php">Meus Produtos</a></li>
                <li> <a href="sistema.php">Voltar</a></li>
                <li><a style="background-color:orange;" href="../verifications/sair.php">Sair</a></li>
            </ul>
        </nav>

    </header>

    <main>
        <section id="criar-anuncio">
            <div class="anuncio-container">
                <h2>Criando Anúncio</h2>
                <?php
                if (isset($_SESSION['msg'])) {
                    echo $_SESSION['msg'];
                    unset($_SESSION['msg']);
                }
                ?>
                <div class="anuncio-box">
                    <form action="../verifications/testProduto.php" method="POST">
                        <label>Nome:</label>
                        <input type="text" name="nome" placeholder="Digite o nome do produto...">
                        <label>Descrição:</label>
                        <input type="text" name="descricao" placeholder="Digite a descrição do produto...">
                        <label>Preço:</label>
                        <input type="text" name="preco" placeholder="Digite o preço do produto...">
                        <label>Categoria:</label>
                        <input type="text" name="categoria" placeholder="Digite a categoria do produto...">
                        <input type="submit" value="Cadastrar">
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