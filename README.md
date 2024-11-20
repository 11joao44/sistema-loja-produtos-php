# TASK

1. Criar o banco de dados da Loja do Produto
   - No phpMyAdmin, criei o banco de dados loja_produtos com as tabelas produtos e usuários: url para acesso banco de dados http://localhost/phpmyadmin

2. Criar a estrutura de pasta do projeto
loja-produtos/
├── assets/           (arquivos CSS, JS, imagens)
├── includes/         (arquivos reutilizáveis como conexão com o banco de dados)
├── views/            (páginas HTML/PHP para exibir informações)
├── controllers/      (lógica das operações como salvar, editar, excluir)
└── index.php         (página inicial)

3. Adicionar o framework de CSS
  - Usado framework TailwindCSS adicionado via CDN https://cdn.tailwindcss.com

4. Criar Classe de Conexão com o Banco de Dados
  - criado a classe no diretório (includes/conexao.php)

5. Criar Classe de Camada DAO (ProdutoDAO)
  - Criado a Classe de Camada DAO (Data Access Object) no diretório (includes/ProdutoDAO.php)

6. Criar função de Salvar
  - função criada no diretório (controller/ProdutoDAO.php)
  
7. Criar a função de Pesquisar Produto
  - função criada no diretório (controller/ProdutoDAO.php)

8. Criar a função de Pesquisar Produto por ID
  - função criada no diretório (controller/ProdutoDAO.php)

9. Criar a função de Alterar Produto
  - função criada no diretório (controller/ProdutoDAO.php)

10. Criar a função de Excluir Produto
  - função criada no diretório (controller/ProdutoDAO.php)

11. Criar a Classe de Modelo (Produto)