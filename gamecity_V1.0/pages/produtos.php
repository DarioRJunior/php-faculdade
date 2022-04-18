<?php
session_start();
//print_r($SESSION);
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
    <title>Gamecity | Meus produtos</title>
    <link rel="stylesheet" href="../assets/css/produtos.css">
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
                <li><a href="">Meus Produtos</a></li>
                <li> <a href="sistema.php">Voltar</a></li>
                <li><a style="background-color:orange;" href="../verifications/sair.php">Sair</a></li>
            </ul>
        </nav>

    </header>

    <main>
        <section id="criar-anuncio">
            <div class="anuncio-container">
                <a href="anuncio.php">Criar anúncio</a>
            </div>
        </section>

        <section id="meus-produtos">
            <h2>Meus Produtos</h2>
            <div class="table-container">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nome</th>
                            <th scope="col">Descrição</th>
                            <th scope="col">Preço</th>
                            <th scope="col">Categoria</th>
                            <th scope="col">Ações</th>
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
                            echo "<td>
                                <a class='btnEditar' href='edit.php?id=$produto_data[id]' title='Editar'>
                                <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pencil' viewBox='0 0 16 16'>
                                <path d='M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z'/>
                            </svg></a>

                            <a class='btnExcluir' href='delete.php?id=$produto_data[id]' title='Excluir'>
                                <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-trash-fill' viewBox='0 0 16 16'>
                                    <path d='M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z'/>
                                </svg>
                            </a>
                            </td>";
                            echo "</tr>";
                        }
                        ?>
                    </tbody>
                </table>
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