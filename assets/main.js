function editarProduto(id, nome, descricao, preco) {
    document.getElementById('produto-id').value = id;
    document.getElementById('produto-nome').value = nome;
    document.getElementById('produto-descricao').value = descricao;
    document.getElementById('produto-preco').value = preco;
    document.getElementById('modal-editar').classList.remove('hidden');
}

function fecharModal() {
    document.getElementById('modal-editar').classList.add('hidden');
}

function editarUsuario(id, nome, email) {
    document.getElementById('editarId').value = id;
    document.getElementById('editarNome').value = nome;
    document.getElementById('editarEmail').value = email;
    document.getElementById('editarUsuarioForm').classList.remove('hidden');
}

function fecharFormulario() {
    document.getElementById('editarUsuarioForm').classList.add('hidden');
}

document.getElementById('cadastrar').addEventListener('click', function () {
    // Seleciona o elemento e adiciona a classe
    document.getElementById('lista_produtos').classList.add('hidden');
    document.getElementById('lista_usuarios').classList.add('hidden');
    document.getElementById('form_cadastro').classList.remove('hidden');
});

document.getElementById('usuarios').addEventListener('click', function () {
    // Seleciona o elemento e adiciona a classe
    document.getElementById('form_cadastro').classList.add('hidden');
    document.getElementById('lista_produtos').classList.add('hidden');
    document.getElementById('lista_usuarios').classList.remove('hidden');
});

document.getElementById('inicio').addEventListener('click', function () {
    // Seleciona o elemento e adiciona a classe
    document.getElementById('form_cadastro').classList.add('hidden');
    document.getElementById('lista_usuarios').classList.add('hidden');
    document.getElementById('lista_produtos').classList.remove('hidden');
});

document.getElementById('desativar').addEventListener('click', function () {
    document.getElementById('acao-input').value = "desativar";
});

