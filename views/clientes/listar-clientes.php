<?php include __DIR__ . '/../../views/header.php'; ?>

<a href="/adicionar-cliente" class="btn btn-primary mb-2">Adicionar cliente</a>

<table class="table">
    <thead>
    <tr>
        <th scope="col">Nome</th>
        <th scope="col">Telefone</th>
        <th scope="col">Email</th>
        <th scope="col">Situação</th>
        <th scope="col">Opções</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($clientes as $cliente):?>
    <tr>
        <td><?= $cliente->getNome();?></td>
        <td><?= $cliente->getTelefone();?></td>
        <td><?=$cliente->getEmail();?></td>
        <td><?=$cliente->getSituacao();?></td>
        <td>
            <sapan>
                <a href="/atualizar-cliente?id=<?=$cliente->getId();?>" class="btn btn-info btn-sm">Atualizar</a>
                <a href="/excluir-cliente?id=<?=$cliente->getId();?>" class="btn btn-danger btn-sm">Excluir</a>
            </sapan>
        </td>
    </tr>

    <?php endforeach; ?>
    </tbody>
</table>


<?php include __DIR__ . '/../../views/footer.php'; ?>
