<?php
require_once __DIR__ . '/../models/Usuario.php';

class UsuarioDAO
{
    private $conexao;

    public function __construct(PDO $conexao)
    {
        $this->conexao = $conexao;
    }

    // Método para cadastrar um novo usuário
    public function cadastrar(Usuario $usuario)
    {
        $sql = "INSERT INTO usuarios (nome, email, senha, ativo) VALUES (:nome, :email, :senha, TRUE)";
        $stmt = $this->conexao->prepare($sql);

        // Usando os getters da classe Usuario
        $stmt->bindValue(':nome', $usuario->getNome());
        $stmt->bindValue(':email', $usuario->getEmail());
        $stmt->bindValue(':senha', password_hash($usuario->getSenha(), PASSWORD_BCRYPT));

        return $stmt->execute();
    }

    public function atualizar($id, $nome, $email)
    {
        $sql = "UPDATE usuarios SET nome = :nome, email = :email WHERE id = :id";
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':email', $email);

        return $stmt->execute();
    }

    public function pesquisarPorNome($nome)
    {
        $sql = "SELECT * FROM usuarios WHERE nome LIKE :nome AND ativo = 1"; 
        $stmt = $this->conexao->prepare($sql);
    
        $nome = "%{$nome}%";
        $stmt->bindParam(':nome', $nome);    
        $stmt->execute();
    
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function pesquisarPorId($id)
    {
        $sql = "SELECT * FROM usuarios WHERE id = :id";
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    

    // Método para buscar um usuário por e-mail
    public function buscarPorEmail($email)
    {
        $sql = "SELECT * FROM usuarios WHERE email = :email";
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(':email', $email);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC); // Retorna um único usuário
    }

    // Método para autenticar o login
    public function autenticar($email, $senha)
    {
        $sql = "SELECT * FROM usuarios WHERE email = :email AND ativo = TRUE";
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(':email', $email);
        $stmt->execute();

        $usuarioData = $stmt->fetch(PDO::FETCH_ASSOC);
        // Comparar a senha fornecida com o hash armazenado no banco
        if ($usuarioData && password_verify($senha, $usuarioData['senha'])) {
            echo 'Senha verificada com sucesso!';
            // Se a senha for válida, cria o objeto Usuario
            return new Usuario($usuarioData['id'], $usuarioData['nome'], $usuarioData['email'], $usuarioData['senha']);
        }

        return false; // Caso contrário, falha na autenticação
    }

    public function listar()
    {
        $sql = "SELECT * FROM usuarios WHERE ativo = 1";
        $stmt = $this->conexao->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function verificarEmailExistente($email)
    {
        $sql = "SELECT COUNT(*) FROM usuarios WHERE email = :email";
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(':email', $email);
        $stmt->execute();

        return $stmt->fetchColumn() > 0; // Retorna true se o e-mail já estiver registrado
    }
}
