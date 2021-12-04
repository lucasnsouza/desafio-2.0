<?php include __DIR__ . '/../header.php';?>

<form action="/enviar-email-senha" method="post">
    <div class="form-group row">
        <label for="userEmail">E-mail:</label>
        <input type="email" class="form-control" name="userEmail" placeholder="E-mail">
    </div>
    <button class="btn btn-primary">Enviar</button>
</form>

<?php include __DIR__ . '/../footer.php';?>
