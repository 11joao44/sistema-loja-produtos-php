<?php
require_once __DIR__ . '/../includes/conexao.php';
class ProdutoDAO
{
    private $conexao;

    public function __construct(PDO $conexao)
    {
        $this->conexao = $conexao;
    }

    public function cadastrar(Produto $produto)
    {
        $sql = "INSERT INTO produtos (nome, descricao, preco, ativo) VALUES (:nome, :descricao, :preco, 1)";
        $stmt = $this->conexao->prepare($sql);

        // Usa os getters da classe Produto
        $stmt->bindValue(':nome', $produto->getNome());
        $stmt->bindValue(':descricao', $produto->getDescricao());
        $stmt->bindValue(':preco', $produto->getPreco());

        return $stmt->execute();
    }

    public function listar()
    {
        $sql = "SELECT * FROM produtos WHERE ativo = 1";
        $stmt = $this->conexao->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function buscarPorId($id)
    {
        $sql = "SELECT * FROM produtos WHERE id = :id";
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function atualizar($id, $nome, $descricao, $preco)
    {
        $sql = "UPDATE produtos SET nome = :nome, descricao = :descricao, preco = :preco WHERE id = :id";
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':descricao', $descricao);
        $stmt->bindParam(':preco', $preco);

        return $stmt->execute();
    }

    public function desativar($id)
    {
        $sql = "UPDATE produtos SET ativo = 0 WHERE id = :id"; // Atualiza a coluna 'ativo'
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT); // Garante que o parâmetro seja um inteiro
        return $stmt->execute();
    }

    public function excluir($id)
    {
        // Exclui fisicamente o produto da tabela
        $sql = "DELETE FROM produtos WHERE id = :id";
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }
    

    // Pesquisa produtos pelo nome ou parte do nome
    public function pesquisarPorNome($nome)
    {
        $sql = "SELECT * FROM produtos WHERE nome LIKE :nome AND ativo = 1";
        $stmt = $this->conexao->prepare($sql);
        $nome = "%{$nome}%"; // Adiciona os curingas para o LIKE
        $stmt->bindParam(':nome', $nome);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC); // Retorna todos os resultados
    }
    // Pesquisa um produto específico pelo ID
    public function pesquisarPorId($id)
    {
        $sql = "SELECT * FROM produtos WHERE id = :id"; // Certifique-se de que a tabela se chama 'produtos'
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC); // Retorna um único produto
    }
}

?>