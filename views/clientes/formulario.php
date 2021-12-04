<?php include __DIR__ . '/../../views/header.php';?>

<form action="/salvar-cliente<?= isset($cliente) ? '?id=' . $cliente->getId() : '';?>" method="post">
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="inputNome">Nome</label>
            <input
                    type="text"
                    class="form-control"
                    name="inputNome"
                    placeholder="Nome"
                    value="<?=isset($cliente) ? $cliente->getNome() : '';?>">
        </div>
        <div class="form-group col-md-6">
            <label for="inputTelefone">Telefone - Insira apenas os números com DDD</label>
            <input
                    type="text"
                    class="form-control"
                    name="inputTelefone"
                    placeholder="Telefone - Apenas os números"
                    value="<?=isset($cliente) ? $cliente->getTelefone() : '';?>">
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="inputEmail">E-mail</label>
            <input
                    type="email"
                    class="form-control"
                    name="inputEmail"
                    placeholder="E-mail"
                    value="<?=isset($cliente) ? $cliente->getEmail() : '';?>">
        </div>
        <div class="form-group col-md-6">
            <label for="inputCnpj">CNPJ - Insira apenas os números</label>
            <input
                    type="text"
                    class="form-control"
                    name="inputCnpj"
                    placeholder="CNPJ - Apenas os números"
                    value="<?=isset($cliente) ? $cliente->getCnpj() : '';?>">
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-4">
            <label for="inputCidade">Cidade</label>
            <input
                    type="text"
                    class="form-control"
                    name="inputCidade"
                    value="<?=isset($cliente) ? $cliente->getCidade() : '';?>">
        </div>
        <div class="form-group col-md-1">
            <label for="inputEstado">Estado</label>
            <select name="inputEstado" class="form-control">
                <option selected><?=isset($cliente) ? $cliente->getEstado() : 'UF...';?></option>
                <option>AC</option>
                <option>AL</option>
                <option>AM</option>
                <option>AP</option>
                <option>BA</option>
                <option>CE</option>
                <option>DF</option>
                <option>ES</option>
                <option>GO</option>
                <option>MA</option>
                <option>MT</option>
                <option>MS</option>
                <option>MG</option>
                <option>PA</option>
                <option>PB</option>
                <option>PR</option>
                <option>PE</option>
                <option>PI</option>
                <option>RR</option>
                <option>RO</option>
                <option>RJ</option>
                <option>RN</option>
                <option>RS</option>
                <option>SC</option>
                <option>SP</option>
                <option>SE</option>
                <option>TO</option>
            </select>
        </div>
        <div class="form-group col-md-3">
            <label for="inputSituacao">Situação</label>
            <select
                    type="text"
                    class="form-control"
                    name="inputSituacao">
                <option selected><?=isset($cliente) ? $cliente->getSituacao() : 'Situação...';?></option>
                <option>Ativo</option>
                <option>Inativo</option>
            </select>
        </div>
        <div class="form-group col-md-3">
            <label for="inputOrigem">Origem</label>
            <select
                    type="text"
                    class="form-control"
                    name="inputOrigem">
                <option selected><?=isset($cliente) ? $cliente->getOrigem() : 'Origem...';?></option>
                <option>Site</option>
                <option>Boca a boca</option>
                <option>Facebook</option>
                <option>Indicação</option>
            </select>
        </div>
    </div>
    <button type="submit" class="btn btn-primary">Salvar</button>
</form>


<?php include __DIR__ . '/../../views/footer.php';?>;