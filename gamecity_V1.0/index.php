<?php 
session_start();

include_once("connection/connection.php");
if(!empty($_GET['search'])){
    $data = $_GET['search'];
    $sql = "SELECT * FROM produtos WHERE id LIKE '%$data%' or preco LIKE '%$data%' or categoria LIKE '%$data%'";
}else {
    $sql = "SELECT * FROM produtos ORDER BY id ASC";
    
}

$result = $con->query($sql);


?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gamecity | vendas de jogos</title>
    <link rel="stylesheet" href="assets/css/index.css">
    <link rel="shortcut icon" href="assets/img/logo.png" type="image/x-icon">
</head>

<body>
    <header id="header">
        <div id="logo"><img src="assets/img/logo.png" alt=""></div>
        <div id="search">
            <img src="" alt="">
            <input type="text" id="buscar" placeholder="Buscar....">
            <button onclick="searchData()" id="btnBuscar">Buscar</button>
        </div>
        <nav id="menu">
            <ul id="submenu">
                <li><a href="pages/cadastro.php">Cadastrar</a></li>
                <li><a href="pages/login.php">Login</a></li>
            </ul>
        </nav>
    </header>

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
                    while($produto_data = mysqli_fetch_assoc($result)){
                        echo "<tr>";
                        echo "<td>".$produto_data['id']."</td>";
                        echo "<td>".$produto_data['nome']."</td>";
                        echo "<td>".$produto_data['descricao']."</td>";
                        echo "<td>".$produto_data['preco']."</td>";
                        echo "<td>".$produto_data['categoria']."</td>";
                        echo "</tr>";
                    }
                ?>
            </tbody>
        </table>
    </div>

    <footer id="footer">
        <div id="footer-content">
            <img  src="assets/img/logo.png" alt="">
            <p>O melhor site de vendas de jogos e acessórios usados do Brasil!</p>
        </div>
        <div class="footer-bottom">
            <p>&copy; Dario junior <span id="ano"></span></p>
        </div>
    </footer>
</body>

<script src="assets/js/ano.js"></script>
<script src="assets/js/pesquisar.js"></script>

</html>