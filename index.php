<?php
require_once 'includes/conexao.php';
require_once 'controllers/produtoController.php';
require_once __DIR__ . '/models/UsuarioDAO.php';

$conexao = Conexao::conectar();

// Controladores
$controller_produto = new ProdutoDAO($conexao);
$controller_usuario = new UsuarioDAO($conexao);

// Inicializar variáveis
$produtos = [];
$usuarios = [];
$resultados_produto = null;
$resultados_usuario = null;

// Função para buscar produtos
function buscarProdutos($controller_produto)
{
    if (isset($_GET['pesquisa_produto']) && !empty($_GET['pesquisa_produto'])) {
        return $controller_produto->pesquisarPorNome($_GET['pesquisa_produto']);
    }

    if (isset($_GET['id_produto']) && is_numeric($_GET['id_produto'])) {
        return $controller_produto->pesquisarPorId(intval($_GET['id_produto']));
    }

    return null; // Retorna todos os produtos caso não haja pesquisa
}

// Função para buscar usuários
function buscarUsuarios($controller_usuario)
{
    if (isset($_GET['pesquisa_usuario']) && !empty($_GET['pesquisa_usuario'])) {
        return $controller_usuario->pesquisarPorNome($_GET['pesquisa_usuario']);
    }

    if (isset($_GET['id_usuario']) && is_numeric($_GET['id_usuario'])) {
        return $controller_usuario->pesquisarPorId(intval($_GET['id_usuario']));
    }

    return null; // Retorna todos os usuários caso não haja pesquisa
}

// Buscando produtos com a função
$resultados_produto = buscarProdutos($controller_produto);
$produtos = $resultados_produto ?? $controller_produto->listar(); // Se não houver resultado, lista todos

// Buscando usuários com a função
$resultados_usuario = buscarUsuarios($controller_usuario);
$usuarios = $resultados_usuario ?? $controller_usuario->listar(); // Se não houver resultado, lista todos
?>


<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loja de Produtos</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Edu+AU+VIC+WA+NT+Pre:wght@400..700&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
    </style>
</head>

<body class="bg-gradient-to-r from-indigo-500 via-indigo-600 to-indigo-700 text-black">

    <!-- Cabeçalho do site -->
    <?php
    include 'views/Header.php';
    ?>

    <!-- <?php

    echo "<div class='w-full text-white text-4xl'>";
    print_r($_GET);
    echo "</div>";

    ?> -->

    <!-- Cadastrar novos produtos -->
    <?php
    include 'views/CadastrarProduto.php';
    ?>

    <?php
    include 'views/Home.php';
    ?>

    <?php
    include 'views/Users.php';
    ?>

    <!-- Modal de edição -->
    <?php
    include 'views/ModalEditar.php';
    ?>
    <!-- Modal de edição -->
    <?php
    include 'views/ModalUser.php';
    ?>

    <script src="./assets/main.js"></script>
</body>

</html>