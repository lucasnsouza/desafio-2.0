<?php include __DIR__ . '/../header.php'; ?>

<form action="/salvar-nova-senha" method="post">
    <div class="form-group">
        <label for="email">E-mail</label>
        <input type="email" class="form-control" id="email" name="email" placeholder="E-mail cadastrado">
        <label for="senha">Digite a nova senha</label>
        <input type="password" class="form-control" id="senha" name="senha" placeholder="Nova senha">
    </div>
    <button class="btn btn-primary">Salvar</button>
</form>

<?php include __DIR__ . '/../footer.php'; ?>
