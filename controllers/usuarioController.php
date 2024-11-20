<?php

require_once __DIR__ . '/../models/UsuarioDAO.php';
require_once __DIR__ . '/../includes/conexao.php';
require_once __DIR__ . '/../models/Usuario.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $acao = $_POST['acao'] ?? '';
    echo "<pre>"; // Para melhorar a formatação no navegador
    print_r($_POST);
    echo "</pre>";

    // Processa o login
    if ($acao === 'login') {
        $email = $_POST['email'] ?? '';
        $senha = $_POST['password'] ?? '';

        if (!empty($email) && !empty($senha)) {
            // Conecte ao banco de dados
            $conexao = Conexao::conectar();
            $usuarioDAO = new UsuarioDAO($conexao);
            // Tente autenticar o usuário
            $usuario = $usuarioDAO->autenticar($email, $senha);
            if ($usuario) {
                // Login bem-sucedido: cria a sessão
                session_start();
                $_SESSION['usuario'] = $usuario;
                header('Location: /loja-produtos-php/index.php'); // Redireciona para a página do usuário logado
                exit();
            } else {
                // Caso o login falhe
                echo "E-mail ou senha incorretos.";
            }
        } else {
            echo "Por favor, preencha todos os campos.";
        }
    }

    // Processa o cadastro de usuário
    if ($acao === 'cadastrar') {
        $nome = $_POST['name'] ?? '';
        $email = $_POST['email'] ?? '';
        $senha = $_POST['password'] ?? '';
        // echo "Valor de \$acao: " . $acao;

        if (!empty($nome) && !empty($email) && !empty($senha)) {
            // Criptografa a senha
            $senhaCriptografada = password_hash($senha, PASSWORD_BCRYPT);

            // Cria um novo objeto Usuario
            $usuario = new Usuario(null, $nome, $email, $senhaCriptografada);

            // Conecta ao banco de dados e instancia o DAO
            $conexao = Conexao::conectar();
            $usuarioDAO = new UsuarioDAO($conexao);

            // Verifica se já existe um usuário com o mesmo e-mail
            if ($usuarioDAO->verificarEmailExistente($email)) {
                echo "Já existe um usuário com esse e-mail.";
            } else {
                // Cadastra o usuário no banco de dados
                if ($usuarioDAO->cadastrar($usuario)) {
                    echo "Usuário cadastrado com sucesso!";
                    header('Location: /loja-produtos-php/views/Login.php'); // Redireciona para a página de login após o cadastro
                    exit();
                } else {
                    echo "Erro ao cadastrar o usuário. Tente novamente.";
                }
            }
        } else {
            echo "Por favor, preencha todos os campos.";
        }
    }

    if ($acao === 'editar') {
        $id = $_POST['id'];
        $nome = $_POST['nome'];
        $email = $_POST['email'];

        $conexao = Conexao::conectar();
        $usuarioDAO = new UsuarioDAO($conexao);

        if ($usuarioDAO->atualizar($id, $nome, $email,)) {
            echo json_encode(['success' => true, 'message' => 'Usuário atualizado com sucesso!']);
            header('Location: /loja-produtos-php/index.php'); // Redireciona para a página do usuário logado
            exit();
        } else {
            echo json_encode(['success' => false, 'message' => 'Erro ao atualizar o usuário.']);
        }
    }
} else {
    // Se não for um POST, redireciona para a página inicial ou login
    header('Location: /loja-produtos-php/views/Login.php');
    exit();
}
