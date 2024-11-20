<?php
$mostrarProdutos = (isset($_GET['pesquisa_produto']) || isset($_GET['id_produto'])) && (empty($_GET['pesquisa_usuario']) || !isset($_GET['pesquisa_usuario']));
?>

<div class="<?php echo $mostrarProdutos ? '' : 'hidden'; ?> m-auto w-[1280px] bg-white/10 backdrop-blur-sm border border-black/30 rounded-lg shadow-lg p-6 mt-8" id="lista_produtos">
    <div class="font-bold mb-4 flex justify-between">
        <div class="flex gap-2">
            <img class="w-[64px] h-[64px]" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAGQAAABkCAYAAABw4pVUAAAACXBIWXMAAAsTAAALEwEAmpwYAAALsElEQVR4nO2deXAUVR7He+/dP7Zqq/YPy93aLa3dVcl9zOQgmhAEJnfICSQciRiOJUFBFlejq6wYkUBIQI6giKyCiIIoiMYiskjSnWBgg+IBqIEw7w1kuidAMCHJhN/Wr0lwMkkmPUP39MzQ36pfTaYzx+v36d/v997r994wjCZNmjRp0qRJkyZNmjRp0qRJkyZNmjRp0uRR2gXws0Yz1bECWcrxZB8rkK84nlo4nlhZnnbj36xAvuQE+i4nkGWc2TTuAJz+ldrl9jlxbef/xvJkvVj5AgWnjKftLE+r2TYSpvZ5eL04y/kgvNpZnvQ5DWJYOOTDunZjiNrn5XVqAvgFx9OnxTAkB4jBUHo5ga451NLya7XP0yvEtZvu4nh6XHYQdsbytBlDIXO7yHDvvXdlRulfTwsPtSQE+PWl60KFzCj9lvEBAXeM9B6Op2NYnrYqDcMmvwj1gnEs4+syBPkb0nWhHf9Zt6rX2HISuq+ZAR+3rS3vSQsP6TAE3Bdt/556M9WzPOXdBuOmkQ6WN0UwvqqJQffcjTC+PF4Hfdb2IfZ502FI14dfmuDn9+eB9zS1td3JCsTkfhg3w5fZZ8MXhin0jOFg9PXblooXeibrda8Yxox5ICs68lhKWMj1NF0oLJiRB9v27VYFCseTz9nW1t8wvqZ0XagFw5MjIGfPNENCgF9v3rgHrn760R7ouGSEq5cJ1H28FwqSDFD24nJ1oAikgvFmJfj7/yUzKmJfSmhIR3JI0A+Z0foDBn+/vq4fLjgE0tvDQ/kTj1kt5u+H/O+ScA6mxceq4yk8sXptPwVhpIWHWXa+vK6Xv/gdXCSnYNu6cmtCgP9141nHHtI3ih0+sBuKZ+aplE/IB4w3KjNSt2f7xjVW+8o8920zdHe1wfaNlbC16kV4e8t6p4F0XDJCmj5cLSDX69uNoYw3aKL/valZ0RHHkoIDu5OCA61C29CQg/Zm9VqxmeuKdxhbTsLubZsgOTQIigumw+sH3lMjdG1kPF2TI3UVuTFRXZiEMQH3dPODKvKdVzfA1soVsLl8ObyyuswlGNwn+2HXlvVwuf08YH6p2bMd8sbHwaqqVW4GQi0n4eQvGU/2DISBCXe4ijx6+CNoqqu5pbzRZ22HHZuqhhxDMHkT4mFn7YfuDV0WGsd4qjBMoWfYVhS2pN5YX4GJHKpXPie2nG4VSN8I9sm+XWIfxb2hizzLeKqSgwOvYZiyv5ovGE8pBqHPxvgL30GaLszduWQP401AMGfYV1xGpA4M/mO80pKCAwaHLJ6cZDxVWdGRTdiLHu1KxhMrK8qBveWLvcrKinLEsg8GQs2Mp2qS/30p+fFxV0dK6rZA8AQ7m97wKttbvngIEI6n1xhP1mR9eHlOTFQX9qKx4+bzQAQRSh1rMaYCwE8YT1ROfGzu/Pwp3ZhgR4rFPgVE6A9fAq05YiE3bxd4jFiePOmoZeKrQDgRCrlcbzGlMJ40J4rj6bnbFQgnhjDSy/J0FuMJ4gSaOFqBfR6IcGOIHuvCE4CUaUDoQB/lEnux9a9qAzmoAaG2if5jt0PA5l6D2TSeFWglJ9DO0YAkhwTBjueKVQ9BnU4aljklNNjp4RVsErsNBsZJcTKZEwWcmZoMywozVK/gTiftmVkZUJCe4jwQgdQqDgJni4sTm10YkKvYUAUJgX7Q+Ppy1Su5U6I1bFsulnlN9UvOA+HJ9cY24z2KzqllBfqeKzDQ6i62wty8KZAY5A+ri/Nhz8pFqo9T7R3BsGxYRizrvOnToL7tvEvnzPFkoWJA8NblSF/cZe0VbbQCHjG1QEKgP2ToQlQfwTWMYljGpOBAscyuXoSsQN5WBoZAk9AFXS2YrSWFBMHKedOgduNTsllSkL/k12JlW2KzoWlsCuyKfBDqxyaKx+xft2JOLqTqQm/pXHHRkDJAePo/e4+wlxQPUQqIYZgKlQLkVf04aBCB3KcMECWG6VneOEEOz/BMIHHQGJ2kmIfgcIosEADgNEjQld7uITnE1nuG8xp7IFNj9JIq8t2Vi2F+6kTx7p2UHJAfNxaql84eFggfmwWr9THwbHgU7IuaqCAQamHkltwLZOyBSL2656dOgB0b10B310Xos1pGtS+PH4HsKD28t2rJECCLw/Qwf/z9sGBSHJSE6xTMIfSUrDAGPMX26h/OE0ZSpwQPkQokLSwYrl4hkmAM2JIZU+CVfxYN+pyEAD9YNi0NDm4ohYMbnoJVD+dCYoCfUkld/laW3Gv5XAWyIN0AOzZVSvaQk8c/hZzooR7y2lNzh3z2q6VzFQHSINAl8gMRCLX/ogHvkNqykgPIuysXQ0lmstg3kJJDZjwYC5vtvMMZkwOIIj11ViCfeYKH1LrZbhUIy9NPGSWEC1VuFyBTbVp8MgCZqQgQnMfqTiAHN5TC47nJ4qOU43KabVlcBTJCY+e0bEAA4KdyNn1HA/LivKniMXyUctzTgNjZMRyUZeRWA08muQPI3vLHIDX0RtLGR3zu6PiP71vstpAlpblv2+Dp6bOaZfcSFCvQKqWBFKc+OKilhM8dHR+w5OAA2b1FJg/BmfJX6szm3zJy6xDAzzmevq90yKp1kOidPa4kkAFPudRzzaVOsyxeg1D676H7JJCpMray3Lp8oX8E+JivATHI2Mqy7TS7ZfkCtr7qLTSW5clqTiBHOYGS/oliXgWk5qUnYFlhFuTFjoXEoACYEX8/lBXlQtnD2bJ5CE41ZdTSaFCkAHlp0axhK2+k464CqVn3BMw2jIMni2bB1ydY+KHDBKe+aICn5xXC9LgYGUMWuaIeEIF0uALkreUl4uIYqYavv1Ug/34oW4Rhv3TC2iNA6ZwCSA4Nhn88sgAyY6LEtfGL5hfB/uZGV6B8rSIQanQGCDZZP6h8XKzgf82YLNnkAIJh6uvP2WHXs5z56jNxIHP7pipoo6ehjZ6BNzevhZzYGKj55oSzIWu3akBYnh5xBsichDioLJkuWzJ2ZB+vL4WnZ2VCZmQ4ZEfpxHsjjvZeuXqFDl2eXV0FS0rmeca4lkQg1Y4Kl64Phxfm5N6spLeeXyhOuVlTki96ipJAnpmVCaVFBeIVj/uv7Nm2Cay9FqdW/aKnpEfopAPhafuh9pbfqQlkpqMCFk5OhUWZhkEVtev5R2BuwjgxfCkxxypdFyaGHzSz6VuXl2AjvPqD74ufs3B2AXzwRZOUcLVUNRg3gLT+0dEcrvK1FeJEhXdWPHpLYapWguGYV3a0HnZuxjxwZsiWH84abprT3HgIzn57QtwqZEp87ChQSKNH7HDK8eS/IxXyMPkepk0cD/mxUbB7xSJFgTyalQhvVlfKtknBO1s3Dnq+8+V1sPSR4pHyRmud+dwfGE/QaGFrf/NRmDohHpJDAuHRDAMsn53tVJNXquEyAvQMJXaQGNhFIvv+6GE9w2Ng2Gx27HDNIXoKhq/CzDTIiI6E9Ihw2Q2BKwkEGweTI/SDEjjmDI/cU57lyWwXOlAgp2FHDpupSgHBWTALHy68ioOHuOBT1daUxDuNrJpA9jc3ih05hCKnp6BnbN9Q0ZsaGnx5wpgx3rOFLC5+xIE1NaHUfHNC7Mhh38FR07ggcaJY2aXzHhIfH0qaJBr+jf+zfW1ScGBXRoT+gFfBGBArmHLlWsrAOWn4ywmsQLZKGYV29Bmchf6d8SWxPF2kEpBi/P4GiynZJU/laTvH0yzGF4VQ3OUpLHoGT0psv5+7cOEOjieb+n+SYhQQ6FHktaOC8U+MLwvDF94bUBSGQC5zPM0cqQzYP+AsdD7Lk/3izyLduF3QiR05PIbzcXG0gbldhBvb49ZGyngGPdLQbrpb7XP0OuGmAxxvLGR50iILDJ6crRfINI/du8pbhD36BjOdwQrkE6d/Swp/fU0gtaxgylFkduDtrqa2tjs5C53en3hxcNKIG7n82NohZ1mBHOIEuo61kPzGy8bfq11mTZo0adKkSZMmTZo0adKkSZMmTZo0adKkiRmi/wOxmp3d7iUkAgAAAABJRU5ErkJggg==" alt="product">
            <?= isset($_GET['pesquisa_produto']) && !empty($_GET['pesquisa_produto']) ? "<h2 class='mt-2 text-white text-2xl'>Resultados para {$_GET['pesquisa_produto']}</h2>" : "<h2 class='mt-2 text-white text-2xl'>Produtos Disponíveis</h2>"; ?>
        </div>

        <div class="flex gap-4">
            <!-- Formulário de pesquisa de produtos por nome -->
            <form method="GET" action="" class="relative">
                <input value="<?php echo isset($_GET['pesquisa_produto']) ? $_GET['pesquisa_produto'] : ''; ?>" class="p-2 border border-black/30 rounded-lg shadow-lg outline-none" type="text" name="pesquisa_produto" id="pesquisa_produto" placeholder="Pesquisar Nome">
                <button class="absolute top-2 right-2" type="submit">
                    <img width="32" height="32" src="https://img.icons8.com/windows/32/search--v1.png" alt="search--v1" />
                </button>
            </form>

            <!-- Formulário de pesquisa de produtos por ID -->
            <form method="GET" action="" class="relative">

                <input value="<?php echo isset($_GET['pesquisa_produto']) ? $_GET['pesquisa_produto'] : ''; ?>" class="p-2 border border-black/30 rounded-lg shadow-lg outline-none" type="number" name="id_produto" id="id_produto" placeholder="Pesquisar ID">
                <button class="absolute top-2 right-2" type="submit">
                    <img width="32" height="32" src="https://img.icons8.com/windows/32/search--v1.png" alt="search--v1" />
                </button>
            </form>

            <form method="GET" action="" class="relative">
                <input type="hidden" value="<?php echo isset($_GET['pesquisa_produto']) ? $_GET['pesquisa_produto'] : ''; ?>" class="p-2 border border-black/30 rounded-lg shadow-lg outline-none" type="number" name="id_produto" id="id_produto" placeholder="Pesquisar Produto por ID">
                <button class="mt-2 border border-gray-500" type="submit"><img width="32" height="32" src="https://img.icons8.com/material/32/ffffff/broom--v1.png" alt="broom--v1" /></button>
            </form>
        </div>
    </div>
    <?php
    // Exibe os resultados da pesquisa ou a lista de produtos
    if ($resultados_produto) {
        echo "<table class='table-auto w-full border-collapse border border-gray-500'>
                        <thead>
                            <tr class='bg-gray-300'>
                                <th class='border border-gray-500 px-4 py-2'>ID</th>
                                <th class='border border-gray-500 px-4 py-2'>Nome</th>
                                <th class='border border-gray-500 px-4 py-2'>Descrição</th>
                                <th class='border border-gray-500 px-4 py-2'>Preço</th>
                                <th class='border border-gray-500 px-4 py-2'>Ações</th>
                            </tr>
                        </thead>
                        <tbody>";
        $produtos = is_array(reset($resultados_produto)) ? $resultados_produto : [$resultados_produto];

        foreach ($produtos as $produto) {
            echo "<tr>
                            <td class='border border-gray-500 px-4 py-2 font-bold text-white text-center'>{$produto['id']}</td>
                            <td class='border border-gray-500 px-4 py-2 font-bold text-white text-center'>{$produto['nome']}</td>
                            <td class='border border-gray-500 px-4 py-2 font-bold text-white text-center'>{$produto['descricao']}</td>
                            <td class='border border-gray-500 px-4 py-2 font-bold text-white text-center'>R$ " . number_format($produto['preco'], 2, ',', '.') . "</td>
                            <td class='border border-gray-500 px-4 py-2 text-white flex justify-center gap-4'>
                                <button onclick='editarProduto({$produto['id']}, \"{$produto['nome']}\", \"{$produto['descricao']}\", {$produto['preco']})' class='bg-blue-500 py-2 px-4 text-white rounded hover:bg-blue-600'><img width='24' height='24' src='https://img.icons8.com/ios-filled/24/ffffff/edit--v1.png' alt='edit--v1'/></button>
                                <form action='' method='POST' style='display:inline;'>
                                    <input type='hidden' name='acao' value='excluir'>
                                    <input type='hidden' name='id' value='{$produto['id']}'>
                                    <button type='submit' class='bg-red-500 text-white py-2 px-4 rounded hover:bg-red-600'><img width='24' height='24' src='https://img.icons8.com/ios-filled/24/ffffff/delete-trash.png' alt='delete-trash'/></button>
                                </form>
                            </td>
                        </tr>";
        }
        echo "</tbody></table>";
    } else {
        echo "
    <div class='overflow-y-auto max-h-[70vh]'>
    <table class='table-auto w-full border-collapse border border-gray-500'>
                        <thead class='sticky top-0 bg-gray-200'>
                            <tr>
                                <th class='border border-gray-500 px-4 py-2'>ID</th>
                                <th class='border border-gray-500 px-4 py-2'>Nome</th>
                                <th class='border border-gray-500 px-4 py-2'>Descrição</th>
                                <th class='border border-gray-500 px-4 py-2'>Preço</th>
                                <th class='border border-gray-500 px-4 py-2'>Ações</th>
                            </tr>
                        </thead>
                        <tbody>";

        foreach ($produtos as $produto) {
            echo "<tr>
                            <td class='border border-gray-500 px-4 py-2 font-bold text-white text-center'>{$produto['id']}</td>
                            <td class='border border-gray-500 px-4 py-2 font-bold text-white text-center'>{$produto['nome']}</td>
                            <td class='border border-gray-500 px-4 py-2 font-bold text-white text-center'>{$produto['descricao']}</td>
                            <td class='border border-gray-500 px-4 py-2 font-bold text-white text-center'>R$ " . number_format($produto['preco'], 2, ',', '.') . "</td>
                            <td class='border border-gray-500 px-4 py-2 text-white flex justify-center gap-4'>
                                <button onclick='editarProduto({$produto['id']}, \"{$produto['nome']}\", \"{$produto['descricao']}\", {$produto['preco']})' class='bg-blue-500 py-2 px-4 text-white rounded hover:bg-blue-600'><img width='24' height='24' src='https://img.icons8.com/ios-filled/24/ffffff/edit--v1.png' alt='edit--v1'/></button>
                                <form action='' method='POST' style='display:inline;'>
                                    <input type='hidden' name='acao' value='excluir'>
                                    <input type='hidden' name='id' value='{$produto['id']}'>
                                    <button type='submit' class='bg-red-500 text-white py-2 px-4 rounded hover:bg-red-600'><img width='24' height='24' src='https://img.icons8.com/ios-filled/24/ffffff/delete-trash.png' alt='delete-trash'/></button>
                                </form>
                            </td>
                        </tr>";
        }
        echo "</tbody></table></div>";
    }
    ?>
</div>