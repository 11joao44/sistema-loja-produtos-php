<?php
require_once __DIR__ . '/../includes/conexao.php';
require_once __DIR__ . '/../models/Produto.php';
require_once __DIR__ . '/../models/ProdutoDAO.php'; 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Recebe os dados do formulário
    $nome = $_POST['nome'] ?? '';
    $descricao = $_POST['descricao'] ?? '';
    $preco = $_POST['preco'] ?? 0;
    $acao = $_POST['acao'] ?? '';
    echo "Valor de \$acao: " . $acao;

    // Obtém a conexão usando a classe Conexao
    $conexao = Conexao::conectar();
    $produtoDAO = new ProdutoDAO($conexao);

    if ($acao === "excluir") {
        echo "Entrou para excluir!";
        $id = $_POST['id'] ?? null; // Recebe o ID do produto a ser excluído
        if ($id) {
            if ($produtoDAO->excluir($id)) {
                echo "Produto excluído com sucesso!";
            } else {
                echo "Erro ao excluir o produto.";
            }
        } else {
            echo "ID não encontrado para exclusão.";
        }
    }

    if ($acao === 'desativar') {
        $id = $_POST['id'] ?? null; // Captura o ID do produto
        if ($id) {
            if ($produtoDAO->desativar($id)) { // Passa o ID, não o objeto Produto
                echo "Produto desativado com sucesso!";
            } else {
                echo "Erro ao desativar o produto.";
            }
        } else {
            echo "ID não encontrado para desativação.";
        }
    }
    

    // Valida se os dados foram enviados corretamente
    if ($nome && $preco >= 0) {
        try {
            // Cria um objeto Produto com os dados recebidos
            $produto = new Produto(null, $nome, $descricao, $preco);


            if ($acao === 'editar') {
                $id = $_POST['id'] ?? null;
                $nome = $_POST['nome'] ?? '';
                $descricao = $_POST['descricao'] ?? '';
                $preco = $_POST['preco'] ?? 0;

                if ($id && $nome && $preco >= 0) {
                    try {
                        $conexao = Conexao::conectar();
                        $produtoDAO = new ProdutoDAO($conexao);

                        // Atualiza o produto
                        if ($produtoDAO->atualizar($id, $nome, $descricao, $preco)) {
                            echo "Produto atualizado com sucesso!";
                        } else {
                            echo "Erro ao atualizar o produto.";
                        }
                    } catch (Exception $e) {
                        echo "Erro ao processar a edição: " . $e->getMessage();
                    }
                } else {
                    echo "Erro ao editar o produto. Verifique os dados.";
                }
            } elseif ($acao === 'cadastrar') {
                // Salva o produto usando o DAO
                if ($produtoDAO->cadastrar($produto)) {
                    echo "Produto cadastrado com sucesso!";
                } else {
                    echo "Erro ao cadastrar o produto.";
                }
            }
        } catch (Exception $e) {
            echo "Erro ao processar o cadastro: " . $e->getMessage();
        }
    }
    header('Location: ' . $_SERVER['PHP_SELF']);
    exit();
}