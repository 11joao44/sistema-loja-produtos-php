<div id="modal-editar" class="hidden fixed inset-0 bg-gray-900 bg-opacity-50 flex justify-center items-center">
        <div class="bg-white p-6 rounded shadow-md">
            <h2 class="text-xl font-bold mb-4">Editar Produto</h2>
            <form action="" method="POST">
                <input type="hidden" id="acao-input" name="acao" value="editar">
                <input type="hidden" id="produto-id" name="id">
                <div>
                    <label for="nome" class="block text-gray-700">Nome:</label>
                    <input type="text" id="produto-nome" name="nome" class="w-full border border-gray-300 rounded px-4 py-2">
                </div>
                <div>
                    <label for="descricao" class="block text-gray-700">Descrição:</label>
                    <textarea id="produto-descricao" name="descricao" class="w-full border border-gray-300 rounded px-4 py-2"></textarea>
                </div>
                <div>
                    <label for="preco" class="block text-gray-700">Preço:</label>
                    <input type="text" id="produto-preco" name="preco" class="w-full border border-gray-300 rounded px-4 py-2">
                </div>
                <div class="flex justify-end mt-4">
                    <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">Salvar</button>
                    <button type="submit" id="desativar" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">Desativar</button>
                    <button type="button" onclick="fecharModal()" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600 mr-2">Cancelar</button>
                </div>
            </form>
        </div>
    </div>