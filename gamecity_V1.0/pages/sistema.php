<?php
session_start();
include_once("../connection/connection.php");

if ((!isset($_SESSION['usuario']) == true) || (!isset($_SESSION['senha']) == true)) {
    unset($_SESSION['usuario']);
    unset($_SESSION['senha']);
    header('Location: login.php');
} else {
    $logado = $_SESSION['usuario'];
}

$sql = "SELECT * FROM produtos ORDER BY id ASC";

$result = $con->query($sql);
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gamecity | Sistema</title>
    <link rel="stylesheet" href="../assets/css/sistema.css">
    <link rel="shortcut icon" href="../assets/img/logo.png" type="image/x-icon">
</head>

<body>
    <header id="header">
        <div>
            <img src="../assets/img/logo.png" alt="">
        </div>
        <div class="usuario">
            <?php
            echo "<h1>Bem vindo, $logado</h1>";
            ?>
        </div>
        <nav id="menu">
            <ul class="submenu">
                <li><a href="produtos.php">Meus Produtos</a></li>
                <li><a style="background-color:orange;" href="../verifications/sair.php">Sair</a></li>
            </ul>
        </nav>

    </header>

    <main>
        <div class="table-container">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Descrição</th>
                        <th scope="col">Preço</th>
                        <th scope="col">Categoria</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($produto_data = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>" . $produto_data['id'] . "</td>";
                        echo "<td>" . $produto_data['nome'] . "</td>";
                        echo "<td>" . $produto_data['descricao'] . "</td>";
                        echo "<td>" . $produto_data['preco'] . "</td>";
                        echo "<td>" . $produto_data['categoria'] . "</td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
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