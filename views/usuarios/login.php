<?php include __DIR__ . '/../header.php';?>

    <form action="/realiza-login" method="post">
        <div class="form-group row">
            <label for="userEmail">E-mail:</label>
            <input type="email" class="form-control" name="userEmail" placeholder="E-mail">
            <label for="userPassword">Senha:</label>
            <input type="password" class="form-control" name="userPassword" placeholder="Senha">
        </div>
        <button class="btn btn-primary">Entrar</button>
    </form>

<?php include __DIR__ . '/../footer.php';?>