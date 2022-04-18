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



if(!empty($_GET['id'])) {
    include_once("../connection/connection.php");
    $id = $_GET['id'];

    $sqlSelect = "SELECT * FROM produtos WHERE id =$id";
    $result = $con->query($sqlSelect);

    if ($result->num_rows > 0) {
        while ($produto_data = mysqli_fetch_assoc($result)) {
            $nome = $produto_data['nome'];
            $descricao = $produto_data['descricao'];
            $preco = $produto_data['preco'];
            $categoria = $produto_data['categoria'];
        }
    } else {
        header("Location: sistema.php");
    }
}

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
                <li><a href="produtos.php">Meus Produtos</a></li>
                <li> <a href="sistema.php">Voltar</a></li>
                <li><a style="background-color:orange;" href="../verifications/sair.php">Sair</a></li>
            </ul>
        </nav>

    </header>

    <main>
        <section id="criar-anuncio">
            <div class="anuncio-container">
                <h2>Criando Anuncio</h2>
                <?php
                if (isset($_SESSION['msg'])) {
                    echo $_SESSION['msg'];
                    unset($_SESSION['msg']);
                }
                ?>
                <div class="anuncio-box">
                    <form action="../verifications/saveEdit.php" method="POST">
                        <label>Nome:</label>
                        <input type="text" name="nome" value="<?php echo $nome ?>" placeholder="Digite o nome do produto...">
                        <label>Descrição:</label>
                        <input type="text" name="descricao" value="<?php echo $descricao ?>" placeholder="Digite a descrição do produto...">
                        <label>Preço:</label>
                        <input type="text" name="preco" value="<?php echo $preco ?>" placeholder="Digite o preço do produto...">
                        <label>Categoria:</label>
                        <input type="text" name="categoria" value="<?php echo $categoria ?>" placeholder="Digite a categoria do produto...">
                        <input type="hidden" name="id" value="<?php echo $id ?>">
                        <input type="submit" name="update" id="update" value="Atualizar">
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