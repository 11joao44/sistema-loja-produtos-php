<div id="editarUsuarioForm" class="hidden fixed top-0 left-0 w-full h-full flex items-center justify-center bg-black/50">
    <div class="bg-white p-6 rounded-lg shadow-lg w-[400px]">
        <h2 class="text-2xl font-bold mb-4">Editar Usuário</h2>
        <form id="formEditarUsuario" method="POST" action="/loja-produtos-php/controllers/usuarioController.php">
            <div class="mb-4">
                <label for="editarNome" class="block text-sm font-medium">Nome</label>
                <input type="text" name="nome" id="editarNome" class="w-full p-2 border rounded-lg" required>
            </div>
            <div class="mb-4">
                <label for="editarEmail" class="block text-sm font-medium">E-mail</label>
                <input type="email" name="email" id="editarEmail" class="w-full p-2 border rounded-lg" required>
            </div>
            <!-- Campo oculto para enviar a ação -->
            <input type="hidden" name="acao" value="editar">
            <!-- Campo oculto para enviar o ID do usuário -->
            <input type="hidden" name="id" id="editarId" value="">
            <div class="flex justify-end gap-4">
                <button type="button" onclick="fecharFormulario()" class="bg-gray-500 text-white py-2 px-4 rounded">Cancelar</button>
                <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded">Salvar</button>
            </div>
        </form>
    </div>
</div>
