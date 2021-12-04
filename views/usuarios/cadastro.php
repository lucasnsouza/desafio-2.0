<?php include __DIR__ . '/../header.php';?>

<form action="/realiza-cadastro" method="post">
    <div>
        <div class="form-group">
            <label for="cadastroNome">Nome</label>
            <input type="text" id="cadastroNome" name="cadastroNome" class="form-control" placeholder="Nome">
        </div>
        <div class="form-group">
            <label for="cadastroEmail">E-mail</label>
            <input type="email" id="cadastroEmail" class="form-control" name="cadastroEmail" placeholder="E-mail">
        </div>
        <div class="form-group">
            <label for="cadastroSenha">Password</label>
            <input type="password" id="cadastroSenha" class="form-control"  name="cadastroSenha" placeholder="Senha">
        </div
    </div>
    <button type="submit" class="btn btn-primary">Cadastrar</button>
</form>

<?php include __DIR__ . '/../footer.php';?>

